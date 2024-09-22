<?php

namespace App\Trait;

use App\Models\Seo;

trait HasSeo
{
    public function seo()
    {
        return $this->morphOne(Seo::class, 'model');
    }
}
