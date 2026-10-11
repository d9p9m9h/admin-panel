<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPortfolioController extends Controller
{
    // Client route: /admin/my-portfolio

    public function show(Request $request)
    {
        $portfolio = $request->user()->portfolio;       // implicit — trusted source
        abort_if(! $portfolio, 404);

        // Part 3: $this->authorize('view', $portfolio);
    }
}
