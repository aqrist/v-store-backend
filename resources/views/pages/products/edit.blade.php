@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Ubah barang</strong>
            <small>{{ $item->name }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('products.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Produk</label>
                    <input type="text" name="name" id=""
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') ? old('name') : $item->name }}" />
                    @error('name')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="type" class="form-control-label">Tipe Produk</label>
                    <input type="text" name="type" id=""
                        class="form-control @error('type') is-invalid @enderror"
                        value="{{ old('type') ? old('type') : $item->type }}" />
                    @error('type')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="form-control-label">Deskripsi</label>
                    <textarea name="description" class="ckeditor form-control @error('description') is-invalid @enderror">{{ old('description') ? old('description') : $item->description }}</textarea>
                    @error('description')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price" class="form-control-label">Harga Produk</label>
                    <input type="number" name="price" id=""
                        class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price') ? old('price') : $item->price }}" />
                    @error('price')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="quantity" class="form-control-label">Jumlah Produk</label>
                    <input type="number" name="quantity" id=""
                        class="form-control @error('quantity') is-invalid @enderror"
                        value="{{ old('quantity') ? old('quantity') : $item->quantity }}" />
                    @error('quantity')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Tambah Produk</button>
                </div>

            </form>
        </div>
    </div>
@endsection

@push('after-script')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('.ckeditor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
