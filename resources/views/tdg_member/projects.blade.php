@extends('layouts.tdg_member_layout')
@section('content')
<link rel="stylesheet" href="{{  asset('css/board.css')  }}">
<div class="board-layout">

    <div class="left">
      <div class="board-text">Project Board</div>

    </div>

  <div id='boardlists' class="board-lists">
    <div id='list1' class="board-list" ondrop="dropIt(event)" data-value="Todo" ondragover="allowDrop(event)">
      <div class="list-title">
        To Do
      </div>
     <?php $i = 0;   ?>
      @foreach ($projects as $item)
          @if($item->project_board == "Todo")
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



                            <p> {{ $item->description }} </p>

                            Project File: <a href="{{ route('tdg.downloadFile',$item->id)}}">Download</a>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" >Add Check List</button>
                                <button type="button" class="btn btn-info" >Add Member</button>
                            </div>
                            </div>
                        </div>
                        </div>
           @endif
      @endforeach

    </div>
    <div  id='list2' class="board-list" data-value="In Progress" ondrop="dropIt(event)" ondragover="allowDrop(event)">
      <div  class="list-title">
      In Progress
      </div>

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



                            <p> {{ $item->description }} </p>

                            Project File: <a href="{{ route('tdg.downloadFile',$item->id)}}">Download</a>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" >Add Check List</button>
                                <button type="button" class="btn btn-info" >Add Member</button>
                            </div>
                            </div>
                        </div>
                        </div>
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



                            <p> {{ $item->description }} </p>

                            Project File: <a href="{{ route('tdg.downloadFile',$item->id)}}">Download</a>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" >Add Check List</button>
                                <button type="button" class="btn btn-info" >Add Member</button>
                            </div>
                            </div>
                        </div>
                        </div>
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



                            <p> {{ $item->description }} </p>

                            Project File: <a href="{{ route('tdg.downloadFile',$item->id)}}">Download</a>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" >Add Check List</button>
                                <button type="button" class="btn btn-info" >Add Member</button>
                            </div>
                            </div>
                        </div>
                        </div>
           @endif
      @endforeach


            </div>
  </div>
</div>





<script src="{{ asset('js/board.js')  }}"></script>


@endsection
