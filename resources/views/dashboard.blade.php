<x-layouts.app :title="__('Vote for a question')">

    <form method="get" class="max-w-full mx-auto flex items-center gap-2 w-full">
        <div class="mb-5 flex-1">
            <label for="search" class="block text-sm font-medium text-gray-900 dark:text-white">Question</label>
            <input value="{{ request()->search }}" type="text" id="search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for a question"  />
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </form>

    <hr class="border-gray-700 border-dashed my-4"/>


    <div>
        <h2 class="uppercase font-bold dark:text-gray-400 mb-1">List of questions</h2>
        @if($questions->isEmpty())
            <p class="mt-3 mx-auto text-center w-full">No questions found</p>
        @else
            @foreach($questions as $item)
                <x-question :question="$item"></x-question>
            @endforeach
            {{ $questions->withQueryString()->links() }}
        @endif
    </div>
</x-layouts.app>
