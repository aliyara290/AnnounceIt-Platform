<x-dashboard>
    <div class="p-6 space-y-8">
        <!-- Client Table -->
        <div class="mt-4 mx-4">
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Id</th>
                            <th class="px-4 py-3">Full name</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Joined</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($users as $user)
                        <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">{{ $user->id }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $user->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $user->email }}</td>

                            <td class="px-4 py-3 text-sm">{{ $user->created_at }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="w-full pt-7">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
        <!-- ./Client Table -->
    </div>
</x-dashboard>
