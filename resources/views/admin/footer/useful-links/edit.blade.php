@extends('admin.layouts.layout')

@section('title','Edit UseFul Link')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('admin.footer-useful-links.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Edit Useful Link</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Edit useful-Link</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.footer-useful-links.update', $footer_useful_link->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    
                    <div class="form-group row mb-4">
                      <label for="name" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name of the Link:</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="name" class="form-control" value="{{ old('name', $footer_useful_link->name) }}" placeholder="Give Name to The Link">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="name" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Url of The Link:</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="url" class="form-control" value="{{ old('url', $footer_useful_link->url) }}" placeholder="https://www.meddium.com/useful-content-ever">
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
