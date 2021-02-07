@extends('layouts.tdg_member_layout')
@section('content')

        <link rel="stylesheet" href="{{asset('css/time.css')}}">
        <script src="{{asset('js/time.js')}}" type="text/javascript" charset="utf-8" async defer></script>

        <div class="container">
            <div class="row">
               <div class="col-6">

       


               </div>
               <div class="col-6">
                    <div class="time_tracker__clock">
                        <div class="card">
                                <div class="card-img-top d-flex align-items-center justify-content-center">
                                    <div id="stopwatch">
                                        00:00:00
                                    </div>
                                </div>
                            <div class="card-body">
                                <ul class="d-flex" id="buttons">
                                    <li><button class="clock_button" onclick="startTimer()">Start</button></li>
                                    <li><button class="clock_button"onclick="stopTimer()">Stop</button></li>
                                    <li><button class="clock_button" onclick="resetTimer()">Reset</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
       


        </div>


        









        <script src="main.js"></script>

@endsection