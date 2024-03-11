<?php

namespace App\DataTables;

use App\Models\ProtfolioItem;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProtfolioItemDataTable extends DataTable
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
            return '<a href="'.route('admin.protfolio-item.edit', $query->id).'" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    <a href="'.route('admin.protfolio-item.destroy', $query->id).'" class="btn btn-danger delete-item"><i class="fas fa-times me-2"></i></a>';
        })
        ->addColumn('created_at', function($data){
            return $data->created_at->format('jS M, Y'); 
        })
        ->addColumn('image', function($data){
            return '<img src="'.asset('public/'.$data->image).'" style="max-width:100px;"></img>';
        })
        ->addColumn('updated_at', function($data){
            return $data->updated_at->format('jS M, Y'); 
        })
        ->addColumn('category', function($query){
            return $query->category->name;
        })
        ->rawColumns(['image', 'action'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProtfolioItem $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('protfolioitem-table')
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
            Column::make('id')->width(10),
            Column::make('image')->width(100),
            Column::make('title'),
            Column::make('category'),
            Column::make('client'),
            Column::make('website'),
            Column::make('created_at'),
            // Column::make('updated_at'),
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
        return 'ProtfolioItem_' . date('YmdHis');
    }
}
