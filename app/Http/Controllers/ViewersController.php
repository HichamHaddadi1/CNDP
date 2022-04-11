<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\EventsNotification;
use App\Mail\RoomVerification;
use App\Models\Tickit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class ViewersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function StreamsEvents()
    {
       $users_rooms= DB::table('users')
       ->Join('rooms', 'users.id', '=', 'rooms.id_user')
       ->join('events','rooms.id','=','events.id_room')
       ->select('users.*','rooms.*','events.*')
       ->get();
     
       return view('Viewer.viewer_events',compact('users_rooms'));
    }

    public function contact()
    {
        return view('Viewer.viewer_contact_us');
    }
    public function home()
    {
       $events= DB::table('users')
       ->Join('rooms', 'users.id', '=', 'rooms.id_user')
       ->join('events','rooms.id','=','events.id_room')
       ->select('users.*','rooms.*','events.*')
       ->orderByDesc('events.event_statue')
       ->get();
      
       return view('Viewer.viewer_home',compact('events'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function schedule()
    {
        $user = User::where('role' , '=', 2)->get();
        return view('Viewer.viewer_schedule' , compact('user'));
    }
    public function join_us()
    {
        return view('Viewer.join_us');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function applyForEvent($room_id, $event_id)
    {
        $room           =       Room::find($room_id);
        $event          =       Event::find($event_id);
        $max_viewers    =       Event::where('id',$event_id)->first()->max_viewers;
        //    max_viewers 
       $tickits = Tickit::where('room_id',$room_id);
       $tickitsCount = $tickits->count();
       
        /*Preventing multi applying*/
        $multi_apply     =   Tickit::where('user_id',Auth::user()->id)
                                    ->where('room_id',$room_id)
                                    ->where('event_id',$event_id)
                                    ->get();
        $multiCounter    =   $multi_apply->count();
        if($multiCounter>=1)
        {
         return response()->json(['status' => 0, 'message' => "you are already applied for this Seminar"]);
        }
        /*********************************************************/
        else if($max_viewers == $tickitsCount)
        {
        return response()->json(['status' => 2, 'message' => "this Simenar is full "]);
        }	
        $details = [
            'subject'    => 'Seminarist : ',
            'greeting'   => 'Hello ' .auth()->user()->name  ,
            'message'    => '' ,
            'event_name' => 'Seminar Theme :'. $event->event_theme,
            'event_pw'   => 'Password :'.$room->viewer_pw,
            'actionUrl' => route('join',['id'=>$event->id_room ,'event_id'=>$event->id,'_id'=>Crypt::encrypt('$event->id')])
            ];
       
        $tickit=new Tickit([
            'user_id'  => Auth::user()->id,
            'room_id'  => $room_id,
            'event_id' => $event_id
        ]);
       
        Mail::to(auth()->user()->email)->send(new EventsNotification($details));
        $tickit->save();
        return response()->json(['status' => 1, 'message' => "success"]);
    }

    public function applyCheck($room_id,$event_id)
    {
        $multi_apply     =   Tickit::where('user_id',Auth::user()->id)
                                   ->where('room_id',$room_id)
                                   ->where('event_id',$event_id)->get();

        $multiCounter    =   $multi_apply->count();
        //dd($multi_apply);
        if($multiCounter==1)
        {
         return response()->json(['status' => 0, 'message' => "you are already applied for this Seminar"]);
        }
        return response()->json(['status' => 1, 'message' => "not there"]);
    }
}
