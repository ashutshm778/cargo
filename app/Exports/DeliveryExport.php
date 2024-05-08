<?php

namespace  App\Exports;



use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;

class DeliveryExport implements FromCollection, WithMapping, WithHeadings
{
    protected $bookings;

    public function __construct($bookings)
    {
        $this->bookings = $bookings;
    }

    public function collection()
    {
        return Booking::whereIn('id', $this->bookings)->with(['branch_from','branch_to'])->get();
    }

    public function headings(): array
    {
        return [
            'tracking_code',
            'bill_no',
            'consignor',
            'consignee',
            'from',
            'to',
            'date',
            'assigned'
        ];
    }

    /**
    * @var Product $product
    */
    public function map($data): array
    {
        $is_assign='no';
        if(!empty($data->assign_to)){
            $is_assign='yes';
        }
        return [

            $data->tracking_code,
            $data->bill_no,
            $data->consignor,
            $data->consignee,
            $data->branch_from->name,
            $data->branch_to->name,
            $data->date,
            $is_assign,
        ];


    }
}
