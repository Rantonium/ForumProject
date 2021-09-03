<div>
    <div x-data="{editReply:false, focus: function(){const textInput = this.$refs.textInput;textInput.focus();console.log('textInput');}}" x-cloak>
            <div x-show="!editReply" class="relative">
                {{ $replyOldBody }}
                <x-links.secondary x-on:click="editReply = true; $nextTick(()=> focus())" class="absolute cursor-pointer top-2 right-2">
                    {{ __('Edit') }}
                </x-links.secondary>
            </div>

            <div x-show="editReply">
            <form wire:submit.prevent="update">
                <input type="text" name="replyNewBody" wire:model.lazy="replyNewBody" x-ref="textInput" x-on:keydown.enter="editReply = false" x-on:keydown.escape="editReply = false">
                <div class="mt-2 space-x-3 text-ms">
                <button type="button" class="text-green-400" x-on:click="editReply=false">
                    Cancel
                </button>
                <button type="submit" class="text-red-400" x-on:click="editReply=false">
                    Save
                </button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
