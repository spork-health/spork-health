<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (count($bloodPressure) !== 0 || count($cholesterol) !== 0 || !empty($healthLog))
                <div class="bg-white p-8 overflow-hidden shadow-xl sm:rounded-lg">

                    @if (count($bloodPressure) !== 0 || count($cholesterol) !== 0)
                        <section>
                            <h2 class="text-xl text-gray-900">Latest measurements</h2>
                            <ul class="list-disc list-inside">
                                @if (count($bloodPressure) !== 0)
                                    <li>
                                        Blood pressure of
                                        {{ $bloodPressure->last()->value . ' ' . $bloodPressure->last()->measurementType->unit->name . ' on ' . date('M jS, Y', strtotime($bloodPressure->last()->log_date)) }}
                                    </li>
                                @endif
                                @if (count($cholesterol) !== 0)
                                    <li>
                                        Cholesterol level of
                                        {{ $cholesterol->last()->value . ' ' . $cholesterol->last()->measurementType->unit->name . ' on ' . date('M jS, Y', strtotime($cholesterol->last()->log_date)) }}
                                    </li>
                                @endif
                            </ul>
                        </section>

                        <section class="my-8">
                            <h2 class="text-xl text-gray-900">Averages</h2>
                            <p class="mb-2 p-0 text-sm font-bold text-gray-800">Past 30 days</p>
                            <ul class="list-disc list-inside">
                                @if (count($bloodPressure) !== 0)
                                    <li>
                                        Blood pressure of
                                        {{ $bloodPressure->avg('value') . ' ' . $bloodPressure->first()->measurementType->unit->name }}
                                    </li>
                                @endif

                                @if (count($cholesterol) !== 0)
                                    <li>
                                        Cholesterol level of
                                        {{ $cholesterol->avg('value') . ' ' . $cholesterol->first()->measurementType->unit->name }}
                                    </li>
                                @endif
                            </ul>
                        </section>
                    @endif

                    @if (!empty($healthLog))
                        <section>
                            <h2 class="text-xl text-gray-900">Latest Health Log</h2>
                            <p class="mb-4 p-0 text-sm font-bold text-gray-800">{{ date('M jS, Y', strtotime($healthLog->log_date)) }}</p>
                            <blockquote class="relative p-4 italic border-l-4 bg-neutral-100 text-neutral-600 border-neutral-500 quote">
                                {!! nl2br(e($healthLog->text)) !!}
                            </blockquote>
                        </section>
                    @endif

                </div>
            @else
                <div class="text-center">
                    <img src="{{ asset('images/not-found.svg') }}" class="w-96 mx-auto" />
                    <p class="p-4 antialiased text-gray-800 text-xl font-semibold">
                        No data found! Add a measurement or health log to get started.
                    </p>
                    @if (Gate::check('create', Auth::user()->currentTeam))
                        <a href="/measurements/create">
                            <x-jet-button>Log Measurement</x-jet-button>
                        </a>
                        <a href="/health-logs/create">
                            <x-jet-button>Add Health Log</x-jet-button>
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
