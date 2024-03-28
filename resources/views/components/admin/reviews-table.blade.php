<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Hodnocení</h1>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                    <tr>
                        <x-admin.table.th>ID</x-admin.table.th>
                        <x-admin.table.th>Uživatel</x-admin.table.th>
                        <x-admin.table.th>Popis</x-admin.table.th>
                        <x-admin.table.th>Rating</x-admin.table.th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                            <span class="sr-only">Smazat</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">Lindsay Walton</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Front-end Developer</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">lindsay.walton@example.com</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Member</td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Smazat<span class="sr-only">, Lindsay Walton</span></a>
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Detail<span class="sr-only">, Lindsay Walton</span></a>
                        </td>
                    </tr>

                    <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>