<div class="bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <h2 id="applicant-information-title"
            class="text-lg leading-6 font-medium text-gray-900">
            Personal Information
        </h2>
        <p class="mt-1 max-w-2xl text-sm text-gray-700">
            Personal details and application.
        </p>
    </div>
    <form action="#" method="POST">
        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <label for="name" class="text-sm font-medium text-gray-700">
                        Full Name
                    </label>
                    <dd class="mt-1 text-sm text-gray-900">
                        <input type="text" name="full_name" id="name" class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md" value="{{ auth()->user()->name ?? '' }}" placeholder="Full Name">
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <label for="username" class="text-sm font-medium text-gray-700">
                        Username
                    </label>
                    <dd class="mt-1 text-sm text-gray-900">
                        <input type="text" name="username" id="username" class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md" value="{{ auth()->user()->username ?? '' }}" placeholder="Username">
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <label for="email" class="text-sm font-medium text-gray-700">
                        Email
                    </label>
                    <dd class="mt-1 text-sm text-gray-900">
                        <input type="email" name="email" id="name" autocomplete="email" class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md" value="{{ auth()->user()->email ?? '' }}" placeholder="Email Address">
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-700">
                        Phone
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        <input type="text" name="phone" id="phone" autocomplete="phone" class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md" value="{{ auth()->user()->phone ?? '' }}" placeholder="Phone">
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <label for="gender" class="text-sm font-medium text-gray-700">
                        Gender
                    </label>
                    <dd class="mt-1 text-sm text-gray-900">
                        <select id="country" name="country" autocomplete="country" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            <option value="male" {{auth()->user()->gender == 'male' ? 'selected' : ''}}>Male</option>
                            <option value="female" {{auth()->user()->gender == 'female' ? 'selected' : ''}}>Female</option>
                            <option value="" {{auth()->user()->gender == '' ? 'selected' : ''}}>Prefer not to say</option>
                        </select>
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <label for="city" class="text-sm font-medium text-gray-700">
                        City
                    </label>
                    <dd class="mt-1 text-sm text-gray-900">
                        <input type="text" name="city" id="city" class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md" value="{{ auth()->user()->city ?? '' }}" placeholder="City">
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-700">
                        Country
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        <select id="country" name="country" autocomplete="country" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md scrollbar-thin scrollbar-thumb-blue-500 scrollbar-track-blue-100">
                            @foreach (get_country_list() as $country)
                                <option value="{{$country}}" {{$country == auth()->user()->country ? 'selected' : ''}}>{{$country}}</option>
                            @endforeach
                        </select>
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <label for="postal" class="text-sm font-medium text-gray-700">
                        Postal
                    </label>
                    <dd class="mt-1 text-sm text-gray-900">
                        <input type="text" name="postal" id="postal" class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md" value="{{ auth()->user()->postal ?? '' }}" placeholder="Postal Code">
                    </dd>
                </div>
                <div class="sm:col-span-2">
                    <label for="about" class="text-sm font-medium text-gray-700">
                        About
                    </label>
                    <dd class="mt-1 text-sm text-gray-900">
                        <textarea type="text" name="about" id="about" rows="3" class="shadow-sm focus:ring-sky-500 focus:border-sky-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="About Me">{{ auth()->user()->about ?? '' }}</textarea>
                    </dd>
                </div>
            </dl>
        </div>
        <div class="flex gap-8 justify-around pb-5">
            <button 
            @click="showEditForm = ! showEditForm"
            type="button"
            class="inline-flex w-1/6 items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-gray-700 bg-gray-300 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                    Cancel
            </button>
            <button type="submit" class="inline-flex w-1/6 items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                    Save
            </button>
        </div>
    </form>
</div>
