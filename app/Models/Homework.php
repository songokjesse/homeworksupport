<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Homework extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable =[
        'name',
        'description',
        'price',
        'user_id'
    ];

    /**
     * Get the index name for the model.
     */
    public function searchableAs()
    {
        return 'homework_index';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function homework_files()
    {
        return $this->hasMany(HomeworkFile::class);
    }
}
