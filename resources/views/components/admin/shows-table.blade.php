<div class="px-4 sm:px-6 lg:px-8" x-data="{
    params: {
        title: '',
        route: ''
    },
    openModal: false
}">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Filmy a seriály</h1>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <x-admin.forms.button :route="route('admin.shows.showCreate')">Vytvořit film nebo seriál</x-admin.forms.button>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                    <tr>
                        <x-admin.table.th>ID</x-admin.table.th>
                        <x-admin.table.th>Název</x-admin.table.th>
                        <x-admin.table.th>Popis</x-admin.table.th>
                        <x-admin.table.th>Typ</x-admin.table.th>
                        <x-admin.table.th>Datum premiéry</x-admin.table.th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                            <span class="sr-only">Smazat</span>
                            <span class="sr-only">Upravit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @foreach($data as $show)
                        <tr>
                            <x-admin.table.td>{{ $show->id }}</x-admin.table.td>
                            <x-admin.table.td>{{ $show->name }}</x-admin.table.td>
                            <x-admin.table.td>{{ \Illuminate\Support\Str::limit(strip_tags($show->getTrixRichText('description'), 20)) }}</x-admin.table.td>
                            <x-admin.table.td>{{ $show->type->label() }}</x-admin.table.td>
                            <x-admin.table.td>{{ $show->date_of_premiere->format('d.n.Y') }}</x-admin.table.td>

                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0 space-x-4">
                                <a @click="params.title = '{{ $show->name }}'; params.route = '{{ route('admin.show.delete', $show->id) }}'; openModal = true" class="text-red-600 hover:text-red-900 cursor-pointer">Smazat<span class="sr-only">, {{ $show->name }}</span></a>
                                <a href="{{ route('admin.shows.detail', $show->id) }}" class="text-gray-900 hover:text-gray-600">Upravit<span class="sr-only">, {{ $show->name }}</span></a>
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