<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <a href="{{ route('measurements.index') }}" class="flex items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Measurements for ' . Auth::user()->currentTeam->name) }}
                </h2>
            </a>

            {{--
            You don't normally want an a tag around a button because
            of accessibility concerns. Just make the a tag look like
            a button. TODO: refactor
            --}}
            @if (Auth::user()->hasTeamPermission(Auth::user()->currentTeam, 'create'))
                <a href="/measurements/create">
                    <x-jet-button class="font-extrabold text-xl">+</x-jet-button>
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (count($measurements) === 0)
                <div class="text-center">
                    <img src="{{ asset('images/empty-page.svg') }}" class="w-96 mx-auto" />
                    <p class="p-4 antialiased text-gray-800 text-xl font-semibold">
                        Add a new measurement to get started.
                    </p>
                    @if (Auth::user()->hasTeamPermission(Auth::user()->currentTeam, 'create'))
                        <a href="/measurements/create">
                            <x-jet-button>Log Measurement</x-jet-button>
                        </a>
                    @endif
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mb-4">
                    {{ $measurements->links() }}
                </div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <header class="grid grid-cols-3 bg-gray-100 rounded-t-lg border-b-2 border-gray-300">
                        <div class="col-span-1 h-12 uppercase tracking-wide text-gray-700 font-bold
                                text-sm antialiased pt-3 ml-6">
                            Measurement
                        </div>
                        <div class="col-span-1 h-12 uppercase tracking-wide text-gray-700 font-bold
                                text-sm antialiased pt-3">
                            Value
                        </div>
                        <div class="col-span-1 h-12 uppercase tracking-wide text-gray-700 font-bold
                                text-sm antialiased pt-3">
                            Log Date
                        </div>
                    </header>


                    @foreach ($measurements as $m)
                        <div class="grid grid-cols-3 py-6 border-b-2 hover:bg-gray-100">
                            <div class="col-span-1 h-12 text-gray-700 antialiased pt-3 ml-6">
                                {{ $m->measurementType->name }}
                            </div>
                            <div class="col-span-1 h-12 text-gray-700 antialiased pt-3">
                                {{ $m->value . ' ' . $m->measurementType->unit->name }}
                            </div>
                            <div class="col-span-1 h-12 text-gray-700 antialiased pt-3">
                                {{ date('M jS, Y', strtotime($m->log_date)) }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-4">
                    {{ $measurements->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
