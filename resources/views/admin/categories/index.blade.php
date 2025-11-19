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
                  <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">Settings</a>
                  <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Logout</a>
            </div>

            <!-- Main Content -->
            <div class="flex-1 p-6 bg-gray-100">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2>Categories</h2>
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add Category</a>
                  </div>

                  @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                  @endif

                  <table class="table table-bordered table-striped">
                        <thead>
                              <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Actions</th>
                              </tr>
                        </thead>
                        <tbody>
                              @forelse($categories as $category)
                              <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                          <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                          <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                      onclick="return confirm('Delete this category?')">Delete</button>
                                          </form>
                                    </td>
                              </tr>
                              @empty
                              <tr>
                                    <td colspan="4" class="text-center">No categories found.</td>
                              </tr>
                              @endforelse
                        </tbody>
                  </table>
            </div>
      </div>
</x-app-layout>