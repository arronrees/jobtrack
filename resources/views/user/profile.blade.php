<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <h1 class="text-xl font-semibold">Profile</h1>
        </div>

        <section>

            <form method="POST" action="/profile" class="flex flex-col gap-6">
                @csrf
                @method('PUT')

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="name" text="Your name" />
                    </div>
                    <x-forms.row>
                        <x-forms.input-text name="name" id="name" :required="true" :value="$user->name" />
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
                            :value="$user->email" />
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
                        <x-forms.label class="opacity-60" for="password" text="Password" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-forms.row>
                            <x-forms.input-text name="password" type="password" id="password" :required="true"
                                placeholder="Password" />
                            @error('password')
                                <x-forms.error>
                                    {{ $message }}
                                </x-forms.error>
                            @enderror
                        </x-forms.row>
                        <x-forms.row>
                            <x-forms.input-text name="password_confirmation" type="password" id="password_confirmation"
                                :required="true" placeholder="Password confirmation" />
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
                    <x-forms.button text="Update" class="max-w-max ml-auto" />
                </x-forms.row>

            </form>

        </section>

    </div>

</x-layouts.auth>
