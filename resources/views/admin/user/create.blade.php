@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header card_header bg-black">
                    <div class="row">
                        <div class="col-lg-8 card_header_title">
                            User Create
                        </div>
                        <div class="col-lg-4 header_btn">
                            <a class="btn btn-md btn-secondary" href="{{ route('user.index') }}"> All user</a>
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
                            <div class="form-group {{$errors->has('name') ? ' has-error':''}}">
                                <label><strong>UserName<span class="req_star"> * </span></strong> </label>
                                <input type="text" class="form-control form_control" id="" name="name"
                                    value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                <span class="error">{{ $errors->first('name') }}</span>
                                @endif

                            </div>

                            <div class="form-group {{$errors->has('password') ? ' has-error':''}}">
                                <label><strong>Password<span class="req_star"> * </span></strong> </label>
                                <input type="password" class="form-control form_control" id="" name="password"
                                    value="{{ old('password') }}">

                                @if ($errors->has('password'))
                                <span class="error">{{ $errors->first('password') }}</span>
                                @endif

                            </div>

                            <div class="form-group {{$errors->has('phone') ? ' has-error':''}}">
                                <label><strong>Phone<span class="req_star"> * </span></strong> </label>
                                <input type="phone" class="form-control form_control" id="" name="phone"
                                    value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                <span class="error">{{ $errors->first('phone') }}</span>
                                @endif

                            </div>

                            <div class="form-group">
                                <label><strong>Photo</strong> </label>
                                <input type="file" class="form-control form_control" id="user-fileinput" name="photo"
                                    value="{{ old('photo') }}">
                            </div>

                            <div class="form-group">
                                <input class="mt-2" type="checkbox" name="active" value="1" checked="">
                                <label class="mt-2"><strong>Active</strong></label>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group {{$errors->has('email') ? ' has-error':''}}">
                                <label><strong>Email<span class="req_star"> * </span></strong> </label>
                                <input type="email" class="form-control form_control" id="" name="email"
                                    value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                                @endif

                            </div>

                            <div class="form-group">
                                <label><strong>Confirm Password<span class="req_star"> * </span></strong> </label>
                                <input type="password" class="form-control form_control" id=""
                                    name="password_confirmation" value="{{ old('password_confirmation') }}">
                            </div>

                            <div class="form-group {{$errors->has('role') ? ' has-error':''}}">
                                <label><strong>Role<span class="req_star"> * </span></strong> </label>
                                <select class="form-control form_control" id="" name="role" value="{{ old('role') }}">
                                    <option selected disabled>Select Role</option>
                                    <option value="1">Admin</option>
                                    <option value="2">owner</option>
                                    <option value="1">customer</option>
                                    @if ($errors->has('role'))
                                    <span class="error">{{ $errors->first('role') }}</span>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <img width="60px" height="60px" src="{{ asset('uploads/images_not.png') }}"
                                    id="preview-image" class="rounded" alt="User Image">
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
{{-- Live Image Script --}}
<script type="text/javascript">
    $('#user-fileinput').change(function () {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview-image').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
</script>
@endsection
