<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\tentangdesa;
use App\Models\beritacategorym;
use App\Models\layanancategorym;
use App\Models\berita;

class UserTentangDesaController extends Controller
{
    public function TentangDesa()
    {
        $tentangdesa = tentangdesa::latest()->paginate(1);
        $categoryJ = layanancategorym::orderBy('layanan_category', 'ASC')->get();
        $category = beritaCategorym::orderBy('berita_category')->paginate(5);
        $categoryJ = layanancategorym::orderBy('layanan_category', 'ASC')->paginate(5);
        return view('front.page_tentangdesa.tentangdesa', compact('tentangdesa', 'category', 'categoryJ'));
    }
}
