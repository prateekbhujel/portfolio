@extends('admin.layouts.layout')

@section('title','Footer-Contact Information')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
      </div>
      <h1>Footer Contact Information</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Update Contact Information</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.footer-contact-info.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if (!empty($contact_info->updated_at))
                      <div class='my-4 badge bg-warning text-dark'>
                        <i class="fas fa-clock me-2"></i>  Last Updated On: {{ $contact_info->updated_at->diffForHumans() }}
                      </div>
                    @endif

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address </label>
                      <div class="col-sm-12 col-md-7">
                        <textarea name="address"  class="form-control" placeholder="17232 Broadway Suite 308, Jackson Heights, 11372, NY, United States. (Leave empty incase you dont want this content to be shown on forntend)" style="height: 100px">{{ old('address', $contact_info->address) }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">copyright Text</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="phone" class="form-control" value="{{ old('phone', $contact_info->phone) }}" placeholder="Phone, +977-981245455 (Leave empty incase you dont want this content to be shown on forntend)">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email Address</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="email" name="email" class="form-control" value="{{ old('email', $contact_info->email) }}" placeholder="example@email.com (Leave empty incase you dont want this content to be shown on forntend)">
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
