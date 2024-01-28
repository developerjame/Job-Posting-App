<x-layout>
    <x-card class="p-10">
        <header>
            <a href="/" class="inline-block text-black ml-4 mb-4"
            ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Jobs
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($jobs->isEmpty())
                @foreach($jobs as $job)
                <tr class="border-gray-300">
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a href="/jobs/{{$job->id}}">
                            {{$job->title}}
                        </a>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a
                            href="/jobs/{{$job->id}}/edit"
                            class="text-blue-400 px-6 py-2 rounded-xl"
                            ><i
                                class="fa-solid fa-pen-to-square"
                            ></i>
                            Edit</a
                        >
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                    <form method="POST" action="/jobs/{{$job->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-blue-500"><i class="fa-solid fa-trash">
                            Delete</i></button>
                    </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">No Jobs Found. <u><a class="text-underline" href="/jobs/create">Click here</a></u> to post a Jop</p>
                    </td>
                </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>