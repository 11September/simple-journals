@extends('layoults.layoult')

@section('css')
    <style>
        /*.navbar-brand {*/
            /*display: none;*/
        /*}*/

        #logo-block{

        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div id="logo-block" class="col-lg-12">
            <img src="{{ asset('images/Logo-Cosmo-Press.png') }}">
        </div>
    </div>

    <div class="wrapper-body">
        <div class="row">

            @foreach($journals as $journal)

                <div class="col-md-4">
                    <div class="wrapper-item">
                        <div class="item">
                            <a href="{{ action('JournalsController@show', $journal->id) }}">
                                <img src="{{ asset('storage/' . $journal->image) }}" alt="{{ $journal->name }}">
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
            
        </div>

        <div class="row center-pagination">
            <nav aria-label="Page navigation example">
                <div class="justify-content-center">
                    {{ $journals->links() }}
                </div>
            </nav>
        </div>
        
    </div>

    

    
@endsection

@section('scripts')    
    <script>        
        $(document).ready(function(){
            function isVisible( row, container ){

                var elementTop = $(row).offset().top,
                    elementHeight = $(row).height(),
                    containerTop = container.scrollTop(),
                    containerHeight = container.height(),
                    navbarTop = $("#navbar").offset().top,
                    navbarHeight = $("#navbar").height();

                return ((((elementTop - navbarTop * 0.45 - containerTop) + elementHeight - navbarHeight * 0.45) > 0) && ((elementTop - navbarTop * 0.45 - containerTop) < containerHeight));
            }

            $(window).scroll(function(){
                if( !( isVisible($("#logo-block"), $(window)) ) ){
                    $("#navbar-logo").css("display", "inline-block");
                    $("#navbar-logo").addClass('w3-animate-zoom');
                }else {
                    $("#navbar-logo").css("display", "none");
                };
            });
        });
    </script>
@endsection