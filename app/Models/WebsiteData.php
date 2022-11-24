<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteData extends Model
{
    use HasFactory;

    protected $table="website_data";
    protected $fillable = [
        'url',
        'h1_data',
        'h2_data',
        'h3_data',
        'h4_data',
        'h5_data',
        'h6_data',
        'image_data'
    ];
}