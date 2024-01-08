<?php

namespace App\Http\Services;

use App\Http\Repositories\BlogRepositories;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogService
{
    protected $repo;

    public function __construct()
    {
        $this->repo = new BlogRepositories();
    }

    public function createNewBlog($request)
    {
        try {
            $data = $request->all();
            $post = $this->repo->create($data);
            return [
                'status' => true,
                'message' => 'New Blog created successfully.',
            ];
        } catch (Exception $exception) {
            Log::error($exception);
            return [
                'status' => false,
                'message' => $exception->getMessage(),
            ];
        }
    }

    public function fetchAllBlogs()
    {
        try {
            $data = $this->repo->getAll();
            return [
                'status' => true,
                'message' => 'Fetch AllBlogs successfully.',
                'data'=>$data
            ];
        } catch (Exception $exception) {
            Log::error($exception);
            return [
                'status' => false,
                'message' => $exception->getMessage(),
            ];
        }
    }
    
    public function fetch($id, $request = null)
    {
        Log::info('BlogsService@fetch', ["id" => $id]);
        $category = $this->repo->fetch(["id" => $id]);
        return $category;
    }
    public function destroy($id)
    {
        Log::info('BlogsService@Destroy', ["id" => $id]);
        $category = $this->repo->destroy(["id" => $id]);
    }
    public function update($id, $Categorydata)
    {
        Log::info('BlogsService | update', $Categorydata);
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
