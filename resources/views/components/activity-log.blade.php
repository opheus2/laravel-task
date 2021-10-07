@props(['log'])

@switch($log->event)
    @case('login')
        <p class="text-sm text-gray-500">{{ $log->description }} </p>
        @foreach ($log->properties as $key => $value)
            <p class="text-sm text-gray-500"><span class="font-bold">{{ $key }}: </span>{{ $value }}</p>
        @endforeach
    @break
    @case('register')
        <p class="text-sm text-gray-500 flex items-center">
            {{ $log->description }}
            <span class="pl-3 inline-flex"><img style="max-width: 20px;"
                     src="https://img.icons8.com/external-vitaliy-gorbachev-blue-vitaly-gorbachev/60/000000/external-confetti-japanese-wedding-vitaliy-gorbachev-blue-vitaly-gorbachev.png" /></span>
        </p>
    @break

    @default
        <p class="text-sm text-gray-500">updated your profile!</p>
@endswitch
