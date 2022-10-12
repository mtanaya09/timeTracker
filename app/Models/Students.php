<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    // protected $fillable = ['first_name', 'last_name'] (specific)
    protected $guarded = [];
    use HasFactory;
}
