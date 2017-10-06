@extends('layoults.layoult')

@section('css')

@endsection

@section('content')

    <div class="text-center">
        @if($journal->image)
            <div class="image">
                <img src="{{ asset('storage/' . $journal->image) }}"
                     alt="{{ $journal->title }}"
                     style="width: 100%;">
            </div>
        @endif

        <div class="content">
            {!! $journal->description !!}
        </div>
    </div>

@endsection
