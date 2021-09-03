<a href="#" class="relative w-8">
    @if($hasNotifications)
    <div class="relative flex items-center justify-center w-8 h-8">
        <div class="relative flex items-center justify-center w-6 h-6">
            <span class="absolute inline-flex w-full h-full bg-red-400 rounded-full opacity-75 animate-ping">
            </span>
            <span class="relative inline-flex w-6 h-6 text-red-400 rounded-full">
                <x-zondicon-notifications-outline/>
            </span>
        </div>
        <span class="absolute top-0 right-0 px-1 text-xs text-white bg-red-500 rounded-full">
            <livewire:notifications.count/>
        </span>

    </div>
    @else
        <span class="relative inline-flex w-6 h-6 text-blue-red rounded-full">
                <x-zondicon-notifications-outline/>
        </span>
    @endif
    {{-- Stop trying to control. --}}
</a>
