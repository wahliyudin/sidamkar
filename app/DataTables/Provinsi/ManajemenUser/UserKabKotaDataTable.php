<?php

namespace App\DataTables\Provinsi\ManajemenUser;

use App\Models\User;
use App\Traits\DataTableTrait;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserKabKotaDataTable extends DataTable
{
    use DataTableTrait;
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('kab_kota', function (User $user) {
                return $user->userAparatur->kabkota->nama;
            })
            ->filterColumn('kab_kota', function ($query, $keyword) {
                return $query->whereHas('userAparatur', function ($query) use ($keyword) {
                    $query->whereHas('kabkota', function ($query) use ($keyword) {
                        $query->where('nama', 'like', "%$keyword%");
                    });
                });
            })
            ->orderColumn('kab_kota', function ($query, $order) {
                return $query->whereHas('userAparatur', function ($query) use ($order) {
                    $query->whereHas('kabkota', function ($query) use ($order) {
                        $query->orderBy('nama', $order);
                    });
                });
            })
            ->addColumn('nama', function (User $user) {
                return '<p class="username" data-detail="' . $user->id . '">' . $user->username . '</p>';
            })
            ->addColumn('no_hp', function (User $user) {
                return $user->userAparatur->no_hp;
            })
            ->filterColumn('no_hp', function ($query, $keyword) {
                return $query->whereHas('userAparatur', function ($query) use ($keyword) {
                    $query->where('no_hp', 'like', "%$keyword%");
                });
            })
            ->orderColumn('no_hp', function ($query, $order) {
                return $query->whereHas('userAparatur', function ($query) use ($order) {
                    $query->orderBy('no_hp', $order);
                });
            })
            ->addColumn('status', function (User $user) {
                return $this->statusAkun($user->status_akun);
            })
            ->rawColumns(['status', 'nama'])
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
        return $model->newQuery()->with(['roles:id,display_name'])->withWhereHas('userAparatur', function ($query) {
            $query->where('tingkat_aparatur', 'kab_kota');
        })->whereRoleIs(getAllRoleFungsional());
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('User-table')
            ->columns($this->getColumns())
            ->minifiedAjax(env('APP_URL') . '/provinsi/manajemen-user/user-kab-kota')
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
            Column::make('kab_kota'),
            Column::make('nama'),
            Column::make('email'),
            Column::make('no_hp'),
            Column::computed('status')
                ->title('Status Verifikasi'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
