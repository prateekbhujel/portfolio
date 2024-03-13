@extends('admin.layouts.layout')

@section('title','Experience Section')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
      </div>
      <h1>Experience Section</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Update Experience Section</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.experience.update', 1)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- @if (!empty($experience->updated_at))
                      <div class='my-3 badge bg-warning text-dark'>
                        <i class="fas fa-clock me-2"></i>  Last Updated On: {{ $experience->updated_at->diffForHumans() }}
                      </div>
                    @endif --}}

                    <div class="form-group row mb-4">
                        <label for="thumbnail" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                        <div class="col-sm-12 col-md-7">
                            <div id="image-preview" class="image-preview">
                                <label for="image-label" class="image-label">Choose Image</label>
                                <input type="file" name="image" id="image-upload">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="title" class="form-control" value="{{ old('title', $experience->title) }}" placeholder="Give Your Title...">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="description" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea name="description" id="description" class="summernote">{!! $experience->description !!}</textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone Number</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="phone" class="form-control" value="{{ old('phone', $experience->phone) }}" placeholder="+977-9862500130">
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email Address</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="email" name="email" class="form-control" value="{{ old('email', $experience->email) }}">
                        </div>
                      </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary mt-4">Update</button>
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

@push('scripts')
    <script>
        
      $(document).ready(function(){
          $('#image-preview').css({
            'background-image': 'url("{{ asset('public/' . $experience->image) }}")',
            'background-size': 'cover',
            'background-position': 'center'
          });
        });

    </script>
@endpush