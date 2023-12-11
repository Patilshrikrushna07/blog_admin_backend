<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        "title",
        "description",
        "front_image",
        "cover_image",
        "tags",
        "is_active",
        "parent_id"
    ];

    use HasFactory;
}
