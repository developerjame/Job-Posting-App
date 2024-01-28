<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Change Password
                        </h2>
                        
                    </header>

                    <form method="POST" action="/change-password">
                        @csrf

                        <div class="mb-6">
                            <label for="current_password" class="inline-block text-lg mb-2"
                                >Current Password</label
                            >
                            <input
                                type="password"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="current_password"
                                
                            />
                            @error('current_password')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="new_password" class="inline-block text-lg mb-2"
                                >New Password</label
                            >
                            <input
                                type="password"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="new_password"
                                
                            />
                            @error('new_password')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>


                        <div class="mb-6">
                            <button
                                type="submit"
                                class="bg-primary text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Update Password
                            </button>
                            <a href="/users/profile" class="text-black ml-4"> Back </a>
                        </div>

                    </form>
    </x-card>
</x-layout>