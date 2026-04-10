<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index(Request $request)
    {
        if (view()->exists('admin.analytics.index')) {
            return view('admin.analytics.index');
        }

        return redirect()->route('admin.dashboard');
    }
}

