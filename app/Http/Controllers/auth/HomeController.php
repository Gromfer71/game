<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;

/**
 * The main controller of authorized users pages.
 *
 * @package App\Http\Controllers\Auth
 */
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view(
            'auth.home',
            [
                'me' => Auth::user(),
            ]
        );
    }

    public function showOnline()
    {
        //User::factory()->count(20)->create();
        return view('auth.showOnline', ['users' => User::online()->paginate(10)]);
    }
}
