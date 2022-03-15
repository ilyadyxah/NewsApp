<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsFormTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->assertSee('Создание новости')
                ->type('title', 'Something about porn')
                ->type('author', 'Johnny Sins')
                ->select('category')
                ->type('content', 'Very long news about porn dasddsa  das ddw wad wadwqe qdasd sad sadasd')
                ->press(__('labels.button_save'))
                ->assertSee('Админка');
        });
    }
}
