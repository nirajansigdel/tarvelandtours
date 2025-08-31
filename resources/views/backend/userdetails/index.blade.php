@extends('backend.layouts.master')

@section('content')
<div class="admin-container">
    <div class="admin-content">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">{{ $page_title ?? 'User Details' }}</h1>
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
                <li class="breadcrumb-item active">{{ $page_title ?? 'User Details' }}</li>
            </ol>
        </nav>

        <!-- Data Table -->
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Product Applied</th>
                        <th>Document Proof</th>
                        <th>Submitted Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($userDetails ?? [] as $index => $userDetail)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $userDetail->name }}</td>
                            <td>{{ $userDetail->email ?? 'N/A' }}</td>
                            <td>{{ $userDetail->phone_no }}</td>
                            <td>{{ Str::limit($userDetail->address ?? 'N/A', 30) }}</td>
                            <td>
                                @if($userDetail->product)
                                    <div>
                                        <strong>{{ $userDetail->product->heading }}</strong>
                                        @if($userDetail->product->product_types)
                                            <div class="mt-1">
                                                @php
                                                    $productTypes = $userDetail->product->product_types;
                                                    if (is_string($productTypes)) {
                                                        $productTypes = json_decode($productTypes, true) ?? [];
                                                    }
                                                    if (!is_array($productTypes)) {
                                                        $productTypes = [];
                                                    }
                                                @endphp
                                                                                                 @foreach($productTypes as $type)
                                                     <span class="badge badge-info mr-1" style="background-color: #5C7C8F; color: white; font-weight: bold;">{{ $type }}</span>
                                                 @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td>
                                @if($userDetail->document_proof)
                                    <a href="{{ Storage::url($userDetail->document_proof) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-file-pdf"></i> View Document
                                    </a>
                                @else
                                    <span class="text-muted">No document</span>
                                @endif
                            </td>
                            <td>{{ $userDetail->created_at ? $userDetail->created_at->format('M d, Y H:i') : 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No user details found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if(isset($userDetails) && method_exists($userDetails, 'links'))
            <div class="d-flex justify-content-center mt-4">
                {{ $userDetails->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
