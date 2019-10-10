<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use DB;
use App\User;

class ProfileController extends Controller
{
    //
    public function index()
    {
        if (auth()->check())
        {
            return view('profile');
        }
        else
        {
            return redirect()->to('/login');
        }
    }

    public function store(Request $request)
    {
        $profile = Profile::all();
        if(auth()->user()->id == $profile->id)
        {
            return 'di na pwede';
        }
        else
        {
            $this->validate(request(),
            [
                'name' => 'required',
                'course' => 'required',
                'skill' => 'required',
                'desc' => 'required',
            ]);
    
    
            $profile = new Profile;
            $profile->id = auth()->user()->id;
            $profile->name = request('name');
            $profile->course = request('course');
            $profile->skill = request('skill');
            $profile->description = request('desc');
            $profile->status_update = '1';
            $profile->save();
    
            return redirect()->to('/employee/dashboard');
        }
       
    }

    public function show()
    {
       
        $profile = Profile::find(auth()->user()->id);
        return view('profile')->with('profile',$profile);
    }

    public function update()
    {
        if (auth()->user()->type == 'employee')
        {

            $profile = Profile::find(auth()->user()->id);
            $profile->id = auth()->user()->id;
            $profile->name = request('name');
            $profile->course = request('course');
            $profile->skill = request('skill');
            $profile->description = request('desc');
            $profile->status_update = '1';
            $profile->save();
    
            $profiles = Profile::find(auth()->user()->id);
    
            return redirect()->to('/employee/profile')->with('profile', $profiles);
        }

        elseif(auth()->user()->type == 'company')
        {
            
            $profile = Profile::find(auth()->user()->id);
            $profile->id = auth()->user()->id;
            $profile->name = request('name');
            $profile->adress = request('address');
            $profile->description = request('desc');
            $profile->status_update = '1';
            $profile->save();

            $profiles = Profile::find(auth()->user()->id);
    
            return redirect()->to('/employee/profile')->with('profile', $profiles);
        }
    }
}
