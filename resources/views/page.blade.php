@extends('layoults.layoult')

@section('css')

@endsection

@section('content')

    <div class="wrapper-body">
        <div class="text-center">
            @if($page->image)
                <div class="image">
                    <img src="{{ asset('storage/' . $page->image) }}"
                         alt="{{ $page->title }}"
                         style="width: 100%;">
                </div>
            @endif

            <div class="content">
                {!! $page->body !!}
            </div>
        </div>
    </div>

@endsection
