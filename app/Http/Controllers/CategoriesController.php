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
}
