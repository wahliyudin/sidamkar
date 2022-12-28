<?php

namespace App\DataTables\PenilaiAK\DataPengajuan;

use App\Models\User;
use App\Traits\AuthTrait;
use App\Traits\DataTableTrait;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class InternalDataTable extends DataTable
{
    use DataTableTrait, AuthTrait;
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
                return $user?->userAparatur?->nama;
            })
            ->filterColumn('nama', function ($query, $keyword) {
                $query->whereHas('userAparatur', function ($query) use ($keyword) {
                    $query->where('nama', 'like', "%$keyword%");
                });
            })
            ->orderColumn('nama', function ($query, $order) {
                $query->whereHas('userAparatur', function ($query) use ($order) {
                    $query->orderBy('nama', $order);
                });
            })
            ->addColumn('jenis_kelamin', function (User $user) {
                return $user?->userAparatur?->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-Laki';
            })
            ->addColumn('jabatan', function (User $user) {
                return $user?->roles()?->first()?->display_name;
            })
            ->addColumn('golongan', function (User $user) {
                return $user?->userAparatur?->pangkatGolonganTmt?->nama;
            })
            ->addColumn('action', function (User $user) {
                return '<a href="' . route('penilai-ak.data-pengajuan.internal.show', $user->id) . '" class="btn btn-blue btn-sm">Detail</a>';
            })
            ->rawColumns(['action'])
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
        $user = $this->authUser()->load(['userPejabatStruktural:id,user_id,kab_kota_id,tingkat_aparatur']);
        $jenisAparaturs = $this->getRoles($user->roles()->pluck('name')->toArray());
        return $model->newQuery()
            ->where('status_akun', User::STATUS_ACTIVE)
            ->withWhereHas('userAparatur', function ($query) use ($user) {
                $query->with(['kabKota', 'pangkatGolonganTmt'])
                    ->where('kab_kota_id', $user->userPejabatStruktural->kab_kota_id)
                    ->where('tingkat_aparatur', 'kab_kota');
            })
            // ->whereHas('rekapitulasiKegiatan', function ($query) {
            //     $query->where('is_send', true);
            // })
            ->whereRoleIs($jenisAparaturs);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('internal-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('nama'),
            Column::computed('jenis_kelamin'),
            Column::computed('jabatan'),
            Column::computed('golongan'),
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
        return 'Internal_' . date('YmdHis');
    }
}
