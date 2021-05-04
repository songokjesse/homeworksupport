<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeworkFile extends Model
{
    use HasFactory;
    protected $fillable =[
        'filePath',
        'homework_id',
        'fileSize',
        'OriginalName',
        'fileExtension'
    ];

    public function homework()
    {
        return $this->belongsTo(Homework::class);
    }
}
