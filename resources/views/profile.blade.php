<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <!-- Profile header -->
        <div
             class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl lg:px-8">
            <div class="flex items-center space-x-5">
                <div class="flex-shrink-0">
                    <div class="relative">
                        <img class="h-16 w-16 rounded-full"
                             src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                             alt="">
                        <span class="absolute inset-0 shadow-inner rounded-full"
                              aria-hidden="true"></span>
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ auth()->user()->username }}</h1>
                    <p class="text-sm font-medium text-gray-500">
                        {{ auth()->user()->headline ?? 'Your headline appears here' }}</time></p>
                </div>
            </div>
            <div
                 class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-reverse sm:space-y-0 sm:space-x-3 md:mt-0 md:flex-row md:space-x-3">
                <button type="button"
                        class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                    Disqualify
                </button>
                <button type="button"
                        class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                    Advance to offer
                </button>
            </div>
        </div>

        <div
             class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
            <!-- Personal Information list-->
            <x-user-profile></x-user-profile>
            <!-- End Personal Information list-->

            <!-- User Activies/Timeline -->
            <section aria-labelledby="timeline-title"
                     class="lg:col-start-3 lg:col-span-1">
                <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                    <h2 id="timeline-title"
                        class="text-lg font-medium text-gray-900">Activity Timeline</h2>

                    <!-- Activity Feed -->
                    <div
                         class="mt-6 flow-root h-96 scrollbar-thin scrollbar-thumb-blue-500 scrollbar-track-blue-100 scrollbar-thumb-rounded-full scrollbar-track-rounded-full overflow-y-auto">
                        <ul role="list"
                            class="divide-y divide-gray-200 pr-5">
                            @foreach (auth()->user()->actions as $activity)
                            <li class="py-4">
                                <div class="flex space-x-3">
                                    <img class="h-6 w-6 rounded-full"
                                         src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                                         alt="">
                                    <div class="flex-1 space-y-1">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-sm font-medium">You</h3>
                                            <p class="text-sm text-gray-500">{{$activity->created_at->diffForHumans()}}</p>
                                        </div>
                                        @if ($activity->event == 'login')
                                            <p class="text-sm text-gray-500">{{$activity->description}} </p>
                                            @foreach ($activity->properties as $key => $value)
                                             <p class="text-sm text-gray-500"><span class="font-bold">{{$key}}: </span>{{$value}}</p>   
                                            @endforeach
                                        @else
                                            <p class="text-sm text-gray-500">Deployed Workcation (2d89f0c8 in master) to production</p>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            <p class="py-4 text-sm text-center text-gray-500">No more activity...</p>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- End User Activies/Timeline -->
        </div>
    </div>
</x-app-layout>
