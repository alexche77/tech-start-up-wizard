<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" x-data="data()">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div>
                    <h2 class="text-xl text-center"><b>Let's build your startup!</b></h2>
                    @if($errors)
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                    <div class="w-full py-6">
                        <div class="flex">
                            <div class="w-1/3">
                                <x-step :number="1" :text="'Basic information'" :isFirst="true">
                                    <svg class="w-full" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </x-step>
                            </div>

                            <div class="w-1/3">
                                <x-step :number="2" :text="'MVP'">

                                    <svg class="w-full" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/>
                                    </svg>
                                </x-step>
                            </div>
                            {{--                            <div class="w-1/4">--}}
                            {{--                                <x-step :number="3" :text="'The Dream Team'">--}}

                            {{--                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
                            {{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />--}}
                            {{--                                    </svg>--}}
                            {{--                                </x-step>--}}
                            {{--                            </div>--}}

                            <div class="w-1/3">
                                <x-step :number="3" :text="'Finished'">

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
                            <form action="{{ route('startup.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="flex flex-col md:mx-10 md:py-10">
                                    <div x-show="currentStep === 1" x-cloak>
                                        <h2 class="text-lg pb-10"><b>{{__('So you are starting a new project...')}}</b>
                                        </h2>
                                        <div class="px-3 mb-6 md:mb-0">
                                            <x-label :value="__('What is the name of your project?')"></x-label>
                                            <x-input class="w-full" id="name" name="name" type="text" required
                                                     placeholder="Tech Startup - Team Builder"
                                                     x-model="name"
                                                     maxlength="100">
                                            </x-input>
                                            <p x-show="errors.name" class="mt-1 text-red text-xs italic"
                                               x-html="errors.name"></p>
                                        </div>
                                        <div x-init="count = $refs.countme.value.length"
                                             class="md:w-full px-3 my-6">
                                            <x-label :value="__('What does it do?')"
                                            ></x-label>

                                            <x-text-area x-ref="countme" x-model="description"
                                                         maxlength="255"
                                                         class=" h-5/6 w-full" id="description" name="description"
                                                         type="text"
                                                         x-model="description"
                                                         placeholder="This is an awesome project that will.."
                                            >
                                                <x-slot name="value">

                                                </x-slot>
                                            </x-text-area>
                                            <span x-html="description.length"></span> / <span
                                                x-html="$refs.countme.maxLength"></span>

                                            <p x-show="errors.description" class="mt-1 text-red text-xs italic"
                                               x-html="errors.description"></p>

                                        </div>
                                        <div class="md:w-full px-3 mb-6">
                                            <x-label for="category"
                                                     :value="__('Which of this describes best the category of your project?')"></x-label>
                                            <x-select
                                                :identifier="'category'"
                                                id="category"
                                                :options="$categories">
                                            </x-select>

                                            <p x-show="errors.category" class="mt-1 text-red text-xs italic"
                                               x-html="errors.category"></p>
                                        </div>
                                        <div class="px-3 mb-6">
                                            <x-label
                                                :value="__('How much money (US$) will be invested as capital seed? (Optional)')"></x-label>
                                            <x-input class="w-full" id="seed_capital" name="seed_capital" type="number"
                                                     required
                                                     hint="Leave 0 if not sure"
                                                     x-model="seedCapital"
                                                     min="0">
                                            </x-input>
                                            <p x-show="errors.seedCapital" class="mt-1 text-red text-xs italic"
                                               x-html="errors.seedCapital"></p>
                                        </div>
                                    </div>
                                    <div x-show="currentStep === 2" x-cloak>
                                        <h2 class="text-lg pb-10"><b>{{__('And..about that MVP...')}}</b>
                                        </h2>
                                        <div class="px-3 mb-6">
                                            <x-label
                                                :value="__('How many months do you need to deliver an MVP?')"></x-label>
                                            <x-input class="w-full" id="mvp_deadline" name="mvp_deadline" type="number"
                                                     required
                                                     x-model="mvpDeadline"
                                                     min="0">
                                            </x-input>
                                            <p x-show="errors.mvpDeadline" class="mt-1 text-red text-xs italic"
                                               x-html="errors.mvpDeadline"></p>
                                        </div>
                                        <div class="px-3 mb-6">
                                            <x-label
                                                :value="__('Which of this will you need in order to delivery the MVP?')"></x-label>
                                            @foreach($features as $feature)
                                                <x-label
                                                    for="{{$feature->name}}">
                                                    <x-input type="checkbox" value="{{$feature->id}}"
                                                             id="{{$feature->id}}"
                                                             x-model="features"
                                                             name="features[]"/>
                                                    {{$feature->name}}
                                                </x-label>

                                            @endforeach
                                            <p x-show="errors.features" class="mt-1 text-red text-xs italic"
                                               x-html="errors.features"></p>
                                        </div>
                                    </div>
                                    <div x-show="currentStep === 3" x-cloak>
                                        <h2 class="text-lg pb-10"><b>{{__('Ok, we are done..')}}</b>
                                        </h2>
                                        <p class="text-lg">After you click the "Lets'go" button, we will start looking
                                            for the best profiles based on your answers, powered by Torre.co</p>
                                        <p class="text-lg">Once the profiles are ready, we will send you an email, from
                                            there you will be able to see the dream team we have choosen for you.</p>
                                    </div>
                                    <div class="text-center">
                                        <x-button x-show="currentStep > 1" type="button"
                                                  @click="stepBack" x-cloak>
                                            {{__('Back')}}
                                        </x-button>
                                        <x-button x-show="currentStep < 3" type="button" @click="stepForward" x-cloak>
                                            {{__('Next')}}
                                        </x-button>
                                        <x-button x-show="currentStep === 3" type="submit" x-cloak>
                                            {{__("Let's go 🚀")}}
                                        </x-button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function data() {
            return {
                errors: {
                    name: null,
                    description: null,
                    category: null,
                    seedCapital: 0,
                    features: null
                },
                count: 0,
                currentStep: 1,
                name: '',
                category: '',
                description: '',
                seedCapital: 0,
                mvpDeadline: 0,
                features: [],
                stepForward() {
                    console.log(this.availableFeatures);
                    switch (this.currentStep) {
                        case 1:
                            if (this.name.length < 1) {
                                this.errors.name = "Name cannot be empty"
                                return;
                            } else {
                                this.errors.name = null;
                            }
                            if (this.description < 1) {
                                this.errors.description = "Description cannot be empty"
                                return;
                            } else {
                                this.errors.description = null;
                            }
                            if (!this.category) {
                                this.errors.category = "Please, select an option"
                                return;
                            } else {
                                this.errors.category = null;
                            }

                            if (!this.seedCapital || this.seedCapital < 0) {
                                this.errors.seedCapital = "Please, specify a valid number greater than 0"
                                return;
                            }
                            break;
                        case 2:
                            if (!this.mvpDeadline || this.mvpDeadline < 0) {
                                this.errors.mvpDeadline = "Please, specify a valid number greater than 0"
                                return;
                            }
                            const selected = this.features.filter(value => value !== true);
                            console.log('Selected', selected);
                            if (selected.length < 1) {
                                this.errors.features = "Please select at least one feature."
                                return
                            }
                            break;
                        case 3:
                            break;
                    }
                    this.currentStep++
                },
                stepBack() {
                    this.currentStep--
                }
            }
        }
    </script>
</x-app-layout>
