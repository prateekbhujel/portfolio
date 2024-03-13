@extends('admin.layouts.layout')

@section('title','Edit Skill-Item')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('admin.skill-section-item.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Edit Item</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Edit Skill-Item</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.skill-section-item.update', $skill_section_item->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Skill Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="name" class="form-control" value="{{ old('name', $skill_section_item->name) }}" placeholder="{{ fake()->name }}">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Skill Percentage</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="number" name="percentage" class="form-control" value="{{ old('percentage', $skill_section_item->percentage) }}" placeholder="{{ fake()->name }}">
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
