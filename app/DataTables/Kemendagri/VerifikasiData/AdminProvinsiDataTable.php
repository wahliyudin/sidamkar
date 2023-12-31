<?php

namespace App\DataTables\Kemendagri\VerifikasiData;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AdminProvinsiDataTable extends DataTable
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
                $route = '';
                return view('kemendagri.extensions.buttons-tolak-verif', compact('user', 'route'))->render();
            })
            ->addColumn('provinsi', function (User $user){
                return $user->userProvKabKota->provinsi->nama;
            })
            ->addColumn('file-permohonan', function (User $user) {
                return '<div data-bs-toggle="modal" data-bs-target="#filePermohonan' . $user->id . '"
                style="cursor: pointer; display: flex; align-items: center;">
                <img src="' . asset('assets/images/template/lihat-doc.png') . '" style="width: 26px;" alt="">
                <span style="color: #0090FF; font-weight: 600;">Lihat</span>
                ' . view('kemendagri.verifikasi-data.admin-provinsi.document', compact('user'))->render() . '
            </div>';
            })
            ->addColumn('status', function (User $user) {
                return $this->statusAkun($user->status_akun);
            })
            ->rawColumns(['action', 'status', 'file-permohonan'])
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
        return $model->newQuery()->where('verified', null)->whereRoleIs('provinsi');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('adminprovinsi-table')
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
            Column::make('username')
                ->title('Username'),
            Column::make('provinsi')
                ->title('Provinsi'),
            Column::computed('file-permohonan')
                ->title('File Permohonan'),
            Column::computed('status')
                ->title('Status Akun'),
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
        return 'AdminProvinsi_' . date('YmdHis');
    }

    public function statusAkun($status)
    {
        switch ($status) {
            case 0:
                return '<span class="badge bg-yellow text-white text-sm py-2 px-3 rounded-md">Menunggu</span>';
                break;
            case 1:
                return '<span class="badge bg-green text-white text-sm py-2 px-3 rounded-md">Verified</span>';
                break;
            case 2:
                return '<span class="badge bg-red text-white text-sm py-2 px-3 rounded-md">Ditolak</span>';
                break;
        }
    }
}
