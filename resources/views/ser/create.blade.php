@extends('layouts.app')

@section('content')

@auth
<div class="card card-default">
        <div class="card-header">
        {{ isset($services) ? 'Edit Services' : 'Create Services' }}
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
            <form action="{{ isset($services) ? route('services.update', $services->id ) : route('services.store') }}" method="POST">
                @csrf
               @if (isset($services))
                 @method('PUT')
               @endif

               <div class="form-group">
                <label for="sub_category_id">Select Service</label>
                <select name="sub_category_id" id="sub_category_id" class="form-control">
                    @foreach ($subcategories as $subcategory)
                        <option value="{{$subcategory->id}}"
                            @if (isset($services)) 
                             @if($subcategory->id === $services->subcat_id)
                               selected
                            @endif
                            @endif 
                
                            >

                            {{$subcategory->name}}</option>
                    @endforeach
                </select>
            </div>
    
    

               <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" 
                    value=" {{ isset($services) ? $services->name : '' }}" >
            </div>
    
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    {{ isset($services) ? 'Update Service' : 'Create Servicey'}}
                </button>
            </div>
        </form>
        </div>
        </div> 
    
@endauth


    
@endsection

