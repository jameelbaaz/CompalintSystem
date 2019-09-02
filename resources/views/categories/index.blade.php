@extends('layouts.app')

@section('content')
<a href="{{route('categories.create')}}" class="btn btn-success mb-2">Add Category</a>

<div class="card card-default">
<div class="card-header">
    Categories
</div>
<div class="card-body">
    <table class="table">
        <thead>
            <th>Name</th>
            <th></th>
            <th></th>
           
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>
                        {{$category->name}}
                    </td>
                    <td>
                        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-info btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})">Delete</button>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}

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
                             Are you sure you want to delete the Category?
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
    form.action='/categories/'+id;
    $('#deleteModal').modal('show');
}
</script>    
@endsection

