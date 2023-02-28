<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardPage(DashboardService $dashboardService)
    {
        $data = $dashboardService->dashboardData();
        return view('dashboard.index', compact('data'));
    }
}
