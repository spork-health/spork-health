<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <a href="{{ route('measurements.index') }}" class="flex items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Health Logs for ' . Auth::user()->currentTeam->name) }}
                </h2>
            </a>

            {{--
            You don't normally want an a tag around a button because
            of accessibility concerns. Just make the a tag look like
            a button. TODO: refactor
            --}}
            @if (Gate::check('create', Auth::user()->currentTeam))
                <a href="/health-logs/create">
                    <x-jet-button class="font-extrabold text-xl">+</x-jet-button>
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (count($healthLogs) === 0)
                <div class="text-center">
                    <img src="{{ asset('images/no-data.svg') }}" class="w-96 mx-auto" />
                    <p class="p-4 antialiased text-gray-800 text-xl font-semibold">
                        Add a new health log to get started.
                    </p>
                    @if (Gate::check('create', Auth::user()->currentTeam))
                        <a href="/health-logs/create">
                            <x-jet-button>Add Health Log</x-jet-button>
                        </a>
                    @endif
                </div>
            @else
                @if ($healthLogs->links()->paginator->hasPages())
                    <div class="bg-white shadow-xl rounded-lg p-8 mb-4">
                        {{ $healthLogs->links() }}
                    </div>
                @endif

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">

                    @foreach ($healthLogs as $h)
                        <div class="mb-12">
                            <h2 class="mb-2 text-lg">{{ date('M jS, Y \a\t h:m a', strtotime($h->log_date)) }}</h2>
                            <blockquote class="relative p-4 italic border-l-4 bg-neutral-100 text-neutral-600 border-neutral-500 quote">
                                {!! nl2br(e($h->text)) !!}
                            </blockquote>
                        </div>
                    @endforeach
                </div>

                @if ($healthLogs->links()->paginator->hasPages())
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-4">
                        {{ $healthLogs->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>
</x-app-layout>
