@extends('admin.layouts.layout')

@section('title','SEO Setting Section')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <div class="section-header-back">
            <a href="{{ route('admin.settings.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
      </div>
      <h1>SEO Setting Section</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Update SEO Section</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.seo-setting.update', 1)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if (!empty($seoSetting->updated_at))
                      <div class='my-4 badge bg-warning text-dark'>
                        <i class="fas fa-clock me-2"></i>  Last Updated On: {{ $seoSetting->updated_at->diffForHumans() }}
                      </div>
                    @endif

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Website Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="title" class="form-control" value="{{ old('title', $seoSetting->title) }}" placeholder="Give Website Title...">
                      </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description of SEO</label>
                        <div class="col-sm-12 col-md-7">
                          <textarea name="description" id="description" class="form-control" placeholder="Description of your SEO Title..." style="height: 100px">{{ old('description', $seoSetting->description) }}</textarea>
                        </div>
                      </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SEO Keywords</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="keywords" class="form-control" value="{{ old('keywords', $seoSetting->keywords) }}" placeholder="Trending words and must be comma seperated.">
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
