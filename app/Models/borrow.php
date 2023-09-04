<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class borrow extends Model
{
    use HasFactory;


    public function book(): BelongsTo
    {
        return $this->belongsTo(book::class);
    }
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'return_date',
        'user_id',
        'book_id'
    ];
}
