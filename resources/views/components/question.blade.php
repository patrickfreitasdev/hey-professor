@props([
    'question'
])

<div class="block w-full p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 my-2">
    {{ $question->question }}
</div>
