<!--Toast Alerts-->
@if ($message = Session::get('success'))
    <div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
        <input type="checkbox"
               class="hidden"
               id="footertoast">

        <label class="close cursor-pointer flex items-start bg-green-500 justify-between w-full p-2 h-auto rounded shadow-lg text-white flex-col"
               title="close"
               for="footertoast">
            <div class="w-full flex justify-between items-center">
                Success
                <svg class="fill-current text-white"
                     xmlns="http://www.w3.org/2000/svg"
                     width="18"
                     height="18"
                     viewBox="0 0 18 18">
                    <path
                          d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
            </div>

            <p class="w-full p-2"><strong>{{ $message }}</strong></p>
        </label>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
        <input type="checkbox"
               class="hidden"
               id="footertoast">

        <label class="close cursor-pointer flex items-start bg-red-500 justify-between w-full p-2 h-auto rounded shadow-lg text-white flex-col"
               title="close"
               for="footertoast">
            <div class="w-full flex justify-between items-center">
                Error
                <svg class="fill-current text-white"
                     xmlns="http://www.w3.org/2000/svg"
                     width="18"
                     height="18"
                     viewBox="0 0 18 18">
                    <path
                          d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
            </div>

            <p class="w-full p-2"><strong>{{ $message }}</strong></p>
        </label>
    </div>
@endif


@if ($message = Session::get('warning'))
    <div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
        <input type="checkbox"
               class="hidden"
               id="footertoast">

        <label class="close cursor-pointer flex items-start bg-yellow-300 justify-between w-full p-2 h-auto rounded shadow-lg text-white flex-col"
               title="close"
               for="footertoast">
            <div class="w-full flex justify-between items-center">
                Warning
                <svg class="fill-current text-white"
                     xmlns="http://www.w3.org/2000/svg"
                     width="18"
                     height="18"
                     viewBox="0 0 18 18">
                    <path
                          d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
            </div>

            <p class="w-full p-2"><strong>{{ $message }}</strong></p>
        </label>
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
        <input type="checkbox"
               class="hidden"
               id="footertoast">

        <label class="close cursor-pointer flex items-start bg-blue-400 justify-between w-full p-2 h-auto rounded shadow-lg text-white flex-col"
               title="close"
               for="footertoast">
            <div class="w-full flex justify-between items-center">
                Warning
                <svg class="fill-current text-white"
                     xmlns="http://www.w3.org/2000/svg"
                     width="18"
                     height="18"
                     viewBox="0 0 18 18">
                    <path
                          d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
            </div>

            <p class="w-full p-2"><strong>{{ $message }}</strong></p>
        </label>
    </div>
@endif


@if ($errors->any())
    <div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
        <input type="checkbox"
               class="hidden"
               id="footertoast">

        <label class="close cursor-pointer flex items-start bg-red-500 justify-between w-full p-2 h-auto rounded shadow-lg text-white flex-col"
               title="close"
               for="footertoast">
            <div class="w-full flex justify-between items-center">
                Error
                <svg class="fill-current text-white"
                     xmlns="http://www.w3.org/2000/svg"
                     width="18"
                     height="18"
                     viewBox="0 0 18 18">
                    <path
                          d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
            </div>

            <p class="w-full p-2"><strong>Please check for errors</strong></p>
        </label>
    </div>
@endif
