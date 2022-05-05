{{-- Assurance converage related stuff here --}}
<section class="md:grid md:grid-cols-3 md:gap-6 py-8 mt-4">
    <div class="md:col-span-1">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Couverture</h3>
        <p class="mt-1 text-sm text-gray-500">Les différentes options de couverture de votre responsabilité civile
            professionnelle.</p>
        <p class="mt-4 text-sm text-gray-500 max-w-[20rem]"> Si vous avez indiqué un <strong>secteur d'activité</strong>
            pour votre entreprise, certains éléments peuvent être prédéfinis selon nos recommandations. </p>
    </div>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="grid grid-cols-6 gap-x-6 gap-y-1">

            <div class="col-span-6 sm:col-span-3">
                <label for="assuranceCeilingCoverage" class="block text-sm font-medium text-gray-700">Plafond de la
                    couverture</label>
                <select id="assuranceCeilingCoverage" name="assuranceCeilingCoverage"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach(\App\Enum\ProfessionalLiability\CoverageDeductibleFormulaEnumeration::options() as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <label for="assuranceLegalExpense" class="block text-sm font-medium text-gray-700">Couverture de frais
                    juridique</label>
                <select id="assuranceLegalExpense" name="assuranceLegalExpense"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach(\App\Enum\ProfessionalLiability\CoverageLegalExpense::options() as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <ol class="col-span-6 sm:col-span-6 mt-4 list-disc mx-2 space-y-2">
                <li class="text-gray-500 text-sm">Le <strong>plafond de couverture</strong> correspond au montant
                    maximal de couverture de l'assurance civile professionnelle.
                    Il est recommandé d'adapter celui-ci en fonction du montant éventuel du préjudice, si celui-ci est
                    grand, prenez un plafond conséquent.
                </li>
                <li class="text-gray-500 text-sm">La <strong>couverture de frais juridique</strong> est une couverture
                    supplémentaire qui s'applique pour les frais éventuels de justice.
                    Nous vous conseillons de prendre cette couverture si votre entreprise peut être soumise à des frais
                    de justice importants.
                </li>
            </ol>
        </div>
    </div>
</section>
