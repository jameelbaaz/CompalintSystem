@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">
        {{ isset($complaint) ? 'Edit Complaint' : 'Add Complaint'}}
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item text-danger">
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($complaint) ? route('complaints.update', $complaint->id) : route('complaints.store') }}" method="POST">
            @csrf
            @if (isset($complaint))
                @method('PUT')
            @endif

            <div class="form-group">
                    <label for="category">Service Category</label>
                    <select name="category" id="category" class="form-control">
                        <option value="">Please Select</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->name}}"
                            @if (isset($complaint))
                            @if ($complaint->category===$category->name)
               
                                    selected
                                    @endif
                             @endif
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                        <label for="subcategory">Service Sub Category</label>
                        <select name="subcategory" id="subcategory" class="form-control">
                            <option value="">Please Select</option>
                            @foreach ($subcategories as $subcategory)
                            <option value="{{$subcategory->name}}"
        
                                @if (isset($complaint))
                                @if ($complaint->subcategory===$subcategory->name)
                   
                                        selected
                                        @endif
                                 @endif
        
                                >{{$subcategory->name}}</option>
                            @endforeach    
                        </select>
                </div>


                <div class="form-group">
                        <label for="service">Services</label>
                        <select name="service" id="service" class="form-control">
                            <option value="">Please Select</option>
                            @foreach ($services as $service)
                            <option value="{{$service->name}}"
                                  
                                @if (isset($complaint))
                                @if ($complaint->service===$service->name)
                   
                                        selected
                                        @endif
                                 @endif
                                >{{$service->name}}</option>
                            @endforeach    
                        </select>
                    </div>


                    <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{isset($complaint) ? $complaint->description :''}}</textarea>
                        </div>

                        <div class="form-group">
                                <label for="customer_name">Customer Name</label>
                                 <input type="text" class="form-control" name="customer_name" id="customer_name"
                                 value="{{isset($complaint) ? $complaint->customer_name :''}}" >
                            </div>


                            <div class="form-group">
                                    <label for="job_assign">Job Assigned to</label>
                                     <input type="text" class="form-control" name="job_assign" id="job_assign"
                                     value="{{isset($complaint) ? $complaint->job_assign :''}}">
                                </div>


                                    <div class="form-group">
                                            <label for="date_completed">Job Complete Date</label>
                                             <input type="date" class="form-control" name="date_completed" id="date_completed" 
                                             value="{{isset($complaint)? $complaint->date_completed : ''}}"
                                             >
                                        </div>
                            
                                        <button  type="submit" class="btn btn-success">
                            
                                            {{isset($complaint) ? 'Edit Complaint' : 'Add Complaint'}}
                                        </button>


        </form>
    </div>
    
@endsection



@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">   
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

{{-- <script>
 flatpickr=('#date_completed');
</script> --}}

@endsection