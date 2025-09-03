is revert @extends('backend.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit Product</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="heading">Heading</label>
                                <input type="text" name="heading" id="heading" class="form-control" value="{{ old('heading', $product->heading) }}">
                            </div>

                            <div class="form-group">
                                <label for="subtitle">Subtitle</label>
                                <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle', $product->subtitle) }}">
                            </div>

                            <div class="form-group">
                                <label for="package">Pack Rate</label>
                                <input type="text" name="package" id="package" class="form-control" value="{{ old('package', $product->package) }}" />
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="original_price">Original Price (NPR)</label>
                                        <input type="number" name="original_price" id="original_price" class="form-control" step="0.01" min="0" placeholder="e.g., 20000" value="{{ old('original_price', $product->original_price) }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="discounted_price">Discounted Price (NPR)</label>
                                        <input type="number" name="discounted_price" id="discounted_price" class="form-control" step="0.01" min="0" placeholder="e.g., 15000" value="{{ old('discounted_price', $product->discounted_price) }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $product->location) }}" />
                            </div>

                            <div class="form-group">
                                <label for="transportation">Type of Transportation</label>
                                <input type="text" name="transportation" id="transportation" class="form-control" value="{{ old('transportation', $product->transportation) }}" />
                            </div>

                            <div class="form-group">
                                <label for="date">Date of Travel / Event</label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ old('date', optional($product->date)->format('Y-m-d')) }}" />
                            </div>

                            <div class="form-group">
                                <label for="duration">Duration (Days/Nights)</label>
                                <input type="text" name="duration" id="duration" class="form-control" value="{{ old('duration', $product->duration) }}" />
                            </div>

                            <div class="form-group">
                                <label for="people">No. of People</label>
                                <input type="number" name="people" id="people" class="form-control" min="1" value="{{ old('people', $product->people) }}" />
                            </div>

                            <div class="form-group">
                                <label>Includes <small class="text-muted">(Up to 5 items)</small></label>
                                <ul id="includes-list" class="list-unstyled">
                                    @if(is_array($product->includes) && count($product->includes))
                                        @foreach($product->includes as $include)
                                            <li class="mb-2 d-flex align-items-center">
                                                <input type="text" name="includes[]" class="form-control me-2" 
                                                    placeholder="Enter included item" value="{{ $include }}" />
                                                @if($loop->first)
                                                    <button type="button" class="btn btn-success btn-sm add-include" id="add-include-btn">+</button>
                                                @else
                                                    <button type="button" class="btn btn-danger btn-sm remove-include">−</button>
                                                @endif
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="mb-2 d-flex align-items-center">
                                            <input type="text" name="includes[]" class="form-control me-2" 
                                                placeholder="Enter included item" />
                                            <button type="button" class="btn btn-success btn-sm add-include" id="add-include-btn">+</button>
                                        </li>
                                    @endif
                                </ul>
                                <small class="text-muted">Current items: <span id="includes-count">{{ is_array($product->includes) ? count($product->includes) : 1 }}</span>/5</small>
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" class="form-control summernote" rows="5">{{ old('content', $product->content) }}</textarea>
                            </div>

                            <div class="form-group pt-3">
                                <label for="images">Images (up to 6)</label>
                                <input type="file" name="images[]" id="images" class="form-control" multiple>
                                <div class="mt-2 small text-muted">Selected: <span id="imagesCount">0</span></div>
                                <div id="galleryPreview" class="d-flex flex-wrap gap-2 mt-2"></div>
                                @if(is_array($product->images) && count($product->images))
                                    <div class="d-flex flex-wrap gap-2 mt-2">
                                        @foreach($product->images as $img)
                                            <img src="{{ asset('uploads/products/'.$img) }}" style="width:100px;height:100px;object-fit:cover;border-radius:6px" />
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Project Categories</label>
                                <ul style="list-style-type: none; padding-left: 0;">
                                                                         @php $types = is_array($product->product_types) ? $product->product_types : (json_decode($product->product_types, true) ?? []); @endphp
                                                                         @foreach(['Post' => 'Post','Destination' => 'Destination','General' => 'General','Festival' => 'Festival','Couple' => 'Couple','Group' => 'Group'] as $val => $label)
                                    <li>
                                                                                 <label><input type="checkbox" class="product-type" value="{{ $val }}" name="product_types[]" {{ in_array($val, $types) ? 'checked' : '' }}>{{ $label }}</label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('imagePreview');
            while (preview.firstChild) { preview.removeChild(preview.firstChild); }
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

        // Includes functionality
        document.addEventListener("DOMContentLoaded", function () {
            const includesList = document.getElementById("includes-list");
            const addIncludeBtn = document.getElementById("add-include-btn");
            const includesCountSpan = document.getElementById("includes-count");

            let currentIncludesCount = {{ is_array($product->includes) ? count($product->includes) : 1 }};
            includesCountSpan.textContent = currentIncludesCount;

            addIncludeBtn.addEventListener("click", function () {
                if (currentIncludesCount < 5) {
                    const newLi = document.createElement("li");
                    newLi.classList.add("mb-2", "d-flex", "align-items-center");
                    newLi.innerHTML = `
                        <input type="text" name="includes[]" class="form-control me-2" placeholder="Enter included item" />
                        <button type="button" class="btn btn-danger btn-sm remove-include">−</button>
                    `;
                    includesList.appendChild(newLi);
                    currentIncludesCount++;
                    includesCountSpan.textContent = currentIncludesCount;
                }
            });

            includesList.addEventListener("click", function (e) {
                if (e.target.classList.contains("remove-include")) {
                    e.target.closest("li").remove();
                    currentIncludesCount--;
                    includesCountSpan.textContent = currentIncludesCount;
                }
            });
        });

        $(document).ready(function () {
            $('.summernote').summernote({ height: 200, focus: true });
        });

        // Live preview for multiple gallery images
        document.getElementById('images').addEventListener('change', function (e) {
            const files = Array.from(e.target.files || []);
            const preview = document.getElementById('galleryPreview');
            const counter = document.getElementById('imagesCount');
            counter.textContent = files.length;
            while (preview.firstChild) preview.removeChild(preview.firstChild);
            files.forEach(file => {
                const reader = new FileReader();
                reader.onload = function (ev) {
                    const img = document.createElement('img');
                    img.src = ev.target.result;
                    img.style.width = '100px';
                    img.style.height = '100px';
                    img.style.objectFit = 'cover';
                    img.style.borderRadius = '6px';
                    preview.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection

