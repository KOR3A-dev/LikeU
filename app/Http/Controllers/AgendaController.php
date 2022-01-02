<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

     /**
     * Create a new AgendaController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Agenda::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $agenda = new Agenda();
        $agenda->subject = $request->input('subject');
        $agenda->date = $request->input('date');
        $agenda->status = $request->input('status');
        $agenda->user_id = $request->input('user_id');

        $agenda->save();

        return response()->json([
            'message' => 'Agenda successfully created!',
            'agenda' => $agenda
        ],201);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agenda = Agenda::find($id);

        return response()->json([
            'agenda' => $agenda
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $agenda = Agenda::find($id);

        $agenda->subject = $request->input('subject');
        $agenda->date = $request->input('date');
        $agenda->status = $request->input('status');
        $agenda->user_id = $request->input('user_id');

        $agenda->update($request->all());

        if(!$agenda->status == "approved"){
            return response()->json([
                'message' => 'Oops! you can only modify agendas in approved status'
            ],400);
        }

        return response()->json([
            'message' => 'agenda edited successfully!',
            'agenda' => $agenda
        ],200);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agenda::destroy($id);
        return response()->json([
            'message' => " agenda deleted successfully!"
        ]);
    }
}
