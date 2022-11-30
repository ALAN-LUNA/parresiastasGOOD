<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($request)
    {
        $courseUser=Students::all()->where('course_id',$request->input('idCourse'))->unique('user_id');
        $totalQuestions=Students::where('course_id',$request->input('idCourse'))->select('total_questions')->first();
        $numquestions=(int)$totalQuestions->total_questions;
        $approved=round(($numquestions*7)/10);
        $usertotal=$courseUser->count();
        // $userapproved=$courseUser->where('earned_marks',">=",$approved)->count();
        // $userRepproved=$courseUser->where('earned_marks',"<",$approved)->count();
        $userapproved = 19;
        $userRepproved = 10;
        return view('home',[$userapproved,$userRepproved,$usertotal]);
        //return view('home');
    }
}
