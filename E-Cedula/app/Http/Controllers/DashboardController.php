<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Individuals;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function getDashboardData()
    {
        $today = Carbon::today();
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Today's collections and transactions
        $companiesToday = Company::whereDate('date_created', $today)->sum('total_amount_paid');
        $individualsToday = Individuals::whereDate('DateCreated', $today)->sum('TotalAmountPaid');
        $totalCollectionsToday = $companiesToday + $individualsToday;

        $transactionsToday = Company::whereDate('date_created', $today)->count() + 
                             Individuals::whereDate('DateCreated', $today)->count();

        // This month's collections and transactions
        $companiesThisMonth = Company::whereBetween('date_created', [$startOfMonth, $endOfMonth])->sum('total_amount_paid');
        $individualsThisMonth = Individuals::whereBetween('DateCreated', [$startOfMonth, $endOfMonth])->sum('TotalAmountPaid');
        $totalCollectionsThisMonth = $companiesThisMonth + $individualsThisMonth;

        $transactionsThisMonth = Company::whereBetween('date_created', [$startOfMonth, $endOfMonth])->count() + 
                                 Individuals::whereBetween('DateCreated', [$startOfMonth, $endOfMonth])->count();

        return response()->json([
            'totalCollectionsToday' => $totalCollectionsToday,
            'transactionsToday' => $transactionsToday,
            'totalCollectionsThisMonth' => $totalCollectionsThisMonth,
            'transactionsThisMonth' => $transactionsThisMonth
        ]);
    }
}