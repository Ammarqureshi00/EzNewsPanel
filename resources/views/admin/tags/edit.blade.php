<x-app-layout>
      <div class="flex">
            <!-- Sidebar -->
            <x-admin-sidebar />
            <!-- Main Content -->
            <div class="flex-1 p-6 bg-gray-100">
                  <h2>Edit Tag</h2>

                  <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                              <label for="name" class="form-label">Tag Name</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name', $tag->name) }}">
                              @error('name')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">Back</a>
                  </form>
            </div>
      </div>
</x-app-layout>