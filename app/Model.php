<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Laravel\Scout\Searchable;

class Model extends Eloquent
{
    use Searchable;
    protected $guarded = [];
}
