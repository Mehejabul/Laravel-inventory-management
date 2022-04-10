<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;
Use App\Models\CustomerGroup;
use Illuminate\Validation\Rules;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class CustomerController extends Controller{
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
        $allcustomer = Customer::where('customer_status',1)->orderBy('customer_id','Desc')->get();
        return view('admin.customer.all', compact('allcustomer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $cg_all = CustomerGroup::where('cg_stataus',1)->OrderBy('cg_id','Desc')->get();
        return view('admin.customer.create',compact('cg_all'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    $this->validate($request,[
    'cg_id' =>['required'],
    'customer_name' => ['required'],
    'customer_company' => ['required'],
    'customer_phone' => ['required'],
    'customer_address' => ['required'],
    'customer_remarks' => ['required'],
    ],[
        'cg_id.required' => 'please enter group name',
        'customer_name.required' => 'Please enter custmer name',
        'customer_company.required' => 'Please enter custmer company',
        'customer_phone.required' => 'Please enter custmer phone',
        'customer_address.required' => 'Please enter custmer address',
        'customer_remarks.required' => 'Please enter custmer remarks',
    ]);
    $slug = 'c'.uniqid();
    $creator = Auth::user()->id;
    $insert = Customer::insertGetId([
        'customer_name' => $request['customer_name'],
        'customer_email' => $request['customer_email'],
        'customer_phone' => $request['customer_phone'],
        'customer_company' => $request['customer_company'],
        'customer_address' => $request['customer_address'],
        'customer_city' => $request['customer_city'],
        'customer_state' => $request['customer_state'],
        'customer_postal' => $request['customer_postal'],
        'customer_country' => $request['customer_country'],
        'customer_remarks' => $request['customer_remarks'],
        'customer_slug' => $slug,
        'customer_creator' =>$creator,
        'customer_status' => 1,
        'created_at' => Carbon::now()->toDateTimeString(),
    ]);
if($insert){
    Session::flash('success', 'Customer information created Successfully');
    return redirect()->back();
}else{
    Session::flash('error', 'Customer information create error');
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
