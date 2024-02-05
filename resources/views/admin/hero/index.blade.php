@extends('admin.layouts.layout')

@section('title', 'Hero')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Hero Section</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Update Hero Section</h4>
            </div>

            <div class="card-body">
                <form method="post" action="">
                    @csrf
                    @method('PUT')

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="text" name="title" class="form-control">
                        </div>
                    </div>
                
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Title</label>
                        <div class="col-sm-12 col-md-7">
                        <textarea name="" id="" class="form-control" style="height: 100px;"></textarea>
                        </div>
                    </div>
                
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button Text</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control">
                    </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button Url</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Background Image</label>
                        <div class="col-sm-12 col-md-7">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label for="customFile" class="custom-file-label" id="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button class="btn btn-pirmary">Update</button>
                        </div>
                    </div>
                </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection