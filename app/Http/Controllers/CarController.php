<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    // Tampilkan daftar mobil
    public function index(Request $request)
    {
        $cars = Car::query();

        if ($request->has('search') && !empty($request->search)) {
            $cars->where(function($query) use ($request) {
                $query->where('merek', 'like', '%' . $request->search . '%')
                    ->orWhere('tipe', 'like', '%' . $request->search . '%')
                    ->orWhere('nomor_plat', 'like', '%' . $request->search . '%');
            });
        }

        $cars = $cars->paginate($request->input('show', 10));
        
        return view('cars.index', compact('cars'));
    }
    public function showCars(Request $request)
{
    $query = Car::query();

    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where('merek', 'like', "%{$search}%")
              ->orWhere('tipe', 'like', "%{$search}%");
    }

    $cars = $query->paginate($request->input('show', 10));

    return view('home', compact('cars'));
}


    // Tampilkan form untuk menambah mobil
    public function create()
    {
        return view('cars.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required',
            'tipe' => 'required',
            'nomor_plat' => 'required',
            'tahun' => 'required',
            'warna' => 'required',
            'status' => 'required',
            'harga_sewa' => 'required',
            'denda' => 'required',
            'gambar' => 'required|image'
        ]);

        $imagePath = $request->file('gambar')->store('public/images');

        Car::create([
            'merek' => $request->merek,
            'tipe' => $request->tipe,
            'nomor_plat' => $request->nomor_plat,
            'tahun' => $request->tahun,
            'warna' => $request->warna,
            'status' => $request->status,
            'harga_sewa' => $request->harga_sewa,
            'denda' => $request->denda,
            'gambar' => basename($imagePath)
        ]);

        return redirect()->route('cars.index')->with('success', 'Mobil berhasil ditambahkan');
    }
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('detail', compact('car'));
    }

    // Tampilkan form untuk mengedit mobil
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    // Update data mobil
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'merek' => 'required',
            'tipe' => 'required',
            'nomor_plat' => 'required',
            'tahun' => 'required',
            'warna' => 'required',
            'status' => 'required',
            'harga_sewa' => 'required',
            'denda' => 'required',
            'gambar' => 'image'
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('public/images');
            $car->gambar = basename($imagePath);
        }

        $car->update([
            'merek' => $request->merek,
            'tipe' => $request->tipe,
            'nomor_plat' => $request->nomor_plat,
            'tahun' => $request->tahun,
            'warna' => $request->warna,
            'status' => $request->status,
            'harga_sewa' => $request->harga_sewa,
            'denda' => $request->denda,
            'gambar' => $car->gambar
        ]);

        return redirect()->route('cars.index')->with('success', 'Mobil berhasil diupdate');
    }

    // Hapus data mobil
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Mobil berhasil dihapus');
    }

    public function rentCar(Request $request, $id)
    {
        $request->validate([
            'tanggal_pengembalian' => 'required|date',
            'bukti_pembayaran' => 'required|image',
        ]);

        // Find the car
        $car = Car::findOrFail($id);

        // Calculate rental duration in days
        $tanggal_sewa = Carbon::parse($car->created_at)->startOfDay(); // Ambil waktu awal hari
        $tanggal_pengembalian = Carbon::parse($request->tanggal_pengembalian)->startOfDay(); // Ambil waktu awal hari
        $durasi_sewa = (int) $tanggal_sewa->diffInDays($tanggal_pengembalian, false)+1; // Hitung durasi sewa

        // Calculate total price based on rental duration
        $total_harga = $durasi_sewa * $car->harga_sewa;

        $jumlah_hari = $durasi_sewa;

        // Store payment proof
        $imagePath = $request->file('bukti_pembayaran')->store('public/payments');

        // Create transaction
        Transaction::create([
            'id_mobil' => $car->id,
            'id_user' => Auth::id(),
            'tanggal_selesai' => $request->tanggal_pengembalian,
            'jumlah_hari' => $jumlah_hari,
            'total_harga' => $total_harga,
            'bukti_pembayaran' => basename($imagePath),
            'status_rental' => 'diproses',
        ]);

        // Update car status
        $car->update(['status' => false]);

        return redirect()->route('home.index')->with('success', 'Rental berhasil dilakukan');
    }
}
