<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\beritacategorym;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class BeritaCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AllBeritaCategory()
    {
        $berita_category = beritacategorym::latest()->paginate(10);
        return view('admin.page_berita.category.all', compact('berita_category'));
    } //end Method


    /**
     * Show the form for creating a new resource.
     */
    public function AddBeritaCategory()
    {
        return view('admin.page_berita.category.add');
    } //end Method

    /**
     * Store a newly created resource in storage.
     */
    public function StoreBeritaCategory(Request $request)
    {
        $request->validate([
            'berita_category' => 'required'

        ], [
            'berita_category.required' => 'Berita Category Name is Required',
        ]);

        beritacategorym::insert([
            'berita_category' => $request->berita_category,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Berita Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.berita.category')->with($notification);
    } //end Method


    /**
     * Show the form for editing the specified resource.
     */
    public function EditBeritaCategory($id)
    {
        $berita_category = beritacategorym::findOrFail($id);
        return view('admin.page_berita.category.edit', compact('berita_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function UpdateBeritaCategory(Request $request, $id)
    {
        beritacategorym::findOrFail($id)->update([
            'berita_category' => $request->berita_category,
            'updated_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Berita Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.berita.category')->with($notification);
    } //end Method

    /**
     * Remove the specified resource from storage.
     */
    public function DeleteBeritaCategory($id)
    {
        beritacategorym::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Berita Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
