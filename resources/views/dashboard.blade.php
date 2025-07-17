<x-layouts.app :title="__('Vote for a question')">


    <hr class="border-gray-700 border-dashed my-4"/>


    <div>
        <h2 class="uppercase font-bold dark:text-gray-400 mb-1">List of questions</h2>

        @foreach($questions as $item)
            <x-question :question="$item"></x-question>
        @endforeach

        {{ $questions->links() }}

    </div>
</x-layouts.app>
