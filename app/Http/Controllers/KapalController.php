<?php

namespace App\Http\Controllers;

use App\Kapal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KapalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Gate::any(['admin', 'pimpinan'])) {

            $kapal = Kapal::all();
            return view('dashboard.kapal.index', compact('kapal'));
        } else {
            return abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Gate::any(['admin', 'pimpinan'])) {
            $request->validate([
                'jenis' => 'required|unique:kapal,jenis'
            ]);

            Kapal::create([
                'jenis' => $request->jenis,
                'slug' => \Str::slug($request->jenis),
            ]);

            return redirect()->route(\Auth::user()->role->name . '.kapal.index')->with('success', 'Jenis kapal berhasil ditambah!');
        } else {
            return abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kapal  $kapal
     * @return \Illuminate\Http\Response
     */
    public function show(kapal $kapal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kapal  $kapal
     * @return \Illuminate\Http\Response
     */
    public function edit(kapal $kapal)
    {
        return view('dashboard.kapal.edit', compact('kapal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kapal  $kapal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kapal $kapal)
    {
        if (Gate::any(['admin'])) {
            $attr = $request->validate([
                'jenis' => 'required|unique:kapal,jenis,' . $kapal->id
            ]);
            $attr['slug'] = \Str::slug($request->jenis);
            $kapal->update($attr);
            if ($kapal->wasChanged()) {

                return redirect()->route(\Auth::user()->role->name . '.kapal.index')->with('success', 'Jenis kapal berhasil diubah!');
            } else {
                return redirect()->route(\Auth::user()->role->name . '.kapal.index');
            }
        } else {
            return abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kapal  $kapal
     * @return \Illuminate\Http\Response
     */
    public function destroy(kapal $kapal)
    {
        if (Gate::any(['admin', 'pimpinan'])) {

            $kapal->delete();
            return redirect()->route(\Auth::user()->role->name . '.kapal.index')->with('success', 'Jenis kapal berhasil dihapus!');
        } else {
            return abort(403);
        }
    }
}
