<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $todayTransactions = Transaction::with(['car', 'user'])
            ->whereDate('created_at', $today)
            ->where('status_rental', 'diproses')
            ->get();

        $sedangDirental = Car::where('status', false)->count();
        $jumlahMobil = Car::count();
        $jumlahPengguna = User::count();

        return view('dashboard', compact('todayTransactions', 'sedangDirental', 'jumlahMobil', 'jumlahPengguna'));
    }
}
