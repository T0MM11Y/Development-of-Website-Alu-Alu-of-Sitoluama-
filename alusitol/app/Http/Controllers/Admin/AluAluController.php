<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\alualu;

class AluAluController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Index()
    {
        $alualu = alualu::latest()->paginate(10);
        return view('admin.page_alualu.all', compact('alualu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function Delete($id)
    {
        $alualu = alualu::findOrFail($id);

        $alualu->delete();

        $notification = array(
            'message' => 'Alu Alu Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //endmethod
}
