<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use DB;
use App\User;
use App\Post;
use App\Comments;

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
                'last_name' => 'required',
                'first_name' => 'required',
                'middle_name' => 'required',
                'address' => 'required',
                'title' => 'required',
                'address' => 'required',
                'degree' => 'required',
                'from-year' => 'required',
                'to-year' => 'required',
                'expertise' => 'required',
                'desc' => 'required',
            ]);
    
    
            $profile = new Profile;
            $profile->id = auth()->user()->id;
            $profile->last_name = request('last_name');
            $profile->first_name = request('first_name');
            $profile->middle_name = request('middle_name');
            $profile->title = request('title');
            $profile->adress = request('adress');
            $profile->school = request('school');
            $profile->degree = request('degree');
            $profile->from_year = request('from-year');
            $profile->to_year = request('to-year');
            $profile->area = request('expertise');
            $profile->description = request('desc');
            $profile->company_rep = request('representative');
            $profile->number = request('number');
            $profile->number = request('email');
            $profile->status_update = '1';
            $profile->save();
            return redirect()->to('/employee/dashboard');
        }
       
    }

    public function showme()
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
            $profile->last_name = request('lastname');
            $profile->first_name = request('firstname');
            $profile->middle_name = request('middlename');
            $profile->title = request('title');
            $profile->adress = request('address');
            $profile->school = request('school');
            $profile->degree = request('degree');
            $profile->number = request('number'); 
            $profile->from_year = request('from-year');
            $profile->to_year = request('to-year');
            $profile->area = request('expertise');
            $profile->image = request()->file('image')->store('public/images');
            $profile->description = request('desc');
            $profile->status_update = '1';
            $profile->save();
            $profiles = Profile::find(auth()->user()->id);

            $profiles = Profile::find(auth()->user()->id);
            $user = User::find(auth()->user()->id);
            $user->name = $profiles->first_name;
            $user->save();

            $comment =Comments::all();
            foreach($comment as $com)
            {
               if ($com->user_id == auth()->user()->id){
                 $com = Comments::where('user_id', auth()->user()->id)->update(['name' => request('firstname')]);
                 return redirect()->to('/employee/profile')->with('profile', $profiles);
               }
            }
    
           
        }

        elseif(auth()->user()->type == 'company')
        {
            
            $profile = Profile::find(auth()->user()->id);
            $profile->id = auth()->user()->id;
            $profile->adress = request('address');
            $profile->company_rep = request('representative');
            $profile->company_name = request('company_name'); 
            $profile->number = request('number'); 
            $profile->email = request('email'); 
            $profile->image = request()->file('image')->store('public/images');
            $profile->file = request()->file('file')->store('public/files');
            $profile->description = request('desc');
            $profile->status_update = '1';
            $profile->save();

            $profiles = Profile::find(auth()->user()->id);
            $user = User::find(auth()->user()->id);
            $user->name = $profiles->company_name;
            $user->save();
    
            // $posts = Post::where('company_id', auth()->user()->id)->get();
            $post =Post::all();
            foreach($post as $posts)
            {
               if ($posts->company_id == auth()->user()->id){
                 $posts = Post::where('company_id', auth()->user()->id)->update(['company_name' => request('company_name')]);
                 return redirect()->to('/employee/profile')->with('profile', $profiles);
               }
            }
            //
          
        }
    }
    public function show($id)
    {
    if (auth()->user()->type == 'employee')
    {
        return redirect()->to('/');
    }
    else
    {
        $profile = Profile::find($id);
        return view('employee')->with('profile', $profile);
    }
      
    }
    // public function download()
    // {
    // //    $prof = Profile::find(auth()->user()->id);
    // //    $profdownload = $prof->image;

    // //    return trim($profdownload, 'public/images/');
    // return 'power';
    // }

    public function downloadme()
    {
        $prof = Profile::find(auth()->user()->id);
        $profdownload = $prof->image;
        $profile_img = trim($profdownload, 'public/images/');
        return response()->download(public_path());
        
       
       

    }
}
