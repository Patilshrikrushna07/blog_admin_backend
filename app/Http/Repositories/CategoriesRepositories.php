<?php

namespace App\Http\Repositories;

use App\Http\Helpers\Constants;
use App\Models\Categories;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class CategoriesRepositories
{
    protected $model, $member;
    public function __construct()
    {
        $this->model = new Categories();
    }


    public function create(array $data){
        return $this->model->create($data);
    }

    public function getAll()
    {
        return $this->model->all();
    }

}
