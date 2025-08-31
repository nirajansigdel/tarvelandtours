
@extends('frontend.layouts.master')
@section('content')

<!-- Success and Error Alert Messages -->
@if(session('success'))
    <div class="container mt-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="container mt-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

@if($errors->any())
    <div class="container mt-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Please fix the following errors:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

<div class="container my-5 shadow p-4">
    <h1 class="mb-4 extralarger  greenhighlight">Application For {{ $product->heading }}</h1>
    <form id="applicationForm" action="{{ route('apply.store', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="name" class="form-label">{{ trans('messages.Name') }}</label><span style="color:red; font-size:large"> *</span>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="email" class="form-label">{{ trans('messages.Email') }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="address" class="form-label">{{ trans('messages.Address') }}</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="phone_no" class="form-label">{{ trans('messages.Phone Number') }}</label><span style="color:red; font-size:large"> *</span>
                <input type="tel" class="form-control @error('phone_no') is-invalid @enderror" id="phone_no" name="phone_no" value="{{ old('phone_no') }}" required>
                @error('phone_no')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="whatsapp_no" class="form-label">{{ trans('messages.WhatsApp Number') }}</label>
                <input type="tel" class="form-control @error('whatsapp_no') is-invalid @enderror" id="whatsapp_no" name="whatsapp_no" value="{{ old('whatsapp_no') }}">
                @error('whatsapp_no')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="document_proof" class="form-label">Upload Document (Citizenship ID or License)</label><span style="color:red; font-size:large"> * </span><span>( PDF, JPG, PNG, DOC )</span>
                <input type="file" class="form-control @error('document_proof') is-invalid @enderror" id="document_proof" name="document_proof" required>
                @error('document_proof')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="">
            <button type="submit" class="py-3 btn btn-primary">Submit Application</button>
        </div>
    </form>
</div>
    <!-- Custom CSS -->
    <style>
    </style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection






