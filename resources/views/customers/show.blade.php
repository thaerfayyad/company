@extends('layouts')
@section('title','Details for :'.$customer->name)
@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Customer Name is {{$customer->name}}</h2>
        </div>
    </div>
    <h4><a href="{{route('customers.edit',['id'=>$customer->id])}}" class="btn btn-info"> Edit  </a></h4>
    <form action="{{route('customers.destroy',['id'=>$customer->id])}}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <div class="row">
        <div class="col-12">
            <p><strong>Name is : {{$customer->name}}</strong></p>
            <p><strong>Email is : {{$customer->email}}</strong></p>
            <p><strong>Company name  is : {{$customer->company->name}}</strong></p>
            @if($customer->image)

                <div class="row">
                    <div >
                        <img src="{{asset('storage/' . $customer->image)}}" alt="" class="Image"  style=" width:150px;max-width:300px;" >
                    </div>
                </div>

            @endif
        </div>

    </div>




@endsection