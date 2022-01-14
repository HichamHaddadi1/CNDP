<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


use App\Mail\EventsNotification;
use App\Mail\RoomVerification;
use App\Models\Event;
use App\Models\User;
use App\Models\Room;
use App\Mail\EventsValidatorNotification as Evn;
use App\Mail\ValidatedEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class EVController extends Controller
{
    public function validator_profile()
    {
        $p_events = Event::where('isVerified', '=', 'Pending')->get();
        $pending_events = $p_events->count();
        // dd($pending_events);
        $rooms = Room::all();
        $p_rooms = Room::where('verified', '=', 'pending')->get();
        $pending_rooms = $p_rooms->count();
        $s_requests = User::where('status' , '=' , 'pending')->get();
        $streamers_requests = $s_requests->count();
        return view('EventValidator.validator_profile' ,  compact('pending_events','streamers_requests','pending_rooms') );
    }
    public function events_validation()
    {
        $events = Event::all();
        $p_events = Event::where('isVerified', '=', 'Pending')->get();
        $pending_events = $p_events->count();
        // dd($pending_events);
        $rooms = Room::all();
        $p_rooms = Room::where('verified', '=', 'pending')->get();
        $pending_rooms = $p_rooms->count();
        $s_requests = User::where('status' , '=' , 'pending')->get();
        $streamers_requests = $s_requests->count();
        return view('EventValidator.pending_events' , compact('pending_events','streamers_requests','pending_rooms', 'events'));
    }
    public function validator_pending_rooms()
    {
        $events = Event::all();
        $p_events = Event::where('isVerified', '=', 'Pending')->get();
        $pending_events = $p_events->count();
        $rooms = Room::all();
        $p_rooms = Room::where('verified', '=', 'pending')->get();
        $pending_rooms = $p_rooms->count();
        $s_requests = User::where('status' , '=' , 'pending')->get();
        $streamers_requests = $s_requests->count();
        //dd($pending_events);
        return view('EventValidator.pending_rooms' , compact('pending_rooms','streamers_requests','pending_events', 'rooms'));
    }
    public function validator_pending_seminarists()
    {
        $events = Event::all();
        $p_events = Event::where('isVerified', '=', 'Pending')->get();
        $pending_events = $p_events->count();
        $rooms = Room::all();
        $p_rooms = Room::where('verified', '=', 'pending')->get();
        $pending_rooms = $p_rooms->count();
        $streamers = User::where('status' , '<=' , 'Pending')
        ->paginate(10);
        $s_requests = User::where('status' , '=' , 'pending')->get();
        $streamers_requests = $s_requests->count();
        // dd($pending_users);
        return view('EventValidator.pending_user_validator' , compact('pending_rooms','streamers_requests','streamers', 'pending_events', 'rooms'));
    }
    public function validator_all_events()
    {
         $events = Event::all();
        $p_events = Event::where('isVerified', '=', 'Pending')->get();
        $pending_events = $p_events->count();
        $rooms = Room::all();
        $p_rooms = Room::where('verified', '=', 'pending')->get();
        $pending_rooms = $p_rooms->count();
        $streamers = User::where('status' , '<=' , 'Pending')
        ->paginate(10);
        $s_requests = User::where('status' , '=' , 'pending')->get();
        $streamers_requests = $s_requests->count();
        // dd($pending_users);
        $all_users= DB::table('users')->where('role' , '=' , 2)->paginate(10);
        return view('EventValidator.events' , compact('pending_events','pending_rooms','streamers_requests','streamers','all_users', 'events'));

    }
    public function validator_all_users()
    {
        $events = Event::all();
        $p_events = Event::where('isVerified', '=', 'Pending')->get();
        $pending_events = $p_events->count();
        $rooms = Room::all();
        $p_rooms = Room::where('verified', '=', 'pending')->get();
        $pending_rooms = $p_rooms->count();
        $streamers = User::where('status' , '<=' , 'Pending')
        ->paginate(10);
        $s_requests = User::where('status' , '=' , 'pending')->get();
        $streamers_requests = $s_requests->count();
        // dd($pending_users);
        $all_users= DB::table('users')->where('role' , '=' , 2)->paginate(10);
        return view('EventValidator.all_streamers' , compact('pending_events','pending_rooms','streamers_requests','streamers','all_users', 'events'));
    }
    public function verify_streamer( $id,$mode,Request $request)
    {
        $streamer = User::where('id', '=', $id)->first();
        // dd($room . ' ^^^ '.$user);


        if($mode=='v')
        {
            $details = [
            'greeting' =>'Hello ' .$streamer->name  ,
            'message' => 'your account has been approved you can access it from here '
            ];
            $streamer = User::find($id);
            $streamer->status='verified';
            $streamer->update();
            Mail::to($streamer->email)->send(new RoomVerification($details));


            return back()->with('success' , 'User '.$streamer->name .'has been verified');
        }
        elseif($mode=='d')
        {
            $details = [
                'greeting' =>'Hello ' .$streamer->name  ,
                'message' => 'unfortunatly your acount has been denied , create a new account or contact us '
                ];
                $streamer = User::find($id);
                $streamer->status='denied';
                $streamer->update();
                Mail::to($streamer->email)->send(new RoomVerification($details));


                return back()->with('errorsUnique' , 'User '.$streamer->name .'has been Denied');
        }

    }
    public function validator_all_rooms()
    {
        $rooms = Db::table('rooms')->paginate(10);
        //dd($events);
        $p_events = Event::where('isVerified', '=', 'Pending')->get();
        $pending_events = $p_events->count();
        $rooms = Room::all();
        $p_rooms = Room::where('verified', '=', 'pending')->get();
        $pending_rooms = $p_rooms->count();
        $s_requests = User::where('status' , '=' , 'pending')->get();
        $streamers_requests = $s_requests->count();
        return view('EventValidator.rooms' , compact('pending_events','streamers_requests','pending_rooms', 'rooms'));
    }

     public function verify_event( $id,$mode,Request $request)
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
                'actionUrl' => route('join',['id'=>$event->id_room])

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
    public function verify_Room( $id,$mode,Request $request)
    {
        $room = Room::where('id', '=', $id)->first();
        $user = User::where('id', '=', $room->id_user   )->first();

        // dd($room . ' ^^^ '.$user);


        if($mode=='v')
        {
            $details = [
            'greeting' =>'Hello ' .$user->name  ,
            'message' => 'your request to create a room '.$room->room_name .' has been approved',
            ];
            $room = Room::find($id);
            $room->verified='verified';
            $t = $room->update();
            Mail::to($user->email)->send(new RoomVerification($details));


            return back();
        }
        elseif($mode=='d')
        {
            $details = [
                'greeting' =>'Hello ' .$user->name  ,
                'message' => 'your request to create a room '.$room->room_name .' has been denied',
            ];
            $room = Room::find($id);
            $room->verified='denied';
            $room->update();
            Mail::to($user->email)->send(new RoomVerification($details));

            return back();
        }

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
}
