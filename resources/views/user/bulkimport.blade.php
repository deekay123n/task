@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h6 class="font-weight-bold">Bulk Import User</h6>
    </div> 
    <form method="POST" action="{{route('contact.import-xml')}}" enctype="multipart/form-data">
    @csrf
        <div class="card-body">
           
        <div class="row">               
           <div class="col-6">
             <input type="file" name="xml_file" accept=".xml" required>
           </div>
        </div><br>
        <button class="btn btn-sm btn-primary" type="submit">Import </button>
    </div>
    </form>
</div>

@endsection