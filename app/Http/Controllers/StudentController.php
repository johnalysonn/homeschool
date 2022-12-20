<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
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
        return view('/register/formRegisterStudent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Student $student)
    {
        if(Auth::guard('student')->check()){
            $student -> name = $request->name;
            $student -> email = $request->email;
            $student -> password = bcrypt($request->password);
        
            $student -> save();
            
            return redirect()->route('home')->with('msg', 'Aluno criado!!');
        }else if(Auth::guard('teacher')->check()){
            $student -> name = $request->name;
            $student -> email = $request->email;
            $student -> password = bcrypt($request->password);
        
            $student -> save();
            
            return redirect()->route('home')->with('msg', 'Aluno criado!!');
        }
        else if(Auth::guard('admin')->check()){
            $student -> name = $request->name;
            $student -> email = $request->email;
            $student -> password = bcrypt($request->password);
        
            $student -> save();
            
            return redirect()->route('home')->with('msg', 'Aluno criado!!');
        }
        else{
            $student -> name = $request->name;
            $student -> email = $request->email;
            $student -> password = bcrypt($request->password);
            $student -> save();

            return redirect()->route('formLoginStudent');
        }
    }
    public function formLoginStudent(){
        return view('login/formLoginStudent');
    }
    public function loginStudent(Request $request){
        $credentials = $request -> validate([
            'email' => ['required', 'email'], 
            'password' => ['required'],
        ]);
        if(Auth::guard('student')->attempt($credentials)){
            $request->session()->regenerate();
            
            return redirect()->route('home')->with('msg', 'Aluno logado!');
        }
         return redirect()->route('formLoginStudent')->with('msg', 'Erro ao efetuar o login!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('update/editStudent', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student -> name = $request->name;
        $student -> email = $request->email;
        $student -> password = bcrypt($request->password);
        
        $student->update();

        return redirect()->route('home')->with('msg', 'Aluno editado com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function listStudents(){
        $students = Student::get();
        return view('listStudents', ['students'=> $students]);
    }
    public function updateActive($student_id, $active_code){
        $student = Student::findOrFail($student_id);
        $student_update_active = Student::findOrFail($student_id)->update([
            'active' => $active_code,
        ]);
        if($student_update_active){
            if($student -> active == 0){
                return redirect()->route('listStudents')->with('msg', 'Aluno ativado com sucesso');
            }else{
                return redirect()->route('listStudents')->with('msg', 'Aluno desativado com sucesso');
            }
        }
    }
}
