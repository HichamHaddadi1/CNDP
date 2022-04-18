<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Room;
use App\Models\User;
use App\Models\Event;
use Nette\Utils\Json;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\ViewersController;
use App\Models\Tickit;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventsNotification;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param int $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->eventsToArray(Event::all());

    }
    public function adminEvents()
    {

        return $this->eventsToArrayAdmin(Event::all());
    }
    public function userEventsApplied()
    {
     $events= Db::table('events')->join('tickits','tickits.event_id','events.id')
     ->where('tickits.user_id',auth()->user()->id)
     ->get();
     
        return $this->AppliedeventsToArray($events);
    }

    public function AppliedeventsToArray($events)
    {
        $eventsArray=[];
       
          foreach($events as $event)
        {
            $color="#444";
           
            //dd($event->ending_at > Carbon::now());
            if($event->ending_at > Carbon::now())
            {
                $color="#007bff";
            }
            $data=[
                'title' => $event->event_theme,
                'start' => $event->starting_at,
                'end'   => $event->ending_at,
                'id_user' =>$event->id_user,
                'id_room' =>$event->id_room,
                'user' => User::where('id' , '=' , $event->id_user)->get(),
                'isVerified' =>$event->isVerified,
                'id_event' => $event->event_id,
                'color' =>$color
            ];
           array_push($eventsArray,$data);
           
        }

        return response()->json($eventsArray);


    }
    public function eventsToArray($events)
    {
        $eventsArray=[];

          foreach($events as $event)
        {
            $color="#444";
            //dd($event->ending_at > Carbon::now());
            if($event->ending_at < Carbon::now())
            {
                $color="#007bff";
            }
             if ($event->id_user == Auth::user()->id && $event->isVerified == 'Verified')
              {

            $data=[
                'title' => $event->event_theme,
                'start' => $event->starting_at,
                'end'   => $event->ending_at,
                'id_user' =>$event->id_user,
                'id_room' =>$event->id_room,
                'id_event' => $event->id,
                'color' => $color
            ];
           array_push($eventsArray,$data);
            }
        }

        return response()->json($eventsArray);


    }

    public function eventsToArrayAdmin($events)
    {
        $eventsArray=[];
        // dd($user);
          foreach($events as $event)
        {
            $color="#444";
            //dd($event->ending_at > Carbon::now());
            if($event->ending_at > Carbon::now())
            {
                $color="#007bff";
            }
            if ($event->isVerified == 'Verified' )
            {
            $data=[
                'title' => $event->event_theme,
                'start' => $event->starting_at,
                'end'   => $event->ending_at,
                'id_user' =>$event->id_user,
                'id_room' =>$event->id_room,
                'user' => User::where('id' , '=' , $event->id_user)->get(),
                'isVerified' =>$event->isVerified,
                'id_event' => $event->id,
                'color'  => $color
            ];
           array_push($eventsArray,$data);
        }
        }

        return response()->json($eventsArray);


    }
    // Another test for fullCalendar
    public function showEvents()

    {

        if(request()->ajax())
        {
            $start = (!empty($_GET["starting_at"])) ? ($_GET["starting_at"]) : ('');
            $end =   (!empty($_GET["ending_at"])) ? ($_GET["ending_at"]) : ('');

            $data = Event::whereDate('starting_at', '>=', $start)->whereDate('ending_at',   '<=', $end)->get(['id' , 'title','starting_at', 'ending_at' , 'id_room' , 'id_user' ]);
            return Response::json($data);
        }




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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // //dd($request);
        $this->validate($request,[
            'event_theme'    => 'required',
            'event_desc'     => 'required|max:300',
            'starting_at'    => 'required',
            'max_viewers'    => 'required',
            'ending_at'      => 'required | after_or_equal:starting_at'

        ]);

        $event = new Event([
            'event_theme'       =>      $request->get('event_theme'),
            'event_desc'        =>      $request->get('event_desc'),
            'starting_at'       =>      Carbon::parse($request->get('starting_at'))->format('Y-m-d G:i'),
            'ending_at'         =>      Carbon::parse($request->get('ending_at'))->format('Y-m-d G:i'),
            'id_room'           =>      $request->get('id_room'),
            'id_user'           =>      Auth::user()->id,
            'max_viewers'       =>      $request->get('max_viewers')
        ]);
        // dd($event);
        $event->save();
        return redirect()->route('streamers.events' )->with('success', __('Successfully Added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $roomcheck=Room::where('id_user',Auth::user()->id)->get();
        $data = DB::table('events')->get();
        //  $name = DB::table('users')->select('user_name')->where('id_user','=',$data->id_user);
        $events =DB::table('events')
        ->where('ending_at','>=',Carbon::now()->format('Y-m-d G:i'))
        ->where('id_user','=',Auth::user()->id)
        ->paginate(10);
        $oldevents = DB::table('events')
        ->where('ending_at','<=',Carbon::now()->format('Y-m-d G:i'))
        ->where('id_user','=',Auth::user()->id)
        ->paginate(10);
        $rooms = Room::all();
        $rooms_count = $rooms->count();
        $viewers_pw =Room::where('id_user',Auth::user()->id)->first()->viewer_pw;
        //dd($viewers_pw);
         return view('streamers.events' , compact('events' , 'rooms' ,'rooms_count','oldevents','roomcheck','viewers_pw'));

    }

    public function search_event_streamer()
    {
        $search = request()->input('search');
            $oldevents = DB::table('events')
            ->where('ending_at','<=',Carbon::now()->format('Y-m-d G:i'))
            ->where('id_user','=',Auth::user()->id)
            ->paginate(10);
        // Search in the title and body columns from the posts table
        if( $search == null)
        {
            $events =DB::table('events')
            ->where('ending_at','>=',Carbon::now()->format('Y-m-d G:i'))
            ->where('id_user','=',Auth::user()->id)
            ->paginate(10);
        }
        else{
            $events = Event::query()
            ->where('event_theme', 'LIKE', "%{$search}%")
            ->orWhere('event_desc' , 'LIKE' ,"%{$search}%")
            ->where('id_user','=',Auth::user()->id)
            ->paginate(10);
            $rooms = Room::all();
        }
        $rooms = Room::all();
        $rooms_count = $rooms->count();
        $roomcheck=Room::where('id_user',Auth::user()->id)->get();
        $viewers_pw =Room::where('id_user',Auth::user()->id)->first()->viewer_pw;
     
        // Return the search view with the resluts compacted
            return view('streamers.events', compact('events' , 'rooms','oldevents','rooms_count','roomcheck','viewers_pw'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return response()->json(['etat'=>true , 'event'=>$event]);
    }
    public function roomedit($id)
    {
        $room = Room::find($id);
        return response()->json(['etat'=>true , 'room'=>$room]);
    }
    public function updateRoom(Request $request)
    {
        $rules = collect([
            'room_nameupdate'    =>  'required',
            //'max_viewersupdate'  =>  'required',
            'room_descUpdate'    =>  'required||max:300' ,
            'room_id'            =>  'required',
            'viewer_pwupdate'    =>  'required',
            //'file_uploadUpdate'  =>  'required|mimes:pdf',
        ]);
        if($request->input('viewer_password') == 'with_password') {
            $rules->put('viewer_pwupdate', 'required');
        }
        $validator = FacadesValidator::make(request()->all(), $rules->toArray());
        $filenameglobe="";
        if($request->hasFile('file_uploadUpdate') ) {
            // dd($request->File('file_uploadUpdate'));
            $file = $request->file('file_uploadUpdate');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/images/', $filename);
            $filenameglobe=$filename;
           }
        if ($validator->passes()) {
//            DB::table('rooms')
//            ->where('id', $request->get('room_id'))
//            ->update([
//                      'room_name'     =>  $request->get('room_nameupdate'),
//                      'max_viewers'   =>  $request->get('max_viewersupdate'),
//                      'viewer_pw'     =>  $request->get('viewer_pwupdate'),
//                      'room_desc'     =>  $request->get('room_descUpdate'),
//                      'presentations' =>  $filenameglobe,
//        ]);
            $room = Room::find($request->get('room_id'));
            $room->room_name = $request->get('room_nameupdate');
            $room->room_desc = $request->get('room_descUpdate');
            $room->max_viewers =111;
            $room->viewer_pw = $request->get('viewer_pwupdate');
            $room->presentations = $filenameglobe;

            if($request->input('viewer_password') == 'with_password'){
//                    dd($request->input('viewer_pw'),1);
                $room->viewer_pw = $request->get('viewer_pwupdate');
            }elseif($request->input('viewer_password') == 'without_password'){
                $room->viewer_pw = null;
            }
            $room->save();

        return response()->json(['status' => 1, 'message' => "AZERTYUIOP"]);

        } else {
            return response()->json(['status' => 0, 'errors' => $validator->errors()->toArray()]);
        }



    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request ,$id)
    {
        $this->validate($request,[
            'event_themeUpdate'      =>     'required',
            'starting_at_Update'     =>     'required',
            'ending_at_Update'       =>     'required|after_or_equal:starting_at_Update',
            'max_viewersUpdate'      =>     'required',
            'event_desc_Update'      =>     'required ',
            'id_room'                =>     'required'

        ]);
        DB::table('events')
        ->where('id', $id)
        ->update([
                  'event_theme' => $request->get('event_themeUpdate'),
                  'starting_at' =>Carbon::parse($request->get('starting_at_Update'))->format('Y-m-d G:i'),
                  'ending_at' =>Carbon::parse($request->get('ending_at_Update'))->format('Y-m-d G:i'),
                  'event_desc'=>$request->get('event_desc_Update'),
                  'id_user' =>Auth::user()->id,
                  'id_room' =>$request->get('id_room'),
                  'max_viewers' =>$request->get('max_viewersUpdate') 
    ]);

   
                $tickets =  DB::table('tickits')
                ->join('users', 'tickits.user_id', '=', 'users.id')
                ->join('events', 'tickits.event_id', '=', 'events.id')
                ->join('rooms','tickits.room_id','=','rooms.id')
                ->select('users.*','events.*','rooms.viewer_pw')
                ->where('tickits.event_id','=',$id)
                ->get();
        //dd($tickets);
      foreach($tickets as $t)
      {
            $details = [
                'subject'    => 'Seminarist Update : ',
                'greeting'   => 'Hello ' .$t->name  ,
                'message'    => '' ,
                'event_name' => 'Seminar Theme :'. $t->event_theme,
                'event_pw'   => 'Password :'.$t->viewer_pw,
                'actionUrl'  => route('join',['id'=>$t->id_room ,'event_id'=>$id,'_id'=>Crypt::encrypt('$event->id')])
                ];
            Mail::to($t->email)->send(new EventsNotification($details));
    }










    return back()->with('success', __('Successfully Updated'));
    }


    public function admin_eventUpdate(Request $request ,$id)
    {
        $event = Event::where('id' , $id);
        // dd($event);
        DB::table('events')
        ->where('id', $id)
        ->update([
                  'event_theme' => $request->get('event_themeUpdate'),
                  'starting_at' =>Carbon::parse($request->get('starting_at_Update'))->format('Y-m-d G:i'),
                  'ending_at' =>Carbon::parse($request->get('ending_at_Update'))->format('Y-m-d G:i'),
                  'event_desc'=>$request->get('event_desc_Update'),
                  'id_user' =>Auth::user()->id,
                  'id_room' =>$request->get('id_room')
    ]);
    return back()->with('success', __('Successfully Updated'));
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        $event->delete();
        return back()->with('success', __('Successfully Deleted'));
    }

    public function getlistParticipants($event_id)
    {
        $p=Db::table('users')->join('tickits','users.id','tickits.user_id')->where('tickits.event_id',$event_id)->get();
        //dd($p);
        return response()->json($p);
    }
}
