<?php
namespace App\Http\Controllers;

use App\Podty\Categories;

class CategoriesController
{
    public function home(Categories $categories)
    {
        $categories = $categories->all()
            ->filter(function($category){
                return $category['counter'] > 10;
            })->filter(function($category){
                return $category['thumbnail'];
            });

        return view('categories.index')->with('categories', $categories);
    }
}
