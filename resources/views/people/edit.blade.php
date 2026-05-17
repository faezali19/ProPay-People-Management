<!DOCTYPE html>
<html>
<head>
    <title>ProPay | Edit Person</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%)">

    <x-navbar />

    <div class="max-w-3xl mx-auto px-6 py-8">
        <h1 class="text-white text-2xl font-bold mb-6">Edit Person</h1>

        <x-error-list />

        <div class="bg-white/95 rounded-xl shadow-2xl p-8">
            <form action="{{ route('people.update', $person->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <x-input-field label="Name" name="name" :value="$person->name" />
                    <x-input-field label="Surname" name="surname" :value="$person->surname" />
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <x-input-field label="SA ID Number" name="sa_id_number" :value="$person->identityDocument->sa_id_number ?? ''" />
                    <x-input-field label="Mobile Number" name="mobile_number" :value="$person->contactDetail->mobile_number ?? ''" />
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <x-input-field label="Email Address" name="email_address" type="email" :value="$person->contactDetail->email_address ?? ''" />
                    <x-input-field label="Birth Date" name="birth_date" type="date" :value="$person->birth_date" />
                </div>

                <div class="mb-4">
                    <x-select-field label="Language" name="language_id" :options="$languages" :selected="$person->language_id" />
                </div>

                <div class="mb-6">
                    <x-multi-select label="Interests" name="interests" :options="$interests" :selected="$person->interests->pluck('id')->toArray()" />
                </div>

                <div class="flex gap-3">
                    <x-primary-button label="Update Person" />
                    <x-secondary-button href="{{ route('people.index') }}" label="Cancel" />
                </div>

            </form>
        </div>
    </div>

</body>
</html>