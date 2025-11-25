<x-app-layout>
      @push('styles')
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      @endpush

      @push('scripts')
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script>
            $(document).ready(function() {

                $('#categories').select2({
                    placeholder: "Select Categories",
                    allowClear: true
                });

                $('#tags').select2({
                    placeholder: "Select Tags",
                    allowClear: true
                });

            });
      </script>
      @endpush

      <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                  <div class="card shadow-sm">

                        <div
                              class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                              <h3 class="card-title mb-0">Create Newsletter</h3>
                        </div>

                        <div class="card-body">

                              <form action="{{ route('admin.newsletters.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    {{-- Title --}}
                                    <div class="mb-3">
                                          <label for="title" class="form-label">Title</label>
                                          <input type="text" id="title" name="title" class="form-control" required>

                                          @error('title')
                                          <small class="text-danger">{{ $message }}</small>
                                          @enderror
                                    </div>

                                    {{-- Content --}}
                                    <div class="mb-3">
                                          <label for="content" class="form-label">Content</label>
                                          <textarea id="content" name="content" class="form-control" rows="5"
                                                required></textarea>

                                          @error('content')
                                          <small class="text-danger">{{ $message }}</small>
                                          @enderror
                                    </div>

                                    {{-- Categories --}}
                                    <div class="mb-3">
                                          <label class="form-label">Select Categories</label>
                                          <select name="categories[]" id="categories" class="form-control select2"
                                                multiple required>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                          </select>

                                          @error('categories')
                                          <small class="text-danger">{{ $message }}</small>
                                          @enderror
                                    </div>

                                    {{-- Tags --}}
                                    <div class="mb-3">
                                          <label class="form-label">Select Tags</label>
                                          <select name="tags[]" id="tags" class="form-control select2" multiple>
                                                @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                          </select>

                                          @error('tags')
                                          <small class="text-danger">{{ $message }}</small>
                                          @enderror
                                    </div>

                                    {{-- Image --}}
                                    <div class="mb-3">
                                          <label for="image" class="form-label">Image (optional)</label>
                                          <input type="file" id="image" name="image" class="form-control">

                                          @error('image')
                                          <small class="text-danger">{{ $message }}</small>
                                          @enderror
                                    </div>

                                    <div class="d-flex justify-content-between mt-4">
                                          <a href="{{ route('admin.newsletters.index') }}" class="btn btn-secondary">
                                                &larr; Back
                                          </a>

                                          <button type="submit" class="btn btn-primary">Create Newsletter</button>


                                    </div>

                              </form>

                        </div>
                  </div>
            </div>
      </div>
</x-app-layout>