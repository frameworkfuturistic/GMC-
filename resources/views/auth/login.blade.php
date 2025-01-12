<x-guest-layout>
    <x-jet-authentication-card>
        <!-- <x-slot name="logo">
            
        </x-slot> -->

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <div class="container-fluid bg-green">
            <div class="row">
                <div class="col-md-6">
                    <img src="img/login.jpeg" alt="" style="width: 100%;">
                </div>
                <div class="col-md-6">
                    <form method="POST" action="{{ route('login') }}" style="margin-top:50px;">
                        @csrf

                        <div>
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-jet-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-10">

                            &nbsp; &nbsp;
                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif

                            <!-- <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button> -->
                            <button class="btn btn-success ml-4">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>