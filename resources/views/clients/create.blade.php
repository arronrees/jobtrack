<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <a href="/clients" class="p-2 flex items-center gap-2 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 stroke-black">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                Clients
            </a>
        </div>

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <h1 class="text-xl font-semibold">Create Client</h1>
        </div>

        <div>

            <form method="POST" action="/clients" class="flex flex-col gap-6" enctype="multipart/form-data">
                @csrf

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="name" text="Client name" />
                    </div>
                    <x-forms.row>
                        <x-forms.input-text name="name" id="name" :required="true" :value="old('name')" />
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
                        <x-forms.label class="opacity-60" for="contact_name" text="Client Contact" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <x-forms.row>
                            <x-forms.input-text name="contact_name" id="contact_name" :required="true"
                                placeholder="Contact Name" :value="old('contact_name')" />
                            @error('contact_name')
                                <x-forms.error>
                                    {{ $message }}
                                </x-forms.error>
                            @enderror
                        </x-forms.row>
                        <x-forms.row>
                            <x-forms.input-text name="contact_telephone" id="contact_telephone" :required="true"
                                placeholder="Telephone" :value="old('contact_telephone')" />
                            @error('contact_telephone')
                                <x-forms.error>
                                    {{ $message }}
                                </x-forms.error>
                            @enderror
                        </x-forms.row>
                        <x-forms.row>
                            <x-forms.input-text name="contact_email" id="contact_email" :required="true"
                                placeholder="Email" :value="old('contact_email')" />
                            @error('contact_email')
                                <x-forms.error>
                                    {{ $message }}
                                </x-forms.error>
                            @enderror
                        </x-forms.row>
                    </div>
                </div>

                <hr>

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="notes" text="Notes" />
                    </div>
                    <x-forms.row>
                        <x-forms.input-textarea name="notes" id="notes" :value="old('notes')" />
                        @error('notes')
                            <x-forms.error>
                                {{ $message }}
                            </x-forms.error>
                        @enderror
                    </x-forms.row>
                </div>

                <hr>

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="website" text="Website" />
                    </div>
                    <x-forms.row>
                        <x-forms.input-text name="website" id="website" :value="old('website')" />
                        @error('website')
                            <x-forms.error>
                                {{ $message }}
                            </x-forms.error>
                        @enderror
                    </x-forms.row>
                </div>

                <hr>

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="logo" text="Logo" />
                        <p class="font-light opacity-60 text-xs">Accepted file types: jpg, png, webp</p>
                        <p class="font-light opacity-60 text-xs">Max file size: 5mb</p>
                    </div>
                    <x-forms.row>
                        <x-forms.input-file name="logo" id="logo" />
                        @error('logo')
                            <x-forms.error>
                                {{ $message }}
                            </x-forms.error>
                        @enderror
                    </x-forms.row>
                </div>

                <hr>

                <x-forms.row>
                    <x-forms.button text="Save" class="max-w-max ml-auto" />
                </x-forms.row>

            </form>

        </div>

    </div>

</x-layouts.auth>
