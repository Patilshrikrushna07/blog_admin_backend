<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ApiResponse;
use App\Http\Services\BlogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogsController extends Controller
{
    protected $service;
    public function  __construct(){
        $this->service = new BlogService();
    }
    public function createblog(Request $request){
        Log::info("Create new Blog");
        $data = $this->service->createNewBlog($request);
        return ApiResponse::successResponse('Blog Controller..', $data);
    }
}
