<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Room;
use App\Models\Tickit;
use App\Models\User;
use App\Providers\EventServiceProvider;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use JoisarJignesh\Bigbluebutton\Bigbluebutton as BigbluebuttonBigbluebutton;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;
use Illuminate\Support\Facades\Crypt;
class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     *
     */
    function streamer_recordings()
    {
        $room = Room::where('id_user' , '=' , Auth::user()->id)->first();
        // dd($room->id);

            if ($room) {
                $recs = \Bigbluebutton::getRecordings([
                    'meetingID' => $room->id.'cmp',
                    'state' => 'published'
                ]);

                // dd(date('c' , strtotime($recs[0]['startTime'])));
                return view('streamers.recordings', compact(['recs' ,'room' ]));
            }
            else{
                $recs = [];
                return view('streamers.recordings', compact(['recs' ,'room' ]));
            }




       $recs=[];
        // dd($event->event_theme);
        // dd($room->id , Auth::user()->id);
        if($room!=null)
        {
        $recs = \Bigbluebutton::getRecordings([
            'meetingID' => $room->id.'cmp',
            'state' => 'published'

        ]);
        // dd($recs[3]['metadata']['meetingName']);
            return view('streamers.recordings', compact('recs','room' ));
        }

        return view('streamers.recordings',compact('recs'));
    }
    function admin_recordings()
    {
        $events = Event::where('isVerified', '=', 'Pending')->get();

        $pending_events=$events->count();
        $room = Room::all();
       if ($room) {
          for ($i=0; $i <count($room) ; $i++) {

             $recs = \Bigbluebutton::getRecordings([
                'meetingID' => $room[$i]->id.'cmp',
                'state' => 'published',
            ]);
            $pending_rooms = Room::where('verified', '<=', 'pending')->get();
            $pending = $pending_rooms->count();
            $s_requests = User::where('status' , '=' , 'pending')->get();
            $streamers_requests = $s_requests->count();
            // dd($recs);
            return view('admin_recordings', compact(['recs','room', 'pending' ,'streamers_requests' , 'pending_events']));
       }

    }
            $recs = [];
            $pending_rooms = Room::where('verified', '<=', 'pending')->get();
            $pending = $pending_rooms->count();
            $s_requests = User::where('status' , '=' , 'pending')->get();
            $streamers_requests = $s_requests->count();

            return view('admin_recordings', compact(['recs','room', 'pending' , 'streamers_requests' , 'pending_events' ]));

    }

    public function deleteRecordings($recID)
    {
        \Bigbluebutton::deleteRecordings([

            'recordID' => $recID ,

        ]);
        return back()->with('success', __('Successfully Deleted '));
    }

    public function store(Request $request)
    {
        $rooms_c=ROOM::where('id_user' , Auth::user()->id);
        $c=$rooms_c->count();

        // foreach($rooms_c as $r)
        // {
        //     if($r->id_user==Auth::user()->id)
        //     {
        //         $c++;
        //     }
        // }
            $this->validate($request,[
                'room_name' => 'required',
                'room_desc' => 'required',
                //'max_viewers' => 'required',
                'viewer_pw' => 'required',
                'file_upload' => 'required'
            ]);
            if($request->hasFile('file_upload') ) {
                // dd($request->File('file_uploadUpdate'));
                $file = $request->file('file_upload');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/images/', $filename);
                $filenameglobe=$filename;
               }
            if($c==0)
            {
            $room = new Room([
                'room_name'     =>  $request->get('room_name'),
                'room_desc'     =>  $request->get('room_desc'),
                'max_viewers'   =>  111,
                'moderator_pw'  =>  Auth::user()->email,
                'viewer_pw'     =>  $request->get('viewer_pw'),
                'id_user'       =>  Auth::user()->id,
                'presentations' => $filenameglobe
            ]);
                $room->save();
                return redirect()->route('streamers.rooms', compact('c'))->with('success', __('Successfully Created '));
            }
            elseif($c>0)
            return redirect()->route('streamers.rooms', compact('c'))->with('error', __('You have Reached your Limits(1/1 Rooms)'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $rooms_c=Room::where('id_user' , Auth::user()->id);
        $c=$rooms_c->count();

        //$LoggedU = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        //  $name = DB::table('users')->select('user_name')->where('id_user','=',$data->id_user);
        $rooms = Room::paginate(100);
        //return view('streamers.rooms' , compact('rooms' , 'data'));
        return view('streamers.rooms' , ['rooms'=> $rooms,'c'=>$c]);
    }
    public function adminRooms()
    {
        $pending_rooms = Room::where('verified', '<=', 'pending')->get();
        $pending = $pending_rooms->count();
        $rooms = Room::paginate(10);
        $s_requests = User::where('status' , '=' , 'pending')->get();
        $streamers_requests = $s_requests->count();
        $events = Event::where('isVerified', '=', 'Pending')->get();

        $pending_events=$events->count();
        return view('admin_rooms',compact(['rooms' , 'pending' , 'streamers_requests' , 'pending_events' ]));
    }


    public function joinMeeting(Request $request, $id,$event_id)
    {

        $this->validate($request,[
            'txtName' => 'required',
            'code' => 'required'
        ]);
        $room = Room::findOrFail($id); 
      //dd($_id);
        /*Preventing multi applying*/
        $multi_apply     =   Tickit::where('user_id',Auth::user()->id)
        ->where('room_id',$id)
        ->where('event_id',$event_id)
        ->get();
            $multiCounter    =   $multi_apply->count();
            if($multiCounter==0)
            {
            return back()->with('errorsUnique' , 'you have to apply to this seminar before trying to join');
            }






        
        $url = \Bigbluebutton::join([
            'meetingID' => $room->id.'cmp',
            'userName' => request()->get('txtName'),
            'password' => $room->id.'cmp'//which user role want to join set password here
        ]);
        //dd($room->max_viewers);
        if($room->viewer_pw != request()->get('code'))
            {
                return back()->with('errorsUnique' , 'Access code is wrong , try again !');
            }
            if (Bigbluebutton::isMeetingRunning($room->id.'cmp') == false)
            {
             return back()->with('errorsUnique' , 'Meeting not started yet , wait until a moderator launch the event');
            }

        //     $meetingInfo=\Bigbluebutton::getMeetingInfo([
        //         'meetingID' => $room->id.'cmp',
        //          //moderator password set here
        //     ]);
        //     $collection = collect($meetingInfo['attendees']['attendee']);
        //     $max_counter=$collection->count()-1 ;
        //   //dd($meetingInfo['attendees']['attendee']);
        //     if($collection->count()-1 >= $room->max_viewers)
        //     {
        //         return back()->with('errorsUnique' , 'the Seminars has reached the max viewers Count '.$max_counter);
        //     }
            
                return redirect()->to($url);
            


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

    }


    public function search_room(Request $request)
    {
        $search = $request->input('search');

    // Search in the title and body columns from the posts table
        $rooms = Room::query()
        ->where('room_name', 'LIKE', "%{$search}%")
        ->orWhere('room_desc' , 'LIKE' ,"%{$search}%")
        ->paginate(10);

    // Return the search view with the resluts compacted
        return view('streamers.rooms', compact('rooms'));

    }

    public function search_room_admin(Request $request)
    {
        $search = $request->input('search');


    // Search in the title and body columns from the posts table
        $rooms = Room::query()
        ->where('room_name', 'LIKE', "%{$search}%")
        ->orWhere('room_desc' , 'LIKE' ,"%{$search}%")
        ->paginate(10);
        $pending_rooms = Room::where('verified', '<=', 'pending' , 'AND' , 'verified', '!=', 'denied')->get();
        $pending = $pending_rooms->count();
        $s_requests = User::where('status' , '=' , 'pending')->get();
        $streamers_requests = $s_requests->count();
    // Return the search view with the resluts compacted
        return view('admin_rooms', compact(['rooms' , 'pending','streamers_requests']));

    }



    public function startMeeting($id)
    {
        
        $room = Room::findOrFail($id);
        // $path = asset('presentations/main.pdf');
        $presentation=asset('uploads/images/'.$room->presentations);
        if(\Bigbluebutton::isMeetingRunning($room->id) == false){
        /***My Piece Of code that work on Workplace and not on Salle Complexe */
        $createMeeting = \Bigbluebutton::initCreateMeeting([
            'meetingName' => $room->room_name,//Auth::user()->name,
            'meetingID' => $room->id.'cmp',
            'moderatorPW' => Auth::user()->email, //moderator password set here
            'attendeePW' => $room->id.'cmp',
            'endCallbackUrl'  => route('dashboard'),
            'logoutUrl' => route('dashboard'),
            'record'=>true,
            'presentation' => [
                ['link' =>  $presentation, 'fileName' => $room->presentations]
            ],
            'moderatorOnlyMessage' => "<ul> <li>Share this link to invite other people: <a href='".(route('join',['id'=>$room->id ,'_id'=>Crypt::encrypt('$event->id')]))."' target='_blank'>".(route('join',['id'=>$room->id ,'_id'=>Crypt::encrypt('$event->id')]))."</a></li> "

        ]);


        \Bigbluebutton::create($createMeeting);

        $url =\Bigbluebutton::join([
            'meetingID' => $room->id.'cmp',
            'userName' => Auth::user()->name,
            'password' => Auth::user()->email //which user role want to join set password here
        ]);
        //dd($createMeeting);
        //here we start the meeting
        /*$url =\Bigbluebutton::start([
            'meetingID' => $room->id.'cmp',
            'moderatorPW' => Auth::user()->email, //moderator password set here
            'attendeePW' => $room->id.'cmp', //attendee password here
            'userName' => Auth::user()->name,//for join meeting
            'maxParticipants'=>$room->max_viewers,
            //'redirect' => false // only want to create and meeting and get join url then use this parameter
            /*****To be Added when Room is working  */
            //$salle->is_running=true;
            //$salle->save();
       /* ]);*/
       return redirect()->to($url);
    }

    }

    public function startMeetingEvent($id , $_id)
    {

        $room = Room::findOrFail($id);
        /*$path = asset('presentations/main.pdf');*/
        $event = Event::findOrFail($_id);
        $presentation=asset('uploads/images/'.$room->presentations);
        // dd($presentation);
        if(\Bigbluebutton::isMeetingRunning($room->id) == false){
        $createMeeting = \Bigbluebutton::initCreateMeeting([
            'userName' => Auth::user()->name,
            'meetingID' => $room->id.'cmp',
            'meetingName' => $event->event_theme,
            'moderatorPW' => Auth::user()->email, //moderator password set here
            'attendeePW' => $room->id.'cmp',
            'endCallbackUrl'  => route('dashboard', compact(['room' , 'event'])),
            'logoutUrl' => route('dashboard'),
            'record'=>true,
            'presentation' => [
                ['link' =>  $presentation, 'fileName' => $room->presentations]
            ],
            'moderatorOnlyMessage' => "<ul> <li>Share this link to invite other people: <a href='".(route('join',['id'=>$room->id ,'_id'=>Crypt::encrypt('$event->id')]))."' target='_blank'>".(route('join',['id'=>$room->id ,'_id'=>Crypt::encrypt('$event->id')]))."</a></li> "

        ]);

        \Bigbluebutton::create($createMeeting);

        //here we start the meeting
        $url =\Bigbluebutton::start([
            'meetingID' => $room->id.'cmp',
            'moderatorPW' => Auth::user()->email, //moderator password set here
            'attendeePW' => $room->id.'cmp', //attendee password here
            'userName' => Auth::user()->name,//for join meeting
            //'maxParticipants'=>$room->max_viewers,
        ]);
        // dd($url);
        $event->event_statue = 1;
        $event->update();


    }


    // dd();
        return redirect()->to($url);

             /**************Zineb test */

            //  $createMeeting = \Bigbluebutton::initCreateMeeting([
            //     'meetingID' => $room->id.'cmp',
            //     'meetingName' => Auth::user()->name,
            //     'attendeePW' => $room->viewer_pw,
            //     'moderatorPW' => Auth::user()->email,
            // ]);

            // \Bigbluebutton::create($createMeeting);

            // // return redirect()->to(
            // //     Bigbluebutton::join([
            // //        'meetingID' => $room->id.'cmp',
            // //        'userName' => Auth::user()->name,
            // //        'password' => Auth::user()->email //which user role want to join set password here
            // //     ])
            // //    );

            // $url = \Bigbluebutton::start([
            //     'meetingID' => $room->id,
            //     'moderatorPW' => Auth::user()->email, //moderator password set here
            //     'attendeePW' => $room->viewer_pw, //attendee password here
            //     'userName' => Auth::user()->name,//for join meeting
            //     'endCallbackUrl'  => route('streamers.rooms'),
            //     'logoutUrl' => route('streamers.rooms'),
            //     //'redirect' => false // only want to create and meeting and get join url then use this parameter
            // ]);
            //dd($url);

     //return redirect()->to($url);

    }
     /**
     * Remove the specified resource from storage.
     *
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);

        $room->delete();
        return back()->with('success', __('Successfully Deleted '));
    }
}
