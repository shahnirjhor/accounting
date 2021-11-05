@extends('layouts.layout')
@section('one_page_js')
    <!-- Color Picker -->
    <script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
@endsection

@section('one_page_css')    
    <!-- Color Picker -->
    <link href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('category.index') }}">{{ __('category.category list') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('category.add new') }}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('category.add new') }}</h3>
            </div>
            <div class="card-body">
                <form class="form-material form-horizontal" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">{{ __('category.name') }} <b class="ambitious-crimson">*</b></label>
                              <div class="form-group input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-money-check-alt"></i>
                                  </div>
                                  <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="{{ __('category.enter category name') }}" required>
                              </div>
                            </div>

                            <div class="col-md-6">
                                <label for="type">{{ __('brand.type') }}</label>
                                <div class="form-group input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-weight"></i></span>
                                    </div>
                                    <select class="form-control" id="type" name="type">
                                            <option value="">- {{ __('brand.select type') }} -</option>
                                            @foreach($types as $key=> $value)      
                                                <option value="{{ $key }}" @if(old('type') == $key) selected="selected" @endif >{{ $value }}</option>  
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">{{ __('category.color') }} <b class="ambitious-crimson">*</b></label>
                              <div class="form-group input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text color-id" id="color-id"><i class="fas fa-stop"></i></span>
                                  </div>
                                  <input id="color" class="form-control my-colorpicker" required="required" name="color" type="text" value="#00a65a">
                                  <span class="color-id"></span>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <label for="enabled">{{ __('brand.enabled') }} <b class="ambitious-crimson">*</b></label>
                                <div class="form-group input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-bell"></i></span>
                                    </div>
                                    <select class="form-control ambitious-form-loading @error('enabled') is-invalid @enderror" required="required" name="enabled" id="enabled">
                                        <option value="1" {{ old('enabled') == 1 ? 'selected' : '' }}>{{ __('tax.yes') }}</option>
                                        <option value="0" {{ old('enabled') == 0 ? 'selected' : '' }}>{{ __('tax.no') }}</option>
                                    </select>
                                    @error('enabled')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-form-label"></label>
                        <div class="col-md-8">
                            <input type="submit" value="{{ __('entire.submit') }}" class="btn btn-outline btn-info btn-lg"/>
                            <a href="{{ route('category.index') }}" class="btn btn-outline btn-warning btn-lg">{{ __('category.cancel') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('script.category.create.js')
@endsection