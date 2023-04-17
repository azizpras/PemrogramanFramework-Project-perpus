<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.raks.index', [
            'raks' => Rak::orderBy('id', 'desc')
            ->paginate(6)
            // ->filter(request(['search']))
            // ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rak' => 'required',
            'baris' => 'required',
            'kategori' => 'required|unique:raks',
        ]);
        Rak::create($validatedData);

        return redirect('/dashboard/raks')->with('success', 'Kategori baru telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rak $rak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rak $rak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rak $rak)
    {
        $validatedData = $request->validate([
            'rak' => 'required',
            'baris' => 'required',
            'kategori' => 'required'
        ]);

        Rak::where('id', $rak->id)->update($validatedData);

        return redirect('/dashboard/raks')->with('success', 'Kategori telah diubah!.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rak $rak)
    {
        Rak::destroy($rak->id);
        return redirect('/dashboard/raks')->with('success', 'Kategori Rak telah dihapus.');
    }
}
