<x-dashboard>
    <div class="p-6 space-y-8">
        <div class="w-max space-y-4">
            <div class="w-max">
                <a href="/admin/categories/create">
                    <button class="px-7 py-3 bg-white rounded-md hover:bg-gray-950 hover:text-white text-gray-950 text-md font-medium">
                        Add new category
                    </button>
                </a>
            </div>

        </div>
        <div class="w-full space-y-4">
            <div class="w-max">
                <h1 class="text-2xl text-white font-bold">
                    Categories list
                </h1>
            </div>
            <ul class="flex flex-wrap gap-3">
                @foreach($categories as $category)
                <li class="py-5 px-8 bg-white rounded-md flex flex-col gap-2 justify-center items-center text-gray-950 font-medium">
                    <span class="text-xl">{{ $category->name }}</span>
                    <ul class="flex gap-2">
                        <li class="text-red-500 text-lg hover:scale-110 cursor-pointer">

                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </li>
                        <li class="text-green-500 text-lg hover:scale-110 cursor-pointer">
                            <a href="{{ route('dashboard.edit', $category->id) }}">
                                <i class="fa-solid fa-edit"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                @endforeach
            </ul>
            <div class="w-full pt-7">
                {{ $categories->links() }}
            </div>
        </div>
    </div>



</x-dashboard>
