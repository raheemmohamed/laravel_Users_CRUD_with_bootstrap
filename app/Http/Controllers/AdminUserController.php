<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserfieldRequest;
use App\Photo;
use App\role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');

    }

    public function index()
    {
        $data = array(
            'users'=> User::orderBy('id','desc')->get(),
        );
        return view('admin.users.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data = array(
           'role' => role::lists('name','id')->all()
       );
        return view('admin.users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserfieldRequest $request)
    {
        //validate the input field directory


        $input = $request->all();

        if($file = $request->file('file')){
            $name =  Input::file('file');
            $img_name =  time() .$name->getClientOriginalName();
            $file->move('public/images',$img_name );
            //$input['file'] = $img_name;

          $photo = Photo::create(['file'=>$img_name]);

          $photo_id = $input['file'] = $photo->id;
        }

        User::create(['name'=>$request->name ,'email'=>$request->email, 'password'=>bcrypt($request->password), 'role_id'=>$request->roletype, 'active_id'=> $request->isActive, 'photo_id'=>$photo_id ]);

        return redirect()->action('AdminUserController@create')->with('status', 'user Created Successfully!');


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

        $data = [
            'users' => User::findOrFail($id),
            'role' => role::lists('name','id')->all()
        ];

        return view('admin.users.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     */
    public function update(UserEditRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);

        if(trim($request->password) == ''){
            $input = $request->except('password');
        }else{
            $input  = $request->all();
        }

        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name =  Input::file('photo_id');
            $img_name =  time() .$name->getClientOriginalName();
            $file->move('public/images',$img_name );

            $photo = Photo::create(['file'=>$img_name]);

            $photo_id = $input['photo_id'] = $photo->id;

        }

        //$user->update($input);

        $user->update(['name'=>$request->name ,'email'=>$request->email, 'password'=>bcrypt($request->password), 'role_id'=>$request->role_id, 'active_id'=> $request->active_id, 'photo_id'=>$photo_id ]);

        return redirect()->action('AdminUserController@edit',$id)->with('status', 'User Updated Successfully!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::findOrFail($id);

        $deletusername = $User->name;

        $User->delete();

        return redirect()->action('AdminUserController@index')->with('status', $deletusername.'user Created Successfully!');


    }
}
