<x-app-layout>
      <div class="flex">
            <!-- Sidebar -->
            <div class="w-64 bg-gray-800 text-white min-h-screen p-6">
                  <h4 class="text-center mb-4 text-lg font-semibold">Admin Panel</h4>
                  <a href="{{ route('admin.dashboard') }}"
                        class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">Dashboard</a>
                  <a href="{{ route('admin.tags.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">All
                        Tags</a>
                  <a href="{{ route('admin.tags.create') }}" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">Add
                        Tag</a>
            </div>

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