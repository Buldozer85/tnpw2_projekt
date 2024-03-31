<!doctype html>
<html class="h-full" lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrace: Přihlášení</title>
    @vite(['resources/css/app.css'])
</head>
<body class="h-full">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="{{ asset('images/logo-no-background.png') }}" alt="Your Company">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">Přihlásit se do administrace</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

        <form class="space-y-6" action="{{ route('admin.auth.login') }}" method="POST">
            @csrf
           <x-admin.forms.input type="email" name="email" id="email" label="E-mail" />
            <x-admin.forms.input type="password" name="password" id="password" label="Heslo"/>
            @error('login-error')
            <p class="mt-2 text-sm text-red-600" id="login-error">{{ $message }}</p>
            @enderror
            <div>
                <x-admin.forms.button type="long">Přihlásit se</x-admin.forms.button>
            </div>
        </form>
    </div>
</div>

</body>
</html>