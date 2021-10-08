<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <x-toast-message></x-toast-message>
    <div class="py-10"
         x-data="{ showEditForm: $persist(false) }">
        <!-- Profile header -->
        <div
             class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl lg:px-8">
            <div class="flex items-center space-x-5">
                <div class="flex-shrink-0">
                    <div class="relative">
                        <img class="h-16 w-16 rounded-full"
                             src="{{ auth()->user()->avatar_url }}"
                             width="64"
                             height="64"
                             alt="">
                        <span class="absolute inset-0 shadow-inner rounded-full"
                              aria-hidden="true"></span>
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ auth()->user()->username }} {{ auth()->user()->profile_percentage }}</h1>
                    <p class="text-sm font-medium text-gray-500">
                        {{ auth()->user()->headline ?? 'Your headline appears here' }}</time></p>
                </div>
            </div>
            <div
                 class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-reverse sm:space-y-0 sm:space-x-3 md:mt-0 md:flex-row md:space-x-3">
                <button type="button"
                        x-show="showEditForm"
                        onclick="toggleModal('modal-id')"
                        class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                    <span><i class="las la-lock"></i></span>
                    Change Password
                </button>
                <button type="button"
                        class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                    View Public Profile
                </button>
            </div>
        </div>

        <div
             class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
            <!-- View/Edit Personal Information-->
            <div class="space-y-6 lg:col-start-1 lg:col-span-2">
                <section aria-labelledby="applicant-information-title"
                         x-show="!showEditForm">
                    <!-- View Personal Information Details-->
                    <x-profile-details></x-profile-details>
                </section>
                <section aria-labelledby="applicant-information-title"
                         style="margin-top: 0;"
                         x-show="showEditForm">
                    <!-- Edit Personal Information Details-->
                    <x-forms.edit-profile></x-forms.edit-profile>
                </section>
            </div>
            <!-- End View/Edit Personal Information list-->

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
                            @foreach (auth()->user()->latestActivities as $activity)
                                <li class="py-4">
                                    <div class="flex space-x-3">
                                        <img class="h-6 w-6 rounded-full"
                                             src="{{ auth()->user()->avatar_url }}"
                                             width="24"
                                             height="24"
                                             alt="">
                                        <div class="flex-1 space-y-1">
                                            <div class="flex items-center justify-between">
                                                <h3 class="text-sm font-medium">You</h3>
                                                <p class="text-sm text-gray-500">
                                                    {{ $activity->created_at->diffForHumans() }}</p>
                                            </div>
                                            <x-activity-log :log="$activity" />
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
    <x-forms.change-password></x-forms.change-password>
</x-app-layout>
<script>
    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        document.getElementById(modalID).classList.toggle("flex");
        document.getElementById(modalID + "-backdrop").classList.toggle("flex");
    }
</script>
