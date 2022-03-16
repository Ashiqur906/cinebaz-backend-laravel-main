<?php

namespace Cinebaz\Banner\DataTables;

use Cinebaz\Banner\Models\Slider;
use Cinebaz\Banner\Models\SliderDetail;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Form;
use Illuminate\Http\Request;

class SliderDT extends DataTable
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
            ->addColumn('total', function (Slider $data) {
                    // return SliderDetail::where('slider_id', $data->id)->count();
                    return $data->details()->count();
            })
            ->addColumn('is_active', function (Slider $data) {
                if ($data->is_active == 'Yes') {
                    return '<button type="button" class="edit btn btn-success btn-sm">Active</button>';
                } else {
                    return '<button type="button" class="edit btn btn-danger btn-sm">Inactive</button>';
                }
            })

            ->addColumn('action', function (Slider $data) {
                $button = '<div class="btn-group btn-group-sm">';
                $button .= '<a href="' . route('admin.slider.details', $data->id) . '"  class="btn btn-success btn-flat" ><i class="las la-eye"></i></a>';
                $button .= '<a href="' . route('admin.slider.edit', $data->id) . '" class="btn btn-info btn-flat"><i class="las la-pen"></i></a>';
              $button .= '</div>';
                return $button;
            })
            ->rawColumns(['is_active', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \Luova\Booking\Models\Booking $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Slider $model, Request $request)
    {



        $query = $model;

        $query = $query->newQuery();
        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('booking-table')

            ->columns($this->getColumns())
            ->parameters([
                'dom' => "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>"
                    . "<'row'<'col-sm-12'tr>>"
                    . "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                'buttons' => ['csv', 'excel', 'pdf', 'print'],
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
            Column::make('id')->title('ID'),
            Column::make('title')->title('Titile'),
            Column::make('slug')->title('Slug'),
            Column::make('total')->title('Slider Item'),
            Column::make('is_active')->title('Status'),
            Column::make('action')->title('Actions'),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Booking_' . date('YmdHis');
    }
}
