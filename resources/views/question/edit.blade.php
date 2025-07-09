<x-layouts.app :title="__('Edit Questions :: ' . $question->id )">

    <x-form post :action="route('question.update', $question)" put>
        <x-textarea label="Question" name="question" :value="$question->question"/>
        <x-btn.primary type="submit">Save</x-btn.primary>
        <x-btn.reset type="reset">Cancel</x-btn.reset>
    </x-form>

</x-layouts.app>
