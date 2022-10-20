<?php

namespace App\DataTables\KabKota;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DataAparaturDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function (User $user) {
                return '<a href="' . route('kab-kota.data-aparatur.show', $user->id) . '" class="btn btn-blue text-sm">Detail</a>';
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder
    {
        $jabatan = request()->get('jabatan');
        return $model->newQuery()
            ->where('verified', '!=', null)
            ->when($jabatan, function (QueryBuilder $query) use ($jabatan) {
                switch ($jabatan) {
                    case 'all':
                        return $query->whereRoleIs(['damkar', 'analis_kebakaran', 'atasan_langsung', 'penilai_ak', 'penetap_ak']);
                        break;
                    case 'fungsional':
                        return $query->whereRoleIs(getAllRoleFungsional());
                        break;
                    case 'struktural':
                        return $query->whereRoleIs(['atasan_langsung', 'penilai_ak', 'penetap_ak']);
                        break;
                }
            })
            ->whereRoleIs(array_merge(getAllRoleFungsional(), ['atasan_langsung', 'penilai_ak', 'penetap_ak']));
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->responsive(true)
            ->setTableId('dataaparatur-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('frtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::computed('no'),
            Column::make('username')
                ->title('Nama'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'DataAparatur_' . date('YmdHis');
    }
}
