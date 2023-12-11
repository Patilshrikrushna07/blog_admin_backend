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

}
