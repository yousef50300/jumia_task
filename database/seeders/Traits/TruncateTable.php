<?php

namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;

/**
 * Class TruncateTable.
 */
trait TruncateTable
{
    /**
     * @param $table
     */
    protected function truncate($table)
    {
        DB::table($table)->truncate();
    }

    /**
     * @param  array  $tables
     */
    protected function truncateMultiple(array $tables)
    {
        foreach ($tables as $table) {
            $this->truncate($table);
        }
    }
}
