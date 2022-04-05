@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form>
            <div class="card">
                <div class="card-header card_header bg-black">
                    <div class="row">
                        <div class="col-lg-8 card_header_title">
                            </i>All Customer List
                        </div>
                        <div class="col-lg-4 header_btn">
                            <a class="btn btn-md btn-secondary" href="{{url('/customer/create')}}"><i class=" fas fa-plus "></i> Add Customer</a>
                        </div>
                    </div>
                </div>
                <div class="card-body card_body">
                    <table id="allDataTable" class="table table-striped table-bordered table-hover custom_table">
                        <thead class="table-primary">
                            <tr>
                                <td>Customer Group</td>
                                <td>Name</td>
                                <td>Company Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td>Address</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
