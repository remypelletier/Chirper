<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <fieldset>
            <label for="password">login</label>
            <input id="password" name="email" type="email"/>

            <label for="password">password</label>
            <input id="password" name="password" type="password"/>
        </fieldset>

        <button class="btn" type="submit^">login</button>

    </form>
</x-layout>