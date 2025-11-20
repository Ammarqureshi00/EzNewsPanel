<x-app-layout>
      <div class="flex">
            <!-- Sidebar -->
            <x-admin-sidebar />
            <!-- Main Content -->
            <div class="flex-1 p-6 bg-gray-100">
                  <h2>Add Category</h2>

                  <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                              <label for="name" class="form-label">Category Name</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name') }}">
                              @error('name')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Create</button>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back</a>
                  </form>
            </div>
      </div>
</x-app-layout>