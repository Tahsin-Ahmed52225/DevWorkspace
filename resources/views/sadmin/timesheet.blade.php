@extends('layouts.sadmin_layout')
@section('content')

<div class="container-fluid">
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

                    <!-- Page Heading -->
                    <div class="container pt-5 ">
                        <h4 style="font-weight: 700;" class="pb-5">View Time Sheets <i class="fa fa-users pl-1" ></i></h4>
                   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Time recorded</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Starting</th>
                                            <th>Description</th>
                                            <th>Total Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user_time as $value )
                                        <tr>
                                            <td>{{$value->name}}</td>
                                            <td> {{ \Carbon\Carbon::parse( $value->created_at )->toDateString() }}</td>
                                            <td>{{ \Carbon\Carbon::parse( $value->created_at )->subHours($value->hour)->subMinutes($value->min)->format('h:i') }}</td>
                                            <td>{{$value->description}}</td>
                                            <td>{{$value->hour}} hr {{$value->min}} min</td>
                                            
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