<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['categoryName', 'url'];

    public function homeworks()
    {
        return $this->hasMany(Homework::class);
    }
}
