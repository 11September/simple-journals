@extends('layoults.layoult')

@section('css')
    {{--@php--}}
        {{--$text = iconv_strlen($page->body);--}}
        {{--$text = ( int ) $text;--}}
    {{--@endphp--}}

    {{--@if($text < 10000)--}}
        {{--<style>--}}
            {{--.footer{--}}
                {{--position: fixed;--}}
                {{--bottom: 0;--}}
            {{--}--}}
        {{--</style>--}}
    {{--@endif--}}
@endsection

@section('content')

    <div class="wrapper-page">
        <div class="text-center">
            
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">

                </div>
            </div>
            
        </div>
    </div>

@endsection
