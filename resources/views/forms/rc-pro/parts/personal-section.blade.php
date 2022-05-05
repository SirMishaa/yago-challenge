{{-- Personnal information related stuff here --}}
<section class="md:grid md:grid-cols-3 md:gap-6 py-4">
    <div class="md:col-span-1">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Information personnelle</h3>
        <p class="mt-1 text-sm text-gray-500">Veillez à utiliser une adresse mail valide et à vérifier vos informations.</p>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="grid grid-cols-6 gap-x-6 gap-y-1">
            <div class="col-span-6 sm:col-span-2">
                <label for="firstName" class="block text-sm font-medium text-gray-700">Prénom</label>
                <input placeholder="John" type="text" name="firstName" id="firstName" autocomplete="firstName" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @error('firstName')
                    <small class="text-sm text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-span-6 sm:col-span-2">
                <label for="lastName" class="block text-sm font-medium text-gray-700">Nom de famille</label>
                <input placeholder="Doe" type="text" name="lastName" id="lastName" autocomplete="lastName" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-2">
                <label for="phoneNumber" class="block text-sm font-medium text-gray-700">Numéro de téléphone</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <input placeholder="+32049000000" type="text" name="phoneNumber" id="phoneNumber" autocomplete="phoneNumber" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 pl-10 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <small class="text-gray-400">Format +32(0)</small>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <label for="email" class="block text-sm font-medium text-gray-700">Adresse mail</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <input type="email" name="email" id="email" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" placeholder="johndoe@exemple.be">
                </div>
            </div>
        </div>
    </div>
</section>
