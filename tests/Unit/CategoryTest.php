<?php

namespace Tests\Unit;

use App\Models\Categories;
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
        $categories = new Categories();
        $request = ['title' => 'sometitle'];
        $data = $categories->addCategory($request);
        $this->assertIsString($data);
        $this->assertEquals('sometitle', $data);
    }
}
