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
        $individualsToday = Individuals::where('DateCreated', '>=', $today);

        $collectionsToday = $companiesToday->sum('total_amount_paid') + $individualsToday->sum('TotalAmountPaid');
        $transactionsToday = $companiesToday->count() + $individualsToday->count();

        // This month's data
        $companiesThisWeek = Company::where('created_at', '>=', $startOfWeek);
        $individualsThisWeek = Individuals::where('DateCreated', '>=', $startOfWeek);

        $collectionsThisWeek = $companiesThisWeek->sum('total_amount_paid') + $individualsThisWeek->sum('TotalAmountPaid');
        $transactionsThisWeek = $companiesThisWeek->count() + $individualsThisWeek->count();

        // Weekly earnings data
        $weeklyEarnings = [];
        $weeklyTransactions = [];
        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::today()->subDays($i);
            $companiesOnDate = Company::whereDate('created_at', $date);
            $individualsOnDate = Individuals::whereDate('DateCreated', $date);

            $earnings = $companiesOnDate->sum('total_amount_paid') + $individualsOnDate->sum('TotalAmountPaid');
            $transactions = $companiesOnDate->count() + $individualsOnDate->count();

            array_unshift($weeklyEarnings, $earnings);
            array_unshift($weeklyTransactions, $transactions);
        }

        return response()->json([
            'collectionsToday' => $collectionsToday,
            'transactionsToday' => $transactionsToday,
            'collectionsThisWeek' => $collectionsThisWeek,
            'transactionsThisWeek' => $transactionsThisWeek,
            'weeklyEarnings' => $weeklyEarnings,
            'weeklyTransactions' => $weeklyTransactions,
        ]);
    }
}
