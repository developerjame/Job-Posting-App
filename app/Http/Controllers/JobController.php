<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    //All jobs
    public function index(){
        return view('jobs.index', ['jobs'=>Job::latest()->filter(request(['search']))->paginate(2)]);
    }

    //Show create job form
    public function create(){
        return view('jobs.create');
    }

    //Create Job
    public function store(Request $request){
        $formFields = $request->validate([
            'company' => ['required', Rule::unique('jobs', 'company')],
            'title' => 'required',
            'tags' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'location' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logopic', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Job::create($formFields);

        return redirect('/')->with('message', 'Job created successfully!');
    }

    //Edit job
    public function edit(Job $job){
        return view('jobs.edit', ['job'=>$job]);
    }

    //Update job
    public function update(Request $request, Job $job){
        $formFields = $request->validate([
            'company' => 'required',
            'title' => 'required',
            'email' => ['email', 'required'],
            'website' => 'required',
            'location' => 'required',
            'description' => 'required',
            'tags' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logopic', 'public');
        }

        $job->update($formFields);

        return back()->with('message', 'Job updated successfully!');
    }

    //Delete job
    public function delete(Job $job){
        if($job->user_id != auth()->id()){
            abort('403', 'Unauthorized Action!');
        }
        
        $job->delete();

        return back()->with('message', 'Job Deleted!');
    }

    //Manage Jobs
    public function manage(){
        return view('jobs.manage', ['jobs'=>auth()->user()->jobs()->get()]);
    }

    //Show job
    public function show(Job $job){
        return view('jobs.show', ['job'=>$job]);
    }
}
