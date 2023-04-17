@extends('dashboard.layouts.main')

@section('content')
    <section class="p-4" id="main-content">
        <button class="btn btn-primary" id="button-toggle">
            <i class="bi bi-list"></i>
        </button>
        <div class="card mt-3">
            <div class="card-body">
                <div class="card-header">
                    <h5>Data Buku</h5>
                </div>
                <div class="row">
                    <div class="col-sm-9 mt-2">
                        <a href="/dashboard/books/create" class="btn btn-primary mt-2"><i class="bi bi-bookmark-plus"></i> Tambah Buku</a>
                    </div>
                    <div class="col-sm-3 mt-3">
                        <form action="/dashboard/books">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search Buku" name="search" value="{{ request('search') }}">
                                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Kategori Rak</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Pengarang</th>
                                    <th scope="col">Penerbit</th>
                                    <th scope="col">Tahun Terbit</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($books as $key => $book)
                                        <td>{{ $books->firstItem() + $key }}</td>
                                        <td>{{ $book->rak->kategori ?? 'None' }}</td>
                                        <td>{{ $book->judul }}</td>
                                        <td>{{ $book->pengarang }}</td>
                                        <td>{{ $book->penerbit }}</td>
                                        <td>{{ $book->thn_terbit }}</td>
                                        <td>
                                            <a href="/dashboard/books/{{ $book->id }}/edit"
                                                class="badge bg-warning border-0">Edit</a>
        
                                            <form action="/dashboard/books/{{ $book->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="badge bg-danger border-0"
                                                    onclick="return confirm('Anda Yakin?')">Hapus</button>
                                            </form>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col">
                        Showing of  {{ $books->currentPage() }} entries {{ $books->total() }}
                    </div>
                    <div class="col">
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection