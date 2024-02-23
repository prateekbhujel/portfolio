@extends('admin.layouts.layout')

@section('title','Hero Section')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
      </div>
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
                <form action="{{route('admin.hero.update', 1)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if (!empty($hero->updated_at))
                      <div class='my-4 badge bg-warning text-dark'>
                        <i class="fas fa-clock me-2"></i>  Last Updated On: {{ $hero->updated_at->diffForHumans() }}
                      </div>
                    @endif

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="title" class="form-control" value="{{ old('title', $hero->title ?? '') }}" placeholder="Give Your Title...">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Title</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea name="sub_title" id="" class="form-control" placeholder="Description of your Title..." style="height: 100px">{{ old('sub_title', $hero->sub_title ?? '') }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button Text</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="btn_text" class="form-control" value="{{ old('btn_text', $hero->btn_text ?? '') }}" placeholder="Button Text...">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button Url</label>
                      <div class="col-sm-12 col-md-7">
                        <span>Type the route name here without double or single quotes Example: home </span>
                        <input type="text" name="btn_url" class="form-control" value="{{ old('btn_url', $hero->btn_url ?? '') }}" placeholder="home">
                      </div>
                    </div>
                    @if ($hero && $hero->image)
                      <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview Image</label>
                          <div class="col-sm-12 col-md-7" >
                              <img src="{{ asset('public/' . $hero->image) }}" id="customImg" alt="Preview of Hero Image" style="width: 360px; height: 150px;">
                          </div>
                      </div>
                    @endif                

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Background Image</label>
                      <div class="col-sm-12 col-md-7">
                          <div class="custom-file">
                              <input type="file" name="image" class="custom-file-input" id="customFile" value="{{ $hero->image ?? '' }}">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-dark mt-4">Update</button>
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
