<?php

namespace App\Exports;

use App\Models\history;
use App\Models\Bulk;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class BulkExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Owner',
            'Started Date',
            'Ended Date',
            'Participants Joined',
           
        ];
    }
    public function __construct(int $room_id)
    {
        $this->room_id = $room_id;
    }

    public function collection()
    {
        $history  =   history::join('rooms','rooms.id','histories.room_id')
        ->join('events','events.id','histories.event_id')
        ->join('users','users.id','histories.user_id')
        ->where('rooms.id',$this->room_id)
        ->select('users.name','histories.start_date','histories.end_date','histories.nb_participants')
        ->orderBy('histories.end_date', 'DESC')->get();
        return $history;
    }
}
