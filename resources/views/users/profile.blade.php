<x-layout>
    
    <a href="/" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
    <x-card class="p-10">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
    
            
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    USER PROFILE
                </h3>
                <div class="text-lg space-y-6">
                    
                    <table>
                    <tr>
                        <td>
                        <p><b>Name: </b>
                            {{auth()->user()->name}}
                        </p>
                        </td>
                    </tr>
                    <tr>
                        
                        <p><b>Email: </b>
                            {{auth()->user()->email}}
                        </p>
                        
                    </tr>
                    </table>
    
                    <a
                        href="/edit-profile"
                        class="block bg-primary text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        >
                        Edit Profile</a
                    >
                    <a
                        href="/change-password"
                        class="block bg-primary text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        >
                        Change Password</a
                    >
    
                </div>
            </div>
        </div>
    </x-card>
    
    {{--<x-card class="mt-4 p-2 flex space-x-6">
      <a href="/listings/{{$listing->id}}/edit">
        <i class="fa-solid fa-pencil"></i>Edit
    </a>
    <form method="POST" action="/listings/{{$listing->id}}">
        @csrf
        @method('DELETE')
        <button class="text-red-500"><i class="fa-solid fa-trash">
            Delete</i></button>
    </form>
    </x-card>--}}
    </div>
    </x-layout>