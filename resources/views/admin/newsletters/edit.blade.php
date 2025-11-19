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
                              class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                              <h4 class="mb-0">✏ Edit Newsletter</h4>
                        </div>

                        <div class="card-body">

                              <form action="{{ route('admin.newsletters.update', $newsletter->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    {{-- Title --}}
                                    <div class="mb-3">
                                          <label for="title" class="form-label">Newsletter Title</label>
                                          <input type="text" id="title" name="title" class="form-control"
                                                value="{{ $newsletter->title }}" required>
                                    </div>

                                    {{-- Content --}}
                                    <div class="mb-3">
                                          <label for="content" class="form-label">Content</label>
                                          <textarea id="content" name="content" class="form-control" rows="6"
                                                required>{{ $newsletter->content }}</textarea>
                                    </div>

                                    {{-- Categories --}}
                                    <div class="mb-3">
                                          <label class="form-label">Select Categories</label>
                                          <select name="categories[]" id="categories" class="form-control select2"
                                                multiple required>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $newsletter->
                                                      categories->pluck('id')->contains($category->id) ? 'selected' : ''
                                                      }}>
                                                      {{ $category->name }}
                                                </option>
                                                @endforeach
                                          </select>
                                    </div>

                                    {{-- Tags --}}
                                    <div class="mb-3">
                                          <label class="form-label">Select Tags</label>
                                          <select name="tags[]" id="tags" class="form-control select2" multiple>
                                                @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}" {{ $newsletter->
                                                      tags->pluck('id')->contains($tag->id) ? 'selected' : '' }}>
                                                      {{ $tag->name }}
                                                </option>
                                                @endforeach
                                          </select>
                                    </div>

                                    {{-- Current Image --}}
                                    <div class="mb-3">
                                          <label class="form-label">Current Image</label><br>

                                          @if($newsletter->image)
                                          <img src="{{ asset('uploads/newsletters/' . $newsletter->image) }}"
                                                width="150" class="rounded border mb-2">
                                          @else
                                          <p class="text-muted">No image uploaded.</p>
                                          @endif
                                    </div>

                                    {{-- Upload New Image --}}
                                    <div class="mb-3">
                                          <label for="image" class="form-label">Upload New Image (optional)</label>
                                          <input type="file" id="image" name="image" class="form-control">
                                    </div>

                                    <div class="d-flex justify-content-center gap-3 mt-4">
                                          <a href="{{ route('admin.newsletters.index') }}"
                                                class="btn btn-secondary px-4">← Back</a>
                                          <button type="submit" class="btn btn-primary px-4">Update Newsletter</button>
                                    </div>

                              </form>

                        </div>

                  </div>
            </div>
      </div>

</x-app-layout>