<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\TroopHandler;
use Illuminate\Http\Request;

class TroopsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.troops.index');
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
}
