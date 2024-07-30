<div class="space-y-6">

    <div>
        <x-input-label for="category_id" :value="__('category_id')" />
        {{-- <select>
            <option value="">Select Category</option>
            @foreach ($categories as $key => $category)
                <option value="{{ $key }}">{{ $category }}</option>
            @endforeach
        </select> --}}
        {{-- {{ dd( $product->category_id ? $product->category->id : '') }} --}}
        <x-select-input id="category_id" name="category_id" class="mt-1 block w-full" :options="$categories" :value="old('category', $product?->category?->id)"
            placeholder="Select Category" />

        <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
    </div>
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $product?->name)"
            autocomplete="name" placeholder="Name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>
    <div>
        <x-input-label for="description" :value="__('Description')" />
        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $product?->description)"
            autocomplete="description" placeholder="Description" />
        <x-input-error class="mt-2" :messages="$errors->get('description')" />
    </div>
    <div>
        <x-input-label for="price" :value="__('price')" />
        <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" :value="old('price', $product?->price)"
            autocomplete="price" placeholder="price" />
        <x-input-error class="mt-2" :messages="$errors->get('price')" />
    </div>
    <div>
        <x-input-label for="qty" :value="__('qty')" />
        <x-text-input id="qty" name="qty" type="text" class="mt-1 block w-full" :value="old('qty', $product?->qty)"
            autocomplete="qty" placeholder="qty" />
        <x-input-error class="mt-2" :messages="$errors->get('qty')" />
    </div>
    <div>
        <x-input-label for="image" :value="__('image')" />
        <x-text-input id="image" name="image" type="text" class="mt-1 block w-full" :value="old('image', $product?->image)"
            autocomplete="image" placeholder="image" />
        <x-input-error class="mt-2" :messages="$errors->get('image')" />
    </div>
    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>
