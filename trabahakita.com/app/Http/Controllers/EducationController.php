<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Education;
use App\Profile;
use App\Skills;
use App\Category;

class EducationController extends Controller
{
    //
    public function store(Request $request)
    {


        $education = new Education;
        $education->user_id = auth()->user()->id;
        $education->school = request('school');
        $education->from = request('from-year');
        $education->level = request('level');
        $education->to = request('to-year');
        $education->attainment = request('attainment');
        $education->save();

        $profiles = Profile::find(auth()->user()->id);
        $profiles->status_edu = '1';
        $profiles->save();


        $education = Education::all();
        $skills = Skills::all();
        return redirect()->to('/employee/education')->with(['profile' => $profiles, 'education' => $education, 'skills' => $skills, 'success' => 'Successfully Added']);
    }

    public function updateme(Request $request)
    {


        $education = Education::find(request('id'));
        $education->user_id = auth()->user()->id;
        $education->school = request('school');
        $education->from = request('from-year');
        $education->level = request('level');
        $education->to = request('to-year');
        $education->attainment = request('attainment');
        $education->save();

        $profiles = Profile::find(auth()->user()->id);
        $education = Education::all();
        $skills = Skills::all();
        $category = Category::all();
        return redirect()->to('/employee/education')->with(['profile' => $profiles, 'education' => $education, 'skills' => $skills, 'category' => $category, 'success' => 'Successfully Updated']);
    }

    public function del()
    {
        $education = Education::find(request('edu_id'));
        $education->delete();
        return redirect()->to('/employee/education')->with('success', 'successfully removed');
    }
}
