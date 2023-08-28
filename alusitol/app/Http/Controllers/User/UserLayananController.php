<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\layanan;
use App\Models\layanancategorym;
use App\Models\beritaCategorym;

class UserLayananController extends Controller
{
    public function Layanan()
    {
        $category = beritaCategorym::orderBy('berita_category')->get();
        $layanan = layanan::latest()->paginate(2);
        $categoryL = layanancategorym::oldest()->get();
        $categoryJ = layanancategorym::orderBy('layanan_category', 'ASC')->get();
        $layananrecent = Layanan::latest()->take(6)->get();
        $categoryaa = layananCategorym::orderBy('layanan_category')->get();
        return view('front.page_layanan.layanan', compact('layanan', 'category', 'categoryL', 'categoryJ', 'layananrecent', 'categoryaa'));
    }

    public function AllCategory($id)
    {
        $layananpost = layanan::where('layanan_category_id', $id)->orderBy('id', 'ASC')->paginate(2);
        $layananrecent = Layanan::latest()->take(6)->get();
        $categoryname = layanancategorym::findOrFail($id);
        $category = beritaCategorym::orderBy('berita_category', 'ASC')->get();
        $categoryaa = layananCategorym::orderBy('layanan_category')->take(5)->get();
        $categoryJ = layanancategorym::orderBy('layanan_category', 'ASC')->get();
        return view('front.page_layanan.allkategoriL', compact('categoryname', 'layananpost', 'category', 'categoryJ', 'layananrecent', 'categoryaa'));
    }


    public function search(Request $request)
    {
        if ($request->has('search')) {
            $layanan = layanan::where(function ($query) use ($request) {
                $query->where('layanan_title', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('layanan_description', 'LIKE', '%' . $request->search . '%');
            })->paginate(2);
            $layananrecent = layanan::latest()->take(5)->get();
            $categoryJ = layanancategorym::orderBy('layanan_category', 'ASC')->take(5)->get();
            $category = beritaCategorym::orderBy('berita_category')->take(5)->get();
            $categoryaa = layananCategorym::orderBy('layanan_category')->take(5)->get();
            return view('front.page_layanan.layanan', compact('layanan', 'layananrecent', 'category', 'categoryJ', 'categoryaa'));
        } else {
            $layanan = layanan::paginate(2);
            $layananrecent = layanan::latest()->take(6)->get();
            $categoryJ = layanancategorym::orderBy('layanan_category', 'ASC')->take(5)->get();
            $category = beritaCategorym::orderBy('berita_category', 'ASC')->take(5)->get();
            $categoryaa = layananCategorym::orderBy('layanan_category')->take(5)->get();
        }
        return view('front.page_layanan.layanan', compact('layanan', 'layananrecent', 'category', 'categoryJ', 'categoryaa'));
    }
}
