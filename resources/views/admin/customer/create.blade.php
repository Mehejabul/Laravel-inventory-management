@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form method="post" action="customer.store" enctype="multipart/form">
            @csrf
            <div class="card">
                <div class="card-header card_header bg-black">
                    <div class="row">
                        <div class="col-lg-8 card_header_title">
                            Create Customer
                        </div>
                            <div class="col-lg-4 header_btn">
                                <a class="btn btn-md btn-secondary" href="{{url('/customer')}}"> All Customer</a>
                        </div>
                    </div>
                </div>
                <div class="card-body card_body">

                    @if(Session::has('success'))
                    <script>
                        swal({
                            title: 'success!',
                            text: "{{ Session::get('success')}}",
                            icon = 'success',
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if (Session::has('error'))
                    <script>
                        swal({
                            title: 'error!'
                            text: "{{ Session::get('error')}}",
                            icon = 'error',
                            timer: 5000
                        });

                    </script>
                    @endif

                    <p>The field labels marked with <span class="req_star"> * </span>are required input fields.</p>
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group {{$errors->has('customer_name') ? ' has-error':''}}">
                                <label><strong>Name<span class="req_star"> * </span></strong> </label>
                                <input type="text" class="form-control form_control" id="" name="customer_name" value="">

                                @if ($errors->has('cg_name'))
                                <span class="error">{{ $errors->first('cg_name') }}</span>
                                @endif

                            </div>

                            <div class="form-group">
                                <label><strong>Company Name<span class="req_star"> * </span></strong> </label>
                                <input type="text" class="form-control form_control" id="" name="customer_company" value="">
                            </div>

                            <div class="form-group">
                                <label><strong>Phone Number<span class="req_star"> * </span></strong> </label>
                                <input type="text" class="form-control form_control" id="" name="customer_phone" value="">
                            </div>

                            <div class="form-group">
                                <label><strong>City</strong> </label>
                                <input type="text" class="form-control form_control" id="" name="customer_city" value="">
                            </div>

                            <div class="form-group">
                                <label><strong>State</strong> </label>
                                <input type="text" class="form-control form_control" id="" name="customer_State" value="">
                            </div>

                            <div class="form-group">
                                <label><strong>Remarks<span class="req_star"> * </span></strong> </label>
                                <textarea type="text" class="form-control form_control" id="" name="customer_remarks" value=""></textarea>
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label><strong>Email</strong> </label>
                                <input type="email" class="form-control form_control" id="" name="customer_email" value="">
                            </div>

                            <div class="form-group">
                                <label><strong>Address<span class="req_star"> * </span></strong> </label>
                                <input type="text" class="form-control form_control" id="" name="customer_address" value="">
                            </div>

                            <div class="form-group">
                                <label><strong>Postal-Code</strong> </label>
                                <input type="text" class="form-control form_control" id="" name="customer_postal" value="">
                            </div>

                            <div class="form-group">
                                <label><strong>Country</strong> </label>
                                <input type="text" class="form-control form_control" id="" name="customer_country" value="">
                            </div>

                            <div class="form-group">
                                <label><strong>Customer Group</strong> </label>
                                <select type="text" class="form-control form_control" id="" name="cg_id" value="">
                                <option selected disabled>Select Group</option>
                                @foreach ($cg_all as $data)
                                <option title="{{ $data->cg_name }}" value="{{ $data->cg_id }}">{{ $data->cg_name }}</option>
                                @endforeach

                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer bg-dark text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
