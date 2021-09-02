<div class="px-2 py-1 text-xs text-black transition duration-100 bg-red-600 rounded hover:bg-red-700">
    <a wire:click="confirmThreadDeletion" wire:loading.attr="disabled" class="cursor-pointer">Delete</a>

    <x-jet-dialog-modal wire:model="confirmingThreadDeletion">
        <x-slot name="title">
                {{ __("Delete Thread") }}
        </x-slot>
        <x-slot name="content">
                {{ __('Proceed with the delete?') }}
        </x-slot>
        <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingThreadDeletion')" wire:loading.attr="disabled">
                        {{ __("No") }}
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="deleteThread" wire:loading.attr="disabled">
                        {{ __("Yes") }}
                </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
