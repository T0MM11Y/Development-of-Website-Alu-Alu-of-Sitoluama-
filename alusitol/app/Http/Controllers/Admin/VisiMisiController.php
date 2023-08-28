<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\visimisi;
use Illuminate\Support\Carbon;

class VisiMisiController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function AllVisiMisi()
    {
        $visimisi = visimisi::latest()->paginate(1);
        return view('admin.page_tentangdesa.visimisi.all', compact('visimisi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AddVisiMisi()
    {
        return view('admin.page_tentangdesa.visimisi.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function StoreVisiMisi(Request $request)
    {

        visimisi::insert([
            'visimisi' => $request->visimisi,

            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'visimisi Desa Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.visimisi.desa')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function EditVisiMisi($id)
    {
        $visimisi = visimisi::findOrFail($id);
        return view('admin.page_tentangdesa.visimisi.edit', compact('visimisi'));
    } //end method

    /**
     * Update the specified resource in storage.
     */
    public function UpdateVisiMisi(Request $request)
    {
        $visimisi_id = $request->id;

        visimisi::findOrFail($visimisi_id)->update([
            'visimisi' => $request->visimisi,

            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'visimisi Desa Updated  Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.visimisi.desa')->with($notification);
    } //end method
    public function DeleteVisiMisi($id)
    {
        $visimisi = visimisi::findOrFail($id);


        visimisi::findOrFail($id)->delete();

        $notification = array(
            'message' => 'visimisi desa Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //endmethod
}
