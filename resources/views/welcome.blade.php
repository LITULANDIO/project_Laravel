@extends('layouts.app')

@section('content')

<div class="jumbotron text-center">
    <h1>Laravel</h1>
    <nav> 
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
           
        <ul>
    <nav>
</div>

<div class="row">
    <form action="/messages/create" method="post">
        <div class="form-group @if($errors->has('message')) has-danger @endif">
        {{csrf_field()}}
            <input type="text" name="message" placeholder="Qué estás pensando?" class="form-control">
            @if ($errors->has('message'))
                @foreach ($errors->get('message') as $error)
                <div class="form-control-feedback">{{ $error }}</div>
                @endforeach
            @endif
        </div>
    </form>
</div>

<div class="row">
    @forelse($messages as $message)
        <div class="col-6">
           @include('messages.message')
    </div>
    @empty
        <p>No se encuentra contenido</p>
    @endforelse

    @if(count($messages))
    <div class="mt-2 mx-auto">
        {{ $messages->links('pagination::bootstrap-4')  }}
    </div>
    @endif
</div>
@endsection
