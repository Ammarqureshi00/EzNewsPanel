<x-app-layout>
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

                                    {{-- Image --}}
                                    <div class="mb-3">
                                          <label for="image" class="form-label">Image (optional)</label>
                                          <input type="file" id="image" name="image" class="form-control">
                                          @error('image')
                                          <small class="text-danger">{{ $message }}</small>
                                          @enderror
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                          {{-- Submit Button --}}
                                          <button type="submit" class="btn btn-primary">
                                                Create Newsletter
                                          </button>

                                          {{-- Back Button --}}
                                          <a href="{{ route('admin.newsletters.index') }}" class="btn btn-secondary">
                                                &larr; Back
                                          </a>
                                    </div>
                              </form>


                        </div>
                  </div>
            </div>
      </div>
</x-app-layout>