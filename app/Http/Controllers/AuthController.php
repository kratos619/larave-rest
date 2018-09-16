<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AuthController extends Controller
{
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
            
        $user = new User([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);
        if($user-> save()){
            $user->signin =[
                'href' => 'api/users/signin',
                'method' => 'POST',
                'params' => 'email,password'
            
            ];
            $response = [
                'msg' => 'User Created',
                'users' => $user
            ];
     return response()->json($response,200);
        }
        
            $response = [
                'msg' => 'Error Occurred',
                
            ];

            
 return response()->json($response,404);



    }

    public function sign_in(Request $request ){

        $this->validate($request,[
            
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
         $user = [
            'name' => 'Name',
            'email' => $email,
            'password' => $password,
            
            ];

            $response = [
                'msg' => 'User Sign In',
                'users' => $user
            ];


     return response()->json($response,200);
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
