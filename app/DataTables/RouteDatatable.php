<?php

namespace App\DataTables;

use App\Models\Route;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RouteDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()->eloquent($query);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Route $model
     * @return Builder
     */
    public function query(Route $model)
    {
        return $model->newQuery()->with([
            'startDestination',
            'endDestination'
        ]);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('routes-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(0);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->title('#'),
            Column::make('name')->title(__('routes.attributes.name')),
            Column::make('startDestination.id')->data('start_destination.name')->title(__('routes.attributes.start_destination')),
            Column::make('endDestination.id')->data('end_destination.name')->title(__('routes.attributes.end_destination'))
        ];
    }
}
