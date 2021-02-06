@props(['options' => [], 'currentValue'=> NULL, 'identifier'=> NULL])
<select
    name="{{$identifier}}"
    x-model="{{$identifier}}"
    {{ $attributes->merge(['class'=>"appearance-none block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"]) }}>
    @foreach ($options as $key => $value)
        <option value="{{ $key }}"
                @isset($currentValue)
                :selected="'{{$currentValue}}' === '{{$key}}'"
            @endisset

        >{{ $value }}</option>
    @endforeach
</select>
