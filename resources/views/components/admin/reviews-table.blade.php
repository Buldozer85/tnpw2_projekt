<div class="px-4 sm:px-6 lg:px-8" x-data="{
    openModal: false,
    params: {
        title: '',
        route: ''
    }
}">
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
                        <x-admin.table.th>Vytvořeno</x-admin.table.th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                            <span class="sr-only">Smazat</span>
                            <span class="sr-only">Detail</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @foreach($data as $review)
                        <tr>
                            <x-admin.table.td>{{ $review->id }}</x-admin.table.td>
                            <x-admin.table.td>{{ $review->user->full_name }}</x-admin.table.td>
                            <x-admin.table.td>{{ \Illuminate\Support\Str::limit($review->content, 20) }}</x-admin.table.td>
                            <x-admin.table.td>{{ $review->rating }}</x-admin.table.td>
                            <x-admin.table.td>{{ $review->created_at->format('d.n.Y H:i') }}</x-admin.table.td>

                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0 space-x-4">
                                <a @click="params.title = '{{ $review->id }}'; params.route = '{{ route('admin.review.delete', $review->id) }}'; openModal = true" class="text-red-600 hover:text-red-900 cursor-pointer">Smazat<span class="sr-only">, {{ $review->id }}</span></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <x-admin.modal show-variable="openModal" heading="Smazat " text="Opravdu si přejete tento záznam smazat?"></x-admin.modal>
    {{ $data->links() }}
</div>