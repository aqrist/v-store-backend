<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $income = Transaction::where('transactions_status', 'SUCCESS')->sum('transactions_total');
        $sales = Transaction::count();
        $items = Transaction::orderBy('id', 'DESC')->take('5')->get();
        $pie = [
            'pending' => Transaction::where('transactions_status', 'PENDING')->count(),
            'failed' => Transaction::where('transactions_status', 'FAILED')->count(),
            'success' => Transaction::where('transactions_status', 'SUCCESS')->count(),
        ];

        return view('pages.dashboard')->with([
            'income' => $income,
            'sales' => $sales,
            'items' => $items,
            'pie' => $pie,
        ]);
    }
}
