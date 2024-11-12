@extends('layout.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tampil Data Categories</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category Name</th>
                                        <th>Description</th>
                                        <th>
                                            <button class="btn btn-warning"><a
                                                    href="{{ route('category.create') }}">Create Category</a></button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataCategory as $v)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $v->category_name }}</td>
                                            <td>{{ $v->description }}</td>
                                            <td>
                                                <form action="{{ route('category.destroy', $v->category_id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default bg-success">
                                                            <a href="{{ route('category.edit', $v->category_id) }}"><i
                                                                    class="nav-icon fas fa-edit"></i></a>
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
