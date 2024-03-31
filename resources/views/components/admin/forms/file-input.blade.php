@props([
    'name',
    'id',
    'label' => '',
     'file' => null

])
<div>
    <div class="flex flex-row space-x-4 items-center border rounded-md">
        <label class="text-sm cursor-pointer py-4 bg-gray-900 p-2 rounded-md text-white" for="{{ $id }}">Nahrát soubor</label>
        <p class="text-sm" id="label_file_input">{{ basename($file) }}</p>
        <input id="{{ $id }}" type="file" name="{{ $name }}" class="hidden">
    </div>
    @error($name)
    <p class="mt-2 text-sm text-red-600" id="{{ $name }}_errror">{{ $message }}</p>
    @enderror

    <script>
        const fileInput = document.querySelector('#file_input');
        let fileLabel = document.querySelector('#label_file_input');

        if(fileInput.files.length === 0 && fileLabel.innerText === "") {
            fileLabel.innerText = "Nevybrán žádný soubor";
        }

        fileInput.addEventListener("change", function () {
            fileLabel.innerText = fileInput.files[0].name;
        })
    </script>
</div>