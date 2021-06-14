<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mall extends Model
{
    use HasFactory;
    protected $table = "malls";
    protected $fillable = ['mall_name','contact_person','contact_number','email_address',
    'address','zip_code','country','city','activation'];
}
