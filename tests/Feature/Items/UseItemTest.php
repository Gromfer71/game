<?php

namespace Tests\Feature\Items;

use App\Models\Item;
use Assert\InvalidArgumentException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UseItemTest extends TestCase
{
    public function test_item_use_success()
    {
        $item = Item::factory()->create();

        $this->get(route('items'));

        $this->post(route('items.use', ['id' => $item->id, 'count' => 10]));

        $this->assertTrue($item->count - 10 == Item::findOrFail($item->id)->count);
    }

    public function test_item_should_deleted_then_count_zero()
    {
        $item = Item::factory()->create(['count' => 100]);

        $this->get(route('items'));

        $this->post(route('items.use', ['id' => $item->id, 'count' => 100]));

        $this->assertDatabaseMissing('items', ['id' => $item->id]);
    }

    public function test_item_should_assertion_exception_count_greater_item_count()
    {
        $item = Item::factory()->create(['count' => 100]);

        $this->get(route('items'));

        $response = $this->post(route('items.use', ['id' => $item->id, 'count' => 200]));
        $this->assertTrue(get_class($response->exception) == InvalidArgumentException::class);
    }

    public function test_item_zero_count_exception_not_null()
    {
        $item = Item::factory()->create(['count' => 100]);

        $this->get(route('items'));

        $this->post(route('items.use', ['id' => $item->id, 'count' => 0]))
            ->assertStatus(302)
            ->assertSessionHas('error', __('mes.zeroChoose'));

    }

    public function test_item_invalid_id()
    {
        Item::factory()->create(['count' => 100]);
        $this->get(route('items'));
        $response = $this->post(route('items.use', ['id' => -1, 'count' => 20]))->assertNotFound();
    }
}
