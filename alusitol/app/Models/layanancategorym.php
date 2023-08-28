<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class layanancategorym extends Model
{
    use HasFactory;

    protected $fillable = [
        'layanan_category',
        'layanan_category_image',
        'jelajah_category_description',
        'created_at',
    ];
}
