@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form>
            <div class="card">
                <div class="card-header card_header bg-black">
                    <div class="row">
                        <div class="col-lg-8 card_header_title">
                            </i>All Customer Group List
                        </div>
                        <div class="col-lg-4 header_btn">
                            <a class="btn btn-md btn-secondary" href="{{url('/customer/group/create')}}"><i class=" fas fa-plus "></i> Add Customer Group</a>
                        </div>
                    </div>
                </div>
                <div class="card-body card_body">
                    <table id="allDataTable" class="table table-striped table-bordered table-hover custom_table">
                        <thead class="table-primary">
                            <tr>
                                <td>Name</td>
                                <td>Remarks</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>Remarks</td>
                                <td>Status</td>
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
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-dark"></div>
            </div>
        </form>
    </div>
</div>
@endsection
