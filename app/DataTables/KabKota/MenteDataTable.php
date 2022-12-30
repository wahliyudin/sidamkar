<?php

namespace App\DataTables\KabKota;

use App\Models\User;
use App\Traits\AuthTrait;
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
    use AuthTrait;
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
                return '<p class="nama" data-detail="' . $user->id . '">' . $user->userAparatur?->nama . '</p>
                ';
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
            ->addColumn('jabatan', function (User $user) {
                return $user->roles()->first()->display_name;
            })
            ->filterColumn('jabatan', function ($query, $keyword) {
                $query->whereHas('roles', function ($query) use ($keyword) {
                    $query->where('display_name', 'like', "%$keyword%");
                });
            })
            ->orderColumn('jabatan', function ($query, $order) {
                $query->whereHas('roles', function ($query) use ($order) {
                    $query->orderBy('display_name', $order);
                });
            })
            ->addColumn('atasan_langsung', function (User $user) {
                return $user->mente?->atasanLangsung?->userPejabatStruktural->nama;
            })
            ->filterColumn('atasan_langsung', function ($query, $keyword) {
                $query->whereHas('mente', function ($query) use ($keyword) {
                    $query->whereHas('atasanLangsung', function ($query) use ($keyword) {
                        $query->whereHas('userPejabatStruktural', function ($query) use ($keyword) {
                            $query->where('nama', 'like', "%$keyword%");
                        });
                    });
                });
            })
            ->orderColumn('atasan_langsung', function ($query, $order) {
                $query->whereHas('mente', function ($query) use ($order) {
                    $query->whereHas('atasanLangsung', function ($query) use ($order) {
                        $query->whereHas('userPejabatStruktural', function ($query) use ($order) {
                            $query->orderBy('nama', $order);
                        });
                    });
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
        return $model->newQuery()
            ->with([
                'mente:id,atasan_langsung_id,fungsional_id',
                'mente.atasanLangsung:id',
                'mente.atasanLangsung.userPejabatStruktural:id,nama,user_id',
                'roles'
            ])
            ->withWhereHas('userAparatur', function ($query) {
                $query->where('kab_kota_id', $this->authUser()->load('userProvKabKota')->userProvKabKota->kab_kota_id)
                    ->where('tingkat_aparatur', 'kab_kota')
                    ->with([
                        'kabKota:id'
                    ]);
            })
            ->where('status_akun', 1)
            ->whereRoleIs(getAllRoleFungsional());
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
            ->ajax(env('APP_URL') . route('/kab-kota/data-mente'))
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
            Column::make('jabatan'),
            Column::make('atasan_langsung'),
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
