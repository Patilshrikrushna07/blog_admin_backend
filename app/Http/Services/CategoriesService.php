<?php

namespace App\Http\Services;

use App\Http\Helpers\ApiResponse;
use App\Http\Repositories\CategoriesRepositories;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


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
    public function fetch($id, $request = null)
    {
        Log::info('CAtegoriesService@fetch', ["id" => $id]);
        $category = $this->repo->fetch(["id" => $id]);
        return $category;
    }

    
    public function destroy($id)
    {
        Log::info('CategoriesService@Destroy', ["id" => $id]);
        $category = $this->repo->destroy(["id" => $id]);
    }

    public function update($id, $Categorydata)
    {
        Log::info('CategoryService | update', $Categorydata);
        try {
            $data = $this->repo->update($id, $Categorydata);
            return $data;
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
    
}
