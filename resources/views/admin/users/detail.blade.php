<x-admin.layout title="Uživatelé - detail">
    <h1 class="text-4xl text-center text-gray-900">Upravit uživatele {{ $user->full_name }}</h1>
        <div class="space-y-10 divide-y divide-gray-900/10">
            <div class="grid grid-cols-1 gap-x-8 gap-y-8 pt-10 max-w-2xl mx-auto">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                    @csrf
                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <x-admin.forms.input label="Jméno" name="first_name" id="first_name" placeholder="Pepa" required value="{{ $user->first_name }}"/>
                            </div>

                            <div class="sm:col-span-3">
                                <x-admin.forms.input label="Příjmení" name="last_name" id="last_name" placeholder="Jandač" required value="{{ $user->last_name }}"/>
                            </div>

                            <div class="sm:col-span-3">
                                <x-admin.forms.input label="E-mail" name="email" id="email" placeholder="pepa@seznam.cz" required value="{{ $user->email }}"/>
                            </div>
                            <div class="sm:col-span-3">
                                <x-admin.forms.select :selected="$user->role->value" name="role" id="role" :options="$roles" label="Role"></x-admin.forms.select>
                            </div>

                            <div class="sm:col-span-3">
                                <x-admin.forms.input label="Heslo" name="password" id="password" required type="password"/>
                            </div>

                            <div class="sm:col-span-3">
                                <x-admin.forms.input label="Heslo znovu" name="password_confirmation" id="password_confirmation" required type="password"/>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Zpět</button>
                        <x-admin.forms.button>Uložit</x-admin.forms.button>
                    </div>
                </form>
            </div>
        </div>
</x-admin.layout>