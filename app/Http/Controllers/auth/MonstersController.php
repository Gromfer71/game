<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\BaseItem;
use App\Models\Monster;
use Illuminate\Http\Request;
use voku\helper\ASCII;

class MonstersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.monsters.index');
    }

    public function monsterInfo(Request $request)
    {
        $lv = $request->input('lv');
        if(!$lv || $lv <= 0 || $lv > 30) {
            return back()->with('error', __('mes.wrongMonster'));
        }
        $monster = Monster::where('lv', $lv)->first();
        $monster->reward = collect(json_decode($monster->reward));
        foreach ($monster->reward as $key => $count) {
            $monster->reward[$key] = BaseItem::findOrFail($key);
            $monster->reward[$key]->count = $count;
        }

        return view('auth.monsters.monsterInfo', compact('monster'));
    }

}
