@extends('layouts.app')

@section('content')
  <div class="d-flex  justify-content-between">
    <div>
        <a href="{{route('complaints.create')}}" class="btn btn-success mb-2">Add Complaints</a>
        
    </div>
    <div>
        <form action="{{route('complaints.index')}}" method="GET">
            @csrf
           
            <input type="text" name="search" id="search" class="form-control-sm mt-1" placeholder="Search">

            <button  type="submit" class="btn btn-sm btn-info ml-1 mb-1 " class="form-control-sm">Search</button>
            </form>
    </div>
  </div>
<div class="card card-default">
        <div class="card-header">
           Complaints
        </div>
        <div class="card-body ">
          <div class="table-responsive">
              <table class="table" style="overflow-x:auto">
                  <thead>
                      <th>Customer Name</th>
                      <th>Service</th>
                      <th>Complaint Date</th>
                      <th>Completed Date</th>
                     <th></th>
                  </thead>
                  <tbody>
                      @foreach ($complaints as $complaint)
                          <tr>
                              <td>
                                  {{$complaint->customer_name}}
                                </td>
                                <td>
                                    {{$complaint->service}}
                              </td>
                              <td>
                                  {{$complaint->created_at->format('d/m/Y')}}
                                </td>
                                <td>
                                    {{$complaint->date_completed}}
                               
                              </td>
                              <td>
                                  <a href="{{route('complaints.edit', $complaint->id)}}" class="btn btn-info btn-sm">Edit</a>
                                  <button class="btn btn-danger btn-sm" onclick="handleDelete({{$complaint->id}})">Delete</button>
                                  
                                  @if (!$complaint->completed)
                                      
                                  <a href="{{route('complete', $complaint->id)}}" class="btn btn-warning btn-sm">Complete</a>
                                  @endif
                              
                              </td>
                             
                              
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
          </div>
                {{$complaints->links()}}
        
                <!-- ModalStart -->
                <form action="" method="POST" id="deleteCategoryForm">
                    @csrf
                    @method('DELETE')
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModallabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="deleteModallabel">Delete Category</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                     Are you sure you want to delete the Complaint?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-info" data-dismiss="modal">No, Go Back</button>
                                      <button type="submit" class="btn btn-danger">Yes Delete</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                </form>
           <!-- ModalEnd -->
        </div>
        </div>      
        @endsection
        



@section('scripts')
<script>
    function handleDelete(id){
        var form= document.getElementById('deleteCategoryForm');
        form.action='/complaints/'+id;
        $('#deleteModal').modal('show');
    }
  </script>

@endsection
