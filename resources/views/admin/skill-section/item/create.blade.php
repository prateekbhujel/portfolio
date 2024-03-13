@extends('admin.layouts.layout')

@section('title','Create Skill-Item')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('admin.skill-section-item.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Create Skill-Item</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Create Item</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.skill-section-item.store') }}" method="POST">
                    @csrf

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Skill Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="name" class="form-control" value="{{ old('title') }}" placeholder="PHP, Web Devlopment, Back-end Development">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Skill Percentage</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="number" name="percentage" class="form-control" value="{{ old('percentage') }}" placeholder="Example : 60 for 60%">
                        </div>
                      </div>
 
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-dark mt-4">Save</button>
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
