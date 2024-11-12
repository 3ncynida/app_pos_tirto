@extends('layout.main')
@section('content')
<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
    <div class="col-md-12">
      <div class="card card-danger">
        <div class="card-header">
          <h3 class="card-title">IFORM PRODUCTS</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Product Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}"></br>
                    @if ($errors->has('product_name'))
                    <span class="label label-danger">{{ $errors->first('product_name') }}</span>
                    @endif</br>
                </div>
            </div>

            <div class="form-group">
                <label>Foto Produk:</label>
                <div class="input-group">
                    <input type="file" name="photo"><br>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Product Category</label>
                <div class="input-group">
                    <select name="category_id">
                        <option value="">Select Category</option>
                        @foreach ($dataCategory as $v)
                        <option value="{{ $v->category_id }}" @if (old('category_id')==$v->category_id) selected @endif>{{ $v->category_name }}</option>
                        @endforeach
                    </select></br>
                    @if ($errors->has('category_id'))
                    <span class="label label-danger">{{ $errors->first('category_id') }}</span>
                    @endif</br>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="price" value="{{ old('price') }}"></br>
                        @if ($errors->has('price'))
                        <span class="label label-danger">{{ $errors->first('price') }}</span>
                        @endif</br>
                    </div>
                </div>

                <div class="form-group">
                    <label>Stock</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="stock" value="{{ old('stock') }}"></br>
                        @if ($errors->has('stock'))
                        <span class="label label-danger">{{ $errors->first('stock') }}</span>
                        @endif</br>
                    </div>
                </div>

                <div class="form-group">
                    <label>Product Description</label>
                    <div class="input-group">
                        <textarea type="text" class="form-control" name="product_description">{{ old('product_description') }}</textarea></br>
                        @if ($errors->has('product_description'))
                        <span class="label label-danger">{{ $errors->first('product_description') }}</span>
                        @endif</br>
                    </div>
                </div>

                <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
@endsection


    

   
   
    
   




    
    

