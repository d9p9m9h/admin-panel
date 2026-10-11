{{-- resources/views/admin/portfolios/show.blade.php --}}
@extends('layouts.admin')

@section('title', $portfolio->name)
@section('page-title', $portfolio->name)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">{{ $portfolio->name }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header"><h3 class="card-title">Portfolio (placeholder)</h3></div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $portfolio->name }}</p>
            <p><strong>Slug:</strong> {{ $portfolio->slug }}</p>
            <p><strong>Status:</strong> {{ $portfolio->status }}</p>
            <p><strong>Owner:</strong> {{ $portfolio->owner?->name }}</p>
        </div>
    </div>
@endsection