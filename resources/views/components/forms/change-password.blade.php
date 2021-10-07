<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
     id="modal-id">
    <<section aria-labelledby="timeline-title"
              class="sm:w-5/6 lg:w-1/4">
        <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
            <h2 id="timeline-title"
                class="text-lg font-medium text-gray-900">Change Password</h2>

            <!-- Change Password Form -->

            <form action="{{route('profile.update', ['profile' => auth()->user()->username])}}" method="POST">
                @method('put')
                @csrf
                <div
                     class="mt-6 flow-root h-70 scrollbar-thin scrollbar-thumb-blue-500 scrollbar-track-blue-100 scrollbar-thumb-rounded-full scrollbar-track-rounded-full overflow-y-auto">
                    <div class="sm:col-span-1">
                        <label for="current_password"
                               class="text-sm font-medium text-gray-700">
                            Current Password
                        </label>
                        <div class="mt-1 text-sm text-gray-900">
                            <input type="password"
                                   name="current_password"
                                   id="current_password"
                                   class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                                   placeholder="Current password"
                                   autocomplete="off">
                        </div>
                        @error('current_password')
                            <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-1 mt-3">
                        <label for="password"
                               class="text-sm font-medium text-gray-700">
                            New Password
                        </label>
                        <div class="mt-1 text-sm text-gray-900">
                            <input type="password"
                                   name="password"
                                   id="password"
                                   class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                                   placeholder="New password"
                                   autocomplete="off">
                        </div>
                        @error('password')
                            <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-1 mt-3">
                        <label for="password_confirmation"
                               class="text-sm font-medium text-gray-700">
                            Confirm Password
                        </label>
                        <div class="mt-1 text-sm text-gray-900">
                            <input type="password"
                                   name="password_confirmation"
                                   id="password_confirmation"
                                   class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                                   placeholder="Confirm password"
                                   autocomplete="off">
                        </div>
                        @error('password_confirmation')
                            <div class="text-xs text-red-500 py-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col md:flex-row items-center sm:justify-center gap-8 justify-around py-5">
                        <button
                                onclick="toggleModal('modal-id')"
                                type="button"
                                class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-gray-700 bg-gray-300 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                            Cancel
                        </button>
                        <button type="submit"
                                class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </section>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black"
     id="modal-id-backdrop"></div>
