<?php

namespace App\DataTables\Provinsi\ManajemenUser;

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

class StrukturalDataTable extends DataTable
{
    use AuthTrait, DataTableTrait;
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('username', function (User $user) {
                return '<p class="username m-0" data-detail="' . $user->id . '">' . $user->userPejabatStruktural->nama . '</p>';
            })
            ->filterColumn('username', function ($query, $keyword) {
                return $query->where('username', 'like', "%$keyword%");;
            })
            ->orderColumn('username', function ($query, $order) {
                return $query->orderBy('username', $order);
            })
            ->addColumn('no_hp', function (User $user) {
                return $user->userPejabatStruktural->no_hp;
            })
            ->filterColumn('no_hp', function ($query, $keyword) {
                return $query->whereHas('userPejabatStruktural', function ($query) use ($keyword) {
                    $query->where('no_hp', 'like', "%$keyword%");
                });
            })
            ->orderColumn('no_hp', function ($query, $order) {
                return $query->whereHas('userPejabatStruktural', function ($query) use ($order) {
                    $query->orderBy('no_hp', $order);
                });
            })
            ->addColumn('eselon', function (User $user) {
                return 'Eselon ' . $user->userPejabatStruktural->eselon;
            })
            ->filterColumn('eselon', function ($query, $keyword) {
                return $query->whereHas('userPejabatStruktural', function ($query) use ($keyword) {
                    $query->where('eselon', 'like', "%$keyword%");
                });
            })
            ->orderColumn('eselon', function ($query, $order) {
                return $query->whereHas('userPejabatStruktural', function ($query) use ($order) {
                    $query->orderBy('eselon', $order);
                });
            })
            ->filterColumn('jabatan', function ($query, $keyword) {
                $query->whereHas('roles', function ($query) use ($keyword) {
                    $query->where('display_name', 'like', "%$keyword%");
                });
            })
            ->addColumn('tgl_registrasi', function (User $user) {
                return $user->created_at->translatedFormat('H:i') . ' WIB, ' . $user->created_at->translatedFormat('d F Y');
            })
            ->orderColumn('tgl_registrasi', function ($query, $order) {
                $query->orderBy('created_at', $order);
            })
            ->addColumn('status', function (User $user) {
                return $this->statusAkun($user->status_akun);
            })
            ->addColumn('action', function (User $user) {
                return view('provinsi.manajemen-user.struktural.buttons-tolak-verif', compact('user'))->render();
            })
            ->rawColumns(['status', 'action'])
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
        return $model->newQuery()->with(['roles:id,display_name'])->withWhereHas('userPejabatStruktural', function ($query) {
            $query->where('provinsi_id', $this->authUser()->load('userProvKabKota')->userProvKabKota->provinsi_id)
                ->where('tingkat_aparatur', 'provinsi');
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
            ->setTableId('User-table')
            ->columns($this->getColumns())
            ->minifiedAjax(env('APP_URL') . '/provinsi/manajemen-user/struktural')
            ->dom('lfrtip')
            ->orderBy(2, 'desc')
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
            Column::make('username')
                ->title('Nama'),
            Column::make('no_hp'),
            Column::make('eselon'),
            Column::make('tgl_registrasi')
                ->searchable(false),
            Column::computed('status')
                ->title('Status Verifikasi'),
            Column::computed('action'),
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
