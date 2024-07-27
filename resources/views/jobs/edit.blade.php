<x-layouts.auth>

    <div class="p-6">

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <a href="/jobs/{{ $job->id }}" class="p-2 flex items-center gap-2 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 stroke-black">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                Back to Job
            </a>
        </div>

        <div class="flex gap-4 flex-wrap items-center justify-between mb-6">
            <h1 class="text-xl font-semibold">{{ $job->name }}</h1>
        </div>

        <div>

            <form method="POST" action="/jobs/{{ $job->id }}" class="flex flex-col gap-6">
                @csrf
                @method('PUT')

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="name" text="Job Name" />
                    </div>
                    <x-forms.row>
                        <x-forms.input-text name="name" id="name" :required="true" :value="$job->name" />
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
                        <x-forms.label class="opacity-60" for="Cost" text="Cost" />
                    </div>
                    <x-forms.row>
                        <x-forms.input-text name="cost" id="cost" :required="true" :value="$job->cost" />
                        @error('cost')
                            <x-forms.error>
                                {{ $message }}
                            </x-forms.error>
                        @enderror
                    </x-forms.row>
                </div>

                <hr>

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="user_id" text="User" />
                    </div>
                    <x-forms.row>
                        <x-forms.select name="user_id" id="user_id" :required="true">
                            <option disabled selected value="">Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $job->user_id ? 'selected' : '' }}>
                                    {{ $user->name }}</option>
                            @endforeach
                        </x-forms.select>
                        @error('user')
                            <x-forms.error>
                                {{ $message }}
                            </x-forms.error>
                        @enderror
                    </x-forms.row>
                </div>

                <hr>

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="client_id" text="Client" />
                    </div>
                    <x-forms.row>
                        <x-forms.select name="client_id" id="client_id" :required="true">
                            <option disabled selected>Select Client...</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}"
                                    {{ $client->id == $job->client_id ? 'selected' : '' }}>{{ $client->name }}
                                </option>
                            @endforeach
                        </x-forms.select>
                        @error('client')
                            <x-forms.error>
                                {{ $message }}
                            </x-forms.error>
                        @enderror
                    </x-forms.row>
                </div>

                <hr>

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="type" text="Job Type" />
                    </div>
                    <x-forms.row>
                        <x-forms.select name="type" id="type" :required="true">
                            <option disabled selected value="">Select Job Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type }}"
                                    {{ $job->type == $type->value ? 'selected' : '' }}>
                                    {{ $type }}</option>
                            @endforeach
                        </x-forms.select>
                        @error('type')
                            <x-forms.error>
                                {{ $message }}
                            </x-forms.error>
                        @enderror
                    </x-forms.row>
                </div>

                <hr>

                <div class="grid md:grid-cols-[1fr,1fr] gap-2">
                    <div>
                        <x-forms.label class="opacity-60" for="status" text="Status" />
                    </div>
                    <x-forms.row>
                        <x-forms.select name="status" id="status" :required="true">
                            <option disabled selected value="">Select Job Status</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status }}"
                                    {{ $job->status == $status->value ? 'selected' : '' }}>
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
                        <x-forms.input-textarea name="notes" id="notes" :value="$job->notes" />
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
                        <x-forms.label class="opacity-60" for="due_date" text="Due Date" />
                    </div>
                    <x-forms.row>
                        <x-forms.input-date name="due_date" id="due_date" :value="date_format(date_create($job->due_date), 'Y-m-d')" />
                        @error('due_date')
                            <x-forms.error>
                                {{ $message }}
                            </x-forms.error>
                        @enderror
                    </x-forms.row>
                </div>

                <hr>

                <x-forms.row>
                    <x-forms.button text="Update" class="max-w-max ml-auto" />
                </x-forms.row>

            </form>

        </div>

    </div>

</x-layouts.auth>
