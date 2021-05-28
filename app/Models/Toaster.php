<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toaster extends Model
{
    use HasFactory;

    protected $fillable = [
    	'has_bread',
    	'status',
    ];

    public const STATE_UNPLUGGED = 'unplugged';
    public const STATE_POWERED_ON = 'powered_on';
    public const STATE_POWERED_OFF = 'powered_off';
}
