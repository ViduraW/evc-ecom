@props(['group'])

<div class="input-container">
    <label for="{{ $attributes->get('id') }}">{{ $attributes->get('label') }}</label>
    <input type="text" {{ $attributes->merge(['class' => 'group-input', 'data-group' => $group]) }}>
</div>
