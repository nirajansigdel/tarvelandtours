@extends('backend.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Demand</div>

                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.demands.update', $demand->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Heading --}}
                        <div class="form-group">
                            <label for="heading">Heading</label>
                            <input type="text" name="heading" id="heading" class="form-control" value="{{ old('heading', $demand->heading) }}">
                        </div>

                        {{-- Subtitle --}}
                        <div class="form-group">
                            <label for="subtitle">Subtitle</label>
                            <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle', $demand->subtitle) }}">
                        </div>

                        {{-- Pack Rate --}}
                        <div class="form-group">
                            <label for="package">Pack Rate</label>
                            <input type="text" name="package" id="package" class="form-control" value="{{ old('package', $demand->package) }}">
                        </div>

                        {{-- Location --}}
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $demand->location) }}">
                        </div>

                        {{-- Transportation --}}
                        <div class="form-group">
                            <label for="transportation">Type of Transportation</label>
                            <input type="text" name="transportation" id="transportation" class="form-control" value="{{ old('transportation', $demand->transportation) }}">
                        </div>

                        {{-- Date --}}
                        <div class="form-group">
                            <label for="date">Date of Travel / Event</label>
                            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $demand->date ? $demand->date->format('Y-m-d') : '') }}">
                        </div>

                        {{-- Duration --}}
                        <div class="form-group">
                            <label for="duration">Duration (Days/Nights)</label>
                            <input type="text" name="duration" id="duration" class="form-control" value="{{ old('duration', $demand->duration) }}">
                        </div>

                        {{-- People --}}
                        <div class="form-group">
                            <label for="people">No. of People</label>
                            <input type="number" name="people" id="people" class="form-control" min="1" value="{{ old('people', $demand->people) }}">
                        </div>

                        {{-- Includes --}}
                        <div class="form-group">
                            <label>Includes</label>
                            <ul id="includes-list" class="list-unstyled">
                                @php
                                    $includes = old('includestuff', $demand->includestuff ?? []);
                                    // if JSON string decode it
                                    if (is_string($includes)) {
                                        $includes = json_decode($includes, true) ?: [];
                                    }
                                @endphp

                                @if (!empty($includes))
                                    @foreach ($includes as $include)
                                        <li class="mb-2 d-flex align-items-center">
                                            <input type="text" name="includestuff[]" class="form-control me-2" value="{{ $include }}" placeholder="Enter included item" />
                                            <button type="button" class="btn btn-danger remove-include">−</button>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="mb-2 d-flex align-items-center">
                                        <input type="text" name="includestuff[]" class="form-control me-2" placeholder="Enter included item" />
                                        <button type="button" class="btn btn-success add-include">+</button>
                                    </li>
                                @endif
                            </ul>
                        </div>

                        {{-- Content --}}
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" class="form-control summernote" rows="5">{{ old('content', $demand->content) }}</textarea>
                        </div>

                        {{-- Image --}}
                        <div class="form-group pt-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control-file" onchange="previewImage(event)">
                            @if($demand->image && file_exists(public_path('uploads/demands/' . $demand->image)))
                                <div class="mt-2">
                                    <img src="{{ asset('uploads/demands/' . $demand->image) }}" alt="Current Image" style="max-width: 200px; max-height: 200px;">
                                </div>
                            @endif
                            <div id="imagePreview"></div>
                        </div>

                        {{-- Project Categories --}}
                        <div class="form-group">
                            <label>Project Categories</label>
                            <ul style="list-style-type: none; padding-left: 0;">
                                @php
                                    $selectedTypes = old('demand_types', $demand->demand_types ?? []);
                                    if (is_string($selectedTypes)) {
                                        $selectedTypes = json_decode($selectedTypes, true) ?: [];
                                    }
                                @endphp

                                @foreach ([
                                    'cyc' => 'Post',
                                    'nsep' => 'Destination',
                                    'frp' => 'General Offer',
                                    'community_empowerment' => 'Festival Offer',
                                    'bamboo_project' => 'Couple Offer',
                                    'child_care_home' => 'Group Package'
                                ] as $key => $label)
                                    <li>
                                        <label>
                                            <input type="checkbox" class="demand-type" value="{{ $key }}" name="demand_types[]" {{ in_array($key, $selectedTypes) ? 'checked' : '' }}>
                                            {{ $label }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Buttons --}}
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.demands.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>

                    {{-- Related Demands Display --}}
                    <hr>
                    <div id="related-demands-container">
                        @if (isset($relatedDemands) && $relatedDemands->count())
                            <h5>Related Demands</h5>
                            <ul class="list-group mt-3">
                                @foreach ($relatedDemands as $relatedDemand)
                                    <li class="list-group-item">
                                        <strong>{{ ucfirst($relatedDemand->type) }}</strong> — {{ $relatedDemand->vacancy }}<br>
                                        <small>{{ $relatedDemand->from_date }} to {{ $relatedDemand->to_date }}</small>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">No related demands found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Scripts --}}
<script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('imagePreview');

        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '200px';
                img.style.maxHeight = '200px';
                preview.appendChild(img);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        const includesList = document.getElementById("includes-list");

        includesList.addEventListener("click", function (e) {
            if (e.target.classList.contains("add-include")) {
                const newLi = document.createElement("li");
                newLi.classList.add("mb-2", "d-flex", "align-items-center");
                newLi.innerHTML = `
                    <input type="text" name="includestuff[]" class="form-control me-2" placeholder="Enter included item" />
                    <button type="button" class="btn btn-danger remove-include">−</button>
                `;
                includesList.appendChild(newLi);
            }

            if (e.target.classList.contains("remove-include")) {
                e.target.closest("li").remove();
            }
        });

        $('.summernote').summernote({
            height: 200,
            focus: true
        });

        $('.demand-type').on('change', function () {
            let selectedTypes = [];

            $('.demand-type:checked').each(function () {
                selectedTypes.push($(this).val());
            });

            if (selectedTypes.length > 0) {
                $.ajax({
                    url: "{{ route('backend.demand.store') }}",
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        types: selectedTypes
                    },
                    success: function (response) {
                        $('#related-demands-container').html(response.html);
                    },
                    error: function () {
                        $('#related-demands-container').html('<p class="text-danger">Failed to load related demands.</p>');
                    }
                });
            } else {
                $('#related-demands-container').empty();
            }
        });
    });
</script>
@endsection
