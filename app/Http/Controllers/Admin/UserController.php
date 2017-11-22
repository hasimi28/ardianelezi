<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;
use DB;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','asc')->get();
        return view('backend.pages.users')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.create_users');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(UserRequest $request)
//    {
//
//
//           return response()->json([
//               'success' => true,
//               'message' => 'Super'
//           ], 200);
//
//
//
//    }

    public function store(Request $request)
    {
        $user = new User;

        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6'

            ]);
        } catch (ValidationException $e) {
            return response()->json($e->validator->errors(), 422);
        }

        // Add data
        $user->name = Input::get('name');
        $user->email =  Input::get('email');
        $user->password =  Hash::make(Input::get('password'));
        $user->save();
        return response()->json($user, 201);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backend.pages.show_user')->withUser($user);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrfail($id);
        return view('backend.pages.edit_users')->withUser($user);
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
        try {
            $this->validate($request, [

            'name' => 'required|max:25',
            'email' => 'required|email|unique:users,email,'.$id,

            ]);
        } catch (ValidationException $e) {
            return response()->json($e->validator->errors(), 422);
        }


        if(Input::get('check') == 'yes'){
            try {
                $this->validate($request, [
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6'
                ]);
            } catch (ValidationException $e) {
                return response()->json($e->validator->errors(), 422);
            }




            $user = User::findOrFail($id);

            $user->name = Input::get('name');
            $user->email =  Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            if($user->save()){

                return response()->json($user, 201);


            }



        }else{



            $user =  User::findOrFail($id);
            $user->name = Input::get('name');
            $user->email =  Input::get('email');


            if($user->save()){

                return response()->json($user, 201);


            }



        }





    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id)->delete();

        if($user){
            return redirect()->back()->with('success', 'Perdoruesi u fshi me sukses');
        }else{

            return redirect()->back()->with('success', 'Gabim gjat fshirjes');
        }
    }
}
