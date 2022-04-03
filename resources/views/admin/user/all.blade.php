@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form>
            <div class="card">
                <div class="card-header card_header bg-black">
                    <div class="row">
                        <div class="col-lg-8 card_header_title">
                            <i class="fas fa-user-friends"></i>All User List
                        </div>
                        <div class="col-lg-4 header_btn">
                            <a class="btn btn-md btn-secondary" href="{{url('dashboard/user')}}"> All user</a>
                        </div>
                    </div>
                </div>
                <div class="card-body card_body">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
