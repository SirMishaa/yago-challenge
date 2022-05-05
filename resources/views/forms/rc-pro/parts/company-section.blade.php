{{-- Compagny related stuff here --}}
<section class="md:grid md:grid-cols-3 md:gap-6 py-8 mt-8">
    <div class="md:col-span-1">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Information société</h3>
        <p class="mt-1 text-sm text-gray-500">Les informations exactes de votre société.</p>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="grid grid-cols-6 gap-x-6 gap-y-1">
            <div class="col-span-6 sm:col-span-3">
                <label for="companyName" class="block text-sm font-medium text-gray-700">Nom légal de l'entreprise</label>
                <input type="text" name="companyName" id="companyName" autocomplete="companyName" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-3">
                <label for="companyNumber" class="block text-sm font-medium text-gray-700">Numéro d'identification d'entreprise</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="text" name="companyNumber" id="companyNumber" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-10 sm:text-sm border-gray-300 rounded-md" placeholder="0-000-00-0000">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <small class="text-gray-400">10 caractères. Les tirets sont facultatifs</small>
            </div>

            <div class="col-span-6 sm:col-span-2">
                <label for="companyAnnualIncome" class="block text-sm font-medium text-gray-700">Revenu annuel de l'entreprise (€)</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <!-- Heroicon name: solid/mail -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.121 15.536c-1.171 1.952-3.07 1.952-4.242 0-1.172-1.953-1.172-5.119 0-7.072 1.171-1.952 3.07-1.952 4.242 0M8 10.5h4m-4 3h4m9-1.5a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <input min="0" type="number" name="companyAnnualIncome" id="companyAnnualIncome" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-10 sm:text-sm border-gray-300 rounded-md" placeholder="80000">
                </div>
            </div>

            <div class="col-span-6 sm:col-span-2">
                <label for="companyType" class="block text-sm font-medium text-gray-700">Type d'entreprise</label>
                <select id="companyType" name="companyType" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option>Société (personne morale)</option>
                    <option>Entreprise individuelle (personne physique)</option>
                </select>
            </div>

            <div class="col-span-6 sm:col-span-2">
                <label for="companyActivityKind" class="block text-sm font-medium text-gray-700">Secteur d'activité</label>
                <select id="companyActivityKind" name="companyActivityKind" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach(\App\Enum\ProfessionalLiability\CompanyActivityKind::options() as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-6 sm:col-span-6 mt-4">
                <label for="companyNaceBelCode" class="block text-sm font-medium text-gray-700">Code NACE-BEL (2008)</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="text" name="companyNaceBelCode" id="companyNaceBelCode" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-10 sm:text-sm border-gray-300 rounded-md" placeholder="26600, 32500, ...">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <small class="text-gray-400">Attention, il est nécessaire ici d'entrer les codes
                    <a
                        class="text-blue-400"
                        target="_blank"
                        href="https://statbel.fgov.be/fr/propos-de-statbel/methodologie/classifications/nace-bel-2008">
                        NACE-BEL de niveau 5
                    </a>
                </small>
            </div>
        </div>
    </div>
</section>
