<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meeting;
class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $meeting = Meeting::all();

     foreach($meetings as $meeting){
            $meeting->view_meeting = [
                'href' => 'api/meeting/'. $meeting->id,
                'method' => 'GET'
            ];
     }
            $response = [
                'msg' => 'List Of all Meeting',
                'meetings' =>$meetings
            ];
            return response()->json($response,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return "in works!";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //add validations
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'time' => 'required|date_format:YmdHie',
            'user_id' => 'required'
        ]);
        $title = $request->input('title');
        $description = $request->input('description');
        $time = $request->input('time');
        $user_id = $request->input('user_id');
        //$title = $request->input('title');
        
            $meeting = new Meeting([
                'time' => Carbon::createFormFormat('YmdHie',$time),
                'title' => $title,
                'description' => $description
            ]);
                if($meeting->save()){
                    $meeting->user()->attach($user_id);
                    $meeting->view_meeting = [
                        'href' => 'api/meeting/' . $meeting->id,
                        'method' => 'GET'
                    ];

                    $message = [
                'msg' => 'Meeting Created',
                'meeting' => $meeting
            ];
            return response()->json($response,201);

                }
        // $meeting = [
        //     'title' => $title,
        //     'description' => $description,
        //     'time' => $time,
        //     'user_id' => $user_id,
        //     'view_meeting' => [
        //         'href' => 'api/meeting/1',
        //         'method' => 'GET'
        //     ]
        //     ];

            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meeting = Meeting::with('users')->where('id',$id)->firstOrFail();
        $meeting->view_meeting = [
            'href' => 'api/meeting',
            'method' => 'GET'
        ];

        $response = [
            'msg' => 'Meeting Information',
            'meeting' => $meeting
        ];

        return response()->json($response,200);
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
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'time' => 'required|date_format:YmdHie',
            'user_id' => 'required'
        ]);
        $title = $request->input('title');
        $description = $request->input('description');
        $time = $request->input('time');
        $user_id = $request->input('user_id');

        // creating response objects 
        $meeting = [
            'title' => $title,
            'description' => $description,
            'time' => $time,
            'user_id' => $user_id,
            'view_meeting' => [
                'href' => 'api/meeting/1',
                'method' => 'GET'
            ]
            ];

            $response = [
                'msg' => 'Meeting Created',
                'meeting' => $meeting
            ];

            return response()->json($response,201);
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
        $response = [
            'msg' => 'Meeting Deleted',
            'create' => [
                'href' => 'api/meeting',
                'method' => 'POST',
                'params' => 'title,description,time'
            ]
            ];

            return response()->json($response,200);
    }
}
