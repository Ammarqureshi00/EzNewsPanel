<x-app-layout>
      <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                  <div class="card shadow-sm">

                        {{-- Card Header --}}
                        <div
                              class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                              <h4 class="mb-0">✏ Edit Newsletter</h4>
                        </div>

                        {{-- Card Body --}}
                        <div class="card-body">

                              {{-- Form --}}
                              <form action="{{ route('admin.newsletters.update', $newsletter->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    {{-- Title --}}
                                    <div class="mb-3">
                                          <label for="title" class="form-label">Newsletter Title</label>
                                          <input type="text" id="title" name="title" class="form-control"
                                                value="{{ $newsletter->title }}" required>
                                          @error('title')
                                          <small class="text-danger">{{ $message }}</small>
                                          @enderror
                                    </div>

                                    {{-- Content --}}
                                    <div class="mb-3">
                                          <label for="content" class="form-label">Content</label>
                                          <textarea id="content" name="content" class="form-control" rows="6"
                                                required>{{ $newsletter->content }}</textarea>
                                          @error('content')
                                          <small class="text-danger">{{ $message }}</small>
                                          @enderror
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
                                          @error('image')
                                          <small class="text-danger">{{ $message }}</small>
                                          @enderror
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                          {{-- Buttons --}}
                                          <div class="d-flex justify-content-center gap-3 mt-4">
                                                <a href="{{ route('admin.newsletters.index') }}"
                                                      class="btn btn-secondary px-4">← Back</a>
                                                <button type="submit" class="btn btn-primary px-4">Update
                                                      Newsletter</button>
                                          </div>
                                    </div>

                              </form>

                        </div>
                  </div>
            </div>
      </div>
</x-app-layout>