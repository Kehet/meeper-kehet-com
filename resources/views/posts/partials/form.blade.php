<div class="p-2 w-full">
    <x-label for="title">{{ __('Title') }}</x-label>
    <x-input type="text" id="title" name="title" :value="old('title', $post->title)"/>
    <x-validation-errors field="title"/>
</div>

@if($post->hasMedia())
    <div class="p-2 w-full">
        <label class="block inline-flex items-center mt-3">
            <input type="checkbox" name="remove_old_image"
                   class="form-checkbox h-5 w-5 text-yellow-600"
                   checked="{{ old('remove_old_image', false) ? 'checked' : '' }}"
                   value="1"/>
            <span class="ml-2 text-gray-700">
                {{ __('Remove old image :filename (:size)', [
                    'filename' => $post->getFirstMedia()->name,
                    'size' => $post->getFirstMedia()->human_readable_size
                ]) }}
            </span>
        </label>

        <x-validation-errors field="remove_old_image"/>
    </div>
@endif

<div class="p-2 w-full">
    <x-label for="image">{{ __('Image') }}</x-label>
    <x-input type="file" id="image" name="image" accept="image"/>
    <x-validation-errors field="image"/>
</div>

<div class="p-2 w-full">
    <x-label for="body">{{ __('Body') }}</x-label>
    <x-textarea id="body" name="body" :value="old('body', $post->body)" rows="6"/>
    <x-validation-errors field="body"/>
</div>

<div class="p-2 w-full">
    <x-label for="tags">{{ __('Tags') }}</x-label>
    <x-input type="text" id="tags" name="tags" :value="old('tags',  optional($post->tags)->implode(','))"/>
    <x-validation-errors field="tags"/>
</div>
