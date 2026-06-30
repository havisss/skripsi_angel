<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="profile_photo" value="Foto Profil" />
            
            <div class="mt-2 flex items-center gap-x-4">
                @if($user->profile_photo)
                    <img class="h-16 w-16 rounded-full object-cover shadow-sm border border-gray-200" src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo">
                @else
                    <div class="h-16 w-16 rounded-full bg-kop-light flex items-center justify-center text-kop-green shadow-sm border border-kop-green/20">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                    </div>
                @endif
                <div class="flex-1">
                    <x-text-input id="profile_photo" name="profile_photo" type="file" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-kop-light file:text-kop-green hover:file:bg-kop-green/20 cursor-pointer transition" accept="image/*" />
                </div>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="bank_name" value="Nama Bank" />
            <select id="bank_name" name="bank_name" class="mt-1 block w-full border-gray-200 text-gray-900 bg-white focus:border-kop-green focus:ring-kop-green rounded-xl shadow-sm px-4 py-3 transition duration-200">
                <option value="" class="text-black bg-white">Pilih Bank...</option>
                <option value="BCA" class="text-black bg-white" {{ old('bank_name', $user->bank_name) == 'BCA' ? 'selected' : '' }}>BCA (Bank Central Asia)</option>
                <option value="Mandiri" class="text-black bg-white" {{ old('bank_name', $user->bank_name) == 'Mandiri' ? 'selected' : '' }}>Bank Mandiri</option>
                <option value="BNI" class="text-black bg-white" {{ old('bank_name', $user->bank_name) == 'BNI' ? 'selected' : '' }}>BNI (Bank Negara Indonesia)</option>
                <option value="BRI" class="text-black bg-white" {{ old('bank_name', $user->bank_name) == 'BRI' ? 'selected' : '' }}>BRI (Bank Rakyat Indonesia)</option>
                <option value="BSI" class="text-black bg-white" {{ old('bank_name', $user->bank_name) == 'BSI' ? 'selected' : '' }}>BSI (Bank Syariah Indonesia)</option>
                <option value="BTN" class="text-black bg-white" {{ old('bank_name', $user->bank_name) == 'BTN' ? 'selected' : '' }}>BTN (Bank Tabungan Negara)</option>
                <option value="CIMB Niaga" class="text-black bg-white" {{ old('bank_name', $user->bank_name) == 'CIMB Niaga' ? 'selected' : '' }}>CIMB Niaga</option>
                <option value="Danamon" class="text-black bg-white" {{ old('bank_name', $user->bank_name) == 'Danamon' ? 'selected' : '' }}>Bank Danamon</option>
                <option value="Permata" class="text-black bg-white" {{ old('bank_name', $user->bank_name) == 'Permata' ? 'selected' : '' }}>Permata Bank</option>
                <option value="Lainnya" class="text-black bg-white" {{ old('bank_name', $user->bank_name) == 'Lainnya' ? 'selected' : '' }}>Bank Lainnya</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('bank_name')" />
        </div>

        <div>
            <x-input-label for="bank_account_number" value="Nomor Rekening" />
            <x-text-input id="bank_account_number" name="bank_account_number" type="text" class="mt-1 block w-full" :value="old('bank_account_number', $user->bank_account_number)" placeholder="Contoh: 1234567890" />
            <x-input-error class="mt-2" :messages="$errors->get('bank_account_number')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
