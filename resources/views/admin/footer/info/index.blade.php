@extends('admin.layouts.layout')

@section('title','Footer Information')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
      </div>
      <h1>Footer Information</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Update Footer Information</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.footer-info.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if (!empty($footer_info->updated_at))
                      <div class='my-4 badge bg-warning text-dark'>
                        <i class="fas fa-clock me-2"></i>  Last Updated On: {{ $footer_info->updated_at->diffForHumans() }}
                      </div>
                    @endif

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Footer Information </label>
                      <div class="col-sm-12 col-md-7">
                        <textarea name="info" id="" class="form-control" placeholder="Add Text here, to make it appear on the footer section (Leave empty incase you dont want this content to be shown on forntend)" style="height: 100px">{{ old('info', $footer_info->info) }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">copyright Text</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="copy_right" class="form-control" value="{{ old('copy_right', $footer_info->copy_right) }}" placeholder="Copyrights content (Leave empty incase you dont want this content to be shown on forntend)">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Powered By Text</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="powered_by" class="form-control" value="{{ old('powered_by', $footer_info->powered_by) }}" placeholder="Powered By content (Leave empty incase you dont want this content to be shown on forntend)">
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
