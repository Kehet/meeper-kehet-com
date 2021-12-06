<div class="p-2 w-full">
    <x-label for="title">Title</x-label>
    <x-input type="text" id="title" name="title" :value="old('title', $post->title)"/>
    <x-validation-errors field="title" />
</div>

<div class="p-2 w-full">
    <x-label for="body">Body</x-label>
    <x-textarea id="body" name="body" :value="old('body', $post->body)" rows="6"/>
    <x-validation-errors field="body" />
</div>
