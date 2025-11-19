<x-app-layout>

      <div class="flex">
            <!-- Sidebar -->
            <div class="w-64 bg-gray-800 text-white min-h-screen p-6">
                  <h4 class="text-center mb-4 text-lg font-semibold">Admin Panel</h4>

                  <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        Dashboard
                  </a>

                  <a href="{{ route('admin.newsletters.index') }}"
                        class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        All Newsletters
                  </a>

                  <a href="{{ route('admin.newsletters.create') }}"
                        class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        Create Newsletter
                  </a>

                  <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        Subscribers
                  </a>

                  <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        Settings
                  </a>

                  <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">
                        Logout
                  </a>
            </div>

            <!-- Main Content -->
            <div class="flex-1 p-6 bg-gray-100">

                  <div class="flex justify-end mb-4">
                        <a href="{{ route('admin.newsletters.create') }}" class="btn btn-success">
                              + Create Newsletter
                        </a>
                  </div>

                  <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                        <div class="bg-blue-600 text-white px-4 py-2 font-semibold">
                              All Newsletters
                        </div>

                        <div class="p-4">

                              @if($newsletters->count() > 0)
                              <table class="table-auto w-full border border-gray-300">
                                    <thead class="bg-gray-100">
                                          <tr>
                                                <th class="border px-4 py-2 text-left">Title</th>
                                                <th class="border px-4 py-2 text-left">Content</th>
                                                <th class="border px-4 py-2 text-left">Image</th>
                                                <th class="border px-4 py-2 text-left">Date</th>
                                                <th class="border px-4 py-2 text-left">Actions</th>
                                          </tr>
                                    </thead>

                                    <tbody>
                                          @foreach($newsletters as $item)
                                          <tr>
                                                <td class="border px-4 py-2">{{ $item->title }}</td>

                                                <td class="border px-4 py-2">
                                                      {{ Str::limit($item->content, 50) }}
                                                </td>

                                                <td class="border px-4 py-2">
                                                      @if($item->image)
                                                      <img src="{{ asset('uploads/newsletters/' . $item->image) }}"
                                                            width="60" class="rounded">
                                                      @else
                                                      <span class="text-gray-500">No Image</span>
                                                      @endif
                                                </td>

                                                <td class="border px-4 py-2">
                                                      {{ $item->created_at->format('d M Y') }}
                                                </td>

                                                <td class="border px-4 py-2">
                                                      <a href="{{ route('admin.newsletters.edit', $item->id) }}"
                                                            class="btn btn-warning btn-sm">
                                                            Edit
                                                      </a>

                                                      <form action="{{ route('admin.newsletters.destroy', $item->id) }}"
                                                            method="POST" class="inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm"
                                                                  onclick="return confirm('Are you sure?')">
                                                                  Delete
                                                            </button>
                                                      </form>
                                                </td>
                                          </tr>
                                          @endforeach
                                    </tbody>

                              </table>
                              @else
                              <p class="text-gray-500">No newsletters found.</p>
                              @endif

                        </div>
                  </div>

            </div>
      </div>

</x-app-layout>