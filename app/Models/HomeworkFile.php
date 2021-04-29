<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeworkFile extends Model
{
    use HasFactory;
    protected $fillable =[
        'filePath',
        'homework_id'
    ];
}
