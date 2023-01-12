<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Activity_Response;
use App\Models\Discipline;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    // HOME

    public function index(){

        return view('home');

    }

    // REGISTRO DE PROFESSOR

    public function formRegisterTeacher(){
        return view('/register/formRegisterTeacher');
    }
    public function storeTeacher(Request $request, Teacher $teacher){
        if(Auth::guard('admin')->check()){
            $teacher -> name = $request->name;
            $teacher -> email = $request->email;
            $teacher -> password = bcrypt($request->password);

            $teacher -> save();

            return redirect()->route('home')->with('msg', 'Professor criado!!');
        }else{
            $teacher -> name = $request->name;
            $teacher -> email = $request->email;
            $teacher -> password = bcrypt($request->password);

            $teacher -> save();

            return redirect()->route('formLoginTeacher');
        }
    }

    // LOGIN DE PROFESSOR

    public function formLoginTeacher(){
        return view('/login/formLoginTeacher');
    }
    public function loginTeacher(Request $request){

        $credentials = $request -> validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if(Auth::guard('teacher')->attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->route('home')->with('msg', 'Professor logado!');
        }
         return redirect()->route('formLoginTeacher')->with('msg', 'Erro ao efetuar o login!');
    }
    public function edit($id){
        $teacher = Teacher::findOrFail($id);

        return view('update/edit', ['teacher' => $teacher]);
    }
    public function update($id, Request $request){
        $teacher = Teacher::findOrFail($id);

        $teacher -> name = $request->name;
        $teacher -> email = $request->email;
        $teacher -> password = bcrypt($request->password);

        $teacher->update();

        return redirect()->route('home')->with('msg', 'Professor editado com sucesso!!');

    }
    public function destroy($id){
        $teacher_checked = Auth::guard('teacher')->user();
        $teacher = Teacher::findOrFail($id);

        if($teacher_checked-> id == $teacher -> id){
            $teacher -> delete();
            return redirect()->route('home')->with('msg', 'Professor logado excluído, faça login novamente!');
        }

        $teacher -> delete();

        return redirect()->route('home')->with('msg', 'Professor exluído!!');
    }

    public function logout(Teacher $teacher){
        if(Auth::guard('teacher')->check()){

            Auth::guard('teacher')->logout();
            return redirect()->route('formLoginTeacher');
        }elseif(Auth::guard('student')->check()){
            Auth::guard('student')->logout();
            return redirect()->route('formLoginStudent');
        }
        else{
            Auth::guard('admin')->logout();
            return redirect()->route('formLoginAdmin');
        }


    }
    public function listUsers(){
        $teachers = Teacher::get();
        return view('listUsers', ['teachers'=> $teachers]);
    }
    public function dashboard(){
        if(Auth::guard('teacher')->check()){
            $user = Auth::guard('teacher')->user();
        }elseif(Auth::guard('student')->check()){
            $user = Auth::guard('student')->user();
        }
        else{
            $user = Auth::guard('admin')->user();
        }
        return view('dashboard', ['user' => $user]);
    }

    // Atividades
    public function createActivity(){
        $disciplines = Discipline::all();
        return view('activity/formCreateActivity', ['disciplines' => $disciplines]);
    }
    public function storeActivity(Request $request, Activity $activity){
        $teacher = Auth::guard('teacher')->user();
        $teacher_id = $teacher -> id;

        $activity -> teacher_id =  $teacher_id;
        $activity -> discipline_id = $request -> discipline;
        $activity -> name = $request->name;
        $activity -> description = $request -> description;

        $activity -> save();
        return redirect()->route('listActivities')->with('msg', 'Atividade criada com sucesso!');
    }
    public function listActivities(Discipline $discipline, Teacher $teacher_model){

        if(Auth::guard('teacher')->check()){
            $user_teacher = Auth::guard('teacher')->user();
            $teacher = Teacher::findOrFail($user_teacher->id);
            $teacher_id = $teacher -> id;
            $activities = $teacher->activities()->get();
            $all_activities = Activity::all();

            return view('activity/listActivities', ['activities' => $activities, 'teacher' => $teacher, 'discipline_model' => $discipline, 'all_activities' => $all_activities]);

        }
        $all_activities = Activity::all();

        return view('activity/listActivities', ['all_activities' => $all_activities,  'discipline_model' => $discipline, 'teacher_model' => $teacher_model]);
    }
    public function showActivity(Activity $id_activity, Discipline $discipline){
        if(Auth::guard('student')->check()==true){
            $student = Auth::guard('student')->user();
            $student_responses = $id_activity->activity_response()->where('student_id', $student->id)->get();

            $user_teacher = $id_activity->teacher()->get()->first();
            $teacher_id = $user_teacher -> id;
            $activities = $user_teacher->activities()->get();
            $responses = $id_activity->activity_response()->get();
            return view('activity/showActivity', ['activity' => $id_activity, 'teacher' => $user_teacher, 'discipline_model' => $discipline, 'responses' => $responses, 'student_responses' => $student_responses]);
        }
        $user_teacher = $id_activity->teacher()->get()->first();
        $teacher_id = $user_teacher -> id;
        $activities = $user_teacher->activities()->get();
        $responses = $id_activity->activity_response()->get();
        return view('activity/showActivity', ['activity' => $id_activity, 'teacher' => $user_teacher, 'discipline_model' => $discipline, 'responses' => $responses]);
    }
    public function editActivity(Activity $id_activity, Discipline $discipline_model){
        $disciplines = Discipline::all();
        return view('activity/editActivity', ['activity' => $id_activity, 'discipline_model' => $discipline_model, 'disciplines' => $disciplines]);
    }
    public function updateActivity($activity_id, Request $request){
        $activity = Activity::findOrFail($activity_id);

        $activity -> discipline_id = $request -> discipline;
        $activity -> name = $request->name;
        $activity -> description = $request -> description;

        $activity -> update();
        return redirect()->route('listActivities')->with('msg', 'Atividade atualizada com sucesso!');
    }
    public function destroyActivity(Activity $id_activity){
        // $activity = Activity::findOrFail($id_activity);

        $id_activity -> delete();
        return redirect()->route('listActivities')->with('msg', 'Atividade excluída com sucesso!');

    }
}

