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
        <p class="text-sm text-gray-500">{{ $log->description }} </p>
        @foreach ($log->properties as $header => $array)
            @if ($header == 'old')
                <div>
                    <p class='text-sm text-gray-500 border-b-1 font-bold'>From</p>
                    @foreach ($array as $key => $value)
                        @if (!empty($value))
                            @if ($key == 'avatar')
                                <p class='pl-4 text-sm text-gray-500'>
                                    <span class='font-bold'>
                                        {{ $key }}:
                                    </span>
                                    <img class='ml-4 inline-flex h-6 w-6 rounded-full'
                                         width='24'
                                         height='24'
                                         src='{{ $value }}'
                                         alt=''>
                                </p>
                            @elseif ($key == 'password')
                                <p class='pl-4 text-sm text-gray-500'>
                                    <span class='font-bold'>
                                        {{ $key }}:
                                    </span>
                                    ********
                                </p>
                            @else
                                <p class='pl-4 text-sm text-gray-500'>
                                    <span class='font-bold'>{{ $key }}: </span>
                                    {{ $value }}
                                </p>
                            @endif
                        @else
                            <p class='pl-4 text-sm text-gray-500'>
                                <span class='font-bold'>{{ $key }}: </span>
                                --empty
                            </p>
                        @endif
                    @endforeach
                </div>
            @endif
            @if ($header == 'attributes')
                <div>
                    <p class='text-sm text-gray-500 border-b-1 font-bold'>To</p>
                    @foreach ($array as $key => $value)
                        @if (!empty($value))
                            @if ($key == 'avatar')
                                <p class='pl-4 text-sm text-gray-500'>
                                    <span class='font-bold'>
                                        {{ $key }}:
                                    </span>
                                    <img class='ml-4 inline-flex h-6 w-6 rounded-full'
                                         width='24'
                                         height='24'
                                         src='{{ $value }}'
                                         alt=''>
                                </p>
                            @elseif ($key == 'password')
                                <p class='pl-4 text-sm text-gray-500'>
                                    <span class='font-bold'>
                                        {{ $key }}:
                                    </span>
                                    ********
                                </p>
                            @else
                                <p class='pl-4 text-sm text-gray-500'>
                                    <span class='font-bold'>{{ $key }}: </span>
                                    {{ $value }}
                                </p>
                            @endif
                        @else
                            <p class='pl-4 text-sm text-gray-500'>
                                <span class='font-bold'>{{ $key }}: </span>
                                --empty
                            </p>
                        @endif
                    @endforeach
                </div>
            @endif
        @endforeach
@endswitch
