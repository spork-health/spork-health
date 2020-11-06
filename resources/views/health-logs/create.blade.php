<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('health-logs.index') }}">
                {{ __('Health Logs') }}
            </a>
        </h2>
    </x-slot>

    <section class="w-full max-w-3xl m-auto my-8">
        <div class="mb-6">
            @include('partials.errors')
        </div>

        <div class="bg-white rounded-lg shadow-md">

            <header class="p-4 border-b-2 border-gray-200 antialiased">
                <h1 class="text-gray-800 text-xl">Write a new health log</h1>
            </header>

            <form action="/health-logs" method="POST">
                @csrf

                <input type="hidden" name="team_id" value="{{ Auth::user()->currentTeam->id }}" />

                <div class="border-b-2 border-gray-200 p-8">

                    <div class="w-48 px-3">
                        <div class="w-full">
                            <label class="form-label" for="log_date">
                                Log date
                            </label>
                            <input class="form-input" type="date" name="log_date" value="{{ $todaysDate }}" required>
                        </div>
                    </div>

                    <div class="flex px-3">
                        <div class="w-full">
                            <label class="form-label" for="value">
                                Body
                            </label>
                            <textarea class="form-input" type="text" name="text" rows="6" required
>Are you experiencing any pain today?


</textarea>
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
