@props([
    'question'
])

<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 my-2 flex justify-between items-center gap-4">
    <span>{{ $question->question }}</span>
    <div>
        <x-form :action="route('question.like', $question)">
            <button type="submit" class="flex items-center gap-2 text-green-500"><x-icons.thumbs-up class="w-5 h-5  hover:text-green-200 cursor-pointer" /><span>{{ $question->likes  }}</span></button>
        </x-form>

        <x-form :action="route('question.unlike', $question)">
            <button type="submit"  class="flex items-center gap-2 text-red-500"><x-icons.thumbs-down class="w-5 h-5  hover:text-red-200 cursor-pointer" /><span>{{ $question->unlikes  }}</span></button>
        </x-form>
    </div>
</div>
