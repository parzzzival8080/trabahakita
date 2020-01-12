<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use DB;

class RegisterController extends Controller
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
        if (auth()->check()) {
            return redirect()->to('/');
        } else {
            return view('Register.register');
        }
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
        $this->validate(
            request(),
            [

                'email' => 'required|email',
                'password' => 'required|confirmed',
                'type' => 'required',
                'lat' => 'nullable',
                'lng' => 'nullable'
            ]
        );
        $check = User::all();
        foreach ($check as $email) {
            if ($request['email'] == $email->email) {
                return back()->withErrors([
                    'error' => 'Email already taken'
                ]);
            }
        }
        $user = User::create(request(['email', 'password', 'type', 'skill', '']));


        auth()->login($user);

        $profile = new Profile;
        $profile->id = $user->id;
        $profile->type = $user->type;
        $profile->lat = '0.000000';
        $profile->lng = '0.000000';
        $profile->save();

        if ($user->type == 'admin') {
            return redirect()->to('/');
        } elseif ($user->type == 'employee' || $user->type == 'company') {
            $profile_view = Profile::find($user->id);
            return redirect()->to('/employee/profile')->with('success', 'You Are Registered!');
        }
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
    public function update()
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
