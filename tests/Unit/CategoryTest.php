<?php

namespace Tests\Unit;

use App\Models\OldCategories;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_category()
    {
        $categories = new OldCategories();
        $request = ['title' => 'sometitle'];
        $data = $categories->addCategory($request);
        $this->assertIsString($data);
        $this->assertEquals('sometitle', $data);
    }
}
