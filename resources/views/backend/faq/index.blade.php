@extends('backend.layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">All FAQs</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($faqs->isEmpty())
        <p>No FAQs found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Heading</th>
                    <th>Answer</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($faqs as $faq)
                <tr>
                    <td>{{ $faq->heading }}</td>
                    <td>{{ $faq->answer }}</td>
                    <td>
                        <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $faqs->links() }}
    @endif

    <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary mt-3">Create New FAQ</a>
</div>
@endsection
