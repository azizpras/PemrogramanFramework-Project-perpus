<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.books.index', [
            'books' => Book::orderBy('rak_id', 'desc')
            ->filter(request(['search']))
            ->paginate(6)
            ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.books.create', [
            'raks' => Rak::orderBy('kategori', 'asc')->get(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rak_id' => 'required',
            'judul' => 'required|unique:books',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'thn_terbit' => 'required',
        ]);
        Book::create($validatedData);

        return redirect('/dashboard/books')->with('success', 'Buku baru telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('dashboard.books.edit', [
            'raks' => Rak::orderBy('kategori', 'asc')->get(),
            'book' => $book,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'id' => 'required',
            'judul' => 'required',
            'rak_id' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'thn_terbit' => 'required',
        ];

        if ($request->judul != $book->judul) {
            $rules['judul'] = 'required|unique:books';
        }

        $validatedData = $request->validate($rules);
        Book::where('id', $validatedData['id'])->update($validatedData);

        return redirect('/dashboard/books')->with('success', 'Buku telah diubah!.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        Book::destroy($book->id);

        return redirect('/dashboard/books')->with('success', 'Buku telah dihapus.');
    }
}
