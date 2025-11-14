<x-app-layout>
      <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  Admin Dashboard
            </h2>
      </x-slot>

      <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                  <!-- Welcome Message -->
                  <div class="text-center mb-8">
                        <h1 class="text-3xl font-bold text-gray-800">Welcome, Admin!</h1>
                        <p class="text-gray-600 mt-2">
                              Manage your newsletters and subscribers efficiently from this dashboard.
                        </p>
                  </div>

                  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                        <!-- Create Newsletter Form -->
                        <div class="bg-white shadow-md rounded-lg p-6">
                              <h2 class="text-xl font-semibold text-blue-600 mb-4">Create Newsletter</h2>
                              <form action="{{ route('admin.newsletters.store') }}" method="POST"
                                    enctype="multipart/form-data" class="space-y-4">
                                    @csrf

                                    <div>
                                          <x-input-label for="title" :value="__('Title')" />
                                          <x-text-input id="title" name="title" class="mt-1 block w-full" required />
                                          <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                    </div>

                                    <div>
                                          <x-input-label for="content" :value="__('Content')" />
                                          <textarea id="content" name="content" rows="4"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                                                required></textarea>
                                          <x-input-error :messages="$errors->get('content')" class="mt-2" />
                                    </div>

                                    <div>
                                          <x-input-label for="image" :value="__('Image (optional)')" />
                                          <input type="file" id="image" name="image"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                                    </div>

                                    <x-primary-button class="w-full mt-2">Create Newsletter</x-primary-button>
                              </form>
                        </div>

                        <!-- Subscribers Table -->
                        {{-- <div class="bg-white shadow-md rounded-lg p-6 overflow-x-auto">
                              <h2 class="text-xl font-semibold text-green-600 mb-4">Subscribers</h2>
                              <table class="min-w-full border border-gray-200">
                                    <thead class="bg-gray-100 text-gray-700 uppercase text-sm font-medium">
                                          <tr>
                                                <th class="px-4 py-2 border">ID</th>
                                                <th class="px-4 py-2 border">Name</th>
                                                <th class="px-4 py-2 border">Email</th>
                                                <th class="px-4 py-2 border">Subscribed Newsletters</th>
                                          </tr>
                                    </thead>
                                    <tbody class="text-gray-700 text-sm">
                                          @forelse($subscribers as $subscriber)
                                          <tr class="hover:bg-gray-50">
                                                <td class="px-4 py-2 border">{{ $subscriber->id }}</td>
                                                <td class="px-4 py-2 border">{{ $subscriber->name }}</td>
                                                <td class="px-4 py-2 border">{{ $subscriber->email }}</td>
                                                <td class="px-4 py-2 border">
                                                      @foreach($subscriber->newsletters as $news)
                                                      <span
                                                            class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full mr-1 mb-1">
                                                            {{ $news->title }}
                                                      </span>
                                                      @endforeach
                                                </td>
                                          </tr>
                                          @empty
                                          <tr>
                                                <td colspan="4" class="px-4 py-2 text-center text-gray-500">No
                                                      subscribers found.</td>
                                          </tr>
                                          @endforelse
                                    </tbody>
                              </table>
                        </div> --}}

                  </div>
            </div>
      </div>
</x-app-layout>