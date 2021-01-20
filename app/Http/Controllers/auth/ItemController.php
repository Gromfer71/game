<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\ItemUsage;
use Auth;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $items =   Auth::user()->items()->with('baseItem')->get();
        return view('auth.items.index', ['items' => $items]);
    }

    public function use(Request $request)
    {
        ItemUsage::use($request->input('id'), $request->input('count'));

        return redirect(route('items'));
    }
}
