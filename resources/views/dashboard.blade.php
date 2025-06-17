<x-layouts.app :title="__('Dashboard')">

    <x-form post :action="route('question.store')">
        <x-textarea label="Question" name="question"/>
        <x-btn.primary type="submit">Save</x-btn.primary>
        <x-btn.reset type="reset">Cancel</x-btn.reset>
    </x-form>

    <hr class="border-gray-700 border-dashed my-4"/>


    <div>
        <h2 class="uppercase font-bold dark:text-gray-400 mb-1">List of questions</h2>

        @foreach($questions as $item)
            <x-question :question="$item"></x-question>
        @endforeach

    </div>
</x-layouts.app>
