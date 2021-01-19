<?php

namespace Tests\Feature\Items;

use Tests\TestCase;

class IndexTest extends TestCase
{
    public function test_index()
    {
        $this->get(route('items'))
            ->assertViewIs('auth.items.index')
            ->assertViewHasAll(['items'])
            ->assertStatus(200);
    }
}
