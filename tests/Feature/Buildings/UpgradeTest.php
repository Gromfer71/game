<?php

namespace Tests\Feature\Buildings;

use App\Models\UserBuilding;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UpgradeTest extends TestCase
{
    public function test_lv_upping_time_not_null()
    {
        $this->post(route('buildingUpgrade', ['id' => Auth::user()->userBuildings()->first()->id]));
        $this->assertNotNull(Auth::user()->userBuildings()->first()->lv_upping_time);
    }

    public function test_empty_building_upgrade()
    {
        $this->post(route('buildingUpgrade', ['id' => -1]))->assertNotFound();
    }

    public function test_not_enough_resources_for_upgrade()
    {
        $needFood = $this->building->baseBuilding()->food_up;
        Auth::user()->food = $needFood - 1;
        $this->post(route('buildingUpgrade', ['id' => $this->building->id]))->assertStatus(302);
        $this->assertNull(UserBuilding::find($this->building->id)->lv_upping_time);
    }

    public function test_max_upgrades_limit()
    {
        $building2 = UserBuilding::factory()->create();

        $this->post(route('buildingUpgrade', ['id' => $this->building->id]))->assertStatus(302);
        $this->post(route('buildingUpgrade', ['id' => $building2->id]))->assertStatus(302);
        $this->assertNotNull(UserBuilding::find($this->building->id)->lv_upping_time);
        $this->assertNull(UserBuilding::find($building2->id)->lv_upping_time);
    }

    public function test_finish_upgrade()
    {
        $this->post(route('buildingUpgrade', ['id' => $this->building->id]))->assertStatus(302);

        $building = UserBuilding::find($this->building->id);

        $building->lv_upping_time = $building->lv_upping_time - $building->baseBuilding()->time_up - 1;
        $building->save();
        $this->get('/home');
        $this->assertNull(UserBuilding::find($building->id)->lv_upping_time);
        $this->assertEquals($building->baseBuilding()->lv + 1, UserBuilding::find($building->id)->baseBuilding()->lv);
    }
}
