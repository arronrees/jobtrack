<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <a href="/users" class="p-2 flex items-center gap-2 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 stroke-black">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                Users
            </a>
        </div>

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <h1 class="text-xl font-semibold">Create User</h1>
        </div>

        <section>

            <form method="POST" action="/users" class="flex flex-col gap-6" enctype="multipart/form-data">
                @csrf

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="name" text="Name" :value="old('name')" />
                    </div>
                    <x-forms.row>
                        <x-forms.input-text name="name" id="name" :required="true" />
                        @error('name')
                            <x-forms.error>
                                {{ $message }}
                            </x-forms.error>
                        @enderror
                    </x-forms.row>
                </div>

                <hr>

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="email" text="Email" />
                    </div>
                    <x-forms.row>
                        <x-forms.input-text name="email" type="email" id="email" :required="true"
                            :value="old('email')" />
                        @error('email')
                            <x-forms.error>
                                {{ $message }}
                            </x-forms.error>
                        @enderror
                    </x-forms.row>
                </div>

                <hr>

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="role" text="Role" />
                    </div>
                    <x-forms.row>
                        <x-forms.select name="role" id="role" :required="true">
                            <option disabled selected value="">Select role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role }}"
                                    {{ old('role') === $role->value ? 'selected' : '' }}>
                                    {{ $role }}</option>
                            @endforeach
                        </x-forms.select>
                        @error('status')
                            <x-forms.error>
                                {{ $message }}
                            </x-forms.error>
                        @enderror
                    </x-forms.row>
                </div>

                <hr>

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <x-forms.row>
                        <x-forms.label class="opacity-60" for="avatar" text="Avatar" />
                        <p class="font-light opacity-60 text-xs">Accepted file types: jpg, png, webp</p>
                        <p class="font-light opacity-60 text-xs">Max file size: 5mb</p>
                    </x-forms.row>
                    <x-forms.row>
                        <x-forms.input-file name="avatar" id="avatar" />
                        @error('avatar')
                            <x-forms.error>
                                {{ $message }}
                            </x-forms.error>
                        @enderror
                    </x-forms.row>
                </div>

                <hr>

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="password" text="Password" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-forms.row>
                            <x-forms.input-text name="password" type="password" id="password" placeholder="Password"
                                :required="true" />
                            @error('password')
                                <x-forms.error>
                                    {{ $message }}
                                </x-forms.error>
                            @enderror
                        </x-forms.row>
                        <x-forms.row>
                            <x-forms.input-text name="password_confirmation" type="password" id="password_confirmation"
                                placeholder="Password confirmation" :required="true" />
                            @error('password_confirmation')
                                <x-forms.error>
                                    {{ $message }}
                                </x-forms.error>
                            @enderror
                        </x-forms.row>
                    </div>
                </div>

                <hr>

                <x-forms.row>
                    <x-forms.button text="Save" class="max-w-max ml-auto" />
                </x-forms.row>

            </form>

        </section>

    </div>

</x-layouts.auth>
