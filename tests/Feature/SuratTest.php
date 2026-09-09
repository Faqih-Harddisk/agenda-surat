<?php

namespace Tests\Feature;

use Tests\TestCase;

class SuratTest extends TestCase
{
    public function test_create_form_posts_to_store_route(): void
    {
        $response = $this->get(route('surat.create'));

        $response->assertStatus(200);
        $response->assertSee('action="' . route('surat.store') . '"', false);
        $response->assertSee('method="POST"', false);
        $response->assertSee('name="_token"', false);
    }
}
