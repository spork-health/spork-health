<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Spork') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="antialiased">
    <div class="max-w-screen-xl mx-auto">
        <div class="relative bg-white overflow-hidden">
            <div>
                <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                    <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                        <nav class="relative flex items-center justify-between sm:h-10">
                            <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                                <div class="flex items-center justify-between w-full md:w-auto">
                                    <a href="/" aria-label="Dashboard">
                                        <img src="{{ asset('images/logo.svg') }}" class="h-16 w-16" />
                                    </a>
                                </div>
                            </div>
                            @if (Route::has('login'))
                                <div class="md:block md:ml-10 md:pr-4">
                                    @auth
                                        <a href="{{ url('/dashboard') }}"
                                            class="text-sm text-gray-700 underline">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="ml-8 font-medium transition duration-300 ease-in-out text-primary-500 hover:text-primary-300">
                                            Log in
                                        </a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                                class="ml-8 font-medium transition duration-300 ease-in-out bg-transparent hover:bg-primary-300 text-primary-500 hover:text-white py-2 px-4 border-2 border-primary-500 hover:border-transparent rounded">
                                                Sign up
                                            </a>
                                        @endif
                                @endif
                                @endif
                        </div>
                        </nav>
                    </div>

                    <main class="mt-10 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                        <div class="sm:text-center lg:text-left">
                            <h2
                                class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                                Spork Health
                            </h2>
                            <p
                                class="mt-3 text-xl text-gray-600 sm:mt-5 sm:max-w-xl sm:mx-auto md:mt-5 md:text-2xl lg:mx-0">
                                Spork allows patients to remotely track their own health
                                metrics and share them with their primary care doctor who can
                                then virtually provide advice and recommendations.
                            </p>
                        </div>
                    </main>
                </div>
            </div>

            <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 lg:max-w-3xl display-none">
                <img src="{{ asset('images/hero.svg') }}" class="w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full"
                    alt="Hero image" />
            </div>
        </div>

        <hr class="my-12 mx-4 border-2" />

        <div class="bg-white">
            <div class="max-w-screen-xl mx-auto px-4 sm:px-6 xl:px-8 xl:flex">
                <div class="sm:text-center lg:text-left xl:w-1/3">
                    <h3
                        class="mt-8 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
                        Selling one-liner
                    </h3>
                    <p class="mt-4 max-w-2xl text-xl leading-7 text-gray-500 xl:mr-4">
                        Lorem ipsum dolor sit amet consect adipisicing elit. Possimus
                        magnam voluptatum cupiditate veritatis in accusamus quisquam.
                    </p>
                </div>

                <div class="mt-10 xl:w-2/3 xl:ml-8">
                    <ul class="md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                        <li>
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-8 w-6 text-green-700">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                                d="M21 6.285l-11.16 12.733-6.84-6.018 1.319-1.49 5.341 4.686 9.865-11.196 1.475 1.285z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-xl leading-6 font-medium text-gray-900">
                                        Our first important feature
                                    </h4>
                                    <p class="mt-2 text-lg leading-6 text-gray-500">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Maiores impedit perferendis suscipit eaque, iste dolor
                                        cupiditate blanditiis ratione.
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li class="mt-10 md:mt-0">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-8 w-6 text-green-700">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                                d="M21 6.285l-11.16 12.733-6.84-6.018 1.319-1.49 5.341 4.686 9.865-11.196 1.475 1.285z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-xl leading-6 font-medium text-gray-900">
                                        Second feature
                                    </h4>
                                    <p class="mt-2 text-lg leading-6 text-gray-500">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Maiores impedit perferendis suscipit eaque, iste dolor
                                        cupiditate blanditiis ratione.
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li class="mt-10 md:mt-0">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-8 w-6 text-green-700">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                                d="M21 6.285l-11.16 12.733-6.84-6.018 1.319-1.49 5.341 4.686 9.865-11.196 1.475 1.285z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-xl leading-6 font-medium text-gray-900">
                                        Third feature
                                    </h4>
                                    <p class="mt-2 text-lg leading-6 text-gray-500">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Maiores impedit perferendis suscipit eaque, iste dolor
                                        cupiditate blanditiis ratione.
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li class="mt-10 md:mt-0">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-8 w-6 text-green-700">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                                d="M21 6.285l-11.16 12.733-6.84-6.018 1.319-1.49 5.341 4.686 9.865-11.196 1.475 1.285z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-xl leading-6 font-medium text-gray-900">
                                        And so on..
                                    </h4>
                                    <p class="mt-2 text-lg leading-6 text-gray-500">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Maiores impedit perferendis suscipit eaque, iste dolor
                                        cupiditate blanditiis ratione.
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <footer class="px-8 py-16 w-full max-w-screen-xl">
            <p class="text-gray-600 text-center">
                © 2020 Team 10 Sanford Healthhack
            </p>
        </footer>
        </div>
    </body>

    </html>
