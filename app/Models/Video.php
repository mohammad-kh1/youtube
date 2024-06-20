<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ["title", "publisher_id", "thumbnail", "video"];

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
