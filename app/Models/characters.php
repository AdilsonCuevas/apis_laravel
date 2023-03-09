<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class characters extends Model
{
    use HasFactory;

    protected $table="characters";

    protected $fillable = [
        'code',
        'name',
        'image',
        'status',
        'species',
        'type',
        'gender',
        'origin_name',
    ];
}
