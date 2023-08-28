<?php

namespace App\Http\Controllers\Admin;

use App\Models\layanancategorym;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class LayananCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AllLayananCategory()
    {
        $category = layanancategorym::latest()->paginate(7);
        return view('admin.page_layanan.category.all', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AddLayananCategory()
    {
        return view('admin.page_layanan.category.add');
    } //end Method

    /**
     * Store a newly created resource in storage.
     */
    public function StoreLayananCategory(Request $request)
    {

        $request->validate([
            'layanan_category' => 'required'

        ], [
            'layanan_category.required' => 'layanan Category Name is Required',
        ]);

        layanancategorym::insert([
            'layanan_category' => $request->layanan_category,
            'jelajah_category_description' => $request->jelajah_category_description,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Layanan Category with Image Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.layanan.category')->with($notification);
    } //end Method


    /**
     * Show the form for editing the specified resource.
     */
    public function EditLayananCategory($id)
    {
        $category = layanancategorym::findOrFail($id);
        return view('admin.page_layanan.category.edit', compact('category'));
    } //end Method

    /**
     * Update the specified resource in storage.
     */
    public function UpdateLayananCategory(Request $request)
    {
        $layanan_category_id = $request->id;

        layanancategorym::findOrFail($layanan_category_id)->update([
            'layanan_category' => $request->layanan_category,
            'jelajah_category_description' => $request->jelajah_category_description,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'layanan_category Updated  Successfully',
            'alert-type' => 'success'
        ); //end else
        return redirect()->route('all.layanan.category')->with($notification);
    } //end Method
    public function DeleteLayananCategory($id)
    {
        layananCategorym::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Jelajah Desa Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
