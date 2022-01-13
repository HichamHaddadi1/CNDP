<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Email;
use Symfony\Contracts\Service\Attribute\Required;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');


    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required' , 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required' , 'string', 'min:8' , 'confirmed'],
            'language' ,
            'country' ,
            'avatar' ,
            'address' =>'required' ,
            'gender' =>'required' ,
            'fname' =>'required' ,
            'lname' =>'required' ,
        ]);



    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data  )
    {

       if (isset($data['language'])) {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' =>2,
            'status' => 'verified',
            'password' => Hash::make($data['password']),
            'language' =>$data['language'],
            'country' =>$data['country'],
            'address' =>$data['address'],
            'gender' =>$data['gender'],
            'fname' => $data['fname'],
            'lname'=>$data['lname']
        ]);
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/', $filename);
            $image = $filename;
            $user->update(['avatar' => $image]);
        }

    }

    else
    {

        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' =>3,
            'password' => Hash::make($data['password']),
            'address' =>$data['address'],
            'gender' =>$data['gender'],
            'fname' => $data['fname'],
            'lname'=>$data['lname'],

        ]);
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/', $filename);
            $image = $filename;
            $user->update(['avatar' => $image]);
        }


    }


    return $user;

    }
    protected function redirectTo()
    {


        if (Auth::user()->role ==2 && Auth::user()->status == 'Pending') {

           return '/streamer_confirmation';
        }
        if(url('/').'/user//register' != url()->previous())
        // Redirect::setIntendedUrl(url()->previous());
         if (auth()->user()->role == 3) {
        //     return 'user/profile';
        // }
        // return '/';
            // dd
            return redirect()->intended('/')->getTargetUrl();

         }
         return "/";
    }


}
