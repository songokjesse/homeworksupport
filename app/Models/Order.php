<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'user_id',
        'status',
        'amount',
        'customization',
        'homework_id'
    ];

    public function homework()
    {
        return $this->belongsTo(Homework::class);
    }

    public  function user(){
        return $this->belongsTo(User::class);
    }
}
