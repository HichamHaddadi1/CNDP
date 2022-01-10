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
use Illuminate\Support\Facades\Validator as FacadesValidator;

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
    public function eventsToArray($events)
    {
        $eventsArray=[];
       
          foreach($events as $event)
        {
             if ($event->id_user == Auth::user()->id && $event->isVerified == 'Verified')
              {
            
            $data=[
                'title' => $event->event_theme,
                'start' => $event->starting_at,
                'end'   => $event->ending_at,
                'id_user' =>$event->id_user, 
                'id_room' =>$event->id_room
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
            if ($event->isVerified == 'Verified' )
            {
            $data=[
                'title' => $event->event_theme,
                'start' => $event->starting_at,
                'end'   => $event->ending_at,
                'id_user' =>$event->id_user,
                'id_room' =>$event->id_room,
                'user' => User::where('id' , '=' , $event->id_user)->get(),
                'isVerified' =>$event->isVerified
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
            'event_theme' => 'required',
            'event_desc' => 'required|max:120',
            'starting_at' => 'required',
            'ending_at' => 'required | after_or_equal:starting_at' 
            
        ]);
        
             $event = new Event([
           
            'event_theme' => $request->get('event_theme'),
            'event_desc' => $request->get('event_desc'),
            'starting_at' => Carbon::parse($request->get('starting_at'))->format('Y-m-d G:i'),
            'ending_at' => Carbon::parse($request->get('ending_at'))->format('Y-m-d G:i'),
            'id_room' => $request->get('id_room'),
            'id_user' => Auth::user()->id
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
        
        $data = DB::table('events')->get();
        //  $name = DB::table('users')->select('user_name')->where('id_user','=',$data->id_user);
        $events = DB::table('events')->orderByRaw('created_at DESC')->paginate(10);
        $rooms = Room::all();
        $rooms_count = $rooms->count();
        //dd($events);
         return view('streamers.events' , compact('events' , 'rooms' ,'rooms_count'));
         
    }

    public function search_event_streamer()
    {
        $search = request()->input('search');

        // Search in the title and body columns from the posts table
            $events = Event::query()
            ->where('event_theme', 'LIKE', "%{$search}%")
            ->orWhere('event_desc' , 'LIKE' ,"%{$search}%")
            ->paginate(10);
            $rooms = Room::all();
        // Return the search view with the resluts compacted
            return view('streamers.events', compact('events' , 'rooms'));
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
        $validator = FacadesValidator::make(request()->all(), [
            'room_nameupdate' => 'required',
            'max_viewersupdate' => 'required',
            'viewer_pwupdate' => 'required',
            'room_descUpdate' => 'required||max:300' ,
            'room_id' => 'required'
        ]);

        if ($validator->passes()) {
            DB::table('rooms')
            ->where('id', $request->get('room_id'))
            ->update([
                      'room_name' => $request->get('room_nameupdate'),
                      'max_viewers' =>$request->get('max_viewersupdate'),
                      'viewer_pw' =>$request->get('viewer_pwupdate'),
                      'room_desc'=>$request->get('room_descUpdate'),
                     
        ]);
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
}
