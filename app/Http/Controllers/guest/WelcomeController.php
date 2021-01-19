<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;

/**
 * Controller for unauthorized (guest) users.
 *
 * @package App\Http\Controllers\Guest
 */
class WelcomeController extends Controller
{
    /**
     * WelcomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function index()
    {
        return view(
            'guest.welcome',
            [
                'date'       => Carbon::now(),
                'online'     => User::online()->count(),
                'usersCount' => User::all()->count(),
            ]
        );
    }
}
