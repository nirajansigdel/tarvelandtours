@extends('backend.layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit FAQ</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.faqs.update', $faq->id) }}">
        @csrf
        @method('PUT')
        
        {{-- Heading --}}
        <div class="form-group mb-3">
            <label for="heading">Heading</label>
            <input type="text" class="form-control" id="heading" name="heading" value="{{ old('heading', $faq->heading) }}" required>
        </div>
        
        {{-- Answer --}}
        <div class="form-group mb-3">
            <label for="answer">Answer</label>
            <textarea class="form-control" id="answer" name="answer" rows="5" required>{{ old('answer', $faq->answer) }}</textarea>
        </div>

        {{-- Action Buttons --}}
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
