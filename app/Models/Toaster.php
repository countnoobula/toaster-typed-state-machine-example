<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toaster extends Model
{
    use HasFactory;

    protected $fillable = [
    	'has_bread',
    ];
}
