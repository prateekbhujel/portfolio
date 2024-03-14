@extends('admin.layouts.layout')

@section('title','Edit Blog')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('admin.blog.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Edit Blog</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Edit Blog</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
                        <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}" placeholder="Give Your Title...">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="category" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                        <div class="col-sm-12 col-md-7">
                            <select name="category_id" id="category_id" class="form-control selectric">
                              @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                              @endforeach  

                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="description" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea name="description" id="description" class="summernote">{{ old('description', $blog->description) }}</textarea>
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

@push('scripts')
    <script>
        
      $(document).ready(function(){
          $('#image-preview').css({
            'background-image': 'url("{{ asset('public/'. $blog->image) }}")',
            'background-size': 'cover',
            'background-position': 'center'
          });
        });

    </script>
@endpush