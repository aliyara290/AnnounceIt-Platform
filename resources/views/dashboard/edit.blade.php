<x-dashboard>
    <div class="p-6 space-y-8">
        <div class="w-max space-y-4">
            <div class="w-max">
                <h1 class="text-2xl text-white font-bold">
                    Update category
                </h1>
            </div>
            <form action="{{ route('categories.update', $category->id) }}" method="post" class="flex flex-col gap-3">
                @csrf
                @method('PUT')
                <input type="text" class="text-gray-800" name="u-name" value="{{ old('name', $category->name) }}" placeholder="Category name">
                <button type="submit" class="bg-green-700 dark:hover:bg-green-800 rounded-md py-2">
                    Update
                </button>
            </form>
        </div>
    </div>
</x-dashboard>
