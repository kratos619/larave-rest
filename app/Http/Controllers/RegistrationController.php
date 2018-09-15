<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $meeting_id = $request->input('meeting_id');
        $user_id = $request->input('user_id');
        $meeting = [
            'title' => 'Title',
            'description' => 'Description',
            'time' => 'Time',
            'view_meeting' => [
                'href' => 'api/meeting/1',
                'method' => 'GET'
            ]
            ];

            $user = [
                'name' =>  'Name'
            ];

            $response = [
                'msg' => 'User register for Meeting',
                'meeting' => $meeting,
                'user' => $user,
                'unregister' => [
                    'href' => 'api/meeting/registration/1',
                    'method' => 'DELETE'
                ]
                ];

                return response()->json($response, 200);
        
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

        $meeting = [
            'title' => 'Title',
            'description' => 'Description',
            'time' => 'Time',
            'view_meeting' => [
                'href' => 'api/meeting/1',
                'method' => 'GET' 
            ],

        ];

        $user = [
            'name ' => 'Name'
        ];

        $response = [
            'msg' => 'User unregister for meeting',
            'meeting' => $meeting,
            'user' => $user,
            'register' => [
                'href' => 'api/meeting/registration',
                'method' => 'POST',
                'params' => 'user_id,meeting_id'
            ]
            ];

            return response()->json($response , 200);
    }
}
