<?php

namespace App\Http\Controllers;

use App\Exports\BulkExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class ImportExportController extends Controller
{
    //

    public function exportRoomData($id_room){

        return Excel::download(new BulkExport($id_room), 'room_history.xlsx');
        
    }
}
