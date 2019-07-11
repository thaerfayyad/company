@extends('layouts')
@section('title','Customer List')
@section('content')
    <br><br>
    @can('create', App\Customer::class)

        <div class="row ">
            <div class="col-12 ">
                <p> <a href="{{route('customers.create')}}" class=text-info>Add new Customer</a></p>
            </div>
        </div>
    @endcan
    <hr>

    <div class="row">
     @foreach($customers as $customer)
         <div class="col-2">
             {{$customer->id}}
         </div>
         <div class="col-4">
            @can('view',$customer)
                 <a href="{{route('customers.show',['customer'=>$customer->id])}}">
                     {{$customer->name}}
                 </a>
            @endcan
             @cannot('view',$customer)
                    {{$customer->name}}
             @endcannot
         </div>
         <div class="col-4">
             {{$customer->company->name}}
         </div>
         <div class="col-2">
             {{--{{$customer->active ? 'Active' :'Inactve'}}--}}
             {{$customer->active }}
         </div>


     @endforeach
    </div>
    <div class="row py-lg-5">
        <div class="col-12 d-flex justify-content-center">
            {{$customers->links()}}
        </div>
    </div>
@endsection