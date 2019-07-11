@extends('layouts')
@section('title','Edit Details for : ','{{$customer->name}}')
@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Edit Details for :{{$customer->name}} </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form action="{{route('customers.update',['customer'=>$customer->id])}}"  method="post" enctype="multipart/form-data">
                @method('PATCH')
                    <div class="form-group" >
                        <label for="name" class="text-info">name:</label>
                        <input type="text" name="name"  class="form-control"  value="{{old('name') ??$customer->name}}">
                        <div class="input-group text-danger">{{ $errors->first('name') }}</div>

                    </div>


                    <div class="form-group">
                        <label for="email" class="text-info" >Email:</label>
                        <input type="email" class="form-control" name="email"  value="{{old('email') ?? $customer->email}}">
                        <div class="input-group text-danger">{{ $errors->first('email') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="status"> Statue :</label>
                        <select name="active" id="active" class="form-control">
                            <option value="" disabled>Select The Customer Status</option>
                            @foreach($customer->activeOptions() as $activeOptionKey =>$activeOptionValue)
                                <option value="{{$activeOptionKey}}"  {{$customer->active ==$activeOptionValue ? 'selected':''}} >{{$activeOptionValue}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="company"> Company :</label>
                        <select name="company_id" id="company_id" class="form-control">
                            @foreach($companies as $company)
                                <option value="{{$company->id}}" {{$company->id == $customer->company->id ? 'selected':''}}>{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="from-group d-flex flex-column">
                        <label for="file">Choose image to upload</label>
                        <input type="file" id="file" name="image" multiple class="pb-4">
                        <div class="input-group text-danger">{{ $errors->first('image') }}</div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Add" class="btn btn-primary">
                    </div>

                    @csrf
                </form>

            </form>
        </div>
    </div>

@endsection