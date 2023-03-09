<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class episodes extends Model
{
    use HasFactory;

    protected $table="episodes";

    protected $fillable = [
        'characteres_id',
        'url',
    ];
    public $timestamps=false;
}
