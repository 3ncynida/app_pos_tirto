<?php

namespace App\Http\Controllers;

use App\Products;
use App\User;
use App\Customers;
use App\Transactions;
use Illuminate\Support\Facades\DB; // Untuk query tambahan jika diperlukan
use Illuminate\Support\Carbon;

class DashboardAdmin extends Controller
{


    public function dataAdmin()
    {
        // Data untuk card
        $countproduct = Products::count();
        $countuser = User::count();
        $countcustomer = Customers::count();
        $counttotal = Transactions::sum('total_amount');

        // Data untuk chart
        $transactions = Transactions::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_amount) as total')
        )->groupBy('month')->orderBy('month')->get();

        // Ubah bulan ke format nama bulan
        $months = $transactions->map(fn($t) => Carbon::create()->month($t->month)->format('F'));
        $totals = $transactions->pluck('total');

        return view('dashboard.admin', compact(
            'countproduct',
            'countuser',
            'counttotal',
            'countcustomer',
            'months',
            'totals'
        ));
    }
}
