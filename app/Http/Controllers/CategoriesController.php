<?php
namespace App\Http\Controllers;

use App\Podty\Categories;

class CategoriesController
{
    /**
     * @var \App\Podty\Categories $categories
     */
    protected $categories;

    public function __construct(Categories $categories)
    {
        $this->categories = $categories;
    }

    public function home()
    {
        $categories = $this->categories->all()
            ->filter(function($category){
                return $category['counter'] > 10;
            })->filter(function($category){
                return $category['thumbnail'];
            });

        return view('categories.index')->with('categories', $categories);
    }

    public function one(string $categorySlug)
    {
        $category = $this->categories->all()->filter(function($category) use($categorySlug) {
            return $category['slug'] == $categorySlug;
        })->first();

        $podcasts = $this->categories->podcasts($category['id'])->take(36);

        return view('discover')->with([
            'podcasts' => $podcasts,
            'title' => $category['name']
        ]);
    }
}
