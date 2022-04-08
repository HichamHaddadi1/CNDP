<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventsNotification;
use App\Models\Room;
use App\Models\User;
use App\Models\Event;
use App\Mail\ValidatedEvent;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;
use Illuminate\Support\Facades\Crypt;
class MainController extends Controller
{

/**This one is for landing page  */
    function index()
    {
        // $room = Room::all();

        // if (!$room->isEmpty()) {
        //  $room = Room::where('id_user' , '<=' , Auth::user()->id)->first();
        //     if (Bigbluebutton::isMeetingRunning($room->id.'cmp') == false) {
        //      Event::where('id_room','<=' , $room->id)->update(['event_statue' => 0]);
        //  }
            $rooms = Room::all();
            foreach ($rooms as $room) {
                if (Bigbluebutton::isMeetingRunning($room->id.'cmp') == false) {
                Event::where('id_room','<=' , $room->id)->update(['event_statue' => 0]);
                }
            }
        // }
        // foreach ($room as $key => $value) {
        //     # code...
        // }
        // if (Bigbluebutton::isMeetingRunning($room) == false) {
        //     Event::where('id_room','<=' , $room->id)->update(['event_statue' => 0]);
        // }
        $events= DB::table('users')
       ->Join('rooms', 'users.id', '=', 'rooms.id_user')
       ->join('events','rooms.id','=','events.id_room')
       ->select('users.*','rooms.*','events.*')
       ->get();
      $seminars= DB::table('users')
       ->Join('rooms', 'users.id', '=', 'rooms.id_user')
       ->join('events','rooms.id','=','events.id_room')
       ->select('users.*','rooms.*','events.*')
       ->where('events.isVerified','=','Verified')
       ->where('events.ending_at','>=',\Carbon\Carbon::now())
       ->get();
    //dd($seminars);
        return view('Viewer.viewer_home' , compact(['events','seminars']));
    }

/**this one for auth forms for a normal user  */
    function register_user()
    {
        //dd(url()->previous());
        return view('normal_users.userRegister');
    }
    function login_user()
    {
        return view('normal_users.userLogin');
    }

    function admin()
    {
        $s_requests = User::where('status' , '=' , 'pending')->get();
        $streamers_requests = $s_requests->count();
        $pending_rooms = Room::where('verified', '=', 'pending')->get();
        $pending = $pending_rooms->count();
        $events = Event::where('isVerified', '=', 'Pending')->get();

        $pending_events=$events->count();
        return view('admin_profile',compact(['data' , 'pending' , 'streamers_requests', 'pending_events']));
    }

    public function admin_streamer()
    {
        $streamers = User::where('status' , '<=' , 'Pending')
        ->paginate(10);
        $s_requests = User::where('status' , '=' , 'pending')->get();
        $streamers_requests = $s_requests->count();
        $pending_rooms = Room::where('verified', '=', 'pending')->get();
        $pending = $pending_rooms->count();
        $events = Event::where('isVerified', '=', 'Pending')->get();

        $pending_events=$events->count();
        return view('admin_streamer',compact(['streamers' , 'pending', 'pending_events'] , 'streamers_requests'));
    }

    public function admin_users()
    {
        $pending_rooms = Room::where('verified', '=', 'pending')->get();
        $pending = $pending_rooms->count();

        $s_requests = User::where('status' , '<=' , 'pending')->get();
        $streamers_requests = $s_requests->count();
        $events = Event::where('isVerified', '=', 'Pending')->get();

        $pending_events=$events->count();
        $all_users= DB::table('users')->paginate(10);
        return view('admin_users' , compact(['all_users' , 'pending', 'streamers_requests' , 'pending_events']));
    }

     function admin_streams()
    {
        $events = Event::all();
        $rooms = Room::all();
        $s_requests = User::where('status' , '=' , 'pending')->get();
        $streamers_requests = $s_requests->count();
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        $pending_rooms = Room::where('verified', '=', 'pending')->get();
        $pending = $pending_rooms->count();
        $events = Event::where('isVerified', '=', 'Pending')->get();

        $pending_events=$events->count();
        return view('admin_streams',compact(['data' , 'pending', 'events', 'rooms' , 'streamers_requests', 'pending_events']));
    }
    function admin_planning()
    {
        $pending_rooms = Room::where('verified', '=', 'pending')->get();
        $pending = $pending_rooms->count();
        $s_requests = User::where('status' , '=' , 'pending')->get();
        $streamers_requests = $s_requests->count();
        $events = Event::where('isVerified', '=', 'Pending')->get();

        $pending_events=$events->count();
         return view('admin_planning' , compact('pending' , 'streamers_requests','pending_events'));
    }
    function admin_rooms()
    {
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        $pending_rooms = Room::where('verified', '=', 'pending')->get();
        $pending = $pending_rooms->count();
        $s_requests = User::where('status' , '=' , 'pending')->get();
        $streamers_requests = $s_requests->count();
        $events = Event::where('isVerified', '=', 'Pending')->get();

        $pending_events=$events->count();
        return view('admin_rooms',compact(['data' , 'pending' , 'streamers_requests','pending_events']));
    }
     function admin_profile()
    {
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
        $pending_rooms = Room::where('verified', '=', 'pending')->get();
        $pending = $pending_rooms->count();
        $s_requests = User::where('status' , '=' , 'pending')->get();
        $streamers_requests = $s_requests->count();
        $events = Event::where('isVerified', '=', 'Pending')->get();

        $pending_events=$events->count();
        return view('admin_profile',compact(['data' , 'pending', 'streamers_requests','pending_events']));
    }

    function streamer_presentation()
    {


        return view('streamers.streamer_prasent');
    }
     function streamer_present_upload(Request $request)
     {

        $rooms=Room::where('id_user', '=' , Auth::user()->id)->first();

        //$r_count=$rooms->count();
        $request->validate([
            'file_upload'  =>  'required',
          ]);


       if($request->hasFile('file_upload') ) {
            $file = $request->file('file_upload');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;


            $file->move('uploads/images/', $filename);
            $rooms->update(['presentations' => $filename]);

          }

        return back()->with(['success'=>'successfully added']);


     }
    /*Streamer Part  */
     function streamer_planning()
    {
        $room = Room::where('id_user' , '<=' , Auth::user()->id)->first();



        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
         return view('streamers.planning',$data);
    }

     function streamer()
    {
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
         return view('streamer',$data);
    }
    function streamer_profile()
    {
         return view('streamers.profile');
    }
    function streamer_rooms()
    {
        //$LoggedU = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
         return view('streamers.rooms');
    }

    /**normal user  */
    function user_profile()
    {
        return view('normal_users.user_profile');
    }
    function user_events()
    {
        $events = Event::where('event_statue' ,'=' , 1)->get();
        return view('normal_users.user_events' , compact('events'));
    }
    /**End normal user  */
    /**this is for user joing meeting */


    function join_meeting($id ='',$event_id,$_id='')
    {
        // if (Auth::check())
        // {
        //     return view('user_join', compact('id'));
        // }

        // else
        // {
        //     // if(url('/').'/login' != url()->previous() && url('/').'/user/register' != url()->previous())
        //     // dd("join_meeting");
        //     Redirect::setIntendedUrl(route('join' , $id));
        //     return redirect()->route('login')->with('errorsUnique' , 'you must login to have access to the meeting');

        // }
        return view('user_join', compact('id','event_id','_id'));
    }
    /**End Join */
    function streamer_confirmation()
    {
        return view('streamer_confirmation');
    }

    function check(Request $request)
    {


            // if (Auth::user()->role == 1)
            // {
            //     return redirect()->intended(RouteServiceProvider::HOME);

            // }
            // else if(Auth::user()->role == 2 )
            // {

            // // return redirect()->intended(RouteServiceProvider::HOME);

            //     // return redirect()->route('streamer.profile');
            // }

            // else if(Auth::user()->role == 3)
            // {
            //     return redirect()->intended(RouteServiceProvider::HOME);

            // }
            // else if(Auth::user()->role == 4)
            // {
            //     return redirect()->intended(RouteServiceProvider::HOME);

            // }



    }
    /***updating avatar  */
    function update_avatar()
    {
        $user = Auth::user();
        // if (request()->hasFile('image')) {
        //     $filename = request()->image->getClientOriginalName();
        //     // request()->image->storeAs('images' , $user->id.'/'.$filename , 'public');
        //     request()->image->move('upload' , $filename );

        //     $user->update(['avatar' => $filename]);

        // }

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/', $filename);
            $image = $filename;
            $user->update(['avatar' => $image]);
        }

        return redirect()->back();
    }
    /**End Update Avatar */


    public function update_profile($id)
    {

        DB::table('users')
        ->where('id', $id)
        ->update([
            'name'      =>  request()->get('username'),
            'email'     =>  request()->get('email'),
            'fname'     =>  request()->get('fname'),
            'lname'     =>  request()->get('lname'),
            'password'  =>  Hash::make(request()->get('password'))
        ]);

    return back();
    }


    public function getpendingEvents()
    {
        $s_requests = User::where('status' , '=' , 'pending')->get();
        $streamers_requests = $s_requests->count();
        $pending_rooms = Room::where('verified', '=', 'pending')->get();
        $pending = $pending_rooms->count();

        $events = Event::where('isVerified', '=', 'Pending')->get();

        $pending_events=$events->count();
        return view('admin_events_req',compact(['events','pending','streamers_requests','pending_events']));
    }

    public function admin_verify_event( $id,$mode,Request $request)
    {
        $event = Event::find($id);
        $room = Room::where('id' , '=' , $event->id_room)->first();
        $user = User::where('id', '=', $event->id_user)->first();
        $emails = User::where('role' , '=' , 3)->get('email');
        // $emails = User::select('email')->get();
        // dd($emails);
        if($mode=='v')
        {
            $details = [
                'greeting' =>'Hello there' ,
                'subject' => 'Event Invitation',
                'message' => 'We are happy to let you know that there is an event "'.$event->event_theme .'" which will be on '.str_replace('00:', '',$event->starting_at) .' if you would like to join use the link down below and use this access code "'.$room->viewer_pw.'"',
                'actionUrl' => route('join',['id'=>$event->id_room ,'event_id'=>$event->id,'_id'=>Crypt::encrypt('$event->id')])

            ];
            $msg = [
                'greeting' =>'Hello ' .$user->name  ,
                'subject' => 'Event Validated',
                'message' => 'your request to create an event "'.$event->event_theme .'" has been approved ',
                ];
            $event->isVerified='Verified';
            $event->update();
            Mail::bcc($emails)->send(new EventsNotification($details));
            Mail::to($user->email)->send(new ValidatedEvent($msg));
            return back();
        }
        elseif($mode=='d')
        {
            $msg = [
                'greeting' =>'Hello ' .$user->name  ,
                'subject' => 'Event Denied',
                'message' => 'your request to create an event "'.$event->event_theme .'" has been denied ',
                ];
            $event = Event::find($id);
            $event->isVerified='Denied';
            $event->update();
            Mail::to($user->email)->send(new ValidatedEvent($msg));
            // Mail::to()->send(new EventsNotification($details));
            return back();
        }

    }
}
/******************************************************************/

