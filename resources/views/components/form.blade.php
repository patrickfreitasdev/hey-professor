@props([
    'action',
    'post' => null,
    'put' => null,
    'delete' => null
])


<form action="{{ $action }}" method="post" class="max-w-lg mx-auto">
    @csrf

    @if($put)
        @method('PUT')
    @endif

    @if($delete)
        @method('DELETE')
    @endif

    {{ $slot }}
</form>
