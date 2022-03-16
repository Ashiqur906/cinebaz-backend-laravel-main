<?php

namespace Cinebaz\Banner\DataTables;

use Cinebaz\Banner\Models\SliderDetail;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Form;
use Illuminate\Http\Request;

class SliderDetailDT extends DataTable
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
            ->addColumn('title', function (SliderDetail $data) {
                if(isset($data->title)){
                    return $data->title;
                }elseif(isset($data->Bannermedia)){
                    return $data->Bannermedia->title_en;
                }

            })
            ->addColumn('type', function (SliderDetail $data) {
                if($data->media_id == null){
                    return '<button type="button" class="edit btn btn-info btn-sm">Custom</button>';
                }else{
                    return '<button type="button" class="edit btn btn-dark btn-sm">Media</button>';
                }

            })
            ->addColumn('image', function (SliderDetail $data) {

                if(isset($data->getImage->small)){
                    return '<img src="'.asset('storage/'.$data->getImage->small).'" class="img-fluid" style="width: 100px;"/>';

                }
                elseif(isset($data->Bannermedia)){
                    return '<img src="'.asset('storage/'.$data->Bannermedia->featuredL->full).'" class="img-fluid" style="width: 100px;"/>';
                }
            })
            ->addColumn('status', function (SliderDetail $data) {
                if ($data->is_active == 'Yes') {
                    return '<button type="button" class="edit btn btn-success btn-sm">Active</button>';
                } else {
                    return '<button type="button" class="edit btn btn-danger btn-sm">Inactive</button>';
                }
            })

            ->addColumn('action', function (SliderDetail $data) {
                $button = '<div class="btn-group btn-group-sm">';
                // $button .= '<a href="' . route('admin.slider.details', $data->id) . '"  class="btn btn-success btn-flat" ><i class="las la-eye"></i></a>';
                $button .= '<a href="' . route('admin.slider.details.edit', $data->id) . '" class="btn btn-info btn-flat"><i class="las la-pen"></i></a>';
                $button .= '</div>';
                return $button;
            })
            ->rawColumns(['status', 'action', 'image', 'type']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \Luova\Booking\Models\Booking $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SliderDetail $model, Request $request)
    {

        $query = $model->where('slider_id',$request->id);
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
            Column::make('title')->title('Title'),
            Column::make('type')->title('Type'),
            Column::make('image')->title('Image'),


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
