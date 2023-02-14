@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Produk</label>
                    <select name="products_id" id="" class="form-control @error('products_id') is-invalid @enderror"
                        value="{{ old('products_id') }}" required>
                        <option value="" disabled selected>-- Pilih produk --</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('products_id')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="photo" class="form-control-label">Foto Produk</label>
                    <input type="file" name="photo" id="" value="{{ old('photo') }}" accept="image/*"
                        class="form-control @error('photo') is-invalid @enderror">
                    @error('photo')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="is_default" class="form-control-label">Foto Utama</label>
                    <br>
                    <label>
                        <input type="radio" name="is_default" id=""
                            class="form-control @error('is_default') is-invalid @enderror" value="1" /> Ya
                    </label>
                    &nbsp;
                    <label>
                        <input type="radio" name="is_default" id=""
                            class="form-control @error('is_default') is-invalid @enderror" value="0" /> Tidak
                    </label>
                    @error('is_default')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Tambah Foto Produk</button>
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
