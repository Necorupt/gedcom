@extends('Layouts.app')

@section('content')

<div class="flex flex-col gap-5 p-12">
    <h1 class="text-3xl">Древо: {{$tree->name}}</h1>
    <h1 class="text-xl">ид: {{$tree->id}}</h1>

    <div class="flex">

    </div>
</div>
@endsection
