<?php

namespace App\Models\Helpers;

use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * Trait AdminHelper
 * @package App\Models\Helpers
 */
trait AdminHelper
{
    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
