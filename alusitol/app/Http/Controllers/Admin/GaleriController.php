<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\galeri;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AllGaleri()
    {
        $galeri = galeri::latest()->paginate(8);
        return view('admin.page_galeri.galeri.all', compact('galeri'));
    } //end Method

    /**
     * Show the form for creating a new resource.
     */
    public function AddGaleri()
    {
        return view('admin.page_galeri.galeri.add');
    } //End Method

    /**
     * Store a newly created resource in storage.
     */

    public function storeGaleri(Request $request)
    {
        $images = $request->file('galeri_image');

        foreach ($images as $image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(636, 423)->save('upload/galeri/' . $name_gen);
            $save_url = 'upload/galeri/' . $name_gen;

            Galeri::create([
                'galeri_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        }

        Toastr::success('Galeri Inserted Successfully', 'Success');
        return redirect()->route('all.galeri');
    }

    public function EditGaleri($id)
    {
        $galeri = galeri::findOrFail($id);
        return view('admin.page_galeri.galeri.edit', compact('galeri'));
    }

    public function UpdateGaleri(Request $request)
    {
        $galeri_id = $request->id;

        if ($request->file('galeri_image')) {
            $image = $request->file('galeri_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(636, 423)->save('upload/galeri/' . $name_gen);
            $save_url = 'upload/galeri/' . $name_gen;

            Galeri::findOrFail($galeri_id)->update([
                'galeri_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            Toastr::success('Galeri Updated with Image Successfully', 'Success');
            return redirect()->route('all.galeri');
        } else {
            Galeri::findOrFail($galeri_id)->update([
                'updated_at' => Carbon::now(),
            ]);

            Toastr::success('Galeri Updated without Image Successfully', 'Success');
            return redirect()->route('all.galeri');
        }
    }


    public function DeleteGaleri($id)
    {
        $galeri = galeri::findOrFail($id);
        $img = $galeri->galeri_image;
        unlink($img);

        galeri::findOrFail($id)->delete();

        Toastr::success('Galeri Deleted Successfully', 'Success');
        return redirect()->back();
    }
}
