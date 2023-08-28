<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\beritacategorym;
use App\Models\alualu;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\layanancategorym;


class UserAlualuController extends Controller
{
    public function Alualu(Request $request)
    {
        $query = alualu::query()->latest();
        $date = $request->date_filter;

        switch ($date) {
            case 'today':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'yesterday':
                $query->whereDate('created_at', Carbon::yesterday());
                break;
            case 'this_month':
                $query->whereMonth('created_at', Carbon::now()->month);
                break;
            case 'this_year':
                $query->whereYear('created_at', Carbon::now()->year);
                break;
        }


        $alualus = $query->get();
        $categoryJ = layanancategorym::orderBy('layanan_category', 'ASC')->paginate(5);
        $category = beritaCategorym::orderBy('berita_category')->paginate(5);
        return view('front.page_alualu.alualu', compact('category', 'categoryJ', 'alualus'));
    }


    public function storeAluAluu(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'isi' => ['required', function ($attribute, $value, $fail) {
                $filteredValue = str_ireplace(['kontol', 'pepek', 'bodat', 'bangsat', 'biadab', 'mmq', 'ppq', 'ktl', 'bgst', 'bangsat', 'anjing', 'babi', 'monyet', 'kunyuk', 'bajingan', 'asu', 'kampret', 'setan', 'iblis', 'jahannam', 'dajjal', 'jin tomang', 'keparat', 'bejad', 'gembel', 'brengsek', 'taik', 'sompret'], '', $value);

                if ($filteredValue !== $value) {
                    $fail('Kata-kata tidak diperbolehkan');
                }
            }],
        ], [
            'isi.required' => 'Alualu is required',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                ], 422);
            } else {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

        Alualu::create([
            'to' => $request->input('to'),
            'from' => Auth::user()->username,
            'isi' => $request->input('isi'),
            'last_usage' => Carbon::now(),
            'user_id' => Auth::user()->id,
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'redirect' => route('alualu.user'),
            ]);
        } else {
            $notification = [
                'message' => 'Alualu Inserted Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route('alualu.user')->with($notification);
        }
    }




    public function SearchAluAlu(Request $request)
    {
        $query = $request->get('query');

        $results = alualu::where('isi', 'LIKE', '%' . $query . '%')
            ->get();

        return response()->json($results);
    }
}
