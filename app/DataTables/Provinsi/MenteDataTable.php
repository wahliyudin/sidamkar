<?php

namespace App\DataTables\Provinsi;

use App\Models\User;
use App\Traits\AuthTrait;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
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
            ->addColumn('penilai_ak', function (User $user) {
                $kabProvPenilaiAndPenetaps = $user->userAparatur?->provinsi?->kabProvPenilaiAndPenetaps;
                if ($user->roles->whereIn('name', getAllRoleFungsionalDamkar())->first() != null) {
                    $kabProvPenilaiAndPenetapDamkar = $kabProvPenilaiAndPenetaps->where('jenis_aparatur', 'damkar')->first();
                    if (isset($kabProvPenilaiAndPenetapDamkar?->penilaiAngkaKredit)) {
                        return $kabProvPenilaiAndPenetapDamkar?->penilaiAngkaKredit?->userPejabatStruktural?->nama;
                    }
                    $crossPenilaiAndPenetap = $user->userAparatur?->provinsi?->crossPenilaiAndPenetaps?->where('jenis_aparatur', 'damkar')->first();
                    return $crossPenilaiAndPenetap?->kabProvPenilaiAndPenetap?->penilaiAngkaKredit?->userPejabatStruktural?->nama;
                } else {
                    $kabProvPenilaiAndPenetapAnalis = $kabProvPenilaiAndPenetaps->where('jenis_aparatur', 'analis')->first();
                    if (isset($kabProvPenilaiAndPenetapAnalis?->penilaiAngkaKredit)) {
                        return $kabProvPenilaiAndPenetapAnalis?->penilaiAngkaKredit?->userPejabatStruktural?->nama;
                    }
                    $crossPenilaiAndPenetap = $user->userAparatur?->provinsi?->crossPenilaiAndPenetaps?->where('jenis_aparatur', 'analis')->first();
                    return $crossPenilaiAndPenetap?->kabProvPenilaiAndPenetap?->penilaiAngkaKredit?->userPejabatStruktural?->nama;
                }
            })
            ->addColumn('penetap_ak', function (User $user) {
                $kabProvPenilaiAndPenetaps = $user->userAparatur?->provinsi?->kabProvPenilaiAndPenetaps;
                if ($user->roles->whereIn('name', getAllRoleFungsionalDamkar())->first() != null) {
                    $kabProvPenilaiAndPenetapDamkar = $kabProvPenilaiAndPenetaps->where('jenis_aparatur', 'damkar')->first();
                    if (isset($kabProvPenilaiAndPenetapDamkar?->penetapAngkaKredit)) {
                        return $kabProvPenilaiAndPenetapDamkar?->penetapAngkaKredit?->userPejabatStruktural?->nama;
                    }
                    $crossPenilaiAndPenetap = $user->userAparatur?->provinsi?->crossPenilaiAndPenetaps?->where('jenis_aparatur', 'damkar')->first();
                    return $crossPenilaiAndPenetap?->kabProvPenilaiAndPenetap?->penetapAngkaKredit?->userPejabatStruktural?->nama;
                } else {
                    $kabProvPenilaiAndPenetapAnalis = $kabProvPenilaiAndPenetaps->where('jenis_aparatur', 'analis')->first();
                    if (isset($kabProvPenilaiAndPenetapAnalis?->penetapAngkaKredit)) {
                        return $kabProvPenilaiAndPenetapAnalis?->penetapAngkaKredit?->userPejabatStruktural?->nama;
                    }
                    $crossPenilaiAndPenetap = $user->userAparatur?->provinsi?->crossPenilaiAndPenetaps?->where('jenis_aparatur', 'analis')->first();
                    return $crossPenilaiAndPenetap?->kabProvPenilaiAndPenetap?->penetapAngkaKredit?->userPejabatStruktural?->nama;
                }
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
                $query->where('provinsi_id', $this->authUser()->load('userProvKabKota')->userProvKabKota->provinsi_id)
                    ->where('tingkat_aparatur', 'provinsi')
                    ->with([
                        'kabKota:id',
                        'kabKota.kabProvPenilaiAndPenetaps:id,penilai_ak_id,penetap_ak_id,jenis_aparatur,kab_kota_id',
                        'kabKota.kabProvPenilaiAndPenetaps.penilaiAngkaKredit:id',
                        'kabKota.kabProvPenilaiAndPenetaps.penilaiAngkaKredit.userPejabatStruktural:id,nama,user_id',
                        'kabKota.kabProvPenilaiAndPenetaps.penetapAngkaKredit:id',
                        'kabKota.kabProvPenilaiAndPenetaps.penetapAngkaKredit.userPejabatStruktural:id,nama,user_id',
                        'kabKota.crossPenilaiAndPenetap:id,kab_kota_id,provinsi_id,jenis_aparatur,kab_prov_penilai_and_penetap_id',
                        'kabKota.crossPenilaiAndPenetap.kabProvPenilaiAndPenetap:id,penilai_ak_id,penetap_ak_id,jenis_aparatur,kab_kota_id',
                        'kabKota.crossPenilaiAndPenetap.kabProvPenilaiAndPenetap.penilaiAngkaKredit:id',
                        'kabKota.crossPenilaiAndPenetap.kabProvPenilaiAndPenetap.penilaiAngkaKredit.userPejabatStruktural:id,nama,user_id',
                        'kabKota.crossPenilaiAndPenetap.kabProvPenilaiAndPenetap.penetapAngkaKredit:id',
                        'kabKota.crossPenilaiAndPenetap.kabProvPenilaiAndPenetap.penetapAngkaKredit.userPejabatStruktural:id,nama,user_id',
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
            Column::make('jabatan'),
            Column::computed('penilai_ak'),
            Column::computed('penetap_ak'),
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