<?php

use App\Http\Controllers\AdminRoomsVerification;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\EVController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\ViewersController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\MainController;
use App\Models\Event;
use App\Models\Room;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();


/**Home Page Routes */
Route::get('/', [MainController::class, 'index'])->name('index');
// Route::get('/index',[MainController::class , 'home'])->name('home');

//this one is for the logout
Route::get('/logout', [LoginController::class , 'logout'])->name('logout');
/**This One if for login */

//this route is for the user to join the meeting
Route::get('/meeting-room/join/{id?}/{_id?}',[MainController::class , 'join_meeting'] )->name('join');
// Route::post('/check',[MainController::class,'check'])->name('auth.check');
Route::get('streamer/rooms/search', [RoomsController::class , 'search_room'])->name('search_room_streamer');
Route::get('admin/users/search', [UserController::class , 'search_users'])->name('search_users');
Route::get('streamer/events/search', [EventsController::class , 'search_event_streamer'])->name('search_event_streamer');
Route::get('admin/rooms/search', [RoomsController::class , 'search_room_admin'])->name('search_room_admin');
Route::get('/delete/{id}' , [RoomsController::class ,'destroy'])->name('delete.room');
Route::get('/delete/user/{id}' , [UserController::class ,'destroy'])->name('delete.user');

Route::GET('streamer/events/{id}', [EventsController::class ,'update'])->name('streamers.events_update');
Route::post('streamer/rooms/update_', [EventsController::class ,'updateRoom'])->name('streamers.room_update');
Route::GET('admin/streams/{id}', [EventsController::class ,'admin_eventUpdate'])->name('admin.events_update');
Route::get('/admin/streams/{id}/edit/' ,[EventsController::class , 'edit'])->name('edit_event_admin');

Route::get('/delete/event/{id}' , [EventsController::class ,'destroy'])->name('delete.event');


Route::group(['middleware' => ['auth','can:dashboard_admin']],function(){
    /**For Admin Paths */
    Route::get('admin/pending/{id}/{mode}', [AdminRoomsVerification ::class ,'update'])->name('update.roomStatue');
    Route::get('admin/streamers/{id}/{mode}', [AdminRoomsVerification ::class ,'verify_streamer'])->name('admin_verify_streamer');
    Route::get('admin/pending',   [AdminRoomsVerification ::class ,'show'])->name('pending');
    Route::get('admin/streamers', [MainController ::class ,'admin_streamer'])->name('show');
    Route::get('admin/streams', [MainController::class , 'admin_streams'])->name('admin.streams');
    Route::get('admin/profile', [MainController::class , 'admin_profile'])->name('admin.profile');
    Route::get('admin/rooms', [RoomsController::class ,'adminRooms'])->name('admin.rooms');
    Route::get('admin/users' , [MainController::class , 'admin_users'])->name('admin.users');
    Route::get('admin/recordings' ,  [RoomsController::class , 'admin_recordings'])->name('admin.recordigns');
    //Route::get('admin', [MainController::class , 'admin'])->name('admin');
    Route::get('admin/rooms/{id}', [RoomsController::class ,'startMeeting'])->name('admin.rooms_start');

    Route::get('admin/events_req' , [MainController::class , 'getpendingEvents'])->name('admin.events.pending');

    Route::get('admin/planning',[MainController::class , 'admin_planning'])->name('streamer.planning');


    Route::get('/users/{id}/edit/' ,[MainController::class , 'edit'])->name('edit_users');

    Route::get('admin/events/{id}/{mode}', [MainController ::class ,'admin_verify_event'])->name('admin_verify_event');

});
Route::get('/streamer_confirmation' , [MainController::class , 'streamer_confirmation'])->name('s_confirm');

/** Single Route */

Route::group( ['middleware' =>['auth','preventStreamerAccess']],function(){
    Route::get('dashboard' , function(){
        if(Auth::user()->role == 1)
        {
            return redirect('admin/profile');
        }
        elseif(Auth::user()->role == 2)
        {
            return redirect('streamer/profile');
        }
        elseif(auth()->user()->role == 3)
        {
            return redirect('schedule');
        }
        elseif(Auth::user()->role == 4)
        {
            return redirect('validator/statistics');
        }
    })->name('dashboard');
});

/**End Single Route */

Route::group( ['middleware' =>['auth','preventStreamerAccess','can:dashboard_streamer']],function(){
 /***************   Streamers Paths     ****************/
 Route::get('streamer/presentation',[MainController::class , 'streamer_presentation'])->name('streamer.presentation');
 Route::post('streamer/presentation',[MainController::class , 'streamer_present_upload'])->name('streamer.presentation.upload');

   // Route::get('/streamer', [MainController::class , 'streamer'])->name('streamer');
   Route::get('streamer/rooms', [RoomsController::class ,'show'])->name('streamers.rooms');
   //if any problem Here with LoggedUser go to show methode and remove it from there and make it back at streamer in MainController
   //Route::get('streamer/rooms', [MainController::class , 'streamer_rooms']);
   Route::post('streamer/rooms', [RoomsController::class ,'store'])->name('streamers.rooms_add');

   Route::get('/event/{id}/edit/' ,[EventsController::class , 'edit'])->name('edit_event');
   Route::get('/room/{id}/edit/' ,[EventsController::class , 'roomedit'])->name('edit_room');

   //this one is to start the meeting
   Route::get('streamer/rooms/{id}', [RoomsController::class ,'startMeeting'])->name('streamers.rooms_start');
   Route::get('streamer/events/{id}/{_id}', [RoomsController::class ,'startMeetingEvent'])->name('streamers.event_start');
   Route::get('streamer/events', [EventsController::class ,'show'])->name('streamers.events');
   Route::post('streamer/events', [EventsController::class ,'store'])->name('streamers.events_add');
   Route::post('streamer/rooms/update', [EventsController::class ,'store'])->name('streamers.events_add');

   Route::get('streamer/planning',[MainController::class , 'streamer_planning'])->name('streamer.planning');
   Route::post('streamer/planning', [EventsController::class ,'store']);
   Route::get('streamer/profile', [MainController::class , 'streamer_profile'])->name('streamer.profile');
   Route::get('streamer/recordings' , [RoomsController::class , 'streamer_recordings'])->name('streamer.recordigns');
   Route::get('delete/recordings/{recID}' , [RoomsController::class , 'deleteRecordings'])->name('streamer.delete.recordigns');
   Route::resource('streamers', RoomsController::class);
});


/**To update user profiles  */
Route::GET('admin/profile/{id}' , [MainController::class, 'update_profile'])->name('user_profile_update');
/**end update users profiles  */
Route::get('user/register',[MainController::class , 'register_user'])->name('userRegister');

Route::post('profile' , [MainController::class , 'update_avatar']);
Route::group( ['middleware' =>['auth','can:dashboard_user']],function(){

Route::get('user/profile', [MainController::class , 'user_profile'])->name('user.profile');

Route::get('user/events',[MainController::class , 'user_events'])->name('userEvents');

});

/***Routes for the events validator */
Route::group( ['middleware' =>['auth','can:dashboard_validator']],function(){
Route::get('validator/profile', [EVController::class , 'validator_profile'])->name('validator.profile');
Route::get('validator/events/pending',[EVController::class , 'events_validation'])->name('validator.PendingEvents');
Route::get('validator/rooms/pending',[EVController::class , 'validator_pending_rooms'])->name('validator.PendingRooms');
Route::get('validator/streamers/pending',[EVController::class , 'validator_pending_seminarists'])->name('validator.PendingSeminarists');
Route::get('validator/events',[EVController::class , 'validator_all_events'])->name('validator.events');
Route::get('validator/rooms',[EVController::class , 'validator_all_rooms'])->name('validator.events');
Route::get('validator/events/{id}/{mode}', [EVController ::class ,'verify_event'])->name('verify_event');
Route::get('validator/rooms/pending/{id}/{mode}', [EVController ::class ,'verify_Room'])->name('update.verify_Room');
Route::post('/rooms/update_', [EVController::class ,'updateRoomValidator'])->name('validator.room_update');
Route::get('/rooms/{id}/edit/' ,[EVController::class , 'roomedit'])->name('edit_room');
Route::get('/validator/streamers/pending/{id}/{mode}', [EVController ::class ,'verify_streamer'])->name('validator_verify_streamer');
Route::get('/validator/seminarists' , [EVController::class , 'validator_all_users'])->name('validator.users');
Route::get('/validator/statistics',[EVController::class , 'showStatistics'])->name('validator.statistics');



});


// Route::get('user/login',[MainController::class , 'login_user'])->name('userLogin');

















// Route::group(['middleware'=>['AuthCheck']],function(){
//       /***************Streamers */
//       Route::get('streamer/rooms', [RoomsController::class ,'show'])->name('streamers.rooms');
//       Route::get('streamer/events', [EventsController::class ,'show'])->name('streamers.events');
//       Route::get('streamer/planning', function(){return view('streamers.planning');});
//       Route::get('streamer/profile', function(){return view('streamers.profile');});
//       Route::post('streamer/events', [EventsController::class ,'store'])->name('streamers.events_add');
//       Route::post('streamer/planning', [EventsController::class ,'store']);
//       Route::resource('streamers', RoomsController::class);
//       Route::post('streamer/rooms', [RoomsController::class ,'store'])->name('streamers.rooms_add');
//       //this one is to start the meeting
//       Route::get('streamer/rooms/{id}', [RoomsController::class ,'startMeeting'])->name('streamers.rooms_start');


// });
//this one is for joining the stream after passing from the join view
    Route::post('/virtual-room/{id}' ,[RoomsController::class ,'joinMeeting'])->name('join_stream');
//this one is for passing the JSON data to the fulCalendar
    Route::get('/test' , [EventsController::class , 'index'])->name('test');
    Route::get('/adminev' , [EventsController::class , 'adminEvents'])->name('test');

    // test for full calendar
    // end test calendar
    Route::get('/join_us',[ViewersController::class,'join_us'])->name('join_us');
    Route::get('/home',[ViewersController::class,'home'])->name('viewer_home');
    Route::get('/From-the-President',[ViewersController::class,''])->name('president');
    Route::get('/events',[ViewersController::class,'StreamsEvents'])->name('viewer_events');
    Route::get('/contact',[ViewersController::class,'contact'])->name('viewer_contact_us');
    Route::post('send', [ContactUsController::class, 'send'])->name('contact.send');
    Route::get('/schedule',[ViewersController::class,'schedule'])->name('viewer_schedule');
    // /**********************Streamers Routes  */
    // Route::get('/streamer', function(){
    //     return view('streamers.streamer');
    // });
    // // Route::get('streamer/events', function(){
    // //     return view('streamers.events');
    // // });
    // Route::get('streamer/profile', function(){
    //     return view('streamers.profile');
    // });
    // Route::get('streamer/planning', function(){
    //     return view('streamers.planning');
    // });
    // Route::resource('streamers', RoomsController::class);

    //   Route::get('/testt', function () {
    //     dd(Bigbluebutton::isMeetingRunning('5cmp'));

    //     $createMeeting = \Bigbluebutton::initCreateMeeting([
    //         'meetingID' => 'tamku',
    //         'meetingName' => 'test meeting',
    //         'attendeePW' => 'attendee',
    //         'moderatorPW' => 'moderator',
    //     ]);
    //     \Bigbluebutton::create($createMeeting);
    //     return redirect()->to(
    //         Bigbluebutton::join([
    //         'meetingID' => 'tamku',
    //         'userName' => 'disa',
    //         'password' => 'attendee' //which user role want to join set password here
    //         ])
    //     );
    //     $url = \Bigbluebutton::start([
    //         'meetingID' => 'tamku',
    //         'moderatorPW' => 'moderator', //moderator password set here
    //         'attendeePW' => 'attendee', //attendee password here
    //         'userName' => 'John Deo',//for join meeting
    //         //'redirect' => false // only want to create and meeting and get join url then use this parameter
    //     ]);
    //     dd($url);
    //   });
Route::get('mail', function () {
    return view('streamers.mail');
});

Route::get('/test01',function(){
    return view('test01');
});