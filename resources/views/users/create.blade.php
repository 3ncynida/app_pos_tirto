@extends('layout.main')
@section('content')
<form action="{{route('sekolah.user.store')}}" method="POST">
    {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Form User</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name : </label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="name" value="{{old('name')}}"></br>
                                @if ($errors->has('name'))
                                <span class="label label-danger">{{ $errors->first('name') }}</span>
                                @endif</br>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email : </label>
                            <div class="input-group">
                                <input class="form-control" type="email" name="email" value="{{old('email')}}"></br>
                                @if ($errors->has('email'))
                                <span class="label label-danger">{{ $errors->first('email') }}</span>
                                @endif</br>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Password : </label>
                            <div class="input-group">
                                <input class="form-control" type="password" name="password" value="{{old('password')}}"></br>
                                @if ($errors->has('password'))
                                <span class="label label-danger">{{ $errors->first('password') }}</span>
                                @endif</br>
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <label>Role :</label>
                            <div class="input-group">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="role" value="Admin" checked>
                                    <label for="radioPrimary1">Admin
                                    </label>
                                  </div>
                                  <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="role" value="Cashier">
                                    <label for="radioPrimary2">Cashier
                                    </label><br>
                                  </div>
                                  @if ($errors->has('role'))
                                  <span class="label label-danger">{{ $errors->first('role') }}</span>
                                  @endif</br>
                            </div>
                        </div>
                        <div class="input-group">
                            <button type="submit" class="btn btn-block btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
@endsection