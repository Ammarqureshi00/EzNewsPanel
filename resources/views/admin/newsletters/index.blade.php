<div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow-md rounded-md">
      <h2 class="text-2xl font-bold mb-6">{{ isset($newsletter) ? 'Edit Newsletter' : 'Create Newsletter' }}</h2>

      <form action="{{ isset($newsletter) ? route('admin.newsletters.update', $newsletter->id) :}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if(isset($newsletter))
            @method('PUT')
            @endif

            <!-- Title -->
            <div class="mb-4">
                  <x-input-label for="title" :value="__('Title')" />
                  <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                        :value="old('title', $newsletter->title ?? '')" required autofocus />
                  <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Content -->
            <div class="mb-4">
                  <x-input-label for="content" :value="__('Content')" />
                  <textarea id="content" name="content" rows="6"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200"
                        required>{{ old('content', $newsletter->content ?? '') }}</textarea>
                  <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>

            <!-- Image -->
            <div class="mb-4">
                  <x-input-label for="image" :value="__('Image (Optional)')" />
                  <input type="file" id="image" name="image" class="mt-1 block w-full">
                  @if(isset($newsletter) && $newsletter->image)
                  <img src="{{ asset('uploads/newsletters/'.$newsletter->image) }}"
                        class="mt-2 w-32 h-32 object-cover rounded-md">
                  @endif
                  <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                  <x-primary-button>
                        {{ isset($newsletter) ? __('Update Newsletter') : __('Create Newsletter') }}
                  </x-primary-button>
            </div>
      </form>
</div>