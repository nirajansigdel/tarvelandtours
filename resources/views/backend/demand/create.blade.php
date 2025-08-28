@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Create Demand</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        <form method="POST" action="{{ route('admin.demands.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="heading">Heading</label>
                                <input type="text" name="heading" id="heading" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="subtitle">Subtitle</label>
                                <input type="text" name="subtitle" id="subtitle" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="package">Pack Rate</label>
                                <input type="text" name="package" id="package" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" name="location" id="location" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="transportation">Type of Transportation</label>
                                <input type="text" name="transportation" id="transportation" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="date">Date of Travel / Event</label>
                                <input type="date" name="date" id="date" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="duration">Duration (Days/Nights)</label>
                                <input type="text" name="duration" id="duration" class="form-control"
                                    placeholder="e.g., 3 Days / 2 Nights" />
                            </div>
                            <div class="form-group">
                                <label for="people">No. of People</label>
                                <input type="number" name="people" id="people" class="form-control" min="1" />
                            </div>

                            <div class="form-group">
                                <label>Includes</label>
                                <ul id="includes-list" class="list-unstyled">
                                    <li class="mb-2 d-flex align-items-center">
                                        <input type="text" name="includestuff[]" class="form-control me-2"
                                            placeholder="Enter included item" />
                                        <button type="button" class="btn btn-success add-include">+</button>
                                    </li>
                                </ul>
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" class="form-control summernote" rows="5"></textarea>
                            </div>

                            <div class="form-group pt-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control-file"
                                    onchange="previewImage(event)">
                                <div id="imagePreview"></div>
                            </div>
                            {{-- Project Type Selection --}}
                            <div class="form-group">
                                <label>Project Categories</label>
                                <ul style="list-style-type: none; padding-left: 0;">
                                    <li>
                                        <label><input type="checkbox" class="demand-type" value="cyc"
                                                name="demand_types[]">Post</label>
                                    </li>
                                    <li>
                                        <label><input type="checkbox" class="demand-type" value="nsep"
                                                name="demand_types[]">Destination</label>
                                    </li>
                                    <li>
                                        <label><input type="checkbox" class="demand-type" value="frp"
                                                name="demand_types[]">general offer</label>
                                    </li>
                                    <li>
                                        <label><input type="checkbox" class="demand-type" value="community_empowerment"
                                                name="demand_types[]">Festival offer</label>
                                    </li>
                                    <li>
                                        <label><input type="checkbox" class="demand-type" value="bamboo_project"
                                                name="demand_types[]">couple offer</label>
                                    </li>
                                    <li>
                                        <label><input type="checkbox" class="demand-type" value="child_care_home"
                                                name="demand_types[]">group package</label>
                                    </li>

                                </ul>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>

                        {{-- Related Demands Display --}}
                        <hr>
                        <div id="related-demands-container">
                            @if ($relatedDemands->count())
                                <h5>Related Demands</h5>
                                <ul class="list-group mt-3">
                                    @foreach ($relatedDemands as $demand)
                                        <li class="list-group-item">
                                            <strong>{{ ucfirst($demand->type) }}</strong> — {{ $demand->vacancy }}<br>
                                            <small>{{ $demand->from_date }} to {{ $demand->to_date }}</small>
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
        });
    </script>

    <script>
        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('imagePreview');

            while (preview.firstChild) {
                preview.removeChild(preview.firstChild);
            }

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '200px';
                    img.style.maxHeight = '200px';
                    preview.appendChild(img);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function () {
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