<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Destination extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['imageId','destinationName', 'description', 'location'];


        public function images(): BelongsTo
        {
            return $this->belongsTo(ImageDestination::class, 'imageId', 'imageId');
        }
}
