<?php

namespace App;

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