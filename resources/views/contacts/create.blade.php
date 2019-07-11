@extends('layouts')
@section('title',' Contact Us')

@section('content')
    <h3>coutnact us </h3>

 <div class="col-10">
     <form action="{{route('contact.store')}}" method="post">
         <div class="form-group">
             <label for="name">Name :</label>
             <input type="text" class="form-control" name="name" {{old('name')}}>
             <div class="input-group text-danger" >{{$errors->first('name')}}</div>
         </div>
         <div class="form-group">
             <label for="name">Email :</label>
             <input type="text" class="form-control" {{old('email')}} name="email">
             <div class="input-group text-danger">{{$errors->first('email')}}</div>
         </div>
         <div class="form-group">
             <label for="message">message :</label>
             <textarea name="message" id="message" cols="30" rows="10" {{old('message')}} class="form-control"></textarea>
             <div class="input-group text-danger">{{$errors->first('message')}}</div>

             <button type="submit" class="btn btn-primary">Send Message</button>
             @csrf
     </form>

 </div>
@endsection