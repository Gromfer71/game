<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Models\BaseTroop;
use App\Models\User;
use App\Repositories\Read\UserRepository;
use App\Services\TroopHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function train(Request $request)
    {
       $validate = TroopHandler::trainValidate(collect($request->all())->except('_token'));
       if($validate !== true) {
           return back()->with('error', $validate);
       } else {
           TroopHandler::trainStart(collect($request->all())->except('_token'));
       }

        return back()->with('ok', 'Обучение началось.');
    }
}
