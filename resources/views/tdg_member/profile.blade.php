@extends('layouts.tdg_member_layout')
@section('content')
<style>

.profile .fa {

    padding: 8px;

    border-radius: 10px;

    font-size: 30px;

    width: 50px;

    text-align: center;

    text-decoration: none;

    margin: 5px 2px;

}

.profile .fa:hover {

    opacity: 0.7;

}

.fa-dribbble {

     background: #ea4c89;

     color: white;

}

.fa-facebook {

     background: #3B5998;

     color: white;

}

.fa-youtube{

     background: #bb0000;

     color: white;

}

.fa-instagram{

     background: #125688;

     color: white;

}

.fa-linkedin{

     background: #007bb5;

     color: white;

}

</style>





<!-- Header -->

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 400px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">

<!-- Mask -->

<span class="mask bg-gradient-default opacity-8"></span>

<!-- Header container -->


<!-- Page content -->

<div class="container-fluid mt--7">

<div class="row">

    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">

        <div class="card card-profile shadow">

            <div class="row justify-content-center">

                <div class="pt-4">

                    <div class="card-profile-image">

                        <a href="#">


                                <img  src="{{asset('img/undraw_profile_1.svg')}}" style="height:200px; width:200px; object-fit:fill;" class="rounded-circle">


                        </a>

                    </div>

                </div>

            </div>


            <div class="card-body pt-0 pt-md-4">

                <div class="row">

                    <div class="col">

                        <div class="card-profile-stats d-flex justify-content-center mt-md-5">


                        </div>

                    </div>

                </div>

                <div class="text-center">

                    <h3 style="font-weight:700">

                        {{ Auth::user()->name }}

                    </h3>

                    <p>

                        {{ Auth::user()->type }}

                    </p>

                    <div class="h5 font-weight-300">

                        <i class="ni location_pin mr-2"></i> {{ Auth::user()->department }}

                    </div>

                    <div class=" mt-5">



                    <a href="#" class="btn btn-info" style="    background-color: #446ad8; border-color: #446ad8;">Edit profile</a>



                    </div>

                   

                    <hr class="my-4" />

                   

                    


                </div>

            </div>

        </div>

    </div>

    <div class="col-xl-8 order-xl-1">

        <div class="card bg-white shadow">

            <div class="card-body">

                @if(session()->has('status'))

                    {!! session()->get('status') !!}

                @endif

                <form>

                    <h4 class="mb-4 ">Profile information</h4>

                    <div class="pl-lg-4">

                        <div class="row">

                            <div class="col-lg-6">

                                <div class="form-group">

                                    <label class="form-control-label" for="input-email">Email address</label>

                                    <p>{{ Auth::user()->email }}</p>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">

                                    <label class="form-control-label" for="input-first-name">Phone</label>

                                    <p>019336666666</p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <hr class="my-4" />

                    <!-- Address -->

                    <h4 class="heading-small text-muted mb-4">Contact information</h4>

                    <div class="pl-lg-4">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">

                                    <label class="form-control-label" for="input-address">Address</label>

                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, cum.</p>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-4">

                                <div class="form-group">

                                    <label class="form-control-label" for="input-city">City</label>

                                    <p>Dhaka</p>

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="form-group">

                                    <label class="form-control-label" for="input-country">Country</label>

                                    <p>Bangladesh</p>

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="form-group">

                                    <label class="form-control-label" for="input-country">Postal code</label>

                                    <p>1337</p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <hr class="my-4" />

                    <h4 class="heading-small text-muted mb-4">About me</h4>

                    <div class="pl-lg-4">

                        <div class="form-group">

                            <label>About Me</label>

                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, quod! </p>

                        </div>

                    </div>



                </form>

            </div>

        </div>

    </div>

</div>




</div>





@endsection