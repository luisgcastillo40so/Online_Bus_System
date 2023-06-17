@extends('layouts.conductordashboard')
   
@section('content')

<div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
<div class="col-sm-12">
  @if(session()->get('warning'))
    <div class="alert alert-danger">
      {{ session()->get('warning') }}  
    </div>
  @endif
</div>
<script> 
        function printDiv() { 
            var divContents = document.getElementById("GFG").innerHTML; 
            var a = window.open('', '', 'height=800, width=900'); 
            a.document.write('<html>'); 
            a.document.write('<body >'); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
        } 
    </script> 
<div class="row">
    <div class="col-md-6">
<form action="/ctsearch" method="GET" role="form">

    <div class="input-group">
        <input type="text" class="form-control" name="search"
            placeholder="{{  trans('sentence.search')}}"> <span class="input-group-btn">
            <button type="submit" class="btn btn-info">
                <span>{{  trans('sentence.search')}}</span>
            </button>
        </span>
    </div>
</form>
</div>
<div class="col-md-5 text-right">
    <button onclick="printDiv()" class="btn btn-info">Print</button>
</div>
<div id="GFG" style="width:100%">
    <table class="table table-responsive table-hover table-bordered">
  <thead class="bg-dark">
    <tr>
      <th scope="col">{{  trans('sentence.id')}}</th>
        <th scope="col">{{  trans('sentence.passenger fullname')}}</th>
        <th scope="col">{{  trans('sentence.bus no')}}</th>
        <th scope="col">{{  trans('sentence.departure date')}}</th>
        <th scope="col">{{  trans('sentence.seat no')}}</th>
        <th scope="col">{{  trans('sentence.route name')}}</th>
        <th scope="col">{{  trans('sentence.driver name')}}</th>
        <th scope="col">{{  trans('sentence.action')}}</th>
    </tr>
  </thead>
  <tbody>
       @foreach($tickets as $ticket)
    <tr class="table-success">
        <td>{{$ticket->id}}</td>
        <td>{{$ticket->book->seat->passenger->P_fname}} {{$ticket->book->seat->passenger->P_lname}}</td>
        <td>{{$ticket->book->seat->bus->Bus_number}}</td>
        <td>{{$ticket->book->schedule->Departure_date}}</td>
        <td>{{$ticket->book->seat->Seat_no}}</td>
        <td>{{$ticket->book->schedule->route->Route_name}}</td>
        <td>{{$ticket->book->seat->bus->driver->D_fname}}</td>
        <td>
                <a href="{{ route('cticket.show',$ticket->id)}}" class="btn btn-info">{{  trans('sentence.show')}}</a>
            </td>
    </tr>
    @endforeach
  </tbody>
</table>   
    </div>
    </div>     
@endsection