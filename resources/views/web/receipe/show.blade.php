@extends('layouts.app')

@section('content')
    @livewire('web.receipe.show', compact('receipe'))
@endsection
