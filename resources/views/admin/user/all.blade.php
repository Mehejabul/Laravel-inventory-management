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
                            <a class="btn btn-md btn-secondary" href="{{ route('user.create') }}">
                                <i class=" fas fa-user-plus "></i> Add user
                            </a>
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
                                <td>{{ $data['name'] }}</td>
                                <td>{{ $data['email'] }}</td>
                                <td>{{ $data['phone'] }}</td>
                                <td>{{ $data['role'] }}</td>
                                <td>
                                    @if($data['active'])
                                    <span class="badge badge-pill badge-soft-success font-size-11">Active</span>
                                    @else
                                    <span class="badge badge-pill badge-soft-danger font-size-11">Desible</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($data['photo'])
                                    <img height="60px" width="60px" src="{{ asset('uploads/user/' .$data['photo']) }}">
                                    @else
                                    <img height="60px" width="60px" src="{{ asset('uploads/images_not.png') }}">
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Manage
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('user.edit',$data->slug) }}">
                                                    <i class="dripicons-document-edit"></i>Edit
                                                </a>
                                            </li>
                                            <a class="dropdown-item text-primary btn-link" href="" id="delete"
                                                data-bs-toggle="modal" data-bs-target="#softDeleteModal"
                                                data-id="{{$data->id}}">
                                                <i class="dripicons-trash"></i> Delete
                                            </a>
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

<div class="modal fade" id="softDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ route('user.softdel',$data->slug)}}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id=""><i class="fab fa-gg-circle"></i> Confirm Message</h5>
                </div>
                <div class="modal-body modal_body">
                    Are you want to sure delete data?
                    <input type="hidden" name="modal_id" id="modal_id">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Confirm</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@include('admin.includes.delete_alart');
@endsection
