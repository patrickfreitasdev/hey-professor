<x-layouts.app :title="__('Dashboard')">

    <x-form post :action="route('question.store')">
        <x-textarea label="Question" name="question"/>
        <x-btn.primary type="submit">Save</x-btn.primary>
        <x-btn.reset type="reset">Cancel</x-btn.reset>
    </x-form>

</x-layouts.app>
