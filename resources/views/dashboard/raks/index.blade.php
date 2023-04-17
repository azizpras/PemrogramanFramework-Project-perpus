@extends('dashboard.layouts.main')

@section('content')
    <section class="p-4" id="main-content">
        <button class="btn btn-primary" id="button-toggle">
            <i class="bi bi-list"></i>
        </button>
        <div class="card mt-3">
            <div class="card-body">
                <div class="card-header">
                    <h5>Data Kategori Rak</h5>
                </div>

                {{-- Create Data Kategori --}}
                <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="/dashboard/raks">
                                @csrf
                                <div class="form-group">
                                    <label>Rak</label>
                                    <input type="text" class="form-control @error('rak') is-invalid @enderror" name="rak" required>
                                </div>

                                <div class="form-group">
                                    <label>Baris</label>
                                    <input type="text" class="form-control @error('baris') is-invalid @enderror" name="baris" required>
                                </div>
                                
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" required>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>

                {{-- Show Data Kategori --}}
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-9 mt-2">
                            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#createModal">
                                Tambah Kategori Rak
                            </button>
                        </div>
                        <div class="col-sm-3 mt-3">
                            <form action="/dashboard/raks">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search Kategori Rak" name="search" value="{{ request('search') }}">
                                    <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Rak</th>
                                <th scope="col">Baris</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($raks as $key =>$rak)
                                    <td>{{ $raks->firstItem() + $key }}</td>
                                    <td>{{ $rak->rak }}</td>
                                    <td>{{ $rak->baris }}</td>
                                    <td>{{ $rak->kategori }}</td>
                                    <td>
                                        <a href="" class="badge bg-warning border-0" data-bs-toggle="modal" data-bs-target="#editModal.{{ $rak->id }}">Edit</a>

                                        <form action="/dashboard/raks/{{ $rak->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0"
                                                onclick="return confirm('Data buku dengan kategori yang sama akan terhapus, Anda yakin menghapus kategori ini?')">Hapus</button>
                                        </form>
                                    </td>
                            </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Edit Kategori --}}
                @foreach ($raks as $rak)
                <div class="modal fade" id="editModal.{{ $rak->id }}" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="/dashboard/raks/{{ $rak->id }}">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label>Rak</label>
                                    <input type="text" class="form-control @error('rak') is-invalid @enderror" name="rak" required value="{{ old('rak', $rak->rak) }}">
                                </div>

                                <div class="form-group">
                                    <label>Baris</label>
                                    <input type="text" class="form-control @error('baris') is-invalid @enderror" name="baris" required value="{{ old('baris', $rak->baris) }}">
                                </div>
                                
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" required value="{{ old('kategori', $rak->kategori) }}">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Ubah Kategori</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>         
                @endforeach
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col">
                            Showing of  {{ $raks->currentPage() }} entries {{ $raks->total() }}
                        </div>
                        <div class="col">
                            {{ $raks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection