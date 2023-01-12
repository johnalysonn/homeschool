<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Activity_Response;
use App\Models\Discipline;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            $act_response->filepath = $file->store('responses/'.$id_activity->id);
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
    public function edit(Activity_Response $id_response, Discipline $discipline_model)
    {
        $activity = $id_response->activity()->get()->first();
        return view('activity/activity_response_edit', ['response' => $id_response, 'activity' => $activity, 'discipline_model' => $discipline_model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_response)
    {
        $response = Activity_Response::findOrFail($id_response);
        $id_activity = $response->activity()->get()->first();

        if($request->coment){
            $response ->description = $request->coment;
        }
        $response->update();

        return redirect()->route('listActivities')->with('msg', 'Atividade editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity_Response $id_response)
    {
        $id_response->delete();
        return back()->with('msg', 'Resposta apagada com sucesso');
    }
    public function updateCheck(Activity_Response $id_response, $check_code){
        $response_update_check = $id_response->update([
            'check' => $check_code,
        ]);
        if($response_update_check){
            if($id_response -> check == 0){
                return back()->with('msg', 'Visto adicionado com sucesso');
            }else{

                return back()->with('msg', 'Visto retirado com sucesso');
            }
        }
    }
    public function download(Activity_Response $id_response){
        $id_activity = $id_response->activity()->get()->first()->id;
        $part_filename = explode("/", $id_response->filepath);
        $file_name =  $part_filename[count($part_filename)-1];
        return Storage::download('responses/'.$id_activity.'/'.$file_name);
    }
    public function addNote(Activity_Response $id_response, Request $request){
        // dd($request->all());
        if($request->note){
            $id_response -> note = $request->note;

            $id_response -> save();
            return back()->with('msg', 'Nota aderida com sucesso!');
        }
        else{
            return back()->with('msg', 'Erro! Adicione uma nota!');
        }
    }
}
