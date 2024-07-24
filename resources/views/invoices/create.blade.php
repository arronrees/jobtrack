<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <a href="/invoices" class="p-2 flex items-center gap-2 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 stroke-black">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                Invoices
            </a>
        </div>

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <h1 class="text-xl font-semibold">Create Invoice</h1>
        </div>

        <div>

            <form method="POST" action="/invoices" class="flex flex-col gap-6">
                @csrf

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="name" text="Invoice Name" />
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
                        <x-forms.label class="opacity-60" for="amount" text="Amount" />
                    </div>
                    <x-forms.row>
                        <x-forms.input-text name="amount" id="amount" :required="true" :value="old('amount')" />
                        @error('amount')
                            <x-forms.error>
                                {{ $message }}
                            </x-forms.error>
                        @enderror
                    </x-forms.row>
                </div>

                <hr>

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="job_id" text="Job" />
                    </div>
                    <x-forms.row>
                        <x-forms.select name="job_id" id="job_id" :required="true" :value="old('job_id')">
                            <option disabled selected value="">Select Job</option>
                            @foreach ($jobs as $job)
                                <option value="{{ $job->id }}" {{ $job->id == old('job_id') ? 'selected' : '' }}>
                                    {{ $job->name }}</option>
                            @endforeach
                        </x-forms.select>
                        @error('job')
                            <x-forms.error>
                                {{ $message }}
                            </x-forms.error>
                        @enderror
                    </x-forms.row>
                </div>

                <hr>

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="status" text="Status" :value="old('status')" />
                    </div>
                    <x-forms.row>
                        <x-forms.select name="status" id="status" :required="true" :value="old('status')">
                            <option disabled selected value="">Select Invoice Status</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                                    {{ $status }}</option>
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
                        <x-forms.label class="opacity-60" for="private_notes" text="Private Notes" />
                    </div>
                    <x-forms.row>
                        <x-forms.input-textarea name="private_notes" id="private_notes" :value="old('private_notes')" />
                        @error('private_notes')
                            <x-forms.error>
                                {{ $message }}
                            </x-forms.error>
                        @enderror
                    </x-forms.row>
                </div>

                <hr>

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="invoice_date" text="Invoice Date" />
                    </div>
                    <x-forms.row>
                        <x-forms.input-date name="invoice_date" id="invoice_date" :value="old('invoice_date')" />
                        @error('invoice_date')
                            <x-forms.error>
                                {{ $message }}
                            </x-forms.error>
                        @enderror
                    </x-forms.row>
                </div>

                <hr>

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="due_date" text="Due Date" />
                    </div>
                    <x-forms.row>
                        <x-forms.input-date name="due_date" id="due_date" :value="old('due_date')" />
                        @error('due_date')
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
