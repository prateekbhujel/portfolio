@extends('admin.layouts.layout')

@section('title', 'Footer-Help Links')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
      </div>
      <h1>Help Links</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>All Links</h4>
              <div class="card-header-action">
                <a href="{{ route('admin.footer-help-links.create') }}" class="btn btn-success"><i class="fas fa-plus me-2"> Create New</i></a>
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

