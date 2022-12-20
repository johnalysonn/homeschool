<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;

class DisciplineController extends Controller
{
 
    public function create()
    {
        return view('disciplines/registerDisciplines');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Discipline $discipline)
    {
        $discipline -> name = $request -> name;
        $discipline -> save();

        return redirect()->route('home')->with('msg', 'Disciplina criada!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $disciplines = Discipline::all();
        return view('disciplines/listDisciplines', ['disciplines' => $disciplines]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discipline = Discipline::findOrFail($id);

        return view('disciplines/editDiscipline', ['discipline' => $discipline]);
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
        $discipline = Discipline::findOrFail($id);

        $discipline -> name = $request -> name;
        $discipline -> save();

        return redirect()->route('home')->with('msg', 'Disciplina atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discipline = Discipline::findOrFail($id);

        $discipline->delete();
        return redirect()->route('listDisciplines')->with('msg', 'Disciplina ('.$discipline->name.') deletada!');

    }
}
