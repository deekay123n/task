@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h6 class="font-weight-bold">@if($user)  Edit Contact @else Add Contact @endif</h6>
    </div> 
    <form method="POST" action="{{route('contact.submit')}}">
    @csrf
    <div class="card-body">
        @if($user)
        <input type="hidden" value="{{$user->id}}" name="id"> 
        @endif    
        <div class="row">               
       <div class="col-6">
        <label for="name" >Enter Name <sup style="color:red">*</sup></label>
        <input type="text" name="name" id="name" class="form-control" @if($user) value="{{$user->name}}" @endif required>
       </div>
       <div class="col-6">
        <label for="name" >Enter Phone <sup style="color:red">*</sup></label>
        <input type="tel" name="phone" id="phone" class="form-control" @if($user) value="{{$user->phone}}" @endif required>
        <div class="text-danger mt-2" id="error-message"></div>
       </div>
    </div>

        <button class="btn btn-sm btn-primary" type="submit">Submit </button>
        
    </div>
    </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
        document.getElementById("phone").addEventListener("input", function (event) {
            let input = event.target.value;
            input = input.replace(/\s/g, '');
            if (!/^\+\d*$/.test(input)) {
                document.getElementById("error-message").innerText = "Phone number must start with + followed by digits only.";
                event.target.value = input.replace(/[^+\d]/g, "");
            } else {
                document.getElementById("error-message").innerText = "";
            }
        });
    </script>

@endsection