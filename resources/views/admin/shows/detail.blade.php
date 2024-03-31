<x-admin.layout title="Vytvořil film nebo seriál">
    <h1 class="text-4xl text-center text-gray-900">Upravení {{ $show->name }}</h1>
    <div class="space-y-10 divide-y divide-gray-900/10" x-data="{
        type: '{{ $show->type->value }}'
    }">
        <div class="grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3  gap-y-8 pt-10 ">
            <div class="mx-auto max-w-2xl">
                <img class="max-h-96 text-center mx-auto" src="{{ asset('storage/shows/' . $show->icon) }}"/>
                <p class="text-center text-sm pt-12">{{ $show->icon }}</p>
            </div>

            <form action="{{ route('admin.shows.update', $show->id) }}" method="POST" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl ">
                @csrf
                <div class="px-4 py-6 sm:p-8">
                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <x-admin.forms.input label="Název" name="name" id="name" value="{{ $show->name }}" required />
                        </div>

                        <div class="sm:col-span-3">
                            <x-admin.forms.input label="Datum premiéry" name="date_of_premiere" value="{{ $show->date_of_premiere->format('Y-m-d') }}" id="date_of_premiere" type="date" required/>
                        </div>

                        <div class="sm:col-span-6">
                            @trix($show , 'description', ['hideTools' => ['file-tools', 'history-tools'], 'hideButtonIcons' => ['code']])
                        </div>
                        <div class="sm:col-span-3">
                            <x-admin.forms.select x-model="type" name="type" id="type" :options="$types" label="Typ" selected="{{ $show->type }}"></x-admin.forms.select>
                        </div>

                        <div class="sm:col-span-3">
                            <x-admin.forms.input value="{{ $show->getMeta('length') }}" type="number" name="length" id="length" label="Celková délka (min.)"></x-admin.forms.input>
                        </div>

                        <div class="sm:col-span-6">
                            <x-admin.forms.file-input name="file_input" id="file_input"></x-admin.forms.file-input>
                        </div>

                        <div x-show="type == '{{ \App\Enums\ShowType::SERIES->value }}'" class="sm:col-span-6 grid grid-cols-2 gap-x-4">
                            <div>
                                <x-admin.forms.input label="Počet sérií" name="count_of_seasons" id="count_of_seasons" value="{{ $show->getMeta('count_of_seasons') ?? '' }}" type="number" />
                            </div>

                            <div>
                                <x-admin.forms.input label="Počet dílů" name="count_of_episodes" id="count_of_episodes" type="number"  value="{{ $show->getMeta('count_of_episodes') ?? '' }}"/>
                            </div>

                            <div class="sm:col-span-3 mt-4">
                                <x-admin.forms.checkbox label="Pořád probíhá" name="still_running" id="still_running" is-checked="{{ $show->getMeta('still_running') }}" value="{{ $show->getMeta('still_running') ?? '' }}"/>
                            </div>
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