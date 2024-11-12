@extends('layout.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card card-default color-palette-box">
                    <div class="card-header">
                        <h3 class="card-title">Tampil Data Products</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product Name</th>
                                        <th>Photo</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>
                                            <a href="{{ route('product.create') }}">
                                                <button class="btn btn-warning">Create Product</button>
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataProducts as $v)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $v->product_name }}</td>
                                            <td>
                                                @if ($v->photo)
                                                    <img src="{{ asset('storage/' . $v->photo) }}"
                                                        alt="{{ $v->product_name }}" class="img-fluid"
                                                        style="max-width: 100px;">
                                                @else
                                                    <img src="https://via.placeholder.com/100" alt="No Image"
                                                        class="img-fluid" style="max-width: 100px;">
                                                @endif
                                            </td>
                                            <td>{{ $v->Categories->category_name }}</td>
                                            <td>{{ $v->product_description }}</td>
                                            <td>{{ $v->price }}</td>
                                            <td>{{ $v->stock }}</td>
                                            <td>
                                                <form action="{{ route('product.destroy', $v->product_id) }}" method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default bg-success">
                                                            <a href="{{ route('product.edit', $v->product_id) }}"
                                                                class="text-white"><i class="nav-icon fas fa-edit"></i></a>
                                                        </button>
                                                        <button type="submit" class="btn btn-default bg-danger">
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
