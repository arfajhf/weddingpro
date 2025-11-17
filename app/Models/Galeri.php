<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeris';

    protected $fillable = [
        'weding_id', // to UserWadding
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'image6',
    ];
}
