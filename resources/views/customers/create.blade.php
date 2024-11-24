@extends('layout.main')
@section('content')
<form action="{{route('sekolah.customer.store')}}" method="POST">
    {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Form Customer</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Customer Name :</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="customer_name" value="{{old('customer_name')}}"></br>
                                @if ($errors->has('customer_name'))
                                <span class="label label-danger">{{ $errors->first('customer_name') }}</span>
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
                            <label>Phone : </label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="phone" value="{{old('phone')}}"></br>
                                @if ($errors->has('phone'))
                                <span class="label label-danger">{{ $errors->first('phone') }}</span>
                                @endif</br>
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <label>Member Status : </label>
                            <div class="input-group">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="member_status" value=1>
                                    <label for="radioPrimary1">True
                                    </label>
                                  </div>
                                  <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="member_status" value=0 checked>
                                    <label for="radioPrimary2">False
                                    </label><br>
                                  </div>
                                  @if ($errors->has('member_status'))
                                  <span class="label label-danger">{{ $errors->first('member_status') }}</span>
                                  @endif</br>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Address: </label>
                            <div class="input-group">
                                <textarea class="form-control" name="address">{{old('address')}}</textarea></br>
                                @if ($errors->has('address'))
                                <span class="label label-danger">{{ $errors->first('address') }}</span>
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
