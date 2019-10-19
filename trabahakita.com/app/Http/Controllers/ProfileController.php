<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use DB;
use App\User;
use App\Post;

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
            $user = User::find(auth()->user()->id);
            $user->name = $profiles->name;
            $user->save();
    
           foreach($profiles as $prof)
           {
               if ($prof->id == auth()->user()->id)
               {
                $user = User::find(auth()->user()->id);
                $post = find($prof->company_id);
                $post->name = $prof->name;
                $post->save();
               }
           }
            
    
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
            $user = User::find(auth()->user()->id);
            $user->name = $profiles->name;
            $user->save();
    
            $posts = Post::all();
           foreach($posts as $post)
           {
               if ($post->company_id == auth()->user()->id)
               {
                
                
                $post = Post::find($post->company_id);
                $post->company_name = auth()->user()->name;
                $post->save();
               }
           }
            
    
            return redirect()->to('/employee/profile')->with('profile', $profiles);
        }
    }
}
