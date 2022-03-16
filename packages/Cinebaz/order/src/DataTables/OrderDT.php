<?php

namespace Cinebaz\Order\DataTables;

use Cinebaz\Media\Models\Media;
use Cinebaz\Member\Models\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class OrderDT extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('amount', function (Order $data) {
                return $data->amount . ' ' . $data->currency;
            })

            ->addColumn('action', function (Order $data) {
                $button = '<div class="flex align-items-center list-user-action">';
                $button .= '<a class="iq-bg-warning" data-toggle="tooltip" data-placement="top" title=""
                   data-original-title="View" href="'.route('admin.order.details',$data->id).'"><i class="lar la-eye"></i></a>';

                $button .= '</div>';
                return $button;
            })

            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\raw_material $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {

        return $this->builder()
            ->setTableId('mydata-table')
            ->columns($this->getColumns())
            ->parameters([
                'dom' => "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>"
                    . "<'row'<'col-sm-12'tr>>"
                    . "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                'buttons' => ['csv', 'excel', 'pdf', 'print'],
                'order' => [1, 'desc']
            ])
            ->minifiedAjax();
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {

        return [
            Column::make('DT_RowIndex')->title('S/No')->orderable(false)->searchable(false),
            Column::make('id')->title('Order ID'),
            Column::make('code')->title('Transaction Code'),
            Column::make('amount')->title('Amount'),
            Column::make('name')->title('Customer Name'),
            Column::make('email')->title('Customer Email'),
            Column::make('phone')->title('Customer Phone'),
            Column::make('sub_status')->title('Status'),

            Column::make('action')->searchable(false)
                ->orderable(false)
                ->exportable(false)
                ->printable(false),


        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'raw_material_' . date('YmdHis');
    }
}
