@extends('dashboard.layouts.main')

@section('content')
    <section class="p-4" id="main-content">
        <button class="btn btn-primary" id="button-toggle">
            <i class="bi bi-list"></i>
        </button>
        <div class="container" style="width: 65rem;">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="card-header text-primary">
                        <h5>Create Data Buku</h5>
                    </div>
                        <form method="post" action="/dashboard/books">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-sm-3">                                
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-select" id="kategori" name="rak_id">
                                            @foreach ($raks as $rak)
                                                @if (old('rak_id') == $rak->id)
                                                    <option class="option" value="{{ $rak->id }}" selected>
                                                        {{ $rak->kategori }}
                                                    </option>
                                                @else
                                                    <option class="option" value="{{ $rak->id }}">{{ $rak->kategori }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Judul Buku</label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" required>
                                        @error('judul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Pengarang</label>
                                <input type="text" class="form-control @error('pengarang') is-invalid @enderror" name="pengarang" required>
                                @error('pengarang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Penerbit</label>
                                <input type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit" required>
                                @error('penerbit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tahun Terbit</label>
                                <input type="text" class="form-control @error('thn_terbit') is-invalid @enderror" name="thn_terbit" required>
                                @error('thn_terbit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">Tambahkan Buku</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection