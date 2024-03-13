@extends('admin.layouts.layout')

@section('title','Feedback Setting Section')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
      </div>
      <h1>Feedback Setting Section</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Update Feedback Setting</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.feedback-section-setting.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if (!empty($feedbackSection->updated_at))
                      <div class='my-4 badge bg-warning text-dark'>
                        <i class="fas fa-clock me-2"></i>  Last Updated On: {{ $feedbackSection->updated_at->diffForHumans() }}
                      </div>
                    @endif

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="title" class="form-control" value="{{ old('title', $feedbackSection->title) }}" placeholder="Give Your Title...">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Title</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea name="sub_title" id="" class="form-control" placeholder="Description of your Title..." style="height: 100px">{{ old('sub_title', $feedbackSection->sub_title) }}</textarea>
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
