<?php

namespace App\Http\Repositories;

use App\Http\Helpers\Constants;
use App\Models\Blogs;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class BlogRepositories
{
    protected $model, $member;
    public function __construct()
    {
        $this->model = new Blogs();
    }


    public function create(array $data){
        return $this->model->create($data);
    }

}
