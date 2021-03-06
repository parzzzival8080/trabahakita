<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
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
        if (auth()->check()) {
            $experience = new Experience;
            $experience->user_id = auth()->user()->id;
            $experience->workplace = request('office');
            $experience->from = request('from-year');
            $experience->to = request('to-year');
            $experience->position = request('position');
            $experience->desc_1 = request('desc');
            $experience->save();

            return redirect()->to('/employee/education')->with('message', 'Successfully Saved!');
        } else {
            return redirect()->to('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
        //
        if (auth()->check()) {
            $experience = Experience::find(request('id'));
            $experience->user_id = auth()->user()->id;
            $experience->workplace = request('office');

            $experience->from = request('from');
            $experience->to = request('to');
            $experience->desc_1 = request('desc');
            $experience->save();

            return redirect()->to('/employee/education')->with('message', 'Successfully Updated!');
        } else {
            return redirect()->to('/login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        //
    }

    public function del()
    {
        if (auth()->check()) {
            $exp = Experience::find(request('exp_id'));
            $exp->delete();

            return redirect()->to('/employee/education')->with('message', 'Successfully Removed!');
        } else {
            return redirect()->to('/login');
        }
    }
}
