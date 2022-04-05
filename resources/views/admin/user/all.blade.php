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
                            <a class="btn btn-md btn-secondary" href="{{url('/user')}}"><i class=" fas fa-user-plus "></i> All user</a>
                        </div>
                    </div>
                </div>
                <div class="card-body card_body">
                    <table id="allDataTable" class="table table-striped table-bordered table-hover custom_table">
                        <thead class="table-primary">
                            <tr>
                                <td>User Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td>Role</td>
                                <td>status</td>
                                <td>Photo</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alluser as $data )
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->phone}}</td>
                                <td>Role</td>
                                <td>
                                    @if($data['active'])
                                    <span class="badge badge-pill badge-soft-success font-size-11">Active</span>
                                    @else
                                    <span class="badge badge-pill badge-soft-danger font-size-11">Desible</span>
                                    @endif
                                </td>
                                <td>Photo</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Manage
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-dark"></div>
            </div>
        </form>
    </div>
</div>
@endsection
