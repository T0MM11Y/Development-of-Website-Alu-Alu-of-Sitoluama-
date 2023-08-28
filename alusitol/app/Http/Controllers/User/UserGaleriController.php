<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\galeri;
use App\Models\beritacategorym;
use App\Models\layanancategorym;

class UserGaleriController extends Controller
{
    public function Galeri()
    {
        $category = beritaCategorym::orderBy('berita_category')->take(5)->get();
        $galeri = galeri::latest()->paginate(12);
        $categoryJ = layanancategorym::orderBy('layanan_category', 'ASC')->take(5)->get();
        return view('front.page_galeri.galeri', compact('galeri', 'category', 'categoryJ'));
    }
}
