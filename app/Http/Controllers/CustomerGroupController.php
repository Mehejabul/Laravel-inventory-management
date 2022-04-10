<?php

namespace App\Http\Controllers;
use App\Models\CustomerGroup;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class CustomerGroupController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $cg_data = CustomerGroup::where('cg_status',1)->orderBy('cg_id', "Desc")->get();
            return view('admin.customer-group.all',compact('cg_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
    return view('admin.customer-group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,[
        'cg_name'=> ['required'],
        ],[
        'cg_name.required'=> 'Please insert Customer Group Name',
        ]);

        $slug = 'cg'.uniqid();
        $insert = CustomerGroup::insertGetId([
            'cg_name' => $request['cg_name'],
            'cg_remarks' => $request['cg_remarks'],
            'cg_slug' => $slug,
            'cg_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','Customer Group created successfully');
            return redirect()->back();
        }else{
            Session::flash('error','Customer Group created error');
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
    public function edit($slug){
        $data = CustomerGroup::where('cg_slug', $slug)->where('cg_status',1)->firstOrFail();
        return view("admin.customer-group.edit",compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug){
        $this->validate($request,[
        'cg_name'=>['required'],
        ],[
        'cg_name.required' => 'please insert the cg_namePlease edite Customer Group name',

        ]);
        $update = CustomerGroup::where('cg_status',1)->where('cg_slug',$slug)->update([
            'cg_name' => $request['cg_name'],
            'cg_remarks' => $request['cg_remarks'],
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success', 'Customer group edite Successfully');
            return redirect()->back();
        }else{
            Session::flash('error', 'Customer group edite');
            return redirect()->back();
        }

    }

    public function softdel(){
        $id = $_POST['modal_id'];
        $softdel = CustomerGroup::where('cg_status',1)->where('cg_id',$id)->update([
            'cg_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($softdel) {
            Session::flash('success' , 'successfully delete');
            return redirect()->back();
        }else{
            Session::flash('error' , 'Delete failed');
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
