<?php

namespace App\Models\Helpers;

/**
 * Trait BusHelper
 * @package App\Models\Helpers
 */
trait BusHelper
{
    public function canDelete()
    {
        return !$this->trips()->count();
    }
}
