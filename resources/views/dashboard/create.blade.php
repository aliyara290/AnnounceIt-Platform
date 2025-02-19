<x-dashboard>
    <div class="p-6 space-y-8">
        <div class="w-max space-y-4">
            <div class="w-max">
                <h1 class="text-2xl text-white font-bold">
                    Add new category
                </h1>
            </div>
            <form action="" method="post" class="flex flex-col gap-3">
                @csrf
                @method('post')
                <input type="text" name="name" class="text-gray-800" placeholder="Category name">
                <button type="submit" class="bg-gray-900 dark:hover:bg-gray-950 rounded-md py-2">
                    Add
                </button>
            </form>
        </div>
    </div>
</x-dashboard>
