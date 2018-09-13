<?php

namespace App;

use Happypixels\Shopr\Models\Shoppable;

class Product extends Shoppable
{
    protected $fillable = ['title', 'price'];
}
