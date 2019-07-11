@extends('layouts')
@section('title','Add new Customer')
@section('content')
<div class="row">
    <div class="col-12">
        <h2>customer </h2>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <form action="{{route('customers.store')}}"  method="post" enctype="multipart/form-data">

                <div class="form-group" >
                    <label for="name" class="text-info">name:</label>
                    <input type="text" name="name"  class="form-control"  value="{{old('name')}}">
                    <div class="input-group text-danger">{{ $errors->first('name') }}</div>

                </div>


                <div class="form-group">
                    <label for="email" class="text-info" >Email:</label>
                    <input type="email" class="form-control" name="email"  value="{{old('email')}}">
                    <div class="input-group text-danger">{{ $errors->first('email') }}</div>
                </div>
                <div class="form-group">
                    <label for="status"> Statue :</label>
                    <select name="active" id="active" class="form-control">
                        <option value="" disabled>Select The Customer Status</option>
                        <option value="1"  >active</option>
                        <option value="0">inactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="company"> Company :</label>
                    <select name="company_id" id="company_id" class="form-control">
                        @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="from-group d-flex flex-column">
                    <label for="image"> upload image</label>
                    <input type="file" id="file" name="image" multiple class="pb-4">
                    <div class="input-group text-danger">{{ $errors->first('image') }}</div>
                </div>


                <div>
                    <input type="submit" value="Add" class="btn btn-primary">
                </div>

            @csrf
        </form>
    </div>
</div>

@endsection