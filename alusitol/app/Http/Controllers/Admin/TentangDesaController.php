<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\tentangdesa;
use App\Models\layanancategorym;

class TentangDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AllTentangDesa()
    {
        $tentangdesa = tentangdesa::latest()->paginate(10);
        return view('admin.page_tentangdesa.tentangdesa.all', compact('tentangdesa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AddTentangDesa()
    {
        return view('admin.page_tentangdesa.tentangdesa.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function StoreTentangDesa(Request $request)
    {

        tentangdesa::insert([
            'tentangdesa' => $request->tentangdesa,

            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Tentang Desa Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.tentang.desa')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function EditTentangDesa($id)
    {
        $tentangdesa = tentangdesa::findOrFail($id);
        return view('admin.page_tentangdesa.tentangdesa.edit', compact('tentangdesa'));
    } //end method

    /**
     * Update the specified resource in storage.
     */
    public function UpdateTentangDesa(Request $request)
    {
        $tentangdesa_id = $request->id;

        tentangdesa::findOrFail($tentangdesa_id)->update([
            'tentangdesa' => $request->tentangdesa,

            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Tentang Desa Updated  Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.tentang.desa')->with($notification);
    } //end method
    public function DeleteTentangDesa($id)
    {
        $tentangdesa = tentangdesa::findOrFail($id);


        tentangdesa::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Tentang desa Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //endmethod

}
