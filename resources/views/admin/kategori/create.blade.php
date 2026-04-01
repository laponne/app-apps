@extends('layouts.admin')
@section('title', 'Tambah Kategori')
@section('content')
<h4 class="mb-3 mt-3">Tambah Kategori</h4>
<div class="card">
    <form action="{{ route('admin.kategori.store') }}" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    @csrf
                    <x-input name="nama_kategori" placeholder="Nama Kategori" />
                    <div class="d-grid gap-2 d-md-flex">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.kategori.index') }}"
                            class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
