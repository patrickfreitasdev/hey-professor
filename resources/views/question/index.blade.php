<x-layouts.app :title="__('My Questions')">

    <x-form post :action="route('question.store')">
        <x-textarea label="Question" name="question"/>
        <x-btn.primary type="submit">Save</x-btn.primary>
        <x-btn.reset type="reset">Cancel</x-btn.reset>
    </x-form>

    <hr class="border-gray-700 border-dashed my-4"/>


    <div>
        <h2 class="uppercase font-bold dark:text-gray-400 mb-1">Drafts</h2>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <x-table>
                <x-table.thead>
                    <tr>
                        <x-table.th>Question</x-table.th>
                        <x-table.th>Actions</x-table.th>
                    </tr>
                </x-table.thead>
                <tbody>

                @foreach($questions->where('draft', true) as $item)
                    <x-table.tr>
                        <x-table.td>{{$item->question}}</x-table.td>
                        <x-table.td>
                            <x-form :action="route('question.publish', $item)" put>
                                <button class="text-blue-500 hover:underline" type="submit">Publish</button>
                            </x-form>
                            <x-form :action="route('question.destroy', $item)" delete>
                                <button class="text-red-500 hover:underline" type="submit">Delete</button>
                            </x-form>
                        </x-table.td>
                    </x-table.tr>
                @endforeach

                </tbody>
            </x-table>
        </div>
    </div>

    <hr class="border-gray-700 border-dashed my-4"/>


    <div>
        <h2 class="uppercase font-bold dark:text-gray-400 mb-1">My Questions</h2>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <x-table>
                <x-table.thead>
                    <tr>
                        <x-table.th>Question</x-table.th>
                        <x-table.th>Actions</x-table.th>
                    </tr>
                </x-table.thead>
                <tbody>

                @foreach($questions->where('draft', false) as $item)
                    <x-table.tr>
                        <x-table.td>{{$item->question}}</x-table.td>
                        <x-table.td>
                            <x-form :action="route('question.destroy', $item)" delete>
                                <button class="text-red-500 hover:underline" type="submit">Delete</button>
                            </x-form>
                        </x-table.td>
                    </x-table.tr>
                @endforeach

                </tbody>
            </x-table>
        </div>
    </div>
</x-layouts.app>
