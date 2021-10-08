<div class="bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <h2 id="applicant-information-title"
            class="text-lg leading-6 font-medium text-gray-900">
            Personal Information
        </h2>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
            Personal details and application.
        </p>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Full Name
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ auth()->user()->name }}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Username
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    <span>@</span>{{ auth()->user()->username }}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Email
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ auth()->user()->email }}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Phone
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ auth()->user()->phone ?? '' }}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Gender
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ auth()->user()->gender ?? '' }}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    City
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ auth()->user()->city ?? '' }}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Country
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ auth()->user()->country ?? '' }}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Postal
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ auth()->user()->postal ?? '' }}
                </dd>
            </div>
            <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-500">
                    About
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ auth()->user()->about ?? '' }}
                </dd>
            </div>
        </dl>
    </div>
    <div>
        <a @click="showEditForm = ! showEditForm"
           href="#"
           class="block bg-gray-50 text-sm font-medium text-gray-500 text-center px-4 py-4 hover:text-gray-700 sm:rounded-b-lg">Edit
            profile</a>
    </div>
</div>
