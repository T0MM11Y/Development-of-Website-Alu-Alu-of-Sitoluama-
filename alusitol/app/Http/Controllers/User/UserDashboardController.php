<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\beritacategorym;
use App\Models\layanancategorym;
use App\Models\alualu;
use App\Models\berita;
use App\Models\galeri;

class UserDashboardController extends Controller
{
    public function Dashboard()
    {
        $galeri = galeri::latest()->paginate(4);
        $category = beritaCategorym::orderBy('berita_category')->paginate(5);
        $alualu = alualu::latest()->paginate(3);
        $categoryJ = LayananCategorym::orderBy('layanan_category', 'desc')->paginate(5);
        $categoryJJ = LayananCategorym::orderBy('layanan_category', 'desc')->paginate(3);
        $berita = berita::latest()->paginate(3);
        return view('front.index', compact('category', 'categoryJ', 'alualu', 'berita', 'galeri', 'categoryJJ'));
    }
}
