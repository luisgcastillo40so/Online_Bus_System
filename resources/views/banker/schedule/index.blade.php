@extends('layouts.bankerdashboard')
   
@section('content')
<div class="col-sm-12">
  @if(session()->get('success'))
    <div d="myMsg" class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
<div class="col-sm-12">
  @if(session()->get('warning'))
    <div d="myMsg" class="alert alert-danger">
      {{ session()->get('warning') }}  
    </div>
  @endif
</div>
<div class="row">
    <div class="col-md-6">
<form action="/bschsearch" method="GET" role="form">

    <div class="input-group">
        <input type="text" class="form-control" name="search"
            placeholder="{{  trans('sentence.search here')}}"> <span class="input-group-btn">
            <button type="submit" class="btn btn-info">
                <span>{{  trans('sentence.search')}}</span>
            </button>
        </span>
    </div>
</form>
</div>

<table class="table table-responsive table-hover table-bordered">
  <thead class="bg-dark">
    <tr>
      <th scope="col">{{  trans('sentence.id')}}</th>
      <th scope="col">{{  trans('sentence.departure date')}}</th>
        <th scope="col">{{  trans('sentence.arrival time')}}</th>
        <th scope="col">{{  trans('sentence.departure time')}}</th>
        <th scope="col">{{  trans('sentence.bus no')}}</th>
        <th scope="col">{{  trans('sentence.route name')}}</th>
    </tr>
  </thead>
  <tbody>
       @foreach($schedules as $schedule)
    <tr class="table-success">
      <td>{{$schedule->id}}</td>
      <td>{{$schedule->Departure_date}}</td>
        <td>{{$schedule->Arrival_time}}</td>
        <td>{{$schedule->Departure_time}}</td>
      <td>{{$schedule->bus->Bus_number}}</td>
        <td>{{$schedule->route->Route_name}}</td>
    </tr>
    @endforeach
  </tbody>
</table>   
    </div>     
@endsection