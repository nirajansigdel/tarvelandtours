@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>All Projects</span>
                            <a href="{{ route('admin.demands.create') }}" class="btn btn-primary">Create New Project</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ Session::get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if ($demands && $demands->count())
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Heading</th>
                                            <th>Subtitle</th>
                                            <th>Pack Rate</th>
                                            <th>Location</th>
                                            <th>Transportation</th>
                                            <th>Actions</th> {{-- Actions column --}}
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($demands as $index => $demand)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $demand->heading ?: 'N/A' }}</td>
                                                <td>{{ $demand->subtitle ?: 'N/A' }}</td>
                                                <td>{{ $demand->package ?: 'N/A' }}</td>
                                                <td>{{ $demand->location ?: 'N/A' }}</td>
                                                <td>{{ $demand->transportation ?: 'N/A' }}</td>

                                                <td>
                                                    <button type="button" class="btn btn-sm btn-info view-btn" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#viewModal"
                                                        data-heading="{{ $demand->heading }}"
                                                        data-subtitle="{{ $demand->subtitle }}"
                                                        data-packagerate="{{ $demand->package }}"
                                                        data-location="{{ $demand->location }}"
                                                        data-transportation="{{ $demand->transportation }}"
                                                        data-date="{{ $demand->date ? \Carbon\Carbon::parse($demand->date)->format('M d, Y') : 'N/A' }}"
                                                        data-duration="{{ $demand->duration }}"
                                                        data-people="{{ $demand->people }}"
                                                        data-includes='@json($demand->includestuff)'
                                                        data-content="{{ strip_tags($demand->content) }}"
                                                        data-categories='@json($demand->demand_types)'
                                                        data-image="{{ $demand->image }}"
                                                        data-createdat="{{ $demand->created_at->format('M d, Y') }}"
                                                    >
                                                        View
                                                    </button>

                                                    <a href="{{ route('admin.demands.edit', $demand->id) }}" class="btn btn-sm btn-warning">
                                                        Edit
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>

                            @if ($demands->hasPages())
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $demands->links() }}
                                </div>
                            @endif
                        @else
                            <div class="text-center py-5">
                                <div class="mb-3">
                                    <i class="fas fa-folder-open fa-3x text-muted"></i>
                                </div>
                                <h5 class="text-muted">No Projects Found</h5>
                                <p class="text-muted">Start by creating your first project.</p>
                                <a href="{{ route('admin.demands.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Create First Project
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for viewing details -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Project Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-3">Heading</dt>
                        <dd class="col-sm-9" id="modalHeading"></dd>

                        <dt class="col-sm-3">Subtitle</dt>
                        <dd class="col-sm-9" id="modalSubtitle"></dd>

                        <dt class="col-sm-3">Pack Rate</dt>
                        <dd class="col-sm-9" id="modalPackRate"></dd>

                        <dt class="col-sm-3">Location</dt>
                        <dd class="col-sm-9" id="modalLocation"></dd>

                        <dt class="col-sm-3">Transportation</dt>
                        <dd class="col-sm-9" id="modalTransportation"></dd>

                        <dt class="col-sm-3">Date</dt>
                        <dd class="col-sm-9" id="modalDate"></dd>

                        <dt class="col-sm-3">Duration</dt>
                        <dd class="col-sm-9" id="modalDuration"></dd>

                        <dt class="col-sm-3">No. of People</dt>
                        <dd class="col-sm-9" id="modalPeople"></dd>

                        <dt class="col-sm-3">Includes</dt>
                        <dd class="col-sm-9" id="modalIncludes"></dd>

                        <dt class="col-sm-3">Content</dt>
                        <dd class="col-sm-9" id="modalContent"></dd>

                        <dt class="col-sm-3">Categories</dt>
                        <dd class="col-sm-9" id="modalCategories"></dd>

                        <dt class="col-sm-3">Image</dt>
                        <dd class="col-sm-9" id="modalImage"></dd>

                        <dt class="col-sm-3">Created At</dt>
                        <dd class="col-sm-9" id="modalCreatedAt"></dd>
                    </dl>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" id="modalEditBtn" class="btn btn-warning">Edit Project</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* same styling as before for table etc */
        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
        }

        .table th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .badge {
            font-size: 0.75rem;
            padding: 0.35em 0.65em;
        }

        .btn-group .btn {
            margin-right: 2px;
        }

        .btn-group .btn:last-child {
            margin-right: 0;
        }

        .img-thumbnail {
            border: 2px solid #dee2e6;
            transition: transform 0.2s;
        }

        .img-thumbnail:hover {
            transform: scale(1.1);
            border-color: #007bff;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const viewButtons = document.querySelectorAll('.view-btn');

            viewButtons.forEach(button => {
                button.addEventListener('click', function () {
                    document.getElementById('modalHeading').textContent = this.dataset.heading || 'N/A';
                    document.getElementById('modalSubtitle').textContent = this.dataset.subtitle || 'N/A';
                    document.getElementById('modalPackRate').textContent = this.dataset.packagerate || 'N/A';
                    document.getElementById('modalLocation').textContent = this.dataset.location || 'N/A';
                    document.getElementById('modalTransportation').textContent = this.dataset.transportation || 'N/A';
                    document.getElementById('modalDate').textContent = this.dataset.date || 'N/A';
                    document.getElementById('modalDuration').textContent = this.dataset.duration || 'N/A';
                    document.getElementById('modalPeople').textContent = this.dataset.people || 'N/A';

                    // Includes - parse JSON string
                    let includesHtml = 'N/A';
                    try {
                        const includes = JSON.parse(this.dataset.includes);
                        if (Array.isArray(includes)) {
                            includesHtml = '<ul>';
                            includes.forEach(item => {
                                includesHtml += `<li>${item}</li>`;
                            });
                            includesHtml += '</ul>';
                        } else if (typeof includes === 'string') {
                            includesHtml = `<p>${includes}</p>`;
                        }
                    } catch {
                        includesHtml = this.dataset.includes || 'N/A';
                    }
                    document.getElementById('modalIncludes').innerHTML = includesHtml;

                    // Content
                    document.getElementById('modalContent').textContent = this.dataset.content || 'N/A';

                    // Categories - parse JSON
                    let categoriesHtml = 'N/A';
                    try {
                        const categories = JSON.parse(this.dataset.categories);
                        if (Array.isArray(categories)) {
                            categoriesHtml = '';
                            categories.forEach(cat => {
                                categoriesHtml += `<span class="badge bg-info text-dark me-1">${cat.replace(/_/g, ' ')}</span>`;
                            });
                        }
                    } catch {
                        categoriesHtml = this.dataset.categories || 'N/A';
                    }
                    document.getElementById('modalCategories').innerHTML = categoriesHtml;

                    // Image
                    if (this.dataset.image) {
                        const imgPath = "{{ asset('uploads/demands') }}/" + this.dataset.image;
                        document.getElementById('modalImage').innerHTML = `<img src="${imgPath}" alt="Project Image" class="img-fluid" style="max-height: 200px;">`;
                    } else {
                        document.getElementById('modalImage').textContent = 'No Image';
                    }

                    // Created At
                    document.getElementById('modalCreatedAt').textContent = this.dataset.createdat || 'N/A';

                    // Edit button link
                    const editUrl = "{{ url('admin/demands') }}/" + this.dataset.id + "/edit";
                    document.getElementById('modalEditBtn').href = "{{ url('admin/demands') }}/" + this.dataset.id + "/edit";
                });
            });
        });
    </script>
@endsection
