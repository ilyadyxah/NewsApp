<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_addCategory()
    {
        $response = $this->get('/admin/news/admin/category/create');

        $response->assertStatus(200)
        ->assertSeeText('somecategory')
        ->assertSeeText('успешно добавлена');
    }

    public function test_formCategory()
    {
        $response = $this->get('/admin/news/admin/category/create');
        $title = 'sometitle';
        $response->assertStatus(200)
            ->type($title, 'title')
            ->press('Send');
//            ->assertSeeText('somecategory')
//            ->assertSeeText('успешно добавлена');
    }
}
