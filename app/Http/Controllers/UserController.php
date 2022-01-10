<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;
use illuminate\Support\Facades;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
      
    public function search_users(Request $request)
    {
        $search = $request->input('search');
        

    // Search in the title and body columns from the posts table
        $all_users = User::query()
        ->where('name', 'LIKE', "%{$search}%")
        ->orWhere('fname' , 'LIKE' ,"%{$search}%")
        ->orWhere('lname' , 'LIKE' ,"%{$search}%")
        ->paginate(10);
        $pending_rooms = Room::where('verified', '<=', 'pending' , 'AND' , 'verified', '!=', 'denied')->get();
        $pending = $pending_rooms->count();
        $s_requests = User::where('status' , '=' , 'pending')->get();
        $streamers_requests = $s_requests->count();
        return view('admin_users', compact(['all_users' , 'pending', 'streamers_requests']));
       
    }

    public function destroy($id)
    {
        $user = User::find($id);
        
        $user->delete();
        return back()->with('success', __('Successfully Deleted '));
    }

    
}
