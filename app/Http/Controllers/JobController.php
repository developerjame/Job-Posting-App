<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //All jobs
    public function index(){
        return view('jobs.index', ['jobs'=>Job::latest()->filter(request(['search']))->paginate(2)]);
    }

    //Show job
    public function show(Job $job){
        return view('jobs.show', ['job'=>$job]);
    }
}
