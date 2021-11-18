<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable =
    [
        'title',
        'description',
        'author',
        'publisher',
        'date_of_issue'
    ];
}
