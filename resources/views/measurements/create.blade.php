<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('measurements.index') }}">
                {{ __('Measurements') }}
            </a>
        </h2>
    </x-slot>

    <section class="w-full max-w-3xl m-auto my-8">
        <div class="mb-6">
            @include('partials.errors')
        </div>

        <div class="bg-white rounded-lg shadow-md">

            <header class="p-4 border-b-2 border-gray-200 antialiased">
                <h1 class="text-gray-800 text-xl">Log a Measurement</h1>
            </header>

            <form action="/measurements" method="POST">
                @csrf

                <input type="hidden" name="team_id" value="{{ Auth::user()->currentTeam->id }}" />

                <div class="flex border-b-2 border-gray-200 p-8">

                    <div class="flex -mx-3 mb-6 px-3">
                        <div class="w-full">
                            <label class="form-label" for="measurement_type_id">
                                Type
                            </label>
                            <div class="relative">
                                <select name="measurement_type_id" class="select-dropdown">
                                    <option value="" selected default disabled>Choose a type</option>
                                    @foreach ($measurementTypes as $type)
                                        <option value="{{ $type->id }}">
                                            {{ ucfirst($type->name) }} ({{ $type->unit->name }})
                                        </option>
                                    @endforeach
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex px-3">
                        <div class="w-full">
                            <label class="form-label" for="value">
                                Value
                            </label>
                            <input class="form-input" type="number" name="value" step="0.01" required>
                        </div>
                    </div>

                    <div class="flex px-3">
                        <div class="w-full">
                            <label class="form-label" for="log_date">
                                Log Date
                            </label>
                            <input class="form-input" type="date" name="log_date" value="{{ $todaysDate }}" required>
                        </div>
                    </div>
                </div>

                <div class="flex">
                    <div class="w-1/3 p-4"></div>
                    <div class="w-2/3 p-8 text-right">
                        <x-jet-button type="submit">{{ __('Log') }}</x-jet-button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
