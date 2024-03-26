@extends('admin.layouts.layout')

@section('title','General Setting')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <div class="section-header-back">
            <a href="{{ route('admin.settings.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
      </div>
      <h1>General Setting Section</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Update General Section</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.general-setting.update', 1)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if (!empty($setting->updated_at))
                      <div class='my-4 badge bg-warning text-dark'>
                        <i class="fas fa-clock me-2"></i>  Last Updated On: {{ $setting->updated_at->diffForHumans() }}
                      </div>
                    @endif

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Webiste Logo Preview</label>
                        <div class="col-sm-12 col-md-7">
                            @if (!empty($setting->logo))
                                <img style="20px;;" src="{{ asset('public'.$setting->logo) }}" alt="website-logo-image"/>
                            @else
                                <p>No website logo uploaded yet.</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Webiste Logo</label>
                      <div class="col-sm-12 col-md-7">
                          <div class="custom-file">
                              <input type="file" name="logo" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                      </div>
                  </div>
                  
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Footer Logo Preview</label>
                    <div class="col-sm-12 col-md-7">
                        @if (!empty($setting->footer_logo))
                            <img style="20px;" src="{{ asset('public'.$setting->footer_logo) }}" alt="website-logo-image"/>
                        @else
                            <p>No footer logo uploaded yet.</p>
                        @endif
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Footer Logo</label>
                      <div class="col-sm-12 col-md-7">
                          <div class="custom-file">
                              <input type="file" name="footer_logo" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                      </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Faviocn Preview</label>
                    <div class="col-sm-12 col-md-7">
                        @if (!empty($setting->favicon))
                            <img style="20px;" src="{{ asset('public'.$setting->favicon) }}" alt="website-logo-image"/>
                        @else
                            <p>No favicon uploaded yet.</p>
                        @endif
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Favicon</label>
                      <div class="col-sm-12 col-md-7">
                          <div class="custom-file">
                              <input type="file" name="favicon" class="custom-file-input" id="customFile">
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