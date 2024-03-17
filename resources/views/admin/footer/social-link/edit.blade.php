@extends('admin.layouts.layout')

@section('title','Edit Social Link')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('admin.footer-social.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Edit Social Link</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Edit Link</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.footer-social.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row mb-4">
                      <label for="name" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Client Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Jhon Doe">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Position</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="position" class="form-control" value="{{ old('position') }}" placeholder="CFO, CTO, Sales Represntative">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="description" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                        <div class="col-sm-12 col-md-7">
                          <textarea name="description" id="description" class="form-control" placeholder="Feedback...." style="height: 100px">{{ old('description') }}</textarea>
                        </div>
                      </div>
                           
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-dark text-light mt-4">Save</button>
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
