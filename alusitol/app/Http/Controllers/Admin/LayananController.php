<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\layanan;
use App\Models\layanancategorym;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AllLayanan()
    {
        $layanan = layanan::latest()->paginate(8);
        return view('admin.page_layanan.layanan.all', compact('layanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AddLayanan()
    {
        $category = layanancategorym::orderBy('layanan_category', 'ASC')->get();
        return view('admin.page_layanan.layanan.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function StoreLayanan(Request $request)
    {
        $image = $request->file('layanan_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //ngambil nama file

        Image::make($image)->resize(855, 722)->save('upload/layanan/' . $name_gen); //panjanglebar
        $save_url = 'upload/layanan/' . $name_gen;

        Layanan::insert([
            'layanan_category_id' => $request->layanan_category_id,
            'layanan_title' => $request->layanan_title,
            'layanan_lokasi' => $request->layanan_lokasi,
            'layanan_description' => $request->layanan_description,
            'layanan_image' => $save_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Jelajah Desa Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.layanan')->with($notification);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function EditLayanan(string $id)
    {
        $layanan = layanan::findOrFail($id);
        $category = layanancategorym::orderBy('layanan_category', 'ASC')->get();
        return view('admin.page_layanan.layanan.edit', compact('layanan', 'category'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function UpdateLayanan(Request $request)
    {

        $layanan_id = $request->id;

        if ($request->file('layanan_image')) {
            $image = $request->file('layanan_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //ngambil nama file

            Image::make($image)->resize(855, 522)->save('upload/layanan/' . $name_gen); //panjanglebar
            $save_url = 'upload/layanan/' . $name_gen;

            Layanan::findOrFail($layanan_id)->update([
                'layanan_category_id' => $request->layanan_category_id,
                'layanan_title' => $request->layanan_title,
                'layanan_lokasi' => $request->layanan_lokasi,
                'layanan_description' => $request->layanan_description,
                'layanan_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'layanan Updated with Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.layanan')->with($notification);
        } else {
            Layanan::findOrFail($layanan_id)->update([
                'layanan_category_id' => $request->layanan_category_id,
                'layanan_title' => $request->layanan_title,
                'layanan_lokasi' => $request->layanan_lokasi,
                'layanan_description' => $request->layanan_description,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Jelajah Desa Updated without Image Successfully',
                'alert-type' => 'success'
            ); //end else
            return redirect()->route('all.layanan')->with($notification);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function DeleteLayanan($id)
    {
        $layanan = layanan::findOrFail($id);
        $img = $layanan->layanan_image;
        unlink($img);

        layanan::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Jelajah Desa Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //endmethod
}
