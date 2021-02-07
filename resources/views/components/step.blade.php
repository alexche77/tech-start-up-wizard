@props(['number','text', 'isFirst'])

@php
    $percentage = ($active ?? false) ? 100 : 0;
    $show_progress_bar = ($isFirst??false);

@endphp

<div class="relative mb-2">
    @if(!$show_progress_bar)
        <div class="absolute flex align-center items-center align-middle content-center"
             style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                <div class="w-0 bg-green-300 py-1 rounded" x-bind:class="{ 'w-full': currentStep >= {{$number}}}"></div>
            </div>
        </div>
    @endif
    <div
        class="w-10 h-10 mx-auto rounded-full text-lg flex items-center" x-bind:class="{'text-white bg-green-500' : currentStep >= {{$number}}}">
          <span class="text-center w-full p-2">
              {{$slot}}
          </span>
    </div>
</div>

<div class="text-xs text-center md:text-base">{{$text}}</div>
