<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Hour;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Appointment::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $column = [
            "hour"  => "required|exists:hours,id",
            "email" => "required|email",
            "date"  => "required|date",
        ];

        $mesaje = [];

        $this->validate($request,$column, $mesaje );

        $Appointment = new Appointment();
        $Appointment->hour_id = $request->hour;
        $Appointment->user_id = 1;
        $Appointment->email = $request->email;
        $Appointment->date = $request->date;
        $Appointment->save();
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function detail(Request $request){
        $quotes = Appointment::where('date',$request->date)->with('hour')->get();
        $hour = Hour::where('status',true)->get();

        $arrayAux = [];

        foreach ($hour as $h){

            $status = true;

            foreach ($quotes as $q){
                if ($q->hour_id == $h->id)
                    $status = false;
            }

            $h->active = $status;
            $arrayAux[] = $h;

        }

        return ['quotes' => $quotes,'hours' => $arrayAux];
    }
}
