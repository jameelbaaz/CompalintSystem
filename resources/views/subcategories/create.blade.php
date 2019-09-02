@extends('layouts.app')

@section('content')

@auth
<div class="card card-default">
        <div class="card-header">
           {{ isset($subcategory) ? 'Edit Sub Category' : 'Create Sub Category' }}
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item text-danger">
                                {{$error}}
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{isset($subcategory) ? route('subcategories.update', $subcategory->id) : route('subcategories.store') }}" method="POST">
                @csrf
               @if (isset($subcategory))
               @method('PUT')
               @endif
                <div class="form-group">
                    <label for="category_id">Select Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}"
                                    @if (isset($subcategory)) 
                                 @if($category->id ===$subcategory->category_id)
                                   selected
                                @endif
                                @endif
                    
                                >

                                {{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" 
                        value=" {{ isset($subcategory) ? $subcategory->name : '' }}" >
                </div>
        
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{ isset($subcategory) ? 'Update Sub Category' : 'Create Sub Category'}}
                    </button>
                </div>
            </form>
        </div>
        </div> 
    
@endauth


    
@endsection

