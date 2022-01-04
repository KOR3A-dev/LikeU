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
    * @OA\Get(
    * path="/api/agenda",
    * tags={"AGENDA"},
    * summary="see Agenda's",
    * description="See Agenda's Here",
    * operationId="index",
    *     @OA\Response(
    *         response=200,
    *         description="Operation Successfully",
    *     @OA\Schema(
    *       additionalProperties={
    *         "type":"integer",
    *         "format":"int32"
    *       }
    *     )
    *       ),
    *      @OA\Response(
    *          response=422,
    *          description="Unprocessable Entity",
    *          @OA\JsonContent()
    *       ),
    *
    * )
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendas = Agenda::all();

        return response()->json([
            'Agendas' => $agendas
        ],200);
    }



    /**
    * @OA\Post(
    * path="/api/agenda",
    * tags={"AGENDA"},
    * summary="create Agenda",
    * description="See Agenda's Here",
    *   operationId="store",
    *     @OA\RequestBody(
    *         @OA\JsonContent(),
    *         @OA\MediaType(
    *            mediaType="multipart/form-data",
    *          @OA\schema(
    *               type="object",
    *               @OA\Property(property="subject", type="string"),
    *               @OA\Property(property="date", type="string"),
    *               @OA\Property(property="status", type="string"),
    *               @OA\Property(property="user_id", type="integer"),
    *           ),
    *         ),
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Operation Successfully",
    *        @OA\JsonContent(
    *               @OA\Property(property="subject", type="string"),
    *               @OA\Property(property="date", type="string"),
    *               @OA\Property(property="status", type="string"),
    *               @OA\Property(property="user_id", type="integer"),
    *           ),
    *       ),
    *      @OA\Response(
    *          response=422,
    *          description="Unprocessable Entity",
    *          @OA\JsonContent()
    *       ),
    *      @OA\Response(response=400, description="Bad request"),
    *      @OA\Response(response=404, description="Resource Not Found"),
    *
    * )
    */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
    public function update(Request $request, $id)
    {
        $agenda = Agenda::find($id);

        $agenda->subject = $request->input('subject');
        $agenda->date = $request->input('date');
        $agenda->status = $request->input('status');
        $agenda->user_id = $request->input('user_id');

        $agenda->update($request->all());
        $agenda->save();

        if($agenda->status != 'approved'){
            return response()->json([
                'message' => 'Oops! you can only modify agendas in approved status.'
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
