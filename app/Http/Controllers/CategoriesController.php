<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ApiResponse;
use App\Http\Services\CategoriesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoriesController extends Controller
{
    protected $service;
    public function  __construct(){
        $this->service = new CategoriesService();
    }
    public function createCategories(Request $request){
        Log::info("Create new Categories");
        $data = $this->service->createNewCategories($request);
        return ApiResponse::successResponse('Categories Controller..', $data);
    }

    public function fetchAllCategories(Request $request){
        Log::info("Fetch All Categories");
        $data = $this->service->fetchAllCategories();
        return ApiResponse::successResponse('Categories Controller..', $data);
    }
    public function show(Request $request, $id){
        $data =  $this->service->fetch($id, $request);
        return ApiResponse::successResponse('Categories has been fetched successfully.', $data);
    }
    public function destroy(Request $request, $id)
    {
        $response = $this->service->destroy($id);
        return ApiResponse::successResponse('Categories has been deleted successfully.',$response);
    }
    public function update(Request $request, $id)
    {
        $data = $this->service->update(['id' => $id],$request->all());

        if (!$data) {
            return ApiResponse::failureResponse('request failed');
        }
        return ApiResponse::successResponse(
            'Category updated successfully.',
            $data
        );
    }
}
