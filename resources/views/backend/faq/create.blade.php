@extends('backend.layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Create New FAQ</h3>
        </div>

        <div class="card-body">
            {{-- Show validation errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.faqs.store') }}" method="POST">
                @csrf

                {{-- Heading --}}
                <div class="mb-3">
                    <label for="heading" class="form-label">Heading <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="heading" name="heading" value="{{ old('heading') }}" required>
                </div>

                {{-- Answer --}}
                <div class="mb-3">
                    <label for="answer" class="form-label">Answer <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="answer" name="answer" rows="5" required>{{ old('answer') }}</textarea>
                </div>

                {{-- Action Buttons --}}
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Create FAQ</button>
                    <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
