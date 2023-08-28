<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\alualu;
use Illuminate\Support\Carbon;
use App\Models\berita;
use App\Models\galeri;
use App\Models\layanan;

class AdminController extends Controller
{
    public function Index()
    {
        return view('auth.login');
    } //end method

    public function Dashboard()
    {
        $currentDate = Carbon::now()->format('Y-m-d'); // Mengambil tanggal saat ini
        //Alualu
        $alualu = alualu::latest()->get(); // Mengambil semua data alu alu
        $alualuhariini = alualu::whereDate('created_at', $currentDate)->count(); // Mengambil alu alu yang dibuat pada tanggal saat ini
        $countAlualu = $alualu->count(); // Mendapatkan jumlah alu alu pada tanggal saat ini

        //berita
        $berita = berita::latest()->get(); // Mengambil semua data alu alu
        $beritahariini = berita::whereDate('created_at', $currentDate)->count(); // Mengambil alu alu yang dibuat pada tanggal saat ini
        $countberita = $berita->count(); // Mendapatkan jumlah alu alu pada tanggal saat ini

        //Galeri
        $galeri = galeri::latest()->get(); // Mengambil semua data alu alu
        $galerihariini = galeri::whereDate('created_at', $currentDate)->count(); // Mengambil alu alu yang dibuat pada tanggal saat ini
        $countgaleri = $galeri->count(); // Mendapatkan jumlah alu alu pada tanggal saat ini

        //layanan
        $layanan = layanan::latest()->get(); // Mengambil semua data alu alu
        $layananhariini = layanan::whereDate('created_at', $currentDate)->count(); // Mengambil alu alu yang dibuat pada tanggal saat ini
        $countlayanan = $layanan->count(); // Mendapatkan jumlah alu alu pada tanggal saat ini

        return view('admin.index', compact('alualu', 'countAlualu', 'alualuhariini', 'galeri', 'countgaleri', 'galerihariini', 'berita', 'countberita', 'beritahariini', 'layanan', 'countlayanan', 'layananhariini'));
    }
    public function Login(Request $request)
    {
        $check = $request->all();

        // Memeriksa apakah login sebagai admin berhasil
        if (Auth::guard('admin')->attempt(['username' => $check['username'], 'password' => $check['password']])) {
            $response = [
                'success' => true,
                'redirect' => route('admin.dashboard'),
                'message' => 'Welcome, Admin!'
            ];
        } elseif (Auth::guard('web')->attempt(['username' => $check['username'], 'password' => $check['password']])) {
            $response = [
                'success' => true,
                'redirect' => route('home.user')
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Invalid Username or Password'
            ];
        }


        // Mengembalikan respons dalam format JSON
        return response()->json($response);
    }


    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('home.user');
    }
}
