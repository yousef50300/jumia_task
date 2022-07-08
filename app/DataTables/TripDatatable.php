<?php

namespace App\DataTables;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TripDatatable extends DataTable
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
     * @param Trip $model
     * @return Builder
     */
    public function query(Trip $model)
    {
        return $model->newQuery()->with([
            'route',
            'bus',
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
            ->setTableId('trips-table')
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
            Column::make('name')->title(__('trips.attributes.name')),
            Column::make('route.id')->data('route.name')->title(__('trips.attributes.route')),
            Column::make('bus.bus_number')->title(__('trips.attributes.bus_number'))
        ];
    }
}
