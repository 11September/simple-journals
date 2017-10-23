@extends('layoults.layoult')

@section('css')

@endsection

@section('content')
    
@endsection

@section('scripts')
<script>

    var toPay = {!! $toPay !!};
    var redirectTo = '{!! $redirectTo !!}';

    $("document").ready( function(){
        console.log('aaaaa');
        $("#paypal-button-container").trigger('click');
    });

    
</script>
@endsection
