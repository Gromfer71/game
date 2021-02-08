<?php

namespace Tests\Feature\Buildings;

use App\Models\UserBuilding;
use App\Resources;
use Tests\TestCase;

class UpgradeTest extends TestCase
{
    /** @var UserBuilding */
    private $castle;

    public function setUp()
    :void
    {
        parent::setUp();
        $this->castle = $this->user->userBuildings->where('base_id', '1')->first();
    }

    public function test_success_start_upgrade()
    {
        $this->post(route('buildingUpgrade', ['id' => $this->castle->id]))
            ->assertSessionHas('ok', __('mes.upgrade.success'))
            ->assertStatus(302);
    }

    public function test_resources_sub_after_upgrade()
    {
        $this->post(route('buildingUpgrade', ['id' => $this->castle->id]));
        $this->assertEquals(
            Resources::createFromModel($this->user->refresh()),
            Resources::createFromModel($this->user)->add(Resources::createFromModel($this->castle->baseBuilding))
        );
    }

    public function test_lv_upping_time()
    {
        $this->post(route('buildingUpgrade', ['id' => $this->castle->id]));
        $this->assertEquals(time() + $this->castle->baseBuilding->time_up, $this->castle->refresh()->lv_upping_time);
    }

    public function test_empty_building_upgrade()
    {
        $this->post(route('buildingUpgrade', ['id' => -1]))->assertNotFound();
    }

    public function test_not_enough_resources_for_upgrade()
    {
        $needFood = $this->castle->baseBuilding->food_up;
        $this->user->food = $needFood - 1;
        $this->post(route('buildingUpgrade', ['id' => $this->castle->id]))
            ->assertStatus(302)
            ->assertSessionHas('error', __('mes.notEnoughRes'));
        $this->assertNull(UserBuilding::find($this->castle->id)->lv_upping_time);
    }

    public function test_max_upgrades_limit()
    {
        $this->post(route('buildingUpgrade', ['id' => $this->castle->id]));
        $this->post(route('buildingUpgrade', ['id' => $this->user->userBuildings->last()->id]))
            ->assertStatus(302)
            ->assertSessionHas('error', __('mes.upgrade.maxUpgradesLimit'));
        $this->assertNull($this->user->userBuildings->last()->lv_upping_time);
    }

    public function test_one_building_try_double_upgrade()
    {
        $this->user->max_building_upgrades = 2;

        $this->post(route('buildingUpgrade', ['id' => $this->castle->id]));
        $this->post(route('buildingUpgrade', ['id' => $this->castle->id]))
            ->assertStatus(302)
            ->assertSessionHas('error', __('mes.upgrade.alreadyUpgrading'));
    }

    public function test_finish_upgrade()
    {
        $this->post(route('buildingUpgrade', ['id' => $this->castle->id]));
        $this->castle->lv_upping_time = 1;
        $this->castle->save();
        $this->get(route('buildings'));
        $this->assertNull($this->castle->refresh()->lv_upping_time);
        $this->assertEquals(1, $this->castle->baseBuilding->lv);
    }
}
