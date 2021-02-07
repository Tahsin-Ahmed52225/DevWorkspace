@extends('layouts.sadmin_layout')
@section('content')
<div class="container-fluid">
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

                    <!-- Page Heading -->
                    <div class="container pt-5 ">
                        <h4 style="font-weight: 700;" class="pb-5">View Member <i class="fa fa-users pl-1" ></i></h4>
                   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Department</th>
                                            <th>Stage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $value)
                                        <tr>
                                            <td> {{$value->name}}</td>
                                            <td>{{$value->type}}</td>
                                            <td>{{$value->department}}</td>
                                            <td>{{$value->state}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            </div>







@endsection