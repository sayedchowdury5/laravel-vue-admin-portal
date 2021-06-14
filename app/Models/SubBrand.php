<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubBrand extends Model
{
    use HasFactory;
    protected $table = "sub_brands";
    protected $fillable = ['category','product','brand','sub_brand','merchant','shop','activation'];
}
