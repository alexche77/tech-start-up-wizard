<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!--Hero-->
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center text-white">
            <!--Left Col-->
            <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
                <p class="uppercase tracking-loose w-full">Thinking on starting a company?</p>
                <h1 class="my-4 text-5xl font-bold leading-tight">
                    Do it with the help of awesome people!
                    😎
                </h1>
                <p class="leading-normal text-2xl mb-8">
                    Let us suggest the best people for you based on a couple of answers
                </p>
                <a
                    href="{{route('startup.create')}}"
                    class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    Let's go 🚀
                </a>

            </div>
            <!--Right Col-->
            <div class="w-full md:w-3/5 py-6 text-center">
                <img class="w-full md:w-4/5 z-50" src="{{asset('static_images/hero.png')}}"/>
            </div>
        </div>
    </div>
</x-app-layout>
