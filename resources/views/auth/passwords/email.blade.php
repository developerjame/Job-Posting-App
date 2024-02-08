<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Password Reset
                        </h2>
                        <p class="mb-4">Enter your email to send reset link</p>
                    </header>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        
                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2"
                                >Email</label
                            >
                            <input
                                type="email"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="email"
                                value="{{old('email')}}"
                            />
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <button
                                type="submit"
                                class="bg-primary text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Send
                            </button>
                            <a href="/login" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
    </x-card>
</x-layout>