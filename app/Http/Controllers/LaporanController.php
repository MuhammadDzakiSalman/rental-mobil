<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index(Request $request)
    {

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = Transaction::with(['car', 'user'])->where('status_rental', 'selesai');

        if ($startDate && $endDate) {
            $startDateTime = $startDate . ' 00:00:00';
            $endDateTime = $endDate . ' 23:59:59';

            $query->whereBetween('created_at', [$startDateTime, $endDateTime]);
        }

        $transactions = $query->paginate(10);


        return view('laporan', compact('transactions', 'startDate', 'endDate'));
    }

    public function downloadPDF(Request $request)
{
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    $query = Transaction::with(['car', 'user'])->where('status_rental', 'selesai');

    if ($startDate && $endDate) {
        $startDateTime = $startDate . ' 00:00:00';
        $endDateTime = $endDate . ' 23:59:59';

        $query->whereBetween('created_at', [$startDateTime, $endDateTime]);
    }

    $transactions = $query->get();

    $createdDate = now();
    $oldestDate = $transactions->min('created_at');
    $newestDate = $transactions->max('created_at');

    $pdf = PDF::loadView('reports.laporan_pdf', compact('transactions', 'startDate', 'endDate', 'createdDate', 'oldestDate', 'newestDate'));
    return $pdf->download('laporan.pdf');
}

}
