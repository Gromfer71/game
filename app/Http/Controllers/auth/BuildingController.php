<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserBuilding;
use App\Services\BuildingsHandler;
use Auth;
use Illuminate\Http\Request;

/**
 * Class BuildingController
 *
 * @package App\Http\Controllers\Auth
 */
class BuildingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view(
            'auth.buildings.preview',
            ['buildings' => Auth::user()->userBuildings()->with('baseBuilding')->get()]
        );
    }

    public function upgradeMenu($id)
    {
        $building = UserBuilding::with('baseBuilding')->findOrFail($id);

        return view('auth.buildings.upgrade', ['building' => $building]);
    }

    public function show($id)
    {
        $building = UserBuilding::findOrFail($id);
        $properties = json_decode(UserBuilding::findOrFail($id)->baseBuilding->properties);
        return view('auth.buildings.details', compact('building', 'properties'));
    }

    public function upgrade(Request $request, BuildingsHandler $handler)
    {
        $handler->setBuilding(UserBuilding::with('baseBuilding')->findOrFail($request->input('id')));

        $result = $handler->upgrade();
        if ($result === true) {
            return redirect(route('buildings'))->with('ok', __('mes.upgrade.success'));
        } else {
            return back()->with('error', $result);
        }
    }
}



