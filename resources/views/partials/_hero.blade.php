<section
            class="relative h-72 bg-primary flex flex-col justify-center align-center text-center space-y-4 mb-4"
        >
            <div
                class="absolute top-0 left-0 w-full h-full opacity-30 bg-no-repeat bg-center"
                style="background-image: url('images/laravel-logo1.jpg')"
            ></div>

            @auth
            <div class="z-10">
                <h1 class="text-6xl font-bold uppercase text-white">
                    Software<span class="text-black">Tech</span>
                </h1>
                <p class="text-2xl text-gray-200 font-bold my-4">
                    Find or post Software Development jobs & projects
                </p>
            </div>
            @else
            <div class="z-10">
                <h1 class="text-6xl font-bold uppercase text-white ">
                    Software<span class="text-black">Tech</span>
                </h1>
                <p class="text-2xl text-gray-200 font-bold my-4">
                    Find or post Software Development jobs & projects
                </p>
                <div>
                    <a
                        href="/login"
                        class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                        >Sign In to Post a Job</a
                    >
                </div>
            </div>
            @endauth

        </section>