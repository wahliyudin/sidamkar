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

class AparaturDataTable extends DataTable
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
            ->addColumn('nama', function(User $user){
                return $user->userAparatur?->nama;
            })
            ->addColumn('nip', function(User $user){
                return $user->userAparatur?->nip;
            })
            ->addColumn('provinsi', function(User $user){
                return $user->userAparatur?->provinsi?->nama;
            })
            ->addColumn('kab_kota', function(User $user){
                return $user->userAparatur?->kabkota?->nama;
            })
            ->addColumn('jabatan', function(User $user){
                return $user->roles()->first()->display_name;
            })
            ->addColumn('golongan', function(User $user){
                return $user->userAparatur?->pangkatGolonganTmt?->nama;
            })
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
        return $model->newQuery()->with(['roles', 'userAparatur.provinsi', 'userAparatur.kabkota',
        'userAparatur.pangkatGolonganTmt'])->whereRoleIs(getAllRoleFungsional());
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
            Column::make('nip'),
            Column::make('provinsi'),
            Column::make('kab_kota')
                ->title('Kab/Kota'),
            Column::make('jabatan'),
            Column::make('golongan')
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
