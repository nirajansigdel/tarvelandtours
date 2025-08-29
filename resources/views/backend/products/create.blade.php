@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Create Product</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
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
                                                                <label><input type="checkbox" class="product-type" value="cyc"
                            name="product_types[]">Post</label>
                                    </li>
                                    <li>
                                                                <label><input type="checkbox" class="product-type" value="nsep"
                            name="product_types[]">Destination</label>
                                    </li>
                                    <li>
                                                                <label><input type="checkbox" class="product-type" value="frp"
                            name="product_types[]">General</label>
                                    </li>
                                    <li>
                                                                <label><input type="checkbox" class="product-type" value="community_empowerment"
                            name="product_types[]">Festival</label>
                                    </li>
                                    <li>
                                                                <label><input type="checkbox" class="product-type" value="bamboo_project"
                            name="product_types[]">Couple</label>
                                    </li>
                                    <li>
                                                                <label><input type="checkbox" class="product-type" value="child_care_home"
                            name="product_types[]">Group</label>
                                    </li>

                                </ul>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>

                        {{-- Related Products Display --}}
                        <hr>
                        <div id="related-products-container"></div>

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

            $('.product-type').on('change', function () {
                let selectedTypes = [];

                $('.product-type:checked').each(function () {
                    selectedTypes.push($(this).val());
                });

                if (selectedTypes.length > 0) {
                    // Placeholder for potential AJAX if needed in future
                } else {
                    $('#related-products-container').empty();
                }
            });
        });
    </script>
@endsection




