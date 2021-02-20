@extends('layouts.sadmin_layout')
@section('content')
<div class="container-fluid">

    <div class="container pt-5 pb-5">
    <h4 style="font-weight: 700;" class="pb-5">Add Member <i class="fa fa-user-plus pl-1" ></i></h4>
    @if(session()->has('status'))

         {!! session()->get('status') !!}

    @endif
    <form method="POST" action="{{ route('sadmin.addMember') }}">
    @csrf

    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control" id="inputAddress" placeholder="Name" name="tdg_username">
        </div>
        <div class="form-group col-md-6">
        <input type="text" class="form-control" id="inputPassword4" placeholder="Contact No" name="tdg_contact">
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-6">
        <input type="email" placeholder="Email"class="form-control" id="inputEmail4" name="tdg_email">
        </div>
        <div class="form-group col-md-6">
        <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="tdg_password">
        </div>
    </div>
    <div class="form-row">
        
        <div class="form-group col-md-4">
        <select id="inputState" class="form-control" name="tdg_department">
            <option selected>Department</option>
            <option>Web Development</option>
            <option>Graphics</option>
            <option>Marketing</option>
            <option>Management</option>
        </select>
        </div><div class="form-group col-md-4">
        <select id="inputState" class="form-control" name="tdg_position">
            <option selected>Position</option>
            <option>Web Developer</option>
            <option>Frontend Developer</option>
            <option>Sale Exicutive</option>
            <option>Graphics Designer</option>
            <option>Manager</option>
        </select>
        </div>
        <div class="form-group col-md-2 mt-1">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tdg_state"  value='1' >
                <label class="form-check-label" for="gridRadios1">
                Locked
                </label>
            </div>
        </div>
        <div class="form-group col-md-2 mt-1">
           <div class="form-check">
            <input class="form-check-input" type="radio" name="tdg_state"  value='0' >
            <label class="form-check-label" for="gridRadios2">
                Unlock
            </label>
           </div>

        </div>
    </div>
       
    
    <button type="submit" class="btn btn-primary mt-3">Register</button>
    </form>

    </div>
</div>
<!-- Footer -->

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

   




@endsection