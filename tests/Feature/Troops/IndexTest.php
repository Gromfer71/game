<?php

namespace Tests\Feature\Troops;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class IndexTest extends TestCase
{
    public function test_page_opened()
    {
        $this->get(route('troops.index'))
            ->assertViewIs('auth.troops.index')
            ->assertViewHasAll([])
            ->assertStatus(200);
    }
}
