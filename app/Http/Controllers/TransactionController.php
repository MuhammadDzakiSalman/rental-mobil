<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function userTransactions(Request $request)
    {
        // Get search query and items per page from the request
        $search = $request->input('search');
        $perPage = $request->input('per_page', 10);

        // Fetch transactions with search and pagination
        $transactions = Transaction::where('id_user', Auth::id())
            ->when($search, function ($query, $search) {
                return $query->whereHas('car', function ($query) use ($search) {
                    $query->where('merek', 'like', "%$search%")
                          ->orWhere('tipe', 'like', "%$search%")
                          ->orWhere('nomor_plat', 'like', "%$search%");
                });
            })
            ->with(['car'])
            ->paginate($perPage);

        return view('history', compact('transactions', 'search', 'perPage'));
    }

    public function confirm(Transaction $transaction)
    {
        $transaction->update(['status_rental' => 'disewa']);
        return redirect()->back()->with('success', 'Transaction confirmed successfully.');
    }

    public function reject(Transaction $transaction)
    {
        $transaction->update(['status_rental' => 'ditolak']);
        $transaction->car->update(['status' => true]);

        return redirect()->back()->with('success', 'Transaction rejected successfully.');
    }
    public function finish(Transaction $transaction)
    {
        // Menghitung tanggal pengembalian yang ditetapkan
        $tanggal_pengembalian = Carbon::parse($transaction->tanggal_selesai);

        // Menghitung tanggal pengembalian sebenarnya (tanggal hari ini)
        $tanggal_sekarang = Carbon::now();

        // Menghitung jumlah jam keterlambatan
        $jam_keterlambatan = (int) $tanggal_pengembalian->diffInHours($tanggal_sekarang);

        // Menghitung denda jika ada keterlambatan
        $denda = 0;
        if ($jam_keterlambatan > 0) {
            // Menghitung denda dengan harga sewa per jam
            // $harga_sewa_per_jam = $transaction->car->harga_sewa / 24;
            $denda = $jam_keterlambatan * $transaction->car->denda;
        }

        $total_pembayaran = $transaction->total_harga + $denda;

        // dd([
        //         'denda' => $denda,
        //         'jam keterlambatan' => $jam_keterlambatan,
        //         // 'harga sewa per jam' => $harga_sewa_per_jam,
        //     ]);

        // Memperbarui status rental dan denda
        $transaction->update([
            'status_rental' => 'selesai',
            'denda' => $denda,
            'total_pembayaran' => $total_pembayaran,
        ]);
        $transaction->car->update(['status' => true]);

        return redirect()->back()->with('success', 'Transaction finished successfully.');
    }
    public function show(Request $request)
{
    $query = Transaction::with(['car', 'user']);

    if ($request->has('search') && !empty($request->search)) {
        $searchTerm = $request->search;
        
        $query->where(function($q) use ($searchTerm) {
            $q->whereHas('user', function($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('nomor_telepon', 'like', '%' . $searchTerm . '%');
            })
            ->orWhereHas('car', function($q) use ($searchTerm) {
                $q->where('merek', 'like', '%' . $searchTerm . '%')
                  ->orWhere('tipe', 'like', '%' . $searchTerm . '%')
                  ->orWhere('nomor_plat', 'like', '%' . $searchTerm . '%');
            });
        });
    }

    $transactions = $query->paginate($request->input('show', 10));

    return view('transaksi', compact('transactions'));
}

}
