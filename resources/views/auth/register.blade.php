<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="mt-4">
            <select id="role" name="role" class="mt-6 ml-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected disabled>Sélectionnez un Role</option>
                <option value="Patient">Patient</option>
                <option value="Doctor">Médecin</option>
            </select>
        </div>
        
        <div class="mt-4" id="specialty-field" style="display: none;">
            <x-input-label for="specialty" :value="('Specialty')" />
            <select id="specialty" name="specialty" class="block mt-1 w-full">
                <option selected disabled>Sélectionnez une Specialité</option>
                @foreach ($specialities as $specialitie)
                 <option value={{$specialitie->id}}>{{$specialitie->specialityName}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('specialty')" class="mt-2" />
        </div>
        
        <script>
            const roleSelect = document.getElementById('role');
            const specialtyField = document.getElementById('specialty-field');
        
            roleSelect.addEventListener('change', function () {
                if (roleSelect.value === 'Doctor') {
                    specialtyField.style.display = 'block';
                } else {
                    specialtyField.style.display = 'none';
                }
            });
        </script>
        
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
