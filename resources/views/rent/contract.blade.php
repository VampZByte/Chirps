<script>
function printContract() {
    const printContent = document.getElementById('contract').innerHTML;
    const originalContent = document.body.innerHTML;

    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
    location.reload(); // Optional: to reload page and restore layout/events
}
</script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            Car Rental Agreement and Contract
        </h2>
    </x-slot>
    
<div id="contract">
    <div class="max-w-4xl mx-auto p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold text-center mb-6">CAR RENTAL AGREEMENT AND CONTRACT</h1>

        <p>This Car Rental Agreement (“Agreement”) is entered into on this {{ \Carbon\Carbon::parse($rent->created_at)->format('jS') }} day of {{ \Carbon\Carbon::parse($rent->created_at)->format('F, Y') }}, by and between:</p>

        <h3 class="font-bold mt-4">Renter:</h3>
        <p>Name: {{ $rent->customer->customer_fname }} {{ $rent->customer->customer_lname }}</p>
        <p>Age: {{ $rent->customer->age ?? 'N/A' }}</p>
        <p>Address: {{ $rent->customer->address ?? 'N/A' }}</p>
        <p>Phone: {{ $rent->customer->phone ?? 'N/A' }}</p>
        <p>Driver's License Picture: {{ $rent->customers->license_pic ?? 'N/A' }}</p>

        <hr class="my-4">

        <h3 class="font-bold">1. Vehicle Details</h3>
        <p>Brand: {{ $rent->car->brand }}</p>
        <p>Model: {{ $rent->car->model }}</p>
        <p>Plate Number: ABCD-{{ $rent->car->id }}</p>
        <p>Year: {{ $rent->car->year }}</p>
        <p>Color: {{ $rent->car->color }}</p>

        <hr class="my-4">

        <h3 class="font-bold">2. Rental Term</h3>
        <p>Start Date: {{ \Carbon\Carbon::parse($rent->Rent_Date)->format('F j, Y') }}</p>
        <p>End Date: {{ \Carbon\Carbon::parse($rent->Return_Date)->format('F j, Y') }}</p>
        <p>Total Rental Days: {{ $totalDays }} days</p>

        <hr class="my-4">

        <h3 class="font-bold">3. Rental Fee</h3>
        <p>Daily Rate: ₱{{ number_format($rent->car->rental_price, 2) }}</p>
        <p>Total Fee: ₱{{ number_format($rent->Total_Price, 2) }}</p>
        <p class="text-sm text-red-600">Full payment must be made before the vehicle is released.</p>

        <hr class="my-4">

        <h3 class="font-bold">4. Fuel Policy</h3>
        <p> {{ $rent->fuel_policy === 'full_to_full' ? 'Full-to-Full' : 'Same level as rented' }}</p>

        <hr class="my-4">

        <h3 class="font-bold">5. Use of Vehicle</h3>
        <p>The renter agrees the vehicle:</p>
        <ul class="list-disc pl-6">
            <li>- Will not be used for illegal purposes or racing</li>
        </ul>

        <hr class="my-4">

        <h3 class="font-bold">6. Responsibility for Damage</h3>
        <ul class="list-disc pl-6">
            <li>- Any damage or loss (excluding normal wear and tear)</li>
            <li>- Traffic violations, fines, or toll charges</li>
            <li>- Accidents, unless caused by a manufacturing defect or owner's fault</li>
        </ul>

        <hr class="my-4">

        <h3 class="font-bold">7. Insurance (if applicable)</h3>
        <p> {{ $rent->insurance_covered === 'yes' ? 'The vehicle is covered by insurance.' : 'No insurance coverage declared.' }}</p>
        <p>Insurance Provider: {{ $rent->insurance_provider ?? 'N/A' }}</p>

        <hr class="my-4">

        <h3 class="font-bold">8. Return Condition</h3>
        <ul class="list-disc pl-6">
            <li>- Vehicle must be returned on the agreed date and time</li>
            <li>- Clean and in the same condition as when rented</li>
            <li>- With all accessories (jack, tools, documents, etc.)</li>
        </ul>
        <p>Late returns may result in extra charges of ₱500 per day.</p>

        <hr class="my-4">

        <h3 class="font-bold">9. Termination</h3>
        <p>- The owner may terminate this agreement without refund if the renter violates any terms. Early termination by the renter will not be refunded unless agreed otherwise.</p>

        <hr class="my-4">

        <h3 class="font-bold">10. Signatures</h3>
        <p>Owner Signature: _________________________ Date: ____________</p>
        <p>Renter Signature: ________________________ Date: ____________</p>

        <div class="flex justify-end mt-6">
           <button onclick="printContract()" class="bg-black-600 text-black px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Print Agreement
            </button>
        </div>
    </div>
</div>  
</x-app-layout>