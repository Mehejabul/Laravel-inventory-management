@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form method="post" action="{{ route('cg.update',$data->cg_slug) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header card_header bg-black">
                    <div class="row">
                        <div class="col-lg-8 card_header_title">
                            Create Customer Group
                        </div>
                        <div class="col-lg-4 header_btn">
                            <a class="btn btn-md btn-secondary" href="{{ route('cg.index') }}"> All Customer Group</a>
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
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="form-group {{$errors->has('cg_name') ? ' has-error':''}}">
                                <label><strong>Name<span class="req_star"> * </span></strong> </label>
                                <input type="text" class="form-control form_control" id="" name="cg_name"
                                    value="{{ $data->cg_name }}">


                                @if ($errors->has('cg_name'))
                                <span class="error">{{ $errors->first('cg_name') }}</span>
                                @endif

                            </div>
                            <div class="form-group">
                                <label><strong>Remarks</strong> </label>
                                <textarea type="text" class="form-control form_control" id="" name="cg_remarks"
                                    value="{{ $data->cg_remarks }}" rows="">
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
