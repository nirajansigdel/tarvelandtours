@extends('backend.layouts.master')

@section('content')
<div class="admin-container">
    <div class="admin-content">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">{{ $page_title ?? 'Products' }}</h1>
            <div class="action-buttons">
                <a href="{{ route('admin.products.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Add New Product
                </a>
                <a href="{{ url('admin') }}" class="back-button">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
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
                <li class="breadcrumb-item active">{{ $page_title ?? 'Products' }}</li>
            </ol>
        </nav>

        <!-- Data Table -->
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products ?? [] as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name ?? 'N/A' }}</td>
                            <td>{{ $product->category ?? 'N/A' }}</td>
                            <td>${{ number_format($product->price ?? 0, 2) }}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('uploads/products/' . $product->image) }}" 
                                         class="table-image" 
                                         alt="{{ $product->name }}">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $product->status ? 'badge-success' : 'badge-danger' }}">
                                    {{ $product->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Are you sure you want to delete this product?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if(isset($products) && method_exists($products, 'links'))
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>
@endsection 