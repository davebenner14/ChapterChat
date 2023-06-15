<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Team Settings') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-form-section submit="updateTeamName">
                <x-slot name="title">
                    {{ __('Team Name') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('The team\'s name and owner information.') }}
                </x-slot>

                <x-slot name="form">
                    <!-- Team Owner Information -->
                    <div class="col-span-6">
                        <x-label value="{{ __('Team Owner') }}" />

                        <div class="flex items-center mt-2">
                            @if ($team->owner)
                                <img class="w-12 h-12 rounded-full object-cover" src="{{ $team->owner->profile_photo_url }}" alt="{{ $team->owner->name }}">

                                <div class="ml-4 leading-tight">
                                    <div class="text-gray-900">{{ $team->owner->name }}</div>
                                    <div class="text-gray-700 text-sm">{{ $team->owner->email }}</div>
                                </div>
                            @else
                                <div class="text-gray-700">{{ __('No owner assigned.') }}</div>
                            @endif
                        </div>
                    </div>

                    <!-- Team Name -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="name" value="{{ __('Team Name') }}" />

                        <x-input id="name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    wire:model.defer="state.name"
                                    :disabled="! Gate::check('update', $team)" />

                        <x-input-error for="name" class="mt-2" />
                    </div>
                </x-slot>

                @if (Gate::check('update', $team))
                    <x-slot name="actions">
                        <x-action-message class="mr-3" on="saved">
                            {{ __('Saved.') }}
                        </x-action-message>

                        <x-button>
                            {{ __('Save') }}
                        </x-button>
                    </x-slot>
                @endif
            </x-form-section>
        </div>
    </div>
</x-app-layout>
