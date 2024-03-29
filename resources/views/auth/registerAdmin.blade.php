<x-guest-layout>

    <form method="POST" action="{{ route('admins.store') }}">
        @csrf

        <!-- Prenom -->
        <div>
            <x-input-label for="prenom" :value="__('Prenom')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required
                autofocus autocomplete="prenom" />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>

        <!-- nom -->
        <div>
            <x-input-label for="nom" :value="__('Nom')" />
            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')"
                required autofocus autocomplete="nom" />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


   

        <!-- Sexe -->
        <div class="mt-2" >
            <x-input-label for="sexe" :value="__('Sexe')" />
            <select id="sexe" class="block mt-1 w-full" name="genre" required>
                <option value="">Choisir le sexe</option>
                <option value="Homme" {{ old('sexe') === 'Homme' ? 'selected' : '' }}>Homme</option>
                <option value="Femme" {{ old('sexe') === 'Femme' ? 'selected' : '' }}>Femme</option>
            </select>
            <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
        </div>


        <!-- Age -->
        <div class="mt-2" >
            <x-input-label for="age" :value="__('Age')" />
            <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')"
                min="5" required autofocus />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>


        <!-- Tel -->
        <div class="mt-2" >
            <x-input-label for="tel" :value="__('Numero de telephone')" />
            <x-text-input id="tel" class="block mt-1 w-full" type="number" name="tel" :value="old('tel')"
                min="0" required autofocus />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mots de passe')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmez votre mots de passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Vous-avez deja un compte ?') }}
            </a>
            <a href="/"
                class="bg-white bg-opacity-50 text-indigo-500 hover:bg-gray-200 px-4 py-1 rounded ml-2">Accueil</a>

            <x-primary-button class="ml-4">
                {{ __("S'inscrire") }}
            </x-primary-button>

        </div>
    </form>
    <script>
        function voitureEnable() {
            if (document.getElementById('role').value == "chauffeur") {
                console.log("not hidden")
                document.getElementById('voiture').removeAttribute("hidden")
                document.getElementById('v2').setAttribute("required", true)

            } else {
                document.getElementById('voiture').setAttribute("hidden", true)
                document.getElementById('v2').removeAttribute("required")

            }

        }
    </script>
</x-guest-layout>
