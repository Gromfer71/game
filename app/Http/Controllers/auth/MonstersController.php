<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Models\Troop;
use App\Repositories\Read\UserRepository;
use Illuminate\Support\Facades\DB;

class MonstersController extends Controller
{

    /**
     * MonstersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $monsters = DB::table('monsters')->select('*')->get();
        return view('auth.pve.index', ['monsters' => $monsters]);
    }

    public function attack(\Request $request)
    {
        $userId = UserRepository::getCurrentUser()->id;

        $troops = Troop::where('user_id', $userId)->get();

        $power = 0;
        foreach ($troops as $troop) {
            $power += $troop->lv * $troop->count;
        }
        $baseMonster = DB::table('base_monsters')->where('id', $request->input('monsterId'))->first();

        $result = 0;
        if($power >= $baseMonster->power)
            $result = 1;


    }

}
