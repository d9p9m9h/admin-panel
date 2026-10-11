# Admin Panel — Architecture & Implementation Guide

> **Status:** Canonical Architecture Guide — V1
>
> This document is the source of truth for the architecture and implementation direction of the project.
>
> Read this guide before making architectural changes. When implementation details are unclear, follow the boundaries and rules here first.

---

## 0. How to Use This Guide

This file is intentionally a **guideline**, not a copy-paste implementation manual.

The intended development loop is:

```text
Read the relevant GUIDE section
        ↓
Understand the rule and reason
        ↓
Plan a small implementation task
        ↓
Implement it yourself
        ↓
Run / test / inspect the result
        ↓
If blocked → ask AI with the current context
        ↓
AI checks the GUIDE before proposing a solution
        ↓
Apply the smallest architecture-compliant fix
```

### Important rule

Do not use AI as a replacement for understanding the system.

Use AI as:

- a teacher when a concept is unclear
- a debugger when something fails
- a reviewer when implementation is complete
- an architecture partner when a change affects a boundary

The code should still remain understandable to the developer building it.

---

# 1. System Definition

## 1.1 Product Type

The system is a:

> **Centralized Multi-Portfolio CMS + Client Portal + Public Portfolio Platform**

It is not only a personal admin panel.

The platform manages multiple client portfolios from one centralized Laravel application.

```text
                    Super Admin
                         │
                         ▼
              ┌─────────────────────┐
              │   Laravel Panel     │
              │  Shared Admin/Client│
              │        UI           │
              └──────────┬──────────┘
                         │
          ┌──────────────┼──────────────┐
          ▼              ▼              ▼
      Portfolio A    Portfolio B    Portfolio C
          │              │              │
       Client A       Client B       Client C
```

---

# 2. Core Architecture Principles

## 2.1 Simplicity + Strong Boundaries

Primary architecture principle:

> **Keep the system simple enough to understand, but make domain boundaries strong enough that future scaling does not require rewriting the core.**

Therefore V1 avoids unnecessary complexity.

### Not in V1

```text
Microservices
Separate Auth Service
Separate Media Service
Event-driven Everything
Complex RBAC
Permission Tables
Membership System
Over-engineered Repository Layer
Generic Polymorphic Media Attachment System
```

### Intentionally designed for future growth

```text
Portfolio Isolation
Policy-based Authorization
API Versioning
Storage Abstraction
Soft Deletes
Lifecycle Management
Audit Trail
Sanctum-ready Protected API
Multi-tenant Frontend Architecture
```

---

# 3. Tenancy & Ownership

## 3.1 Portfolio is the Tenant Boundary

`Portfolio` is the root authorization and data boundary.

```text
Portfolio
├── Profile
├── Projects
├── Skills
├── Experiences
├── Services
├── Categories
├── Social Links
├── Media
└── Activity Logs
```

Every tenant-owned resource must be traceable to exactly one Portfolio.

## 3.2 V1 Ownership Model

```text
1 Client    = 1 Portfolio
1 Portfolio = 1 Client
```

V1 uses direct ownership rather than a membership pivot.

```text
User
  │
  │ 1 : 1
  ▼
Portfolio
  owner_id
```

`portfolios.owner_id` must be unique.

### Future

If a portfolio later needs multiple members such as Editor / Viewer / Content Manager, introduce a membership layer at that time.

Do not add the membership architecture before the requirement exists.

---

# 4. Roles

V1 has exactly two application roles:

```text
Super Admin
Client
```

## 4.1 Super Admin

Can manage:

```text
All Portfolios
All Clients
All Content
Portfolio Context Switching
Portfolio Lifecycle
Trash
Restore
Force Delete
Audit Logs
Global Search
```

## 4.2 Client

Can manage:

```text
Own Portfolio
Own Portfolio Content
Own Media
Own-Portfolio Search
```

Cannot:

```text
Switch Portfolio
Access Another Client's Admin Data
Manage Global System Data
Restore Trash
Force Delete
Manage Users
Change Portfolio Lifecycle
```

---

# 5. Shared Admin Panel

Super Admin and Client use the same Laravel application and the same UI system.

```text
Laravel Admin Panel
├── Super Admin Experience
└── Client Experience
```

Shared:

```text
Layout
Navigation System
Components
Forms
Tables
Alerts
Authentication Flow
```

Role-aware visibility changes the UX, but it is not a security mechanism.

> **UI visibility ≠ security**

Server-side Policies remain authoritative.

---

# 6. Authentication Architecture

## 6.1 Admin / Client Panel

Use Laravel session authentication.

```text
Guest
  ↓
Login
  ↓
Authenticated User
  ↓
Admin Panel
```

## 6.2 Public API

No authentication.

## 6.3 Protected API / Future Integrations

Use Laravel Sanctum when authenticated API access is required.

```text
Laravel
├── Session Auth → Admin / Client Panel
├── Sanctum      → Protected API / integrations
└── Public API   → No Auth
```

Do not introduce OAuth / Passport unless a real requirement appears.

---

# 7. Portfolio Context

## 7.1 Super Admin Context

Super Admin explicitly chooses a Portfolio.

```text
Super Admin
    ↓
Portfolio Selector
    ↓
Selected Portfolio
    ↓
Current Portfolio Context
```

Admin URLs should make the context explicit:

```text
/admin/portfolios/{portfolio}/projects
/admin/portfolios/{portfolio}/media
```

## 7.2 Client Context

Client does not select a Portfolio.

```text
Authenticated User
        ↓
$user->portfolio
        ↓
Own Portfolio Context
```

Rule:

> **Super Admin = explicit Portfolio context**
>
> **Client = implicit own Portfolio context**

---

# 8. Authorization Architecture

Core security flow:

```text
Authenticated User
        ↓
Role
        ↓
Portfolio Context / Ownership
        ↓
Policy
        ↓
Resource
        ↓
Action
```

The three security concepts must remain distinct:

```text
ROLE
→ What kind of user are you?

OWNERSHIP / SCOPE
→ Which portfolio/resource boundary applies?

POLICY
→ Can this exact action be performed?
```

## 8.1 Never Trust Ownership From User Input

Never use client-provided ownership as the security source.

Do not trust:

```text
portfolio_id from request body
portfolio_id from hidden input
portfolio selector submitted by Client
```

For a Client, derive ownership from:

```text
Authenticated User
        ↓
$user->portfolio
        ↓
Current Portfolio ID
```

## 8.2 Query Scoping + Policy

Both are required.

```text
Portfolio-scoped query
        +
Policy authorization
        =
Defense in depth
```

Query scope answers:

> Which records should be fetched?

Policy answers:

> Is this user allowed to perform this action on this record?

---

# 9. Policies

V1 uses resource-oriented Laravel Policies.

```text
PortfolioPolicy
PortfolioProfilePolicy
ProjectPolicy
SkillPolicy
ExperiencePolicy
ServicePolicy
CategoryPolicy
SocialLinkPolicy
MediaPolicy
```

`ActivityLog` is system-generated and is not a normal user CRUD resource.

`ProjectMedia` is a relationship entity and does not need a separate complex authorization system; access is controlled through the owning Project / Media / Portfolio boundary.

## 9.1 Standard Actions

Common action vocabulary:

```text
viewAny
view
create
update
delete
restore
forceDelete
```

Portfolio lifecycle is separate:

```text
publish
suspend
archive
republish / resume
```

Project publication is also separate:

```text
publish
unpublish
```

---

# 10. Database Model

## 10.1 Core Tables

V1 core tables:

```text
users
portfolios
portfolio_profiles
projects
project_media
skills
experiences
services
categories
social_links
media
activity_logs
```

## 10.2 `users`

Purpose: authentication identity.

Important fields:

```text
id
role
name
email
password
email_verified_at
remember_token
timestamps
```

Roles:

```text
super_admin
client
```

Relationship:

```text
User
└── hasOne Portfolio
```

## 10.3 `portfolios`

Purpose: tenant root.

Important fields:

```text
id
owner_id
name
slug
status
timestamps
```

Rules:

```text
owner_id → users.id
owner_id = UNIQUE
slug = UNIQUE
```

Portfolio lifecycle state is stored in `status`.

## 10.4 `portfolio_profiles`

Purpose: public profile content separated from tenant/system metadata.

Relationship:

```text
Portfolio 1 : 1 PortfolioProfile
```

Representative fields:

```text
id
portfolio_id
headline
bio
avatar_media_id
timestamps
```

`portfolio_id` is unique for the one-to-one relationship.

## 10.5 `projects`

Representative fields:

```text
id
portfolio_id
category_id
title
slug
description
project_url
repository_url
is_published
cover_media_id
sort_order
timestamps
deleted_at
```

Rules:

```text
portfolio_id → tenant scope
category_id  → category relation
is_published → content publication state
```

Recommended unique rule:

```text
UNIQUE(portfolio_id, slug)
```

## 10.6 `project_media`

Domain-specific Project ↔ Media relationship.

```text
project_id
media_id
sort_order
```

Recommended uniqueness:

```text
UNIQUE(project_id, media_id)
```

V1 intentionally does not use a generic `media_attachments` polymorphic abstraction.

## 10.7 `skills`

```text
id
portfolio_id
name
level
sort_order
timestamps
deleted_at
```

## 10.8 `experiences`

```text
id
portfolio_id
company
position
description
start_date
end_date
is_current
sort_order
timestamps
deleted_at
```

Invariant:

```text
is_current = true
→ end_date should be NULL
```

## 10.9 `services`

```text
id
portfolio_id
title
description
image_media_id
sort_order
timestamps
deleted_at
```

## 10.10 `categories`

```text
id
portfolio_id
name
slug
sort_order
timestamps
deleted_at
```

Recommended unique rule:

```text
UNIQUE(portfolio_id, slug)
```

## 10.11 `social_links`

```text
id
portfolio_id
platform
label
url
sort_order
timestamps
deleted_at
```

## 10.12 `media`

Portfolio-scoped public website media.

Representative fields:

```text
id
portfolio_id
disk
path
original_name
mime_type
size_bytes
type
alt_text
timestamps
deleted_at
```

V1 media types:

```text
image
video
```

All V1 uploaded media is considered public website content. Private client media is not part of the V1 model.

## 10.13 `activity_logs`

Immutable audit trail.

```text
id
user_id
portfolio_id
action
subject_type
subject_id
metadata
created_at
```

No normal user CRUD.

Do not soft-delete audit records.

---

# 11. Eloquent Relationship Map

```text
User
└── hasOne Portfolio

Portfolio
├── belongsTo User
├── hasOne PortfolioProfile
├── hasMany Projects
├── hasMany Skills
├── hasMany Experiences
├── hasMany Services
├── hasMany Categories
├── hasMany SocialLinks
├── hasMany Media
└── hasMany ActivityLogs

PortfolioProfile
├── belongsTo Portfolio
└── belongsTo Media (avatar)

Project
├── belongsTo Portfolio
├── belongsTo Category
├── belongsTo Media (cover)
├── hasMany ProjectMedia
└── belongsToMany Media through project_media

Category
├── belongsTo Portfolio
└── hasMany Projects

Service
├── belongsTo Portfolio
└── belongsTo Media (image)

Media
├── belongsTo Portfolio
└── belongsToMany Projects through project_media

ProjectMedia
├── belongsTo Project
└── belongsTo Media

ActivityLog
├── belongsTo User
├── belongsTo Portfolio
└── morphTo Subject
```

The `morphTo()` in ActivityLog is for audit targeting only. It does not make the media architecture polymorphic.

---

# 12. Cross-Tenant Relationship Rules

Foreign keys alone do not fully enforce tenant consistency.

The following invariants must be checked at the application/domain layer:

```text
Project.portfolio_id == Category.portfolio_id
Project.portfolio_id == Media.portfolio_id
Service.portfolio_id == Media.portfolio_id
Profile.portfolio_id == AvatarMedia.portfolio_id
Project.portfolio_id == attached Media.portfolio_id
```

Never allow a resource from Portfolio A to reference tenant-owned data from Portfolio B.

---

# 13. Admin Request Flow

Admin request contract:

```text
Request
  ↓
Session Authentication
  ↓
Identify Role
  ↓
Resolve Portfolio Context
  ↓
Route Binding / Scoped Binding
  ↓
Policy Authorization
  ↓
Form Validation
  ↓
Domain Operation
  ↓
Database / Storage
  ↓
Audit Log
  ↓
Response / Redirect
```

## 13.1 Create

```text
Auth
→ Portfolio Context
→ Policy::create
→ Validate Input
→ Set portfolio_id from trusted context
→ Create
→ Audit
```

## 13.2 Update

```text
Resolve resource
→ Policy::update
→ Validate Input
→ Update
→ Audit
```

## 13.3 Delete

```text
Resolve resource
→ Policy::delete
→ Soft Delete
→ Audit
```

## 13.4 Important Route Rule

Scoped binding answers:

> Does this child belong to the route's parent?

Policy answers:

> Is this authenticated user allowed to act on it?

Therefore:

```text
Scoped Binding ≠ Authorization
```

Both should be preserved.

---

# 14. Controller / Request / Policy Boundaries

## Controller

Controller responsibility:

```text
Resolve context
Authorize
Call the operation
Return response / redirect
```

Avoid fat controllers.

## Form Request

Form Request responsibility:

```text
Input validation
```

It answers:

> Is the input valid?

## Policy

Policy responsibility:

```text
Authorization
```

It answers:

> Is this user allowed to perform this action?

## Model

Models own:

```text
Relationships
Casts
Simple domain-adjacent behavior
```

Do not move application-wide authorization into models.

## Service / Domain Operation

Use a service when an operation contains meaningful orchestration or a state transition that should not live in a controller.

Do not create service classes merely to wrap one Eloquent call.

---

# 15. Query Access Rules

## Client

Always scope through the authenticated user's Portfolio where possible.

Prefer:

```text
$user->portfolio->projects()
```

over:

```text
Project::query()->get()
```

for Client-facing administrative queries.

## Super Admin

Use explicit Portfolio context for tenant-owned operations.

Prefer:

```text
/admin/portfolios/{portfolio}/...
```

rather than an unscoped child-management route.

---

# 16. Lifecycle Model

Portfolio lifecycle is independent from content CRUD.

## 16.1 Portfolio States

```text
draft
published
suspended
archived
```

Lifecycle changes are Super Admin-only.

```text
Client
→ content CRUD ✅
→ Portfolio lifecycle ❌

Super Admin
→ lifecycle ✅
```

## 16.2 Recommended V1 Transitions

Default recommendation:

```text
draft      → published
published  → suspended
published  → archived
suspended  → published
suspended  → archived
archived   → published
```

These transitions should be implemented explicitly rather than via arbitrary status assignment.

If product requirements later require a different transition, change the architecture decision first; do not silently expand transition rules in a controller.

## 16.3 Portfolio is not Soft Deleted in V1

Portfolio is the tenant root.

Do not mix tenant lifecycle states with a separate Portfolio deletion lifecycle in V1.

```text
Portfolio
→ lifecycle via status
→ no normal delete / restore / force-delete
```

---

# 17. Content Publication

Project publication is separate from Portfolio lifecycle.

```text
Project.is_published
false ↔ true
```

### V1 Authority

```text
Super Admin
→ publish / unpublish ✅

Client
→ publish / unpublish ❌
```

Client may create/edit/delete project content, but public publication is controlled by Super Admin.

## 17.1 Public Project Rule

A Project is publicly visible only when:

```text
Portfolio.status == published
AND
Project.is_published == true
AND
Project.deleted_at IS NULL
```

---

# 18. Soft Delete / Trash

Soft delete is for user-managed content.

Conceptual flow:

```text
ACTIVE
  │
  │ delete
  ▼
TRASHED
  ├── restore → ACTIVE
  └── force delete → PERMANENTLY DELETED
```

## Client

```text
Delete       ✅
Restore      ❌
Force Delete ❌
Trash Access ❌
```

## Super Admin

```text
Delete        ✅
Restore       ✅
Force Delete  ✅
Trash Access  ✅
```

Soft-deleted resources are excluded from normal active queries.

---

# 19. Restore Semantics

Restore changes the deletion state, not the Portfolio lifecycle.

Example:

```text
Project
is_published = true
deleted_at = timestamp
```

After restore:

```text
Project
is_published = true
deleted_at = NULL
```

The publication state should not be silently rewritten by restore.

---

# 20. Media Architecture

Media is Portfolio-scoped.

```text
Portfolio
└── Media Library
    ├── Images
    └── Videos
```

V1 uses simple domain-specific relations:

```text
Profile → avatar media
Project → cover media
Project → project_media
Service → image media
```

Do not introduce a generic polymorphic media attachment layer in V1.

## 20.1 Storage Boundary

Storage details must not leak into controllers.

Conceptually:

```text
Controller
    ↓
Media / Storage Layer
    ↓
Storage Contract
    ↓
Storage Provider
```

This keeps future provider changes isolated.

---

# 21. Search Scopes

Search has three distinct scopes.

## Super Admin

```text
All portfolios
All clients
All content
```

## Client

```text
Own Portfolio only
```

## Public

```text
Published public content only
```

Do not use one global search query and rely on UI filtering for security.

---

# 22. Audit Trail

Important successful mutations should create an audit record.

```text
User Action
   ↓
Successful Mutation
   ↓
Activity Log
```

Audit entries should capture at least:

```text
who
what
when
portfolio
subject / target
```

The audit system is a traceability layer, not an analytics platform.

---

# 23. API Architecture

## 23.1 Versioning

Public and protected APIs start at:

```text
/api/v1/
```

Do not introduce `/api/v2/` until a real breaking API contract requires it.

## 23.2 Public API

Public API exposes only public content.

Conceptual visibility gate:

```text
Portfolio.status == published
AND
Resource.deleted_at IS NULL
AND
Resource publication rule passes
```

## 23.3 Example Public Endpoints

```text
GET /api/v1/portfolios/{portfolio:slug}
GET /api/v1/portfolios/{portfolio:slug}/projects
GET /api/v1/portfolios/{portfolio:slug}/skills
GET /api/v1/portfolios/{portfolio:slug}/services
GET /api/v1/portfolios/{portfolio:slug}/experience
GET /api/v1/portfolios/{portfolio:slug}/media
```

## 23.4 Response Boundary

Never expose Eloquent Models directly as the public API contract.

```text
Eloquent Model
      ↓
API Resource
      ↓
JSON Response
```

The API Resource defines the external contract and prevents internal fields from leaking.

---

# 24. Public Frontend Architecture — Future

The current Laravel application remains the foundation.

Do not rebuild the current admin application from scratch.

The future public frontend is one Next.js application serving multiple portfolio domains.

```text
Client A Domain ─┐
Client B Domain ─┼→ One Next.js App
Client C Domain ─┘       ↓
                    Domain Resolver
                          ↓
                    Laravel API
                          ↓
                    Portfolio Data
```

Next.js is a future phase, not the current V1 implementation priority.

---

# 25. Domain Architecture — Future

Admin is a separate application domain:

```text
admin.yourplatform.com
```

Portfolio sites may use:

```text
client-a.yourplatform.com
client-b.yourplatform.com
```

and later:

```text
client-a.com
```

Custom domains are a future capability.

Do not build the full custom-domain provisioning system in V1 unless implementation work explicitly enters that scope.

---

# 26. V1 Scope

## Build in V1

```text
Laravel Admin / Client Panel
Session Authentication
Super Admin + Client roles
1 Client : 1 Portfolio
Portfolio tenant isolation
Portfolio-scoped CRUD
Policies
Scoped Binding
Portfolio lifecycle
Project publication
Soft Deletes
Trash
Restore
Force Delete
Public media
Domain-specific media relations
Storage abstraction
Audit Trail
/api/v1 public API
API Resources
```

## Do not build in V1

```text
Complex RBAC
Permission tables
Membership system
Private media access model
Generic media attachment platform
Custom-domain automation
OAuth / Passport
Microservices
Separate media service
Separate authentication service
Full event-driven architecture
Advanced revision system
Translations system
Analytics platform
```

---

# 27. Recommended Implementation Order

Use this order as the default build path.

## Phase 1 — Foundation

```text
Authentication
Users
Roles
Portfolio ownership
Shared panel shell
Portfolio context
```

Checkpoint:

> Can a Super Admin work inside a selected Portfolio while a Client is restricted to only their own Portfolio?

## Phase 2 — Database & Models

Implement:

```text
Portfolios
PortfolioProfile
Projects
Categories
Skills
Experiences
Services
SocialLinks
Media
ProjectMedia
ActivityLogs
```

Checkpoint:

> Can every tenant-owned resource be traced back to exactly one Portfolio?

## Phase 3 — Authorization

Implement Policies and query scoping.

Checkpoint:

> Can a Client ever read or mutate another Portfolio by changing an ID in the URL or request body?

Expected answer:

> No.

## Phase 4 — CRUD

Build content management incrementally:

```text
Profile
Projects
Skills
Experiences
Services
Categories
Social Links
Media
```

For each resource:

```text
List
View
Create
Edit
Delete
Policy
Validation
Tenant scope
Audit
```

## Phase 5 — Lifecycle / Publication / Trash

Implement:

```text
Portfolio lifecycle
Project publish/unpublish
Soft delete
Trash
Restore
Force delete
```

## Phase 6 — API V1

Implement:

```text
Routes
Scoped binding
Visibility filters
API Resources
JSON contract
```

## Phase 7 — Public Frontend

Only after Laravel CMS + API are stable:

```text
Next.js
Domain Resolver
Portfolio rendering
Public search / navigation
```

---

# 28. Feature Implementation Checklist

Every new admin resource should pass this checklist.

```text
[ ] Belongs to a Portfolio?
[ ] Portfolio scope defined?
[ ] Eloquent relationships defined?
[ ] Policy defined?
[ ] Query scope defined?
[ ] Form Request validation defined?
[ ] Create derives portfolio_id from trusted context?
[ ] Update cannot cross tenant boundary?
[ ] Delete behavior defined?
[ ] Soft delete required?
[ ] Audit event required?
[ ] Public visibility rule defined?
[ ] API Resource needed?
[ ] Tests cover cross-tenant denial?
```

---

# 29. Security Checklist

Before considering a feature complete:

```text
[ ] No user-provided portfolio_id is trusted for ownership
[ ] UI hiding is not treated as authorization
[ ] Policy checks server-side access
[ ] Child resource is portfolio-scoped
[ ] Scoped binding is used where appropriate
[ ] Cross-portfolio relationships are rejected
[ ] Client cannot switch portfolio context
[ ] Client cannot restore or force-delete
[ ] Public API excludes unpublished content
[ ] Public API excludes soft-deleted content
```

---

# 30. AI Collaboration Protocol

When blocked during implementation, provide the AI with:

```text
1. Goal
2. Current implementation
3. Relevant files
4. Exact error / unexpected behavior
5. What has already been tried
6. Relevant GUIDE.md rule
```

Example request structure:

```text
Goal:
Create Project CRUD for the Client panel.

Current state:
Project model and migration exist.

Problem:
Client can currently access another project's edit URL.

Relevant GUIDE rule:
Portfolio is the tenant boundary; Policy is authoritative.

What I tried:
Scoped route binding.

Please explain the cause first, then show the smallest architecture-compliant fix.
```

## 30.1 AI Rules

AI-assisted changes should follow this order:

```text
Understand the GUIDE rule
        ↓
Diagnose the current problem
        ↓
Propose the smallest compliant change
        ↓
Explain why
        ↓
Implement / review
        ↓
Test
```

The AI should not silently introduce:

```text
new roles
new permissions
new tables
new architecture layers
new abstractions
```

when the GUIDE does not require them.

If an implementation problem genuinely requires changing an architectural rule, treat that as an **Architecture Decision**, not as a normal bug fix.

---

# 31. Architecture Change Protocol

If a proposed change affects any of these boundaries:

```text
Tenant Model
Ownership
Roles
Authorization
Database Relationships
API Contract
Lifecycle
Storage Model
Authentication
Public Frontend Architecture
```

do not quietly change code first.

Use this process:

```text
Identify the current rule
        ↓
Explain why it is insufficient
        ↓
Propose the new rule
        ↓
Evaluate V1 impact
        ↓
Update GUIDE.md
        ↓
Then modify implementation
```

The GUIDE must stay ahead of architecture-changing code.

---

# 32. Architecture Status Vocabulary

Use these labels when discussing the system.

### LOCKED

A V1 architecture rule that implementation must follow.

### FUTURE

A known capability intentionally deferred from V1.

### IMPLEMENTATION DETAIL

A technical choice that does not change the architecture boundary.

### ARCHITECTURE DECISION

A change that requires updating this GUIDE before implementation proceeds.

### OPEN / NON-BLOCKING

A small unresolved detail that does not justify changing the core architecture yet. The implementation should use the documented recommendation until explicitly changed.

---

# 33. Current Non-Blocking Decisions

These do not change the core architecture but should remain explicit.

## 33.1 PortfolioProfile Deletion

Recommended V1 behavior:

```text
Client
→ update profile content
→ no profile deletion UI
```

Reason: PortfolioProfile is a one-to-one core profile and allowing deletion without Client-side restore creates an avoidable dead-end.

If product requirements later require profile deletion, update the Policy and lifecycle rules first.

## 33.2 Portfolio Lifecycle Transition Edges

The recommended V1 transitions are documented in Section 16.2.

If the product requires a different transition matrix, update this guide before changing controller/service logic.

---

# 34. Definition of Done

A feature is not considered complete merely because the UI works.

It is complete when:

```text
UI
+
Validation
+
Query Scope
+
Policy Authorization
+
Correct Domain Relationship
+
Persistence
+
Audit (when applicable)
+
Tests
```

are aligned with the architecture.

For public-facing functionality also verify:

```text
Publication Rule
+
Soft Delete Visibility
+
API Resource Contract
```

---

# 35. Final Architecture — One View

```text
                           Super Admin
                                │
                                ▼
                    ┌──────────────────────┐
                    │    Laravel App       │
                    │                      │
                    │ Shared Admin Panel   │
                    │ Session Auth         │
                    │ Policies             │
                    │ CMS                  │
                    │ Public API /v1       │
                    └──────────┬───────────┘
                               │
                         Portfolio Context
                               │
                               ▼
                    ┌──────────────────────┐
                    │      Portfolio       │
                    │    Tenant Boundary   │
                    └──────────┬───────────┘
                               │
         ┌────────────┬────────┼────────┬─────────────┐
         ▼            ▼        ▼        ▼             ▼
      Profile      Projects  Skills  Experience     Media
                         │
                         ├── Category
                         └── Project Media

                               │
                               ▼
                            MySQL

Future Public Layer:

Portfolio Domains
      │
      ▼
One Next.js App
      │
Domain Resolver
      │
      ▼
Laravel API /api/v1
      │
      ▼
Specific Portfolio
```

---

# 36. Final Hard Rules

These are the rules most likely to be violated during implementation.

```text
1. Portfolio is the tenant boundary.

2. One Client owns one Portfolio in V1.

3. Never trust ownership from user input.

4. Client ownership is derived from the authenticated User.

5. Super Admin uses explicit Portfolio context.

6. Client cannot switch Portfolio context.

7. UI visibility is not security.

8. Server-side Policy is authoritative.

9. Query scoping and Policy authorization are separate layers.

10. Portfolio lifecycle is separate from content CRUD.

11. Project publication is separate from Portfolio lifecycle.

12. Project publish/unpublish is Super Admin-only in V1.

13. Client deletion is Soft Delete, not permanent deletion.

14. Restore and Force Delete are Super Admin-only.

15. Public API exposes published, non-deleted content only.

16. Eloquent Models are not public API contracts.

17. V1 media relationships stay domain-specific.

18. Audit logs are system-generated traceability data.

19. Avoid unnecessary architecture layers.

20. Architecture changes must be reflected in GUIDE.md before code changes.
```

---

# 37. Development Mindset

Build the project in a way that makes the system understandable to you.

The goal is not:

> "Make AI generate the whole application."

The goal is:

> **"Use the architecture guide to understand the system, implement it yourself, and use AI only where additional reasoning, debugging, or review is needed."**

That is the intended development workflow for this project.
