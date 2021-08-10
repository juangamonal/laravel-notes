<div class="px-4 py-4">
    <div class="mb-4 flex justify-between">
        <x-jet-button type="button" wire:click="$toggle('creatingNotebook')">
            {{ __('Add') }}
        </x-jet-button>

        <x-jet-input id="search" type="text" placeholder="Search" class="w-3" wire:change.lazy="search" wire:model="searchBy"/>
    </div>

    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
        <thead>
            <tr class="font-bold">
                <th class="border px-6 py-4">Name</th>
                <th class="border px-6 py-4">Created at</th>
                <th class="border px-6 py-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notebooks as $notebook)
                <tr>
                    <td class="border px-6 py-4">{{ $notebook->name }}</td>
                    <td class="border px-6 py-4">{{ $notebook->created_at }}</td>
                    <td class="border px-6 py-4">

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <x-jet-dialog-modal wire:model="creatingNotebook">
            <x-slot name="title">
                {{ __('Creating a new notebook') }}
            </x-slot>

            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="notebookName" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('creatingNotebook')" wire:submit.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2" wire:click="createNotebook" wire:submit.attr="disabled">
                    {{ __('Create') }}
                </x-jet-button>
            </x-slot>
    </x-jet-dialog-modal>
</div>
