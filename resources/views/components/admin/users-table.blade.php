<div class="px-4 sm:px-6 lg:px-8" x-data="{
   params: {
        title: '',
        route: ''
    },
    openModal: false
}">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Uživatelé</h1>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <x-admin.forms.button :route="route('admin.users.showCreate')">Vytvořit uživatele</x-admin.forms.button>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                    <tr>
                        <x-admin.table.th>ID</x-admin.table.th>
                        <x-admin.table.th>Jméno</x-admin.table.th>
                        <x-admin.table.th>Příjmení</x-admin.table.th>
                        <x-admin.table.th>Role</x-admin.table.th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                            <span class="sr-only">Smazat</span>
                            <span class="sr-only">Upravit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                   @foreach($data as $user)
                       <tr>
                           <x-admin.table.td>{{ $user->id }}</x-admin.table.td>
                           <x-admin.table.td>{{ $user->first_name }}</x-admin.table.td>
                           <x-admin.table.td>{{ $user->last_name }}</x-admin.table.td>
                           <x-admin.table.td>{{ $user->role->label() }}</x-admin.table.td>

                           <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0 space-y-4 space-x-4">
                               <a @click="params.title = '{{ $user->full_name }}'; params.route = '{{ route('admin.user.delete', $user->id) }}'; openModal = true" class="text-red-600 hover:text-red-900 cursor-pointer">Smazat<span class="sr-only">, {{ $user->full_name }}</span></a>
                               <a href="{{ route('admin.users.detail', $user->id) }}" class="text-gray-900 hover:text-gray-600">Upravit<span class="sr-only">, {{ $user->full_name }}</span></a>
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