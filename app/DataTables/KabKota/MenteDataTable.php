<?php

namespace App\DataTables\KabKota;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MenteDataTable extends DataTable
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
            ->addColumn('nama', function (User $user) {
                return '<p class="nama" data-detail="' . $user->id . '">' . $user->userPejabatStruktural?->nama . '</p>
                ';
            })
            ->filterColumn('nama', function ($query, $keyword) {
                $query->whereHas('userPejabatStruktural', function ($query) use ($keyword) {
                    $query->where('nama', 'like', "%$keyword%");
                });
            })
            ->orderColumn('nama', function ($query, $order) {
                $query->whereHas('userPejabatStruktural', function ($query) use ($order) {
                    $query->orderBy('nama', $order);
                });
            })
            ->filterColumn('nama', function ($query, $keyword) {
                $query->whereHas('userPejabatStruktural', function ($query) use ($keyword) {
                    $query->where('nama', 'like', "%$keyword%");
                });
            })
            ->orderColumn('nama', function ($query, $order) {
                $query->whereHas('userPejabatStruktural', function ($query) use ($order) {
                    $query->orderBy('nama', $order);
                });
            })
            ->addColumn('action', function (User $user) {
                return '<button class="btn btn-blue btn-sm edit-mente" data-id="' . $user->id . '">edit</button>';
            })
            ->rawColumns(['nama', 'action'])
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
        return $model->newQuery()->whereHas('userPejabatStruktural', function ($query) {
            $query->where('kab_kota_id', Auth::user()->userProvKabKota->kab_kota_id);
        })->withWhereHas('mentes')->whereRoleIs('atasan_langsung');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('Mente-table')
            ->responsive('true')
            ->orderCellsTop()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('lfrtip')
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
            Column::make('nama'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center action'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Mente_' . date('YmdHis');
    }
}
