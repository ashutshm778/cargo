<?php

namespace  App\Exports;



use App\Models\BookingLog;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BookingLogExport implements FromCollection, WithMapping, WithHeadings
{
    protected $bookings;

    public function __construct($bookings)
    {
        $this->bookings = $bookings;
    }

    public function collection()
    {
        return BookingLog::whereIn('id', $this->bookings)->with(['branch_data','booking_data'])->get();
    }

    public function headings(): array
    {
        return [
            'tracking_code',
            'booking_bill_no',
            'branch',
            'source',
            'status',
            'action',
            'description'
        ];
    }

    /**
    * @var Product $product
    */
    public function map($data): array
    {

        return [
            $data->tracking_code,
            $data->booking_data->bill_no,
            $data->branch_data->name,
            $data->source,
            $data->action,
            $data->status,
            $data->description,

        ];


    }
}
