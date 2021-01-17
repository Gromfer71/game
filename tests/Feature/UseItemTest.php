<?php

namespace Tests\Feature;

use App\Models\Item;
use App\Models\User;
use Assert\InvalidArgumentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UseItemTest extends TestCase
{

    public function setUp()
    :void
    {
        parent::setUp();
        Auth::login(User::factory()->create());
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
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

        $response = $this->post(route('items.use', ['id' => $item->id, 'count' => 0]));
        $this->assertTrue(get_class($response->exception) == InvalidArgumentException::class);
    }

    public function test_item_invalid_id()
    {
        Item::factory()->create(['count' => 100]);
        $this->get(route('items'));
        $response = $this->post(route('items.use', ['id' => -1, 'count' => 20]))->assertNotFound();
    }
}
