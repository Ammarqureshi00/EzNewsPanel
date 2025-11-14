<x-app-layout>
      <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  Create Newsletter
            </h2>
      </x-slot>
      <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                        <form action="{{route('admin.newsletters.store')}}" method="POST" enctype="multipart/form-data">
                              @csrf

                              <div class="mb-4">
                                    <x-input-label for="title" :value="__('Title')" />
                                    <x-text-input id="title" name="title" type="text" class="block w-full mt-1"
                                          required />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                              </div>

                              <div class="mb-4">
                                    <x-input-label for="content" :value="__('Content')" />
                                    <textarea id="content" name="content"
                                          class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" rows="5"
                                          required></textarea>
                                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                              </div>

                              <div class="mb-4">
                                    <x-input-label for="image" :value="__('Image (optional)')" />
                                    <input type="file" name="image" id="image" class="block w-full mt-1" />
                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                              </div>

                              <div class="mt-4">
                                    <x-primary-button class="w-full">Create Newsletter</x-primary-button>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
</x-app-layout>