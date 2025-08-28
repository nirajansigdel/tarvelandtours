@extends('backend.layouts.master')

@section('content')
<div class="admin-container">
    <div class="admin-content">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">{{ $page_title ?? 'Add New Product' }}</h1>
            <a href="{{ route('admin.products.index') }}" class="back-button">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>

        <!-- Alert Messages -->
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
                <li class="breadcrumb-item active">{{ $page_title ?? 'Add New Product' }}</li>
            </ol>
        </nav>

        <!-- Form -->
        <div class="form-container">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" id="crudForm">
                @csrf
                
                <div class="card">
                    <div class="card-header">
                        Add New Product
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">
                                Product Name <span class="required">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="Enter product name" 
                                   value="{{ old('name') }}"
                                   required>
                            @error('name')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                Category <span class="required">*</span>
                            </label>
                            <select name="category" 
                                    class="form-control @error('category') is-invalid @enderror"
                                    required>
                                <option value="">Select Category</option>
                                <option value="electronics" {{ old('category') == 'electronics' ? 'selected' : '' }}>Electronics</option>
                                <option value="clothing" {{ old('category') == 'clothing' ? 'selected' : '' }}>Clothing</option>
                                <option value="books" {{ old('category') == 'books' ? 'selected' : '' }}>Books</option>
                                <option value="home" {{ old('category') == 'home' ? 'selected' : '' }}>Home & Garden</option>
                            </select>
                            @error('category')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                Price <span class="required">*</span>
                            </label>
                            <input type="number" 
                                   name="price" 
                                   class="form-control @error('price') is-invalid @enderror" 
                                   placeholder="0.00" 
                                   step="0.01"
                                   min="0"
                                   value="{{ old('price') }}"
                                   required>
                            @error('price')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Product Image</label>
                            <input type="file" 
                                   name="image" 
                                   class="form-control @error('image') is-invalid @enderror"
                                   onchange="previewImage(event, 'preview')"
                                   accept="image/*">
                            @error('image')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                            <img id="preview" class="image-preview" style="display: none;">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea name="description" 
                                      class="form-control @error('description') is-invalid @enderror"
                                      rows="4"
                                      placeholder="Enter product description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select name="status" 
                                    class="form-control @error('status') is-invalid @enderror">
                                <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Create Product
                        </button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Image preview function
    function previewImage(event, previewId) {
        const reader = new FileReader();
        reader.onload = function() {
            const preview = document.getElementById(previewId);
            preview.src = reader.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection 