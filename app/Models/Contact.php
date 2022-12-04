<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Contact extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'favorite',
        'user_id',
    ];

    protected $casts = [
        'favorite' => 'boolean',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
