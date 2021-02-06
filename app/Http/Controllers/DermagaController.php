<?php

namespace App\Http\Controllers;

use App\Dermaga;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class DermagaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Gate::any(['admin', 'pimpinan'])) {

            $dermaga = Dermaga::all();
            return view('dashboard.dermaga.index', compact('dermaga'));
        } else {
            return abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        Gate::authorize('admin');
        $attr = $request->validate([
            'nama' => 'required|unique:dermaga,nama'
        ]);

        $slug = Str::slug($attr['nama'], '-');

        $attr['slug'] = $slug;

        Dermaga::create($attr);


        return redirect()->route(Auth::user()->role->name . '.dermaga.index')->with('success', 'Data dermaga berhasil ditambah !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dermaga  $dermaga
     * @return \Illuminate\Http\Response
     */
    public function show(Dermaga $dermaga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dermaga  $dermaga
     * @return \Illuminate\Http\Response
     */
    public function edit(Dermaga $dermaga)
    {
        Gate::authorize('admin');
        return view('dashboard.dermaga.edit', compact('dermaga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dermaga  $dermaga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dermaga $dermaga)
    {
        Gate::authorize('admin');
        $attr = $request->validate([
            'nama' => "required|unique:dermaga,nama,$dermaga->id,id"
        ]);

        $attr['slug'] = Str::slug($attr['nama'], '-');

        $dermaga->update($attr);

        if ($dermaga->wasChanged()) {
            return redirect()->route(Auth::user()->role->name . '.dermaga.index')->with('success', 'Data dermaga berhasil diubah!');
        } else {
            return redirect()->route(Auth::user()->role->name . '.dermaga.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dermaga  $dermaga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dermaga $dermaga)
    {
        Gate::authorize('admin');
        $dermaga->delete();

        return redirect()->route(Auth::user()->role->name . '.dermaga.index')->with('success', 'Data dermaga berhasil dihapus!');
    }
}
