<?php

namespace App\DataTables\AtasanLangsung;

use App\Models\Mente;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PengajuanKegiatanDataTable extends DataTable
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
            ->addColumn('nama', function (Mente $mente) {
                return $mente->fungsional->userAparatur?->nama;
            })
            ->filterColumn('nama', function ($query, $keyword) {
                $query->whereHas('fungsional', function ($query) use ($keyword) {
                    $query->whereHas('userAparatur', function ($query) use ($keyword) {
                        $query->where('nama', 'like', "%$keyword%");
                    });
                });
            })
            ->orderColumn('nama', function ($query, $order) {
                $query->whereHas('fungsional', function ($query) use ($order) {
                    $query->whereHas('userAparatur', function ($query) use ($order) {
                        $query->orderBy('nama', $order);
                    });
                });
            })
            ->addColumn('action', function (Mente $mente) {
                return '<a class="btn btn-primary btn-status px-3 text-sm" href="' . route('atasan-langsung.pengajuan-kegiatan.show', $mente->fungsional->id) . '">Detail</a>';
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Mente $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Mente $model): QueryBuilder
    {
        return $model->newQuery()->withWhereHas('fungsional', function ($query) {
            $query->with('userAparatur');
        })->where('atasan_langsung_id', auth()->user()->id);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pengajuankegiatan-table')
            ->responsive(true)
            ->orderCellsTop()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
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
                ->addClass('text-center'),
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
