@extends('layout.main')
@section('content')
    <form action="{{ route('sekolah.category.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Input masks</h3>
                    </div>
                    <div class="card-body">
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>Category Name :</label>
                            <div class="input-group">
                                <input type="text" name="category_name" value="{{ old('category_name') }}"
                                    class="form-control"><br>
                                @if ($errors->has('category_name'))
                                    <span class="label label-danger">{{ $errors->first('category_name') }}</span>
                                @endif
                                </br>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description :</label>
                            <div class="input-group">
                                <input name="description" type="text" class="form-control"
                                    data-inputmask='"mask": "(999) 999-9999"' data-mask><br>
                                @if ($errors->has('description'))
                                    <span class="label label-danger">{{ $errors->first('description') }}</span>
                                @endif
                                </br>
                            </div>


                            <div class="input-group">
                                <button type="submit" class="btn btn-block btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
