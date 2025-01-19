<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    // Menampilkan daftar laporan yang dimiliki oleh pengguna yang login
    public function index()
    {
        // Cek apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to view your reports.');
        }

        // Mengambil semua laporan yang terkait dengan pengguna yang login
        $reports = Report::where('user_id', Auth::id())->get();
        return view('user.index', compact('reports'));
    }

    // Menampilkan form untuk membuat laporan baru
    public function create()
    {
        // Cek apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to create a report.');
        }

        return view('user.create');
    }

    // Menyimpan laporan baru
    public function store(Request $request)
    {
        // Cek apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to submit a report.');
        }

        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'location' => 'required',
            'description' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',  // Validasi foto yang boleh diupload
        ]);

        // Menyimpan laporan
        Report::create([
            'location' => $request->location,
            'description' => $request->description,
            'photo' => $request->photo->store('photo', 'public'),  // Menyimpan foto path jika ada
            'user_id' => Auth::id(), // Menyimpan ID pengguna yang login
        ]);

        return redirect()->route('user.index')->with('success', 'Laporan berhasil dikirim');
    }

    // Menampilkan detail laporan berdasarkan ID laporan yang dimiliki oleh pengguna yang login
    public function show($id)
    {
        // Cek apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to view the report.');
        }

        // Ambil laporan berdasarkan ID dan pastikan laporan tersebut milik pengguna yang login
        $report = Report::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        return view('user.show', compact('report'));
    }
    public function destroy($id)
        {
            $report = Report::findOrFail($id);
            $report->delete();
            return redirect()->route('user.index')->with('success', 'Laporan berhasil dibatalkan.');
        }

}