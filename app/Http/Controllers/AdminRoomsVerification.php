<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Mail\RoomVerification;
use Illuminate\Support\Facades\Mail;

class AdminRoomsVerification extends Controller
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
    public function show()
    {
        $pending_rooms      =   Room::where('verified', '=', 'pending')->get();
        $pending            =   $pending_rooms->count();
        $s_requests         =   User::where('status' , '=' , 'pending')->get();
        $streamers_requests =   $s_requests->count();
        $rooms              =   Room::paginate(20);
        $events             =   Event::where('isVerified', '=', 'Pending')->get();
        $pending_events     =   $events->count();
        return view('admin_pending' , compact(['rooms','pending' , 'streamers_requests' , 'pending_events']));
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
     * @param  string mode
     * @return \Illuminate\Http\Response
     */
    public function update( $id,$mode,Request $request)
    { 
        $room = Room::where('id', '=', $id)->first();
        $user = User::where('id', '=', $room->id_user)->first();

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
}
