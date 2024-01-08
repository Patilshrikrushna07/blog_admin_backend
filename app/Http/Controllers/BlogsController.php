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

    public function fetchAllBlogs(Request $request){
        Log::info("Fetch All Blogs");
        $data = $this->service->fetchAllBlogs();
        return ApiResponse::successResponse('Blogs Controller..', $data);
    }
    public function show(Request $request, $id){
        $data =  $this->service->fetch($id, $request);
        return ApiResponse::successResponse('Blogs has been fetched successfully.', $data);
    }

    public function destroy(Request $request, $id)
    {
        $response = $this->service->destroy($id);
        return ApiResponse::successResponse('Blogs has been deleted successfully.',$response);
    }

    public function update(Request $request, $id)
    {
        $data = $this->service->update(['id' => $id],$request->all());

        if (!$data) {
            return ApiResponse::failureResponse('request failed');
        }
        return ApiResponse::successResponse(
            'Blogs updated successfully.',
            $data
        );
    }
}
