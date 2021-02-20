@extends('layouts.tdg_manager_layout')
@section('content')

<div class="container-fluid">

    <div class="container pt-5 pb-5">
    <h4 style="font-weight: 700;" class="pb-5">Add Project <i class="fa fa-folder-plus pl-1" ></i></h4>
    @if(session()->has('status'))

         {!! session()->get('status') !!}

    @endif
    <form method="POST" action="{{ route('tdg-manager.addProject') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control"  placeholder="Project Title" name="tdg_projectTitle">
        </div>
        <div class="form-group col-md-6">
        <input type="text" class="form-control" placeholder="Project ID" name="tdg_projectID">
        </div>
    </div>
    
    
    <div class="form-row">
        
        <div class="form-group col-md-6">
            <select  class="form-control" id="tdg_department" name="tdg_projectDepartment">
                <option selected>Department</option>
                <option>Web Development</option>
                <option>Graphics</option>
                <option>Marketing</option>
                <option>Management</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <select  class="form-control" name="tdg_projectManager" id="person">
                <option selected>Project Manager</option>
            </select>
        </div>
        
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
             <input type="text" class="form-control" placeholder="Project Deadline" name="tdg_projectDeadline" onfocus="(this.type='date')">
        </div>
         
        <div class="form-group col-md-6">
            <select class="custom-select  " id="inlineFormCustomSelectPref" name="priority">
                <option selected>Priority...</option>
                <option value="low">Low!</option>
                <option value="medium">Medium!!</option>
                <option value="high">High!!!</option>
            </select>
        </div>
    </div>
    <div class="form-row">
            <div class="form-group col-md-12">
                <textarea class="form-control"   placeholder="Project Description" rows="3" name="tdg_projectDescription"></textarea>
            </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
            <input type="file" class="custom-file-input" id="validatedCustomFile" name="file" required>
            <label class="custom-file-label" for="validatedCustomFile">Enter Project File...</label>
            <div class="invalid-feedback">Example invalid custom file feedback</div>
    </div>
        
    </div>
        
    
       
    
    <button type="submit" class="btn btn-primary mt-3">Add Project</button>
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
<script type="text/javascript">
      var department = document.getElementById("tdg_department");
      department.addEventListener('change',function(){
        var data = department.value;
        $.ajax({
                    type : 'get',
                    url : '/tdg-manager/getdepartment-person',
                    data:{'data':data},
                    success:function(data){
                        
                        $('#person').html(data);
                    
                        
                    },
                    error: function (data, textStatus, errorThrown) {
                        console.log("Error:");
                        console.log(data);

                    },
        })
      })
</script>
 


@endsection