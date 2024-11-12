@extends('layout.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tampil Data Users</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>
                                            <button class="btn btn-warning"><a
                                                    href="{{ route('user.create') }}">Create New User</a></button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataUser as $v)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $v->name }}</td>
                                            <td>{{ $v->email }}</td>
                                            <td>{{ $v->role }}</td>
                                            <td>
                                                <form action="{{ route('user.destroy', $v->user_id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default bg-success">
                                                            <a href="{{ route('user.edit', $v->user_id) }}"><i
                                                                    class="nav-icon fas fa-edit"></i></a>
                                                        </button>
                                                        <button type="submit" class="btn btn-default bg-danger">
                                                            <i class="fa fa-minus"></i>
                                                        </button>
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
