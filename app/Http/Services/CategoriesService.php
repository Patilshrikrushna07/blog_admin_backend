<?php

namespace App\Http\Services;

use App\Http\Repositories\CategoriesRepositories;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoriesService
{
    protected $repo;

    public function __construct()
    {
        $this->repo = new CategoriesRepositories();
    }

    public function createNewCategories($request)
    {
        try {
            $data = $request->all();
            $post = $this->repo->create($data);
            return [
                'status' => true,
                'message' => 'New Categories created successfully.',
            ];
        } catch (Exception $exception) {
            Log::error($exception);
            return [
                'status' => false,
                'message' => $exception->getMessage(),
            ];
        }
    }

    public function fetchAllCategories()
    {
        try {
            $data = $this->repo->getAll();
            $tree = $this->generateTree($data);
            return [
                'status' => true,
                'message' => 'Fetch AllCategories created successfully.',
                'data'=>$tree
            ];
        } catch (Exception $exception) {
            Log::error($exception);
            return [
                'status' => false,
                'message' => $exception->getMessage(),
            ];
        }
    }
    protected function generateTree($data, $parent = 0, $depth = 0)
    {
        $tree = [];

        foreach ($data as $item) {
            if ($item['parent_id'] == $parent) {
                $item['children'] = $this->generateTree($data, $item['id'], $depth + 1);
                $tree[] = $item;
            }
        }

        return $tree;
    }
}
