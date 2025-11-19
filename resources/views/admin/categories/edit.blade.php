<x-app-layout>
      <div class="flex">
            <!-- Sidebar -->
            <div class="w-64 bg-gray-800 text-white min-h-screen p-6">
                  <h4 class="text-center mb-4 text-lg font-semibold">Admin Panel</h4>
                  <a href="{{ route('admin.dashboard') }}"
                        class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">Dashboard</a>
                  <a href="{{ route('admin.categories.index') }}"
                        class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">All Categories</a>
                  <a href="{{ route('admin.categories.create') }}"
                        class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">Add Category</a>
            </div>

            <!-- Main Content -->
            <div class="flex-1 p-6 bg-gray-100">
                  <h2>Edit Category</h2>

                  <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                              <label for="name" class="form-label">Category Name</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name', $category->name) }}">
                              @error('name')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back</a>
                  </form>
            </div>
      </div>
</x-app-layout>