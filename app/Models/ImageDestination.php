<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImageDestination extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['imageId'];

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class, 'destinationId', 'destinationId');
    }

}
