<?php

namespace App\DataTables\Kemendagri;

use App\Models\KabKota;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DataProvKabKotaDataTable extends DataTable
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
            ->addColumn('provinsi', function (KabKota $kabkota) {
                return $kabkota->provinsi->nama;
            })
            ->addColumn('jumlah_aparatur', function (KabKota $kabkota) {
                return $kabkota->user_aparatur_count + $kabkota->user_pejabat_struktural_count;
            })
            ->addColumn('laki_laki', function (KabKota $kabkota) {
                return $kabkota->user_aparatur_laki_laki_count + $kabkota->user_pejabat_struktural_laki_laki_count;
            })
            ->addColumn('perempuan', function (KabKota $kabkota) {
                return $kabkota->user_aparatur_perempuan_count + $kabkota->user_pejabat_struktural_perempuan_count;
            })
            ->filterColumn('provinsi', function (EloquentBuilder $query, $keyword) {
                $query->whereHas('provinsi', function (EloquentBuilder $query) use ($keyword) {
                    $query->where('nama', 'like', "%$keyword%");
                });
            })
            ->filterColumn('nama', function (EloquentBuilder $query, $keyword) {
                $query->where('nama', 'like', "%$keyword%");
            })
            ->orderColumn('provinsi', function (EloquentBuilder $query, $order) {
                $query->whereHas('provinsi', function (EloquentBuilder $query) use ($order) {
                    $query->orderBy('nama', $order);
                });
            })
            ->orderColumn('nama', function (EloquentBuilder $query, $order) {
                $query->orderBy('nama', $order);
            })
            ->orderColumn('jumlah_aparatur', function (EloquentBuilder $query, $order) {
                $query->orderBy('user_aparatur_count', $order)
                    ->orderBy('user_pejabat_struktural_count', $order);
            })
            ->orderColumn('laki_laki', function (EloquentBuilder $query, $order) {
                $query->orderBy('user_aparatur_laki_laki_count', $order)
                    ->orderBy('user_pejabat_struktural_laki_laki_count', $order);
            })
            ->orderColumn('perempuan', function (EloquentBuilder $query, $order) {
                $query->orderBy('user_aparatur_perempuan_count', $order)
                    ->orderBy('user_pejabat_struktural_perempuan_count', $order);
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\KabKota $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(KabKota $model): QueryBuilder
    {
        $provinsi = request()->get('provinsi');
        return $model->newQuery()
            ->with('provinsi')
            ->withCount('userAparatur')
            ->withCount('userPejabatStruktural')
            ->withCount(['userAparatur as user_aparatur_laki_laki_count' => function (EloquentBuilder $query) {
                $query->where('jenis_kelamin', 'L');
            }])
            ->withCount(['userAparatur as user_aparatur_perempuan_count' => function (EloquentBuilder $query) {
                $query->where('jenis_kelamin', 'P');
            }])
            ->withCount(['userPejabatStruktural as user_pejabat_struktural_laki_laki_count' => function (EloquentBuilder $query) {
                $query->where('jenis_kelamin', 'L');
            }])
            ->withCount(['userPejabatStruktural as user_pejabat_struktural_perempuan_count' => function (EloquentBuilder $query) {
                $query->where('jenis_kelamin', 'P');
            }])
            ->when($provinsi, function (EloquentBuilder $query) use ($provinsi) {
                if ($provinsi != 'all') {
                    return $query->whereHas('provinsi', function ($query) use ($provinsi) {
                        $query->where('id', $provinsi);
                    });
                }
            });
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('dataprovkabkota-table')
            ->responsive(true)
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
            Column::make('provinsi'),
            Column::make('nama')
                ->title('Kab/Kota'),
            Column::make('jumlah_aparatur')
                ->searchable(false)
                ->title('Jumlah Aparatur'),
            Column::make('laki_laki')
                ->searchable(false)
                ->title('Laki - Laki'),
            Column::make('perempuan')
                ->searchable(false)
                ->title('Perempuan')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'DataProvKabKota_' . date('YmdHis');
    }
}
