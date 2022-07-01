<x-app-layout>
    <x-slot name="header">
    </x-slot>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 bg-white dark:bg-gray-900 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="http://localhost/atte3pj/time.php""class="btn">勤務開始</a>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="mt-2 text-gray-700 dark:text-gray-400 text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-700 dark:border-gray-900 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="http://localhost/atte3pj/time.php"class="btn">勤務終了</a>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="mt-2 text-gray-700 dark:text-gray-900 text-sm">
                            </div>
                        </div>
                    </div>


                    <div class="p-6 border-t border-gray-700 dark:border-gray-900">
                        <div class="flex items-center">
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="http://localhost/atte3pj/time.php"class="btn">休憩開始</a>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="mt-2 text-gray-700 dark:text-gray-900 text-sm">
                            </div>
                        </div>
                    </div>


                    <div class="p-6 border-t border-gray-700 dark:border-gray-900 md:border-l">
                        <div class="flex items-center">
                            <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">
                                <a href="http://localhost/atte3pj/time.php"class="btn">休憩終了</a>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                </div>
            <div class="bg-black  overflow-hidden shadow-sm sm:rounded-lg">
                Laravelv{{Illuminate\Foundation\Application::VERSION}}(PHPv{{PHP_VERSION}})
            </div>
</x-app-layout>
