<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{ route('measurements.index') }}">
                    {{ __('Measurements for ' . Auth::user()->currentTeam->name) }}
                </a>
            </h2>

            {{--
            You don't normally want an a tag around a button because
            of accessibility concerns. Just make the a tag look like
            a button. TODO: refactor
            --}}
            @if (Auth::user()->canEdit(Auth::user()->currentTeam))
                <a href="/measurements/create">
                    <x-jet-button>
                        {{ __('Log Measurement') }}
                    </x-jet-button>
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                @foreach ($measurements as $m)
                    <p>{{ $m->measurementType->name . ' - ' . $m->value . ' ' . $m->measurementType->unit->name }}</p>
                    <p>Logged: {{ date('M jS, Y', strtotime($m->log_date)) }}</p>
                    @if (!$loop->last)
                        <br />
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
