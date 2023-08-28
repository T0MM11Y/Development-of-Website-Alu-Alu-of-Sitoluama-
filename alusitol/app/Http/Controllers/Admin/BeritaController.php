<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\berita;
use Illuminate\Http\Request;
use App\Models\beritacategorym;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AllBerita()
    {
        $berita = berita::latest()->paginate(8);
        return view('admin.page_berita.berita.all', compact('berita'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function AddBerita()
    {
        $category = beritacategorym::orderBy('berita_category', 'ASC')->get();
        return view('admin.page_berita.berita.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function StoreBerita(Request $request)
    {
        $image = $request->file('berita_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //ngambil nama file

        Image::make($image)->resize(856, 642)->save('upload/berita/' . $name_gen); //panjanglebar
        $save_url = 'upload/berita/' . $name_gen;

        @unlink(public_path('upload/berita/' . $request->layanan_category_image)); //delete image lama

        berita::insert([
            'berita_category_id' => $request->berita_category_id,
            'berita_title' => $request->berita_title,
            'berita_description' => $request->berita_description,
            'berita_image' => $save_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Berita Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.berita')->with($notification);
    } //end method


    /**
     * Show the form for editing the specified resource.
     */
    public function EditBerita($id)
    {
        $berita = berita::findOrFail($id);
        $category = beritacategorym::orderBy('berita_category', 'ASC')->get();
        return view('admin.page_berita.berita.edit', compact('berita', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function UpdateBerita(Request $request)
    {
        $berita_id = $request->id;

        // Hapus gambar lama
        @unlink(public_path($request->berita_image));

        if ($request->file('berita_image')) {
            // Upload gambar baru
            $image = $request->file('berita_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(856, 642)->save('upload/berita/' . $name_gen);
            $save_url = 'upload/berita/' . $name_gen;



            berita::findOrFail($berita_id)->update([
                'berita_category_id' => $request->berita_category_id,
                'berita_title' => $request->berita_title,
                'berita_description' => $request->berita_description,
                'updated_at' => Carbon::now(),
                'berita_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Berita Updated with Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.berita')->with($notification);
        } else {
            // Gunakan gambar lama
            berita::findOrFail($berita_id)->update([
                'berita_category_id' => $request->berita_category_id,
                'berita_title' => $request->berita_title,
                'berita_description' => $request->berita_description,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Berita Updated without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.berita')->with($notification);
        }
    } //end method


    /**
     * Remove the specified resource from storage.
     */
    public function DeleteBerita($id)
    {
        $berita = berita::findOrFail($id);
        $img = $berita->berita_image;
        unlink($img);

        berita::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Berita Image Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //endmethod

}
