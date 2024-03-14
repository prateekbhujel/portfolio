@extends('admin.layouts.layout')

@section('title', 'Blog-Category')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
      </div>
      <h1>Blog Categories</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>All Blog Categories</h4>
              <div class="card-header-action">
                <a href="{{ route('admin.blog-category.create') }}" class="btn btn-success"><i class="fas fa-plus me-2"> Create New</i></a>
              </div>
            </div>
            <div class="card-body">
              {{ $dataTable->table(['class' => 'table table-bordered table-striped', true]) }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection

@push('scripts')
  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

