<x-guest-layout>
    <main class="grid grid-cols-4 gap-8 mt-8 wrapper">

        <x-partials.sidenav />

        <section class="flex flex-col col-span-3 gap-y-4">
            <small class="text-sm text-gray-400">discussion>edit</small>

            <article class="p-5 bg-white shadow">
                <div class="grid grid-cols-8">

                    {{-- Avatar --}}
                    <div class="col-span-1">
                        <x-user.avatar />
                    </div>

                    {{-- Create --}}
                    <div class="col-span-7 space-y-6">
                        <x-form action="{{ route('threads.update', $thread->slug()) }}">
                            <div class="space-y-8">
                                {{-- Title --}}
                                <div>
                                    <x-form.label for="title" value="{{ __('Title') }}" />
                                    <x-form.input id="title" class="block w-full mt-1" type="text" name="title" :value="$thread->title()" required autofocus />
                                    <x-form.error for="title" />
                                </div>

                                {{-- Channel --}}
                                <div>
                                    <x-form.label for="channel" value="{{ __('Channel') }}" />
                                    <select name="channel" id="channel" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        <option value="">Select a Channel</option>
                                        @foreach($channels as $channel)
                                            <option value="{{ $channel->id()}}" @if($channel->id() === $selectedChannel->id()) selected @endif > {{ $channel->name() }}</option>
                                        @endforeach
                                    </select>
                                    <x-form.error for="channel" />
                                </div>

                                {{-- Tags --}}
                                <div>
                                    <x-form.label for="tags" value="{{ __('Tags') }}" />
                                    <p>Select up to 3 Tags</p>
                                    <select name="tags[]" id="tags" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" multiple x-data="{}" x-init="function(){choices($el)}">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id() }}"
                                                @if(in_array($tag->id(), $previousTags))
                                                    selected
                                                @endif >
                                                {{ $tag->name() }}</option>
                                        @endforeach
                                    </select>
                                    <x-form.error for="tags" />
                                </div>

                                {{-- Body --}}
                                <div>
                                    <x-form.label for="body" value="{{ __('Body') }}" />
                                    <x-trix name="body" styling="shadow-inner bg-gray-100">
                                        {{ $thread->body() }}
                                    </x-trix>
                                    <x-form.error for="body" />
                                </div>

                                {{-- Button --}}
                                <x-buttons.primary>
                                    {{ __('Update') }}
                                </x-buttons.primary>
                        </x-form>
                    </div>
                </div>
            </article>
        </section>
    </main>
</x-guest-layout>
