@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form>
            <div class="card">
                <div class="card-header card_header bg-black">
                    <div class="row">
                        <div class="col-lg-8 card_header_title">
                            User Create
                        </div>
                            <div class="col-lg-4 header_btn">
                                <a class="btn btn-md btn-secondary" href="{{url('dashboard/user')}}"> All user</a>
                        </div>
                    </div>
                </div>
                <div class="card-body card_body">
                    <p>The field labels marked with <span class="req_star"> * </span>are required input fields.</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label><strong>UserName<span class="req_star"> * </span></strong> </label>
                                <input type="text" class="form-control form_control" id="" name="name" value="">
                            </div>

                            <div class="form-group">
                                <label><strong>Password<span class="req_star"> * </span></strong> </label>
                                <input type="password" class="form-control form_control" id="" name="password" value="">
                            </div>

                            <div class="form-group">
                                <label><strong>Phone<span class="req_star"> * </span></strong> </label>
                                <input type="phone" class="form-control form_control" id="" name="phone" value="">
                            </div>

                            <div class="form-group">
                                <label><strong>Photo</strong> </label>
                                <input type="file" class="form-control form_control" id="" name="pic" value="">
                            </div>

                            <div class="form-group">
                                <input class="mt-2" type="checkbox" name="is_active" value="1" checked="">
                                <label class="mt-2"><strong>Active</strong></label>
                            </div>

                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label><strong>Email<span class="req_star"> * </span></strong> </label>
                                <input type="email" class="form-control form_control" id="" name="email" value="">
                            </div>
                            <div class="form-group">
                                <label><strong>Confirm Password<span class="req_star"> * </span></strong> </label>
                                <input type="password" class="form-control form_control" id="" name="password_confirmation" value="">
                            </div>
                            <div class="form-group">
                                <label><strong>Role<span class="req_star"> * </span></strong> </label>
                                <select class="form-control form_control" id="" name="role" value="">
                                    <option value="">Select Role</option>
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
