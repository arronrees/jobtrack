<x-layouts.guest>

    <div class="flex items-center justify-center flex-col h-screen">
        <div class="mb-4">
            <svg class="w-16 h-auto" id="logo-72" width="52" height="44" viewBox="0 0 53 44" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M23.2997 0L52.0461 28.6301V44H38.6311V34.1553L17.7522 13.3607L13.415 13.3607L13.415 44H0L0 0L23.2997 0ZM38.6311 15.2694V0L52.0461 0V15.2694L38.6311 15.2694Z"
                    class="ccustom" fill="#212326"></path>
            </svg>
        </div>

        <x-card>
            <h1 class="text-lg font-semibold mb-6">Sign Up</h1>

            <form action="/register" method="POST" class="flex flex-col gap-4 sm:min-w-[375px] mb-6">
                @csrf

                <x-forms.row>
                    <x-forms.label for="name" text="Name" />
                    <x-forms.input-text name="name" id="name" :value="old('name')" />
                </x-forms.row>

                <x-forms.row>
                    <x-forms.label for="email" text="Email" />
                    <x-forms.input-text type="email" name="email" id="email" :value="old('email')" />
                </x-forms.row>

                <x-forms.row>
                    <x-forms.label for="password" text="Password" />
                    <x-forms.input-text type="password" name="password" id="password" />
                </x-forms.row>

                @error('name')
                    <x-forms.row>
                        <x-forms.error>
                            {{ $message }}
                        </x-forms.error>
                    </x-forms.row>
                @enderror
                @error('email')
                    <x-forms.row>
                        <x-forms.error>
                            {{ $message }}
                        </x-forms.error>
                    </x-forms.row>
                @enderror
                @error('password')
                    <x-forms.row>
                        <x-forms.error>
                            {{ $message }}
                        </x-forms.error>
                    </x-forms.row>
                @enderror

                <x-forms.row>
                    <x-forms.button text="Sign Up" />
                </x-forms.row>

            </form>

            <p class="text-sm">Already have an account? <a href="/login" class="font-bold">Sign In</a></p>

        </x-card>
    </div>

</x-layouts.guest>
