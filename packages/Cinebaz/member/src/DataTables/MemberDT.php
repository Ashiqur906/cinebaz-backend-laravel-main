<?php

namespace Cinebaz\Member\DataTables;

use Cinebaz\Member\Models\Member;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Form;
use Illuminate\Http\Request;

class MemberDT extends DataTable
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
            ->addColumn('image', function (Member $data) {
                $button = '<img src="' . asset(count($data->images) > 0 ? 'storage/' . $data->images[0]->small : 'https://www.nicepng.com/png/full/514-5146455_premium-home-loan-icon-download-in-svg-png.png') . '" height="60px">';
                return $button;
            })
            ->addColumn('date_join', function (Member $data) {
                $button = date('dM, Y', strtotime($data->created_at));
                return $button;
            })

            ->addColumn('actions', function (Member $data) {
                $button = '<div class="btn-group btn-group-sm">';
                $button .= '<a href="' . asset('admin/member/profile?member_id=' . $data->id) . '"  class="btn btn-danger btn-flat" target="_blank"><i class="las la-globe"></i></a>';
                // $button .= '<a href="' . route('admin.media.delete', $data->id) . '" class="btn btn-primary btn-flat"><i class="las la-trash"></i></a>';
                $button .= '</div>';
                return $button;
            })

            ->rawColumns(['image', 'date_join', 'actions']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \Luova\Booking\Models\Booking $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Member $model, Request $request)
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

            Column::make('id')->title('No'),
            Column::make('image')->title('Image'),
            Column::make('name')->title('Name'),
            Column::make('email')->title('Email'),
            Column::make('phone')->title('Phone'),
            Column::make('gender')->title('Gender'),
            Column::make('date_join')->title('Date of join'),
            Column::make('actions')->title('Actions'),

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
