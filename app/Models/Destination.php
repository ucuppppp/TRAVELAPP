<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Destination extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $primaryKey = 'destinationId';

    protected $fillable = ['image', 'destinationName', 'description', 'location'];
}
