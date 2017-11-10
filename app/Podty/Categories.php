<?php
namespace App\Podty;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class Categories
{
    private $api;

    public function __construct()
    {
        $this->api = new ApiClient;
    }

    public function one(int $id): Collection
    {
        return $this->returnDefaultResponse(
            $this->api->get('categories/' . $id)
        );
    }

    public function all(): Collection
    {
        $categories = Cache::remember('categories', 360, function() {
            return $this->api->get('categories' );
        });

        return $this->returnDefaultResponse($categories);
    }

    private function returnDefaultResponse($response): Collection
    {
        return $response ? collect($response['data']) : collect([]);
    }
}
