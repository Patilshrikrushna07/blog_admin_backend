<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table = 'blogs';

    protected $fillable = [
        "link_id",
        "title",
        "description",
        "content",
        "created_by",
        "front_image",
        "cover_image",
        "tags",
        "meta_tag",
        "meta_keyword",
        "meta_description",
        "is_active"
    ];

    use HasFactory;
}
