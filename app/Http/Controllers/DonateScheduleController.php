<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StoreDonateRequest;
use App\Http\Resources\DonateResource;
use App\Models\donate_schedule;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response ;

class DonateScheduleController extends Controller
{
    public function __construct()
    {
     $this->middleware('blood_compare')->only('edit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $donate= donate_schedule::with('User',' BloodType')->get();
       return response()->json([
        "message"=> "fetch data success!",
        "data"=> $donate,
       ], RESPONSE::HTTP_ACCEPTED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          "user_id" => "required|exists:users,id",
          "blood_type_id"=> "required|exists:blood_types,id",
          "amount"=>"required|min:1",
          "verfied"=> "nullable"
        ]);

        $donate= donate_schedule::create([
            "user_id" => $request->user_id,
            "blood_type_id"=> $request->blood_type_id,
            "amount"=> $request->amount,
            "verfied"=> false,

        ]);
        return response()->json([
            "message"=> "created successfully!",
            // "message"=> trans('response.test'),
            "data"=> $donate,
           ],RESPONSE::HTTP_ACCEPTED);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\donate_schedule  $donate_schedule
     * @return \Illuminate\Http\Response
     */
    public function show( $schedule_id)
    {

     $schedule = donate_schedule::where('id','=',$schedule_id)->with('User','BloodType')->get();
     return response()->json([
        "message"=> "Fetch data successfully!",
        "data"=> $schedule,
       ],RESPONSE::HTTP_ACCEPTED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\donate_schedule  $donate_schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $schedule_id)
    {
     $request->validate([
        "amount"=>"required|min:1|integer",

     ]);
      donate_schedule::where('id','=',$schedule_id)->with('User','BloodType')->update([
       "amount"=> $request-> amount
     ]);

     return response()->json([
        "message"=> "updated successfully!",
       ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\donate_schedule  $donate_schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(donate_schedule $donate_schedule)
    {
        donate_schedule::where('id','=',$donate_schedule)->delete();
    }
}
