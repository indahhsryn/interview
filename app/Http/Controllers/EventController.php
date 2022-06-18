<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $data = Event::all();
        return view('event/index', [
            "title" => "Event",
            "data" => $data
        ]);
    }
    public function tambah()
    {
        return view('event/tambah', [
            "title" => "Template Crave",
            // "data" => $data,
        ]);
    }
    public function tambahData()
    {
        return view('event/tambah', [
            "title" => "Tambah Data",

        ]);
    }
    public function simpan(Request $request)
    {
        $event = new Event();
        $event->jenis_template = $request->jenis_template;
        $event->bahasa = $request->bahasa;
        $event->deskripsi = $request->deskripsi;
        $event->save();

        return redirect('event');
    }
    public function edit($id)
    {
        $data = Event::find($id);
        return view('event/event', [
            "title" => "Edit Data",
            "Event" => $data
        ]);
    }
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->jenis_template = $request->jenis_template;
        $event->bahasa = $request->bahasa;
        $event->deskripsi = $request->deskripsi;

        $event->save();

        return redirect('event');
    }

    public function delete($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect('event');
    }
}
