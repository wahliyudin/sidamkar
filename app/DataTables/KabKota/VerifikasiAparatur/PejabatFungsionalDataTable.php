<?php

namespace App\DataTables\KabKota\VerifikasiAparatur;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PejabatFungsionalDataTable extends DataTable
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
            ->addColumn('username', function (User $user) {
                return '<p class="username" data-detail="' . $user->id . '">' . $user->username . '</p>';
            })
            ->filterColumn('username', function ($query, $keyword) {
                $query->where('username', 'like', "%$keyword%");
            })
            ->orderColumn('username', function ($query, $order) {
                $query->orderBy('username', $order);
            })
            ->addColumn('jabatan', function (User $user) {
                return $user->roles()->first()->display_name;
            })
            ->filterColumn('jabatan', function ($query, $keyword) {
                $query->whereHas('roles', function($query) use ($keyword){
                    $query->where('display_name', 'like', "%$keyword%");
                });
            })
            ->orderColumn('jabatan', function ($query, $order) {
                $query->whereHas('roles', function($query) use ($order){
                    $query->orderBy('display_name', $order);
                });
            })
            ->addColumn('status', function (User $user) {
                return $this->statusAkun($user->status_akun);
            })
            ->rawColumns(['status'])
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
        return $model->newQuery()->with('roles')->whereRoleIs(getAllRoleFungsional());
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
            ->setTableId('pejabatfungsional-table')
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
            Column::make('jabatan'),
            Column::make('status')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'PejabatFungsional_' . date('YmdHis');
    }

    public function statusAkun($status)
    {
        switch ($status) {
            case 1:
                return '<span class="badge bg-green text-white text-sm py-2 px-3 rounded-md">Verified</span>';
                break;
            case 2:
                return '<span class="badge bg-red text-white text-sm py-2 px-3 rounded-md">Ditolak</span>';
                break;
            default:
                return '<span class="badge bg-yellow text-white text-sm py-2 px-3 rounded-md">Menunggu</span>';
                break;
        }
    }
}
