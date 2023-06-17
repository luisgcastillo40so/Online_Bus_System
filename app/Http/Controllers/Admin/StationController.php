<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Station;
use App\Bus;
use Illuminate\Http\Request;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('auth');
    }
    public function index()
    {
        //
         $stations = Station::all();

        return view('admin.station.index', compact('stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('admin.station.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
             'city' => 'required'
        ]);
  
         $station = new Station([
            'Station_name' => $request->get('name'),
             'Station_city' => $request->get('city'),
              ]);
        $station->save();
        return redirect('/station')->with('success', trans('sentence.added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $station = Station::find($id);
        return view('admin.station.edit',compact('station'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $request->validate([
             'name' => 'required',
             'city' => 'required',
        ]);

        $station = Station::find($id);
        $station->Station_name =  $request->get('name');
        $station->Station_city = $request->get('city');
        $station->save();

        return redirect('/station')->with('success', trans('sentence.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $station = Station::find($id);
        if($station->buses()->count() > 0){
          return redirect('/station')->with('warning', 'First delete it from bus');
        }
        else{
              $station->delete();
        return redirect('/station')->with('success', trans('sentence.deleted'));
    }
}
    }
