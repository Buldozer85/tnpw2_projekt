@props([
    'name',
     'id',
     'label',
     'required' => false,
     'isChecked' => false,
     'value' => ''
])
<div class="space-y-5">
    <div class="relative flex items-start">
        <div class="flex h-6 items-center">
            <input value="{{ $value }}" {{ $attributes }} @if($isChecked) checked @endif {{ $attributes->merge() }} id="{{ $id }}" aria-describedby="{{ $id }}-description" name="{{ $name }}" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-brand-blue focus:ring-brand-blue" @if($required) required @endif>
        </div>
        <div class="ml-3 text-sm leading-6">
            <label for="{{ $id }}" class="font-medium text-gray-900 cursor-pointer">{{ $label }}</label>
        </div>
    </div>
    @error($name . "_error")
    <p class="mt-2 text-sm text-red-600" id="{{ $name }}_errror">{{ $message }}</p>
    @enderror

    @error($name)
    <p class="mt-2 text-sm text-red-600" id="{{ $name }}_errror">{{ $message }}</p>
    @enderror
</div>