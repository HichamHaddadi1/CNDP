<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class FullCalendarContoller extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Event::whereDate('starting_at', '>=', $request->starting_at)
                       ->whereDate('ending_at',   '<=', $request->ending_at)
                       ->get(['id', 'event_theme', 'start', 'end']);
            return response()->json($data);
    	}
    	return view('streamers.planning');
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Event::create([
    				'event_theme'		=>	$request->event_theme,
    				'starting_at'		=>	$request->starting_at,
    				'ending_at'		=>	$request->ending_at
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Event::find($request->id)->update([
    				'event_theme'		=>	$request->event_theme,
    				'starting_at'		=>	$request->starting_at,
    				'ending_at'		=>	$request->ending_at
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Event::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }
}
