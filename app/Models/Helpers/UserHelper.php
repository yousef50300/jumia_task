<?php

namespace App\Models\Helpers;

use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * Trait UserHelper
 * @package App\Models\Helpers
 */
trait UserHelper
{
    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = bcrypt($value);
        }
    }
}
