<div class="p-2 w-full">
    <x-label for="name">{{ __('Name') }}</x-label>
    <x-input type="text" id="name" name="name" :value="old('name', $category->name)"/>
    <x-validation-errors field="name"/>
</div>
