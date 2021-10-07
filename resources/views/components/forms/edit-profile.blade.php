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
    <x-form-validation-errors class="px-4 py-5 sm:px-6"></x-form-validation-errors>
    <form action="{{ route('profile.update', ['profile' => auth()->user()->username]) }}"
          method="POST"
          enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-1"
                     x-data="showImage()">
                    <dd class="mt-1 flex items-center">
                        <img class="inline-block h-24 w-24 rounded-full"
                             id="avatar-preview"
                             width="96px"
                             height="96px"
                             src="{{ auth()->user()->avatar }}"
                             alt="">
                        <div class="ml-4 flex">
                            <div
                                 class="relative bg-white py-2 px-3 border border-blue-gray-300 rounded-md shadow-sm flex items-center cursor-pointer hover:bg-blue-gray-50 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-blue-gray-50 focus-within:ring-blue-500">
                                <label for="avatar"
                                       class="relative text-sm font-medium text-blue-gray-900 pointer-events-none">
                                    <span>Change</span>
                                    <span class="sr-only">avatar</span>
                                </label>
                                <input id="avatar"
                                       name="avatar"
                                       type="file"
                                       accept="image/png, image/gif, image/jpeg, image/jpg"
                                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md"
                                       @change="showPreview(event)">
                            </div>
                        </div>
                    </dd>
                    @error('avatar')
                        <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-1 flex flex-col place-content-center">
                    <label for="headline"
                           class="text-sm font-medium text-gray-700">
                        Headline
                    </label>
                    <dd class="mt-1 text-sm text-gray-900">
                        <input type="text"
                               name="headline"
                               id="headline"
                               class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md"
                               value="{{ auth()->user()->headline ?? '' }}"
                               placeholder="Headline">
                    </dd>
                    @error('headline')
                        <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-1">
                    <label for="name"
                           class="text-sm font-medium text-gray-700">
                        Full Name
                    </label>
                    <dd class="mt-1 text-sm text-gray-900">
                        <input type="text"
                               name="name"
                               id="name"
                               class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md"
                               value="{{ auth()->user()->name ?? '' }}"
                               placeholder="Full Name">
                    </dd>
                    @error('name')
                        <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-1">
                    <label for="username"
                           class="text-sm font-medium text-gray-700">
                        Username
                    </label>
                    <dd class="mt-1 text-sm text-gray-900">
                        <input type="text"
                               name="username"
                               id="username"
                               class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md"
                               value="{{ auth()->user()->username ?? '' }}"
                               placeholder="Username">
                    </dd>
                    @error('username')
                        <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-1">
                    <label for="email"
                           class="text-sm font-medium text-gray-700">
                        Email
                    </label>
                    <dd class="mt-1 text-sm text-gray-900">
                        <input type="email"
                               name="email"
                               id="email"
                               autocomplete="email"
                               class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md"
                               value="{{ auth()->user()->email ?? '' }}"
                               placeholder="Email Address">
                    </dd>
                    @error('email')
                        <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-700">
                        Phone
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        <input type="text"
                               name="phone"
                               id="phone"
                               autocomplete="phone"
                               class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md"
                               value="{{ auth()->user()->phone ?? '' }}"
                               placeholder="Phone">
                    </dd>
                    @error('phone')
                        <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-1">
                    <label for="gender"
                           class="text-sm font-medium text-gray-700">
                        Gender
                    </label>
                    <dd class="mt-1 text-sm text-gray-900">
                        <select id="gender"
                                name="gender"
                                class=" max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md ">
                            <option value="male"
                                    {{ auth()->user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female"
                                    {{ auth()->user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value=""
                                    {{ auth()->user()->gender == '' ? 'selected' : '' }}>Prefer not to say</option>
                        </select>
                    </dd>
                    @error('gender')
                        <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-1">
                    <label for="city"
                           class="text-sm font-medium text-gray-700">
                        City
                    </label>
                    <dd class="mt-1 text-sm text-gray-900">
                        <input type="text"
                               name="city"
                               id="city"
                               class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md"
                               value="{{ auth()->user()->city ?? '' }}"
                               placeholder="City">
                    </dd>
                    @error('city')
                        <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-1">
                    <label for="country"
                           class="text-sm font-medium text-gray-700">
                        Country
                    </label>
                    <dd class="mt-1 text-sm text-gray-900">
                        <select id="country"
                                name="country"
                                autocomplete="country"
                                class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md scrollbar-thin scrollbar-thumb-blue-500 scrollbar-track-blue-100">
                            @foreach (get_country_list() as $country)
                                <option value="{{ $country }}"
                                        {{ $country == auth()->user()->country ? 'selected' : '' }}>
                                    {{ $country }}</option>
                            @endforeach
                        </select>
                    </dd>
                    @error('country')
                        <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-1">
                    <label for="postal"
                           class="text-sm font-medium text-gray-700">
                        Postal
                    </label>
                    <dd class="mt-1 text-sm text-gray-900">
                        <input type="text"
                               name="postal"
                               id="postal"
                               class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md"
                               value="{{ auth()->user()->postal ?? '' }}"
                               placeholder="Postal Code">
                    </dd>
                    @error('postal')
                        <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="about"
                           class="text-sm font-medium text-gray-700">
                        About
                    </label>
                    <dd class="mt-1 text-sm text-gray-900">
                        <textarea type="text"
                                  name="about"
                                  id="about"
                                  rows="3"
                                  class="shadow-sm focus:ring-sky-500 focus:border-sky-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                  placeholder="About Me">{{ auth()->user()->about ?? '' }}</textarea>
                    </dd>
                    @error('about')
                        <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                    @enderror
                </div>
            </dl>
        </div>
        <div class="flex gap-8 justify-around pb-5">
            <button @click="showEditForm = ! showEditForm"
                    type="button"
                    class="inline-flex w-1/6 items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-gray-700 bg-gray-300 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                Cancel
            </button>
            <button type="submit"
                    class="inline-flex w-1/6 items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                Save
            </button>
        </div>
    </form>
</div>
<script>
    function showImage() {
        return {
            showPreview(event) {
                if (event.target.files.length > 0) {
                    const src = URL.createObjectURL(event.target.files[0]);
                    const avatar = document.getElementById("avatar-preview");
                    avatar.src = src;
                }
            }
        }
    }
</script>
