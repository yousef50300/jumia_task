<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\DataTableAbstract;

class BaseDatatable extends DataTable
{
    /**
     * @var string
     */
    protected $actionView;

    /**
     * @var string
     */
    protected $tableId;

    /**
     * @var string
     */
    protected $createAction;

    public function __construct()
    {
        $this->builder()
            ->setTableId($this->tableId)
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(0);
    }

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = datatables()->eloquent($query);

        if ($this->actionView) {
            $dataTable->addColumn('action', function ($data) {
                return view($this->actionView, compact('data'));
            });
        }

        return $dataTable;
    }


}
