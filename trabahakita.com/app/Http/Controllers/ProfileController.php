<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use DB;
use App\User;
use App\Post;
use App\Comments;
use App;
use App\Education;
use App\Skills;
use App\Experience;
use App\Notification;
use App\Hire;
use App\Category;
use Illuminate\Support\Facades\Storage;

use JD\Cloudder\Facades\Cloudder;
use App\Upload;


class ProfileController extends Controller
{

    //
    public function index()
    {

        if (auth()->check()) {
            if (auth()->user()->type == 'employee') {
                $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0']);
                return view('profile')->with('notifcount', $notifcount);
            } elseif (auth()->user()->type == 'company') {
                $notifcount = Notification::where(['company_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
                return view('profile')->with('notifcount', $notifcount);
            }
        } else {
            return redirect()->to('/login');
        }
    }

    public function index2()
    {
        if (auth()->check()) {
            if (auth()->user()->type == 'employee') {
                $profile = Profile::where(['type' => 'company'])->get();
                $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
                $post = Post::all();
                return view('Company.profiles')->with(['profile' => $profile, 'notifcount' => $notifcount, 'post' => $post]);
            } elseif (auth()->user()->type == 'company') {
                $profile = Profile::where(['type' => 'employee'])->orderBy('id', 'desc')->get();
                $notifcount = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0']);
                $post = Post::orderBy('id', 'DESC')->get();
                $hires = Hire::all();
                return view('Employee.profiles')->with(['profile' => $profile, 'notifcount' => $notifcount, 'post' => $post]);
            }
        }
    }

    public function store(Request $request)
    {
        $profile = Profile::all();
        if (auth()->user()->id == $profile->id) {
            return 'di na pwede';
        } else {
            $this->validate(
                request(),
                [
                    'last_name' => 'required',
                    'first_name' => 'required',

                    'address' => 'required',
                    'title' => 'required',
                    'address' => 'required',
                    'field' => 'required',
                    'desc' => 'required',
                ]
            );


            $profile = new Profile;
            $profile->id = auth()->user()->id;
            $profile->last_name = request('last_name');
            $profile->first_name = request('first_name');
            $profile->middle_name = request('middle_name');
            $profile->ext_name = request('ext_name');
            $profile->title = request('title');
            $profile->adress = request('adress');
            $profile->lat = request('lat');
            $profile->lng = request('lng');
            $profile->field = request('field');
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
        $education = Education::all();
        $skills = Skills::all();
        $experience = Experience::all();

        if (auth()->user()->type == 'employee') {
            $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
            return view('profile')->with(['profile' => $profile, 'education' => $education, 'skills' => $skills, 'experience' => $experience, 'notifcount' => $notifcount]);
        } elseif (auth()->user()->type == 'company') {
            $notifcount = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0']);
            return view('profile')->with(['profile' => $profile, 'education' => $education, 'skills' => $skills, 'experience' => $experience, 'notifcount' => $notifcount]);
        }
    }

    public function update(Request $request)
    {
        if (auth()->user()->type == 'employee') {

            $this->validate($request, [
                'image_name' => 'mimes:jpeg,bmp,jpg,png|between:1, 6000',
            ]);





            if (request('image_name') == '') {
                // $image = $request->file(auth()->user()->image);
                // $name = $request->file(auth()->user()->image)->getClientOriginalName();
                // $image_name = $request->file(auth()->user()->image)->getRealPath();;
                // Cloudder::upload($image_name, null);
                $image_url = auth()->user()->image;
            } else {
                $image = $request->file('image_name');
                $name = $request->file('image_name')->getClientOriginalName();
                $image_name = $request->file('image_name')->getRealPath();;
                Cloudder::upload($image_name, null);
                list($width, $height) = getimagesize($image_name);

                $image_url = Cloudder::getResult()['secure_url'];
                $this->saveImages($request, $image_url);
            }

            //Save images


            $profile = Profile::find(auth()->user()->id);
            $profile->id = auth()->user()->id;
            $profile->last_name = request('last_name');
            $profile->first_name = request('first_name');
            $profile->middle_name = request('middle_name');
            $profile->adress = request('address');
            $profile->lat = request('lat');
            $profile->lng = request('lng');

            $profile->number = request('number');
            $profile->email = request('email');
            $profile->area = request('field');
            $profile->image = $image_url;
            $profile->description = request('desc');
            $profile->expected_salary = request('salary');
            $profile->years_exp = request('exp');
            $profile->status_update = '1';
            $profile->save();
            $profiles = Profile::find(auth()->user()->id);

            $profiles = Profile::find(auth()->user()->id);
            $user = User::find(auth()->user()->id);
            $user->name = $profiles->first_name . ' ' . $profiles->last_name;
            $user->image = $image_url;
            $user->save();

            $comment = Comments::all();
            foreach ($comment as $com) {
                if ($com->user_id == auth()->user()->id) {
                    $com = Comments::where('user_id', auth()->user()->id)->update(['name' => request('first_name')]);
                }
            }
            if ($profiles->status_edu == '0') {
                return redirect()->to('/employee/education')->with('profile', $profiles);
            } elseif ($profiles->status_edu == '1' && $profiles->status_skills == '0') {
                return redirect()->to('/employee/education')->with('profile', $profiles);
            } else
            //    if($profiles->status_edu == '1' && $profiles->status_skills == '1')
            {
                return redirect()->to('/employee/profile')->with(['profile' => $profiles, 'success' => 'Profile Updated']);
            }
        } elseif (auth()->user()->type == 'company') {

            $this->validate($request, [
                'image_name' => 'mimes:jpeg,bmp,jpg,png|between:1, 6000',
            ]);

            $image = $request->file('image_name');

            $name = $request->file('image_name')->getClientOriginalName();

            $image_name = $request->file('image_name')->getRealPath();;

            Cloudder::upload($image_name, null);

            list($width, $height) = getimagesize($image_name);

            $image_url = Cloudder::getResult()['secure_url'];



            //Save images
            $this->saveImages($request, $image_url);

            $profile = Profile::find(auth()->user()->id);
            $profile->id = auth()->user()->id;
            $profile->adress = request('address');
            $profile->company_rep = request('representative');
            $profile->company_name = request('company_name');
            $profile->number = request('number');
            $profile->email = request('email');
            $profile->image = $image_url;
            $profile->description = request('desc');
            $profile->lat = request('lat');
            $profile->lng = request('lng');
            $profile->status_update = '1';

            $profile->save();

            $profiles = Profile::find(auth()->user()->id);
            $user = User::find(auth()->user()->id);
            $user->name = $profiles->company_name;
            $user->image = $image_url;
            $user->save();

            // $posts = Post::where('company_id', auth()->user()->id)->get();
            $post = Post::all();
            foreach ($post as $posts) {
                if ($posts->company_id == auth()->user()->id) {
                    $posts = Post::where('company_id', auth()->user()->id)->update(['company_name' => request('company_name')]);
                }
            }
            //
            return redirect()->to('/employee/profile')->with(['profile' => $profiles, 'success' => 'Profile Updated']);
        }
    }

    public function saveImages(Request $request, $image_url)
    {
        $image = new Upload();
        $image->image_name = $request->file('image_name')->getClientOriginalName();
        $image->image_url = $image_url;

        $image->save();
    }



    public function show($id)
    {
        if (auth()->user()->type == 'employee') {

            return redirect()->to('/employee/profile');
        } else {
            $profile = Profile::find($id);
            $skills = skills::all();
            $education = education::all();
            $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee']);
            return view('employee')->with(['profile' => $profile, 'notifcount' => $notifcount, 'skills' => $skills, 'education' => $education]);
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
    function schools()
    {
        $school = Education::all();
        $sn_count = 1;
        $html = '';
        foreach ($school as $edu) {
            if (auth()->user()->type == 'employee') {
                if ($edu->user_id == auth()->user()->id) {

                    $html .= '<h4><div class="container"><div class="row"><div class="col">' . $edu->school . '</div>' .
                        '<div class="col">' . $edu->course . '</div>' .
                        '<div class="col">' . $edu->from . '-' . $edu->to . '</div>' .
                        '</div></div></h4>';
                    $sn_count++;
                }
            } elseif (auth()->user()->type == 'company') {
                if ($edu->user_id == request('id')) {

                    $html .= '<h4><div class="container"><div class="row"><div class="col">' . $edu->school . '</div>' .
                        '<div class="col">' . $edu->course . '</div>' .
                        '<div class="col">' . $edu->from . '-' . $edu->to . '</div>' .
                        '</div></div></h4>';
                    $sn_count++;
                }
            }
        }
        return $html;
    }

    function skills()
    {
        $skill = Skills::all();
        $sn_count = 1;
        $html = '';
        foreach ($skill as $edu) {
            if (auth()->user()->type == 'employee') {
                if ($edu->user_id == auth()->user()->id) {
                    $html .= '<h4>' . $edu->desc . '</h4>';
                    $sn_count++;
                }
            } elseif (auth()->user()->type == 'company') {
                if ($edu->user_id == request('id')) {
                    $html .= '<h4>' . $edu->desc . '</h4>';
                    $sn_count++;
                }
            }
        }
        return $html;
    }

    function experience()
    {
        $experience = Experience::all();
        $sn_count = 1;
        $html = '';
        foreach ($experience as $exp) {
            if (auth()->user()->type == 'employee') {
                if ($exp->user_id == auth()->user()->id) {
                    $html .= '<h4><div class="container"><div class="row"><div class="col">' . $exp->workplace . '(' . $exp->from . '-' . $exp->to . ')' . '</div>' .
                        '<div class="col">' . '•' . $exp->desc_1 . '</div>' .
                        '<div class="col">' . '•' . $exp->desc_2 . '</div>' .
                        '<div class="col">' . '•' . $exp->desc_3 . '</div>' .
                        '</div></div></h4>';
                    $sn_count++;
                }
            } elseif (auth()->user()->type == 'company') {
                if ($exp->user_id == request('id')) {
                    $html .= '<h4><div class="container"><div class="row"><div class="col">' . $exp->workplace . '(' . $exp->from . '-' . $exp->to . ')' . '</div>' .
                        '<div class="col">' . '•' . $exp->desc_1 . '</div>' .
                        '<div class="col">' . '•' . $exp->desc_2 . '</div>' .
                        '<div class="col">' . '•' . $exp->desc_3 . '</div>' .
                        '</div></div></h4>';
                    $sn_count++;
                }
            }
        }
        return $html;
    }

    public function pdf()
    {
        if (auth()->user()->type == 'employee') {
            $profile = Profile::find(auth()->user()->id);
            $school = Education::all();
            $pdf = App::make('dompdf.wrapper');
            $html2 = $this->schools();
            $html3 = $this->skills();
            $html4 = $this->experience();
            $pdf->loadhtml(

                '<h1>' . $profile->last_name . ' ' . $profile->first_name . ',' . $profile->middle_name . '</h1>' .
                    '<h3>' . $profile->email . '</h3>' .
                    '<h4>' . $profile->number . '</h4>' .
                    '<h4>' . $profile->adress . '</h4>' .
                    '<h2>SUMMARY</h2><hr>' .
                    '<h5 style="color:grey">' . $profile->description . '</h5><br>' .
                    '<h2>Education</h2><hr>' .
                    $html2 .
                    '<h2>Experience</h2><hr>' .
                    '<h4 >' . $html4 . '</h4>' .
                    '<h2>Skills</h2><hr>' .
                    '<h4 >' . $html3 . '</h4>'
            );
            return $pdf->stream();
        } elseif (auth()->user()->type == 'company') {
            $profile = Profile::find(request('id'));
            $school = Education::all();
            $pdf = App::make('dompdf.wrapper');
            $html2 = $this->schools();
            $html3 = $this->skills();
            $html4 = $this->experience();
            $pdf->loadhtml(
                '<h1>' . $profile->last_name . ' ' . $profile->first_name . ',' . $profile->middle_name . '</h1>' .
                    '<h3>' . $profile->email . '</h3>' .
                    '<h4>' . $profile->number . '</h4>' .
                    '<h4>' . $profile->adress . '</h4>' .
                    '<h2>SUMMARY</h2><hr>' .
                    '<h5 style="color:grey">' . $profile->description . '</h5><br>' .
                    '<h2>Education</h2><hr>' .
                    $html2 .
                    '<h2>Experience</h2><hr>' .
                    '<h4 >' . $html4 . '</h4>' .
                    '<h2>Skills</h2><hr>' .
                    '<h4 >' . $html3 . '</h4>'
            );
            return $pdf->stream();
        }
    }

    public function sample()
    {
        $profile = Profile::find(auth()->user()->id);
        $education = Education::all();
        $skills = Skills::all();
        $experience = Experience::all();

        if (auth()->user()->type == 'employee') {
            $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0']);
            return view('profile2')->with(['profile' => $profile, 'education' => $education, 'skills' => $skills, 'experience' => $experience, 'notifcount' => $notifcount]);
        } elseif (auth()->user()->type == 'company') {
            $notifcount = Notification::where(['company_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
            return view('profile2')->with(['profile' => $profile, 'education' => $education, 'skills' => $skills, 'experience' => $experience, 'notifcount' => $notifcount]);
        }
    }

    public function sampleed()
    {
        $profile = Profile::find(auth()->user()->id);
        $education = Education::all();
        $exp = Experience::all();
        $skills = Skills::all();
        $category = Category::all();
        $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0']);
        return view('Education')->with(['profile' => $profile, 'notifcount' => $notifcount, 'education' => $education, 'experience' => $exp, 'skills' => $skills, 'category' => $category]);
    }
}
