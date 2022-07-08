<?php

namespace App\DataTables;

use App\Models\Bus;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BusDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()->eloquent($query)
            ->addColumn('action', function ($data) {
                return view('dashboard.buses.partials.actions', compact('data'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param Bus $model
     * @return Builder
     */
    public function query(Bus $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('buses-table')
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
            Column::make('bus_number')->title(__('buses.attributes.bus_number')),
            Column::computed('action')
                ->title(__('core.action'))
                ->searchable(false)
                ->orderable(false),
        ];
    }
}
