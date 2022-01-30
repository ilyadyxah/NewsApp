<?php

namespace App\Models;

use Illuminate\Http\Request;

class Categories
{
    private $categories = [
        'Politics',
        'Accidents',
        'Economy',
        'Sport'];

    public function getCategories()
    {
        return $this->categories;
    }

    public function addCategory($request)
    {
        if (is_array($request)) {
            return $request['title'];
        }
        else
        return $request->input('title');
    }
}
