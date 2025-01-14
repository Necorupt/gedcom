@extends('Layouts.app')

@section('content')


<div class="flex flex-col gap-4 p-12">

    <h1 class="text-3xl">Import Tree</h1>
    <form method="POST" action="/api/tree/import" enctype="multipart/form-data"
    class="flex flex-col gap-5">
        @csrf

        <input type="text" name="name" placeholder="name" class="border-2">
        <input type="file" name="tree_file">

        <button type="submit" class="border-2">Import Tree</button>

        @error('tree_file')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </form>
</div>

<div class="flex flex-col p-12">
    <h1 class="text-3xl"> Деревья </h1>

    @foreach ($trees as $tree)
        <a class="p-4 border-2" href="{{route('treePage', ['id' => $tree->id])}}">
            <div class="flex flex-col gap-4">
                <h2>{{ $tree->name }}</h2>
                <!--<p>Количество узлов: {{ $tree->nodes->count() }}</p> !-->
            </div>
        </a>
    @endforeach
</div>

@endsection
