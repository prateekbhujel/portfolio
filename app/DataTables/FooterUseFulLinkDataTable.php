<?php

namespace App\DataTables;

use App\Models\FooterUseFulLink;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FooterUseFulLinkDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))   
        ->addColumn('action', function($query){
            return '<a href="'.route('admin.footer-useful-links.edit', $query->id).'" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    <a href="'.route('admin.footer-useful-links.destroy', $query->id).'" class="btn btn-danger delete-item"><i class="fas fa-times me-2"></i></a>';
        })
        ->addColumn('created_at', function($query){
            return $query->created_at->format('jS M, Y'); 
        })
        ->addColumn('updated_at', function($query){
            return $query->updated_at->format('jS M, Y'); 
        })
        ->addColumn('url', function($query){
            return '<a href="'.$query->url.'" target="_blank">'.$query->url.'</a>'; 
        })
        ->rawColumns(['action','url'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(FooterUseFulLink $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('footerusefullink-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('url'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(100)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'FooterUseFulLink_' . date('YmdHis');
    }
}
