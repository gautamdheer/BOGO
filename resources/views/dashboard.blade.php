
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                @if (session('success'))
                <div class="alert alert-success">
                {{ session('success') }}
                </div>
                @endif
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <form method="POST" action="{{ route('store') }}">
                        @csrf
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="title" name="title" :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="content" :value="__('Content')" />
                            <x-text-input id="content" class="block mt-1 w-full" type="content" name="content" :value="old('content')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                        <x-primary-button class="ms-3">
                            {{ __('Submit') }}
                        </x-primary-button>

                      </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
