<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Activity_Response;
use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
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
    public function create(Activity $id_activity, Discipline $discipline_model)
    {
        return view('activity/activity_response', ['activity' => $id_activity, 'discipline_model' => $discipline_model]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Activity $id_activity)
    {
        $user_student = Auth::guard('student')->user();
        for($i = 0; $i < count($request->allFiles()['file_response']); $i++){
            $file = $request->allFiles()['file_response'][$i];

           $act_response = new Activity_Response();
            $act_response->activity_id = $id_activity -> id;
            $act_response->student_id = $user_student->id;
            $act_response->filepath = $file->getClientOriginalName();
            $file->store('responses/'.$id_activity->id);
            if($request->coment){
                $act_response ->description = $request->coment;
            }
            $act_response->save();

            unset($act_response);
        }

        return redirect()->route('listActivities')->with('msg', 'Atividade respondida com sucesso!');

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
        //
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
        //
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
}
