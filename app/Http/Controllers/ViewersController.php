<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


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
}
