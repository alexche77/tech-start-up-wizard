<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div>
                    <h2 class="text-xl text-center"><b>Tell us about your startup!</b></h2>
                    <div class="w-full py-6">
                        <div class="flex">
                            <div class="w-1/4">
                                <x-step :active="true" :text="'Basic information'" :isFirst="true">
                                    <svg class="w-full" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </x-step>
                            </div>

                            <div class="w-1/4">
                                <x-step :active="true" :text="'MVP'">

                                    <svg class="w-full" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/>
                                    </svg>
                                </x-step>
                            </div>
                            <div class="w-1/4">
                                <x-step :active="true" :text="'About you'">

                                    <svg class="w-full" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                    </svg>
                                </x-step>
                            </div>

                            <div class="w-1/4">
                                <x-step :active="true" :text="'Finished'">

                                    <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 24 24"
                                         width="24"
                                         height="24">
                                        <path class="heroicon-ui"
                                              d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z"/>
                                    </svg>
                                </x-step>
                            </div>
                        </div>
                    </div>
                    <div class="flex w-full justify-center">
                        <div class="self-center w-1/2">
                            <form action="{{ route('startup.create') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="flex flex-col md:mx-10 md:py-10" x-data="{ currentStep: 1}">
                                    <div x-show="currentStep==1" x-cloak>
                                        <h2 class="text-lg pb-10"><b>{{__('So you are starting a new project...')}}</b>
                                        </h2>
                                        <div class="px-3 mb-6 md:mb-0">
                                            <x-label :value="__('What is the name of your project?')"></x-label>
                                            <x-input class="w-full" id="name" name="name" type="text" required
                                                     placeholder="Tech Startup - Team Builder"
                                                     maxlength="100">
                                            </x-input>
                                            @error('name')
                                            <p class="mt-1 text-red text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div x-data="{ count: 0 }" x-init="count = $refs.countme.value.length"
                                             class="md:w-full px-3 my-6">
                                            <x-label :value="__('What does it do?')"
                                            ></x-label>

                                            <x-text-area x-ref="countme" x-on:keyup="count = $refs.countme.value.length"
                                                         maxlength="255"
                                                         class=" h-5/6 w-full" id="description" name="description"
                                                         type="text"
                                                         placeholder="This is an awesome project that will.."
                                            >
                                                <x-slot name="value">

                                                </x-slot>
                                            </x-text-area>
                                            <span x-html="count"></span> / <span
                                                x-html="$refs.countme.maxLength"></span>
                                            @error('name')
                                            <p class="mt-1 text-red text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="md:w-full px-3 mb-6 md:mb-0">
                                            <x-label for="category"
                                                     :value="__('Which of this describes best the category of your project?')"></x-label>
                                            <x-select
                                                identifier="category"
                                                id="category"
                                                :options="$categories">
                                            </x-select>

                                            @error('category')
                                            <p class="mt-1 text-red text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <x-button>
                                        {{__('Next')}}
                                    </x-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
