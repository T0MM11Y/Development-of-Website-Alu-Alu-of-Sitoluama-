<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\berita;
use App\Models\beritacategorym;
use App\Models\layanancategorym;

class UserBeritaController extends Controller
{
    public function Berita()
    {

        $category = beritaCategorym::orderBy('berita_category')->take(5)->get();
        $berita = berita::latest()->paginate(2);
        $beritarecent = berita::latest()->take(5)->get();
        $categoryJ = layanancategorym::orderBy('layanan_category', 'ASC')->take(5)->get();


        return view('front.page_berita.berita', compact('berita', 'beritarecent', 'category', 'categoryJ'));
    }
    public function SingleBerita($id)
    {
        $beritarecent = berita::latest()->take(5)->get();
        $categoryJ = layanancategorym::orderBy('layanan_category', 'ASC')->take(5)->get();
        $category = beritacategorym::orderBy('berita_category', 'ASC')->take(5)->get();
        $berita = Berita::where('id', $id)->paginate(2);
        return view('front.page_berita.singleberita', compact('category', 'berita', 'beritarecent', 'categoryJ'));
    }
    public function AllCategory($id)
    {
        $beritarecent = berita::latest()->take(5)->get();
        $allberita = berita::latest()->take(5)->get();
        $categoryJ = layanancategorym::orderBy('layanan_category', 'ASC')->take(5)->get();
        $category = beritaCategorym::orderBy('berita_category', 'ASC')->take(5)->get();
        $beritapost = berita::where('berita_category_id', $id)->orderBy('id', 'DESC')->paginate(2);
        $categoryname = beritacategorym::findOrFail($id);
        return view('front.page_berita.allkategori', compact('beritapost', 'allberita', 'category', 'categoryname', 'beritarecent', 'categoryJ'));
    }

    public function search(Request $request)
    {
        if ($request->has('search')) {
            $berita = berita::where(function ($query) use ($request) {
                $query->where('berita_title', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('berita_description', 'LIKE', '%' . $request->search . '%');
            })->paginate(5);
            $beritarecent = berita::latest()->take(5)->get();
            $categoryJ = layanancategorym::orderBy('layanan_category', 'ASC')->take(5)->get();
            $category = beritaCategorym::orderBy('berita_category', 'ASC')->take(5)->get();
            return view('front.page_berita.berita', compact('berita', 'beritarecent', 'category', 'categoryJ'));
        } else {
            $berita = berita::paginate(5);
            $beritarecent = berita::latest()->take(5)->get();
            $categoryJ = layanancategorym::orderBy('layanan_category', 'ASC')->take(5)->get();
            $category = beritaCategorym::orderBy('berita_category', 'ASC')->take(5)->get();
        }
        return view('front.page_berita.berita', compact('berita', 'beritarecent', 'category', 'categoryJ'));
    }
}
