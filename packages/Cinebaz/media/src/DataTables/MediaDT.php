<?php

namespace Cinebaz\Media\DataTables;

use Cinebaz\Media\Models\Media;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Form;
use Illuminate\Http\Request;

class MediaDT extends DataTable
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
            ->addColumn('type', function (Media $data) {
                if ($data->video_nature_id == '1') {
                    return 'Movie';
                } elseif ($data->video_nature_id == '2') {
                    return 'TV-Show';
                } else {
                    return '';
                }
            })
            ->addColumn('status', function (Media $data) {
                if ($data->is_active == 'Yes') {
                    return '<button type="button" class="edit btn btn-success btn-sm">Active</button>';
                } else {
                    return '<button type="button" class="edit btn btn-danger btn-sm">Inactive</button>';
                }
            })
            ->addColumn('thumbnil', function (Media $data) {
                if ($data->featuredL) {
                    $button = '<img src="' . asset('storage/' . $data->featuredL->small) . '" height="60px">';
                } else {
                    $button = '';
                }
                return $button;
            })
            ->addColumn('t_view', function (Media $data) {
                return $data->getViewCount()->distinct()->count();
            })

            ->addColumn('tu_view', function (Media $data) {
                return $data->getViewCount()->distinct()->count('member_id');
            })
            ->addColumn('action', function (Media $data) {
                $button = '<div class="btn-group btn-group-sm">';
                $button .= '<a href="' . route('admin.media.details', $data->id) . '"  class="btn btn-success btn-flat" ><i class="las la-eye"></i></a>';
                $button .= '<a href="' . asset('details/' . $data->slug) . '"  class="btn btn-danger btn-flat" target="_blank"><i class="las la-globe"></i></a>';
                $button .= '<a href="' . route('admin.media.edit', $data->id) . '" class="btn btn-info btn-flat"><i class="las la-pen"></i></a>';
                $button .= '<a href="' . route('admin.media.delete', $data->id) . '" class="btn btn-primary btn-flat"><i class="las la-trash"></i></a>';
                $button .= '</div>';
                return $button;
            })
            ->rawColumns(['thumbnil', 'status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \Luova\Booking\Models\Booking $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Media $model, Request $request)
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

            Column::make('id')->title('No'),
            Column::make('title_en')->title('Title'),
            Column::make('slug')->title('Slug'),
            Column::make('regular_price')->title('Regular Price'),
            Column::make('discount_price')->title('Discount Price'),
            Column::make('t_view')->title('Total view'),
            Column::make('tu_view')->title('Total Unique view'),
            Column::make('type')->title('Type'),
            Column::make('status')->title('Status'),
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
