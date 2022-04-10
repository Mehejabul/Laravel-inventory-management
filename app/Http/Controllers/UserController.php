<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $alluser = User::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.user.all',compact('alluser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $this-> validate($request,[
            'name' => ['required'],
            'email'=> ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'=> ['required'],
            'role' => ['required'],
            'password' => ['required', 'confirmed',  Rules\Password::defaults()],
        ],

        [
            'name.required' => 'please insert the name',
            'email.required' => 'please insert the email',
            'phone.required' => 'please insert the phone',
            'role.required' => 'please insert the role',
            'password.required' => 'please insert the password',
        ]);
        $slug = 'U'.uniqid();
        $insert = User::insertGetId([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'role' => $request['role'],
            'slug' => $slug,
            'active' => $request['active'],
            'status' => 1,
            'password' => Hash::make($request['password']),
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        // User Image Upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = 'user' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('uploads/user/' . $imageName);

            User::where('id', $insert)->update([
                'photo' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if($insert){
            Session::flash('success','User created successfully');
            return redirect()->back();
        }else{
            Session::flash('error','User created error');
            return redirect()->back();
        }
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
    public function edit($slug) {
    $data = User::where('slug',$slug)->where('status',1)->firstOrFail();
    return view('admin.user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $id = $request['id'];
        $this-> validate($request,[
            'name' => 'required',
            'phone'=> 'required',
            'role' => 'required',
        ],

        [
            'name.required' => 'please edit the name',
            'phone.required' => 'please edit the phone',
            'role.required' => 'please edit the role',
        ]);

        $update = User::where('status',1)->where('id',$id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'role' => $request['role'],
            'active' => $request['active'],
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        // User Image Upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = 'user' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('uploads/user/' . $imageName);

            User::where('id', $id)->update([
                'photo' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if($update){
            Session::flash('success','User update successfully');
            return redirect()->back();
        }else{
            Session::flash('error','User update error');
            return redirect()->back();
        }
    }

    public function softdel(){
        $id = $_POST['modal_id'];
        $soft = User::where('status',1)->where('id',$id)->update([
            'status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success','Successfully delete.');
            return redirect()->back();
        }else{
            Session::flash('error','Opps! Failed to delete.');
            return redirect()->back();
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
        //
    }
}


