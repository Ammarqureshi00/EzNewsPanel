<x-app-layout>
      <div class="flex">
            <!-- Sidebar -->
            <x-admin-sidebar />
            <!-- Main Content -->
            <div class="flex-1 p-6 bg-gray-100">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2>Tags</h2>
                        <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Add Tag</a>
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
                        <tbody>s
                              @forelse($tags as $tag)
                              <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->slug }}</td>
                                    <td>
                                          <a href="{{ route('admin.tags.edit', $tag->slug) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                          <form action="{{ route('admin.tags.destroy', $tag->slug) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                      onclick="return confirm('Delete this tag?')">Delete</button>
                                          </form>
                                    </td>
                              </tr>
                              @empty
                              <tr>
                                    <td colspan="4" class="text-center">No tags found.</td>
                              </tr>
                              @endforelse
                        </tbody>
                  </table>
            </div>
      </div>
</x-app-layout>