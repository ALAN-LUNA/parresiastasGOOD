<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\Students;

class UsuariosController extends Controller
{
    public function viewProfile(){

        return view('profile');
    }
    public function showEstudents(){
        $test=Students::all()->unique('user_id');
        return view('qualification',["students"=>$test]);
    }

    public function showUser(){
        $users=users::all();
        return view('users',["users"=>$users]);
    }

    public function vieweditUser(Request $request){
        $useredit=users::find($request->input('idUser'));
        return view('editUser',['useredit'=>$useredit]);
    }
    public function editCourseUser(Request $request){
        $useredit=users::find($request->input('id'));
        $useredit->courses=$request->input('courses');
        $useredit->save();
        return view('notification',["status"=> "success", "msg"=> "¡Se asigno el curso correctamente!"]);
    }
    // public function editRoleUser(Request $request){
    //     $idModel=$request->input('id');
    //     $rol=$request->input('role');
    //     $user=users::find($idModel);
    //     $rolehasmodel=RolesHasModels::where('model_id',$idModel)->first();
    //     $user->removeRole($rolehasmodel->role_id);
    //     $user->assignRole($rol);
    //     return view('notification',["status"=> "success", "msg"=> "¡Se asigno el rol correctamente!"]);
    // }
    public function deleteUser(Request $request){
        $user=users::find($request->input('id'));
        $user->delete();
        return view('notification',["status"=> "success", "msg"=> "¡El usuario se elimino correctamente!"]);
    }
    public function showUsersCourse(Request $request){
        $courseUser=Students::all()->where('course_id',$request->input('idCourse'))->unique('user_id');
        $totalQuestions=Students::where('course_id',$request->input('idCourse'))->select('total_questions')->first();
        $numquestions=(int)$totalQuestions->total_questions;
        $approved=round(($numquestions*7)/10);
        $usertotal=$courseUser->count();
        $userapproved=$courseUser->where('earned_marks',">=",$approved)->count();
        $userRepproved=$courseUser->where('earned_marks',"<",$approved)->count();
        return view('home')->with('approved', $userapproved)->with('repproved', $userRepproved)->with('total', $usertotal);
    }
    public function showIntens(Request $request){
        $courseUser=Students::all()->where('course_id',$request->input('idCourse'));
    }
}
