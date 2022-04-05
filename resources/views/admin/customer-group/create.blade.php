@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form>
            <div class="card">
                <div class="card-header card_header bg-black">
                    <div class="row">
                        <div class="col-lg-8 card_header_title">
                            Create Customer Group
                        </div>
                            <div class="col-lg-4 header_btn">
                                <a class="btn btn-md btn-secondary" href="{{url('/customer/group')}}"> All Customer Group</a>
                        </div>
                    </div>
                </div>
                <div class="card-body card_body">
                    <p>The field labels marked with <span class="req_star"> * </span>are required input fields.</p>
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label><strong>Name<span class="req_star"> * </span></strong> </label>
                                <input type="text" class="form-control form_control" id="" name="name" value="">
                            </div>
                            <div class="form-group">
                                <label><strong>Remarks<span class="req_star"> * </span></strong> </label>
                                <textarea type="text" class="form-control form_control" id="" name="remarks" value="">
                                </textarea>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
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
