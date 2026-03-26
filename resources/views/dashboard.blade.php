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
                    <a href="{{ route('post.create') }}">
                        <x-primary-button>Create Post</x-primary-button>
                    </a>
                </div>

                <section class="bg-white dark:bg-gray-900">
                    <!-- Title Section -->
                    <div class="text-center py-10">
                        <h1 class="text-4xl font-bold text-black dark:text-white mb-4">Discover New Adventures</h1>
                        <p class="text-lg text-gray-600 dark:text-gray-400">Explore, discover, and find inspiration
                            through these exciting journeys.</p>
                    </div>

                    <!-- Content Section -->
                    <div
                        class="px-8 py-10 mx-auto lg:max-w-screen-xl sm:max-w-xl md:max-w-full sm:px-12 md:px-16 lg:py-20 sm:py-16">
                        <div class="grid gap-x-8 gap-y-12 sm:gap-y-16 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($posts as $post)
                                <div class="relative">
                                    <a href="#_" class="block overflow-hidden group rounded-xl shadow-lg">
                                        <img src="https://images.unsplash.com/photo-1511497584788-876760111969?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw4fHxmb3Jlc3R8ZW58MHwwfHx8MTcyNjkxODYzNHww&ixlib=rb-4.0.3&q=80&w=1080"
                                            class="object-cover w-full h-56 transition-all duration-300 ease-out sm:h-64 group-hover:scale-110"
                                            alt="Adventure">
                                    </a>
                                    <div class="relative mt-5">
                                        <p class="uppercase font-semibold text-xs mb-2.5 text-purple-600">
                                            {{ $post->post_subtitle }}</p>
                                        <a href="#" class="block mb-3 hover:underline">
                                            <h2
                                                class="text-2xl font-bold leading-5 text-black dark:text-white transition-colors duration-200 hover:text-purple-700 dark:hover:text-purple-400">
                                                {{ $post->post_title }}
                                            </h2>
                                        </a>
                                        <p class="mb-4 text-gray-700 dark:text-gray-300">{{ $post->post_description }}
                                        </p>
                                        <div class="flex items-center justify-between">
                                            <a href="#_"
                                                class="font-medium underline text-purple-600 dark:text-purple-400">{{ $post->user->name }}</a>
                                            @can('can_delete', $post)
                                                <form action="{{ route('post.delete', $post->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-danger-button>Delete</x-danger-button>

                                                </form>
                                            @endcan
                                        </div>

                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>
