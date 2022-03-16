<?php

namespace Cinebaz\Seo\DataTables;

use Cinebaz\Seo\Models\Seo;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Form;
use Illuminate\Http\Request;

class SeoDT extends DataTable
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
            ->addColumn('meta_image', function (Seo $data) {
                if ($data->featuredL) {
                    $button = '<img src="' . url($data->meta_image) . '" height="60px">';
                } else {
                    $button = '';
                }
                return $button;
            })
            ->addColumn('actions', function (Seo $data) {

                $button = '<div class="btn-group btn-group-sm">';
                $button .= '<a href="' . asset('details/' . $data->id) . '"  class="btn btn-success btn-flat" target="_blank"><i class="las la-eye"></i></a>';
                $button .= '<a href="' . route('admin.seo.edit', $data->id) . '" class="btn btn-info btn-flat"><i class="las la-pen"></i></a>';
                $button .= '<a href="' . asset($data->canonical_tag) . '"  class="btn btn-danger btn-flat" target="_blank"><i class="las la-globe"></i></a>';
                // $button .= '<a href="' . route('admin.media.delete', $data->id) . '" class="btn btn-primary btn-flat"><i class="las la-trash"></i></a>';
                $button .= '</div>';
                return $button;
            })

            ->rawColumns(['actions', 'meta_image']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \Luova\Booking\Models\Booking $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Seo $model, Request $request)
    {



        $query = $model;
        if ($request->from_date) {

            $startDate = date('Y-m-d', strtotime($request->from_date));
            $query = $query->whereDate('created_at', '>=', $startDate);
        }
        if ($request->to_date) {
            $endDate = date('Y-m-d', strtotime($request->to_date));
            $query = $query->whereDate('created_at', '<=', $endDate);
        }
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

            Column::make('id')->title('ID'),
            Column::make('title')->title('Title'),
            Column::make('meta_title')->title('Meta Title'),
            Column::make('meta_description')->title('Description'),
            Column::make('meta_keywords')->title('Keywords'),
            Column::make('meta_image')->title('Image'),
            Column::make('actions')->title('Actions'),

        ];

        // 'meta_title', 'seoable_id', 'seoable_type', 'meta_description', 'meta_keywords', 'canonical_tag', 'meta_type', 'meta_image',
        // 'remarks', 'sort_by', 'is_active', 'create_by', 'modified_by'
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
