<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\BaseTroop;
use App\Services\TroopHandler;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TroopsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Если войска уже тренируются рендерим спец вьюшку
        if (Auth::user()->trainTroops()->count() > 0 && Auth::user()->train_time !== null) {
            return view(
                'auth.troops.alreadyTrain',
                [
                    'troops' => Auth::user()->trainTroops()->with('baseTroop')->get(),
                    'time'   => Carbon::createFromTimestamp(Auth::user()->train_time - time())->format('H:i:s'),
                ]
            );
        }

        $base = BaseTroop::all();
        $base->map(
            function ($item) {
                $item->cost = json_decode($item->cost);
            }
        );
        return view('auth.troops.index', ['base' => $base]);
    }

    public function train(Request $request, TroopHandler $handler)
    {
        $validate = $handler->trainValidate(collect($request->all())->except('_token'));
        if ($validate !== true) {
            return back()->with('error', $validate);
        } else {
            $handler->trainStart(collect($request->all())->except('_token'));
        }

        return back()->with('ok', __('mes.troops.trainStart'));
    }

    public function details()
    {
        $troops = Auth::user()->troops()->with('baseTroop')->get();
        $troops->map(function ($troop) {
            $troop->baseTroop->char = json_decode($troop->baseTroop->char);
        });

        return view('auth.troops.details', ['troops' => $troops]);
    }
}
