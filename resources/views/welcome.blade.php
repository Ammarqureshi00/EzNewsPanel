<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            📬 Subscribe to Our Newsletter
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ session('success') }}
                </div>
                @endif

                <form action="" method="POST">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 dark:text-gray-200">{{ __('Full Name') }}</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                            required autofocus>
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 dark:text-gray-200">{{ __('Email Address')
                            }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                            required>
                        @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-center mt-4">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                            {{ __('Subscribe') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>