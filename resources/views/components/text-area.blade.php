@props(['disabled' => false, 'value'=>null])

<textarea
    {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'h-full appearance-none block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!} style="height: 200px; resize: none">{{$value}}</textarea>
