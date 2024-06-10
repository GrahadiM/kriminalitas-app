<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return redirect()->route('home');
    }

    public function list()
    {
        $data['data'] = Place::all();
        return view('admin.list', $data);
    }

    public function create()
    {
        return view('admin.create');
    }
    public function store(Request $request)
    {
        $place = new Place();
        $place->place_name = $request->place_name;
        $place->latitude = $request->latitude;
        $place->longitude = $request->longitude;
        $place->pasal = $request->pasal;
        $place->waktu = $request->waktu;
        $place->address = $request->address;
        $place->description = $request->description;
        $place->save();
        return redirect()->route('admin.list');
    }

    public function detail($id)
    {
        $data['data'] = Place::find($id);
        return view('admin.detail', $data);
    }

    public function edit($id)
    {
        $data['data'] = Place::find($id);
        return view('admin.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $place = Place::find($id);
        $place->place_name = $request->place_name;
        $place->latitude = $request->latitude;
        $place->longitude = $request->longitude;
        $place->pasal = $request->pasal;
        $place->waktu = $request->waktu;
        $place->address = $request->address;
        $place->description = $request->description;
        $place->update();
        return redirect()->route('admin.detail', ['id' => $id]);
    }

    public function destroy($id)
    {
        $place = Place::find($id);
        dd($place);
        $place->delete();
        return redirect()->route('admin.list');
    }
}
