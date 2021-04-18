@extends('layouts.tdg_member_layout')
@section('content')
<link rel="stylesheet" href="{{  asset('css/board.css')  }}">
<div class="board-layout">

    <div class="left">
      <div class="board-text">Project Board</div>
    </div>
{{-- ----------------------------------TODO Board Start ----------------------------------------}}

  <div id='boardlists' class="board-lists">
    <div id='list1' class="board-list" ondrop="dropIt(event)" data-value="Todo" ondragover="allowDrop(event)">
      <div class="list-title">
        To Do
      </div>
     <?php $i = 0;   ?>
      @foreach ($projects as $item)
          @if($item->project_board == "Todo")
              {{-- ----------- Todo Card Starts---------------}}

                        <div  id='card<?php $i++; echo $i; ?>' class="card
                            <?php
                                if($item->priority == 'high'){
                                echo  'bg-danger text-white';
                                }
                                else if($item->priority == 'medium'){
                                echo  'bg-warning text-white';
                                }
                                else{
                                echo  'bg-success text-white';
                                }
                            ?>
                        " data-toggle="modal" data-id= "{{ $item->id  }}"   data-target="#exampleModal<?php echo $i; ?>" draggable="true" ondragstart="dragStart(event)">
                            {{ $item->title }}
                        </div>
            {{-- ----------- Todo Ends ---------------}}

            {{-- ----------- Todo Card Full view Modal starts---------------}}

                        <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                    <h4 class="modal-title " id="exampleModalLabel">{{ $item->title }}   <span>ID : {{ $item->project_id }}</span>  </h4>

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                    <div>
                                                            <p> {{ $item->description }} </p>
                                                    </div>
                                                    <div class="pb-4">
                                                            <b>Project File:</b>   <a href="{{ route('tdg.downloadFile',$item->id)}}">Download</a>
                                                    </div>
                                                    <div>
                                                         {{--Check list starts--}}
                                                                    <b>Checklist:</b>
                                                                    @foreach ( $item->Checknode as $value )
                                                                <div>
                                                                    <div style="font-size: 16px;">
                                                                        <i class="fas fa-check-circle mr-2"></i>{{  $value["node_name"] }}
                                                                    </div>

                                                                        <form action="">
                                                                {{-- Progress bar --}}
                                                                            <div class="progress mt-1 mb-1" style="width:50% ;">
                                                                                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                                            </div>
                                                                {{-- Check list --}}
                                                                <div class="mt-2 mb-2">
                                                                    <div class="form-check " style="width:50%;">
                                                                        <input  class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                        <label class="form-check-label" for="flexCheckDefault">
                                                                            <div>
                                                                                asdfasdf asdffafas asdfasdf
                                                                            </div>
                                                                        </label>
                                                                        <i style="float:right;"class="fa fa-trash-alt "></i>
                                                                    </div>

                                                                </div>
                                                                {{-- Input box --}}
                                                                            <div>
                                                                                <input type="text" style="width:50%" class="" id="">
                                                                                <button style="padding: 5px 15px 4px 15px; font-size: 14px; margin-left: 15px;"type="submit" class="btn btn-primary">Add an item</button>
                                                                            </div>
                                                                            <div>

                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    @endforeach
                                                        {{--Check list ends--}}
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop<?php echo $i; ?>">Add Check List</button>
                                                <button type="button" class="btn btn-primary" >Add Member</button>
                                            </div>
                                            </div>
                                        </div>
                        </div>
        {{-- ----------- Todo Card Full view Modal Ends---------------}}


         {{-- ----------- Todo Card Check node add Modal Starts---------------}}

                    <div>
                        <div class="modal fade" id="staticBackdrop<?php echo $i; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Create Checklist</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form>
                                    <div class="modal-body">

                                        <div class="form-group">
                                        <input type="text" class="form-control hello" required placeholder="Enter Checklist Name" onchange="new_value(this.value)" ></input>
                                        <button  type="button" data-id="{{ $item->id }}" class="btn btn-primary mt-4" onclick="addcheck(getAttribute('data-id'))" data-dismiss="modal" >Add to Project</button>
                                        </div>

                                    </div>
                                </form>

                              </div>
                            </div>
                          </div>
                    </div>
            {{-- ----------- Todo Card Check node add Modal Ends---------------}}
<script>
    var values;
    function new_value(box) {
            values = box;
    }
    function addcheck(data_id) {
        console.log(data_id);
        console.log(values);

        $.ajax({
            type: 'GET',
            url: '{{ route("tdg.addnode") }}',
            data: {
                'idm': data_id,
                'node_name': values
            },
            success: function (data) {

         //Have some work here

            },

            error: function (errorThrown) {

                console.log("Error:".errorThrown);

            },
        })


    }
</script>
           @endif
      @endforeach


    </div>
  {{-- ----------------------------------TODO Board Ends ----------------------------------------}}

  {{-- ----------------------------------In progress Board Starts ----------------------------------------}}
    <div  id='list2' class="board-list" data-value="In Progress" ondrop="dropIt(event)" ondragover="allowDrop(event)">
      <div  class="list-title">
      In Progress
      </div>
            {{-- ----------------------------------In progress Card Starts ----------------------------------------}}
      @foreach ($projects as $item)
          @if($item->project_board == "In Progress")
                        <div  id='card<?php $i++; echo $i; ?>' class="card
                            <?php
                                if($item->priority == 'high'){
                                echo  'bg-danger text-white';
                                }
                                else if($item->priority == 'medium'){
                                echo  'bg-warning text-white';
                                }
                                else{
                                echo  'bg-success text-white';
                                }
                            ?>
                        " data-toggle="modal" data-id= "{{ $item->id  }}" data-target="#exampleModal<?php echo $i; ?>" draggable="true" ondragstart="dragStart(event)">
                            {{ $item->title }}
                        </div>




                         {{-- ----------------------------------In progress Card full view  Board Starts ----------------------------------------}}

                        <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                    <h4 class="modal-title " id="exampleModalLabel">{{ $item->title }}   <span>ID : {{ $item->project_id }}</span>  </h4>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div>
                                        <p> {{ $item->description }} </p>
                                </div>
                                <div class="pb-4">
                                        <b>Project File:</b>   <a href="{{ route('tdg.downloadFile',$item->id)}}">Download</a>
                                </div>
                                {{-- -----------------------In progress Check list Starts ------------------------}}
                                <div>
                                        <b>Checklist:</b>
                                        @foreach ( $item->Checknode as $value )
                                       <div>
                                           <div style="font-size: 16px;">
                                               <i class="fas fa-check-circle mr-2"></i>{{  $value["node_name"] }}
                                           </div>

                                            <form action="">
                                    {{-- Progress bar --}}
                                                <div class="progress mt-1 mb-1" style="width:50% ;">
                                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                </div>
                                    {{-- Check list --}}
                                    <div class="mt-2 mb-2">
                                        <div class="form-check " style="width:50%;">
                                            <input  class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <div>
                                                    asdfasdf asdffafas asdfasdf
                                                </div>
                                            </label>
                                            <i style="float:right;"class="fa fa-trash-alt "></i>
                                          </div>

                                    </div>

                                    {{-- Input box --}}
                                                <div>
                                                    <input type="text" style="width:50%" class="" id="">
                                                    <button style="padding: 5px 15px 4px 15px; font-size: 14px; margin-left: 15px;"type="submit" class="btn btn-primary">Add an item</button>
                                                </div>
                                                <div>

                                                </div>
                                            </form>
                                        </div>
                                        @endforeach
                                    </div>
                                 {{-- -----------------------In progress Check list Ends ------------------------}}
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop<?php echo $i; ?>" >Add Check List</button>
                                <button type="button" class="btn btn-info" >Add Member</button>
                            </div>
                            </div>
                        </div>
                        </div>

                        {{-- ----------------------------------In progress Card full view  Board Ends ----------------------------------------}}

                        <div>

                            <div class="modal fade" id="staticBackdrop<?php echo $i; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Create Checklist</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form>
                                        <div class="modal-body">

                                            <div class="form-group">
                                            <input type="text" class="form-control hello" required placeholder="Enter Checklist Name" onchange="new_value(this.value)" ></input>
                                            <button  type="button" data-id="{{ $item->id }}" class="btn btn-primary mt-4" onclick="addcheck(getAttribute('data-id'))" data-dismiss="modal" >Add to Project</button>
                                            </div>

                                        </div>
                                    </form>

                                  </div>
                                </div>
                              </div>




                        </div>
                        {{-- new modal --}}
                        <script>
                            var values;
                            function new_value(box) {
                                 values = box;
                            }
                            function addcheck(data_id) {
                                console.log(data_id);
                                console.log(values);

                                $.ajax({
                                    type: 'GET',
                                    url: '{{ route("tdg.addnode") }}',
                                    data: {
                                        'idm': data_id,
                                        'node_name': values
                                    },
                                    success: function (data) {



                                    },

                                    error: function (errorThrown) {
                                        console.log("Error:".errorThrown);

                                    },
                                })


                            }


                            </script>
           @endif
      @endforeach



    </div>
    <div  id='list3' class="board-list" data-value="Review"  ondrop="dropIt(event)" ondragover="allowDrop(event)">
      <div  class="list-title">
        Review
        </div>

      @foreach ($projects as $item)
          @if($item->project_board == "Review")
                        <div  id='card<?php $i++; echo $i; ?>' class="card
                            <?php
                                if($item->priority == 'high'){
                                echo  'bg-danger text-white';
                                }
                                else if($item->priority == 'medium'){
                                echo  'bg-warning text-white';
                                }
                                else{
                                echo  'bg-success text-white';
                                }
                            ?>
                        " data-id= "{{ $item->id  }}" data-toggle="modal" data-target="#exampleModal<?php echo $i; ?>" draggable="true" ondragstart="dragStart(event)">
                            {{ $item->title }}
                        </div>





                        <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                    <h4 class="modal-title " id="exampleModalLabel">{{ $item->title }}   <span>ID : {{ $item->project_id }}</span>  </h4>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div>
                                        <p> {{ $item->description }} </p>
                                </div>
                                <div class="pb-4">
                                        <b>Project File:</b>   <a href="{{ route('tdg.downloadFile',$item->id)}}">Download</a>
                                </div>
                                {{-- -----------------------In progress Check list Starts ------------------------}}
                                <div>
                                        <b>Checklist:</b>
                                        @foreach ( $item->Checknode as $value )
                                       <div>
                                           <div style="font-size: 16px;">
                                               <i class="fas fa-check-circle mr-2"></i>{{  $value["node_name"] }}
                                           </div>

                                            <form action="">
                                    {{-- Progress bar --}}
                                                <div class="progress mt-1 mb-1" style="width:50% ;">
                                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                </div>
                                    {{-- Check list --}}
                                    <div class="mt-2 mb-2">
                                        <div class="form-check " style="width:50%;">
                                            <input  class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <div>
                                                    asdfasdf asdffafas asdfasdf
                                                </div>
                                            </label>
                                            <i style="float:right;"class="fa fa-trash-alt "></i>
                                          </div>

                                    </div>

                                    {{-- Input box --}}
                                                <div>
                                                    <input type="text" style="width:50%" class="" id="">
                                                    <button style="padding: 5px 15px 4px 15px; font-size: 14px; margin-left: 15px;"type="submit" class="btn btn-primary">Add an item</button>
                                                </div>
                                                <div>

                                                </div>
                                            </form>
                                        </div>
                                        @endforeach
                                    </div>
                                 {{-- -----------------------In progress Check list Ends ------------------------}}
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop<?php echo $i; ?>">Add Check List</button>
                                <button type="button" class="btn btn-info" >Add Member</button>
                            </div>
                            </div>
                        </div>
                        </div>




                        <div>

                            <div class="modal fade" id="staticBackdrop<?php echo $i; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Create Checklist</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form>
                                        <div class="modal-body">

                                            <div class="form-group">
                                            <input type="text" class="form-control hello" required placeholder="Enter Checklist Name" onchange="new_value(this.value)" ></input>
                                            <button  type="button" data-id="{{ $item->id }}" class="btn btn-primary mt-4" onclick="addcheck(getAttribute('data-id'))" data-dismiss="modal" >Add to Project</button>
                                            </div>

                                        </div>
                                    </form>

                                  </div>
                                </div>
                              </div>




                        </div>
                        {{-- new modal --}}
                        <script>
                            var values;
                            function new_value(box) {
                                 values = box;
                            }
                            function addcheck(data_id) {

                                console.log(data_id);
                                console.log(values);

                                $.ajax({
                                    type: 'GET',
                                    // datatype:'json',
                                    url: '{{ route("tdg.addnode") }}',
                                    data: {
                                        'idm': data_id,
                                        'node_name': values
                                    },
                                    success: function (data) {

                                        console.log(data.msg)

                                    },

                                    error: function (errorThrown) {
                                       // console.log(data);

                                        console.log("Error:".errorThrown);

                                    },
                                })


                            }


                            </script>
           @endif
      @endforeach


        </div>
    <div  id='list4' class="board-list" data-value="Done"  ondrop="dropIt(event)" ondragover="allowDrop(event)">
        <div  class="list-title">
            Done
            </div>

      @foreach ($projects as $item)
          @if($item->project_board == "Done")
                        <div  id='card<?php $i++; echo $i; ?>' class="card
                            <?php
                                if($item->priority == 'high'){
                                echo  'bg-danger text-white';
                                }
                                else if($item->priority == 'medium'){
                                echo  'bg-warning text-white';
                                }
                                else{
                                echo  'bg-success text-white';
                                }
                            ?>
                        " data-toggle="modal" data-id= "{{ $item->id  }}" data-target="#exampleModal<?php echo $i; ?>" draggable="true" ondragstart="dragStart(event)">
                            {{ $item->title }}
                        </div>





                        <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                    <h4 class="modal-title " id="exampleModalLabel">{{ $item->title }}   <span>ID : {{ $item->project_id }}</span>  </h4>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div>
                                        <p> {{ $item->description }} </p>
                                </div>
                                <div class="pb-4">
                                        <b>Project File:</b>   <a href="{{ route('tdg.downloadFile',$item->id)}}">Download</a>
                                </div>
                                <div>
                                        <b>Checklist:</b>
                                        @foreach ( $item->Checknode as $value )
                                       <div>
                                           <div style="font-size: 16px;">
                                               <i class="fas fa-check-circle mr-2"></i>{{  $value["node_name"] }}
                                           </div>

                                            <form action="">
                                    {{-- Progress bar --}}
                                                <div class="progress mt-1 mb-1" style="width:50% ;">
                                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                </div>
                                    {{-- Moon's work --}}
                                    <div class="mt-2 mb-2">
                                        <div class="form-check " style="width:50%;">
                                            <input  class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <div>
                                                    asdfasdf asdffafas asdfasdf
                                                </div>
                                            </label>
                                            <i style="float:right;"class="fa fa-trash-alt "></i>
                                          </div>

                                    </div>

                                    <div class="mt-2 mb-2">
                                        <div class="form-check " style="width:50%;">
                                            <input  class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <div>
                                                    asdfasdf asdffafas asdfasdf
                                                </div>
                                            </label>
                                            <i style="float:right;"class="fa fa-trash-alt "></i>
                                          </div>

                                    </div>



                                    {{-- Moon's work end --}}
                                    {{-- Input box --}}
                                                <div>
                                                    <input type="text" style="width:50%" class="" id="">
                                                    <button style="padding: 5px 15px 4px 15px; font-size: 14px; margin-left: 15px;"type="submit" class="btn btn-primary">Add an item</button>
                                                </div>
                                                <div>

                                                </div>
                                            </form>
                                        </div>
                                        @endforeach
                                </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop<?php echo $i; ?>" >Add Check List</button>
                                <button type="button" class="btn btn-info" >Add Member</button>
                            </div>
                            </div>
                        </div>
                        </div>



                        <div>

                            <div class="modal fade" id="staticBackdrop<?php echo $i; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Create Checklist</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form>
                                        <div class="modal-body">

                                            <div class="form-group">
                                            <input type="text" class="form-control hello"  placeholder="Enter Checklist Name" onchange="new_value(this.value)" ></input>

                                            <button   type="button" data-id="{{ $item->id }}" class="btn btn-primary mt-4 class" onclick="addcheck(getAttribute('data-id'))" data-dismiss="modal">Add to Project</button>
                                            </div>

                                        </div>
                                    </form>

                                  </div>
                                </div>
                              </div>




                        </div>
                        {{-- new modal --}}
                        <script>
                            var values;
                            function new_value(box) {

                                 values = box;
                            }
                            function addcheck(data_id) {
                                // var box = $(".hello").val();
                                console.log(data_id);
                                console.log(values);

                                $.ajax({
                                    type: 'GET',
                                    // datatype:'json',
                                    url: '{{ route("tdg.addnode") }}',
                                    data: {
                                        'idm': data_id,
                                        'node_name': values
                                    },
                                    success: function (data) {


                                    },

                                    error: function (errorThrown) {
                                       // console.log(data);

                                        console.log("Error:".errorThrown);

                                    },
                                })


                            }


                            </script>
           @endif
      @endforeach


            </div>
  </div>
</div>





<script src="{{ asset('js/board.js')  }}"></script>


@endsection
