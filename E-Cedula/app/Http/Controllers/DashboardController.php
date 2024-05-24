<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Individuals;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function getData()
    {
        $today = Carbon::today();
        $startOfMonth = Carbon::now()->startOfMonth();
        $startOfWeek = Carbon::now()->startOfWeek();
    
        // Today's data
        $companiesToday = Company::where('created_at', '>=', $today);
        $individualsToday = Individuals::where('created_at', '>=', $today);
    
        $collectionsToday = $companiesToday->sum('total_amount_paid') + $individualsToday->sum('TotalAmountPaid');
        $transactionsToday = $companiesToday->count() + $individualsToday->count();
    
        // This month's data
        $companiesThisMonth = Company::where('created_at', '>=', $startOfMonth);
        $individualsThisMonth = Individuals::where('created_at', '>=', $startOfMonth);
    
        $collectionsThisMonth = $companiesThisMonth->sum('total_amount_paid') + $individualsThisMonth->sum('TotalAmountPaid');
        $transactionsThisMonth = $companiesThisMonth->count() + $individualsThisMonth->count();
    
        // Weekly earnings data
        $weeklyEarnings = [];
        $weeklyTransactions = [];

        // Calculate earnings and transactions for each week
        for ($i = 3; $i >= 0; $i--) {
            $startOfWeek = Carbon::today()->subWeeks($i)->startOfWeek();
            $endOfWeek = Carbon::today()->subWeeks($i)->endOfWeek();
    
            $companiesInWeek = Company::whereBetween('created_at', [$startOfWeek, $endOfWeek]);
            $individualsInWeek = Individuals::whereBetween('created_at', [$startOfWeek, $endOfWeek]);
    
            $earnings = $companiesInWeek->sum('total_amount_paid') + $individualsInWeek->sum('TotalAmountPaid');
            $transactions = $companiesInWeek->count() + $individualsInWeek->count();
    
            $weeklyEarnings[] = $earnings;
            $weeklyTransactions[] = $transactions;
        }

        $dailyEarnings = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $companiesOnDate = Company::whereDate('created_at', $date);
            $individualsOnDate = Individuals::whereDate('created_at', $date);
    
            $earnings = $companiesOnDate->sum('total_amount_paid') + $individualsOnDate->sum('TotalAmountPaid');
    
            $dailyEarnings[] = $earnings;
        }
    
        return response()->json([
            'collectionsToday' => $collectionsToday,
            'transactionsToday' => $transactionsToday,
            'collectionsThisMonth' => $collectionsThisMonth,
            'transactionsThisMonth' => $transactionsThisMonth,
            'dailyEarnings' => $dailyEarnings,
            'weeklyEarnings' => $weeklyEarnings,
            'weeklyTransactions' => $weeklyTransactions,
        ]);
    }
}
