@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager.generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->display_name_singular)

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager.generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    
<script src="https://use.fontawesome.com/cbd5cc9d38.js"></script>

    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form id="mainForm" 
                          role="form"
                          class="form-edit-add"
                          action="@if(isset($dataTypeContent->id)){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->id) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
                          method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                    @if(isset($dataTypeContent->id))
                        {{ method_field("PUT") }}
                    @endif

                    <!-- CSRF TOKEN -->
                        {{ csrf_field() }}
                    
                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};
                            @endphp

                            @foreach($dataTypeRows as $row)

                                @php
                                    $options = json_decode($row->details);
                                    $display_options = isset($options->display) ? $options->display : NULL;
                                @endphp

                                @if ($options && isset($options->formfields_custom))
                                    @include('voyager::formfields.custom.' . $options->formfields_custom)
                                @else
                                    <div class="form-group @if($row->type == 'hidden') hidden @endif @if(isset($display_options->width)){{ 'col-md-' . $display_options->width }}@else{{ '' }}@endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                        {{ $row->slugify }}
                                        <label for="name">{{ $row->display_name }}</label>
                                        @include('voyager::multilingual.input-hidden-bread-edit-add')
                                        @if($row->type == 'relationship')
                                           @include('voyager::formfields.relationship')
                                        @else
                                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                        @endif

                                        @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                            {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach                            
                            <input type="hidden" name="newAds" id="newAds">
                            <input type="hidden" name="positionsToDelete" id="positionsToDelete">
                            <div id="position-images" style="display: none;"></div>                            
                        </div>
                        <!-- panel-body -->                        
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                          enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                               onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>

                <div class="panel panel-bordered">

                    <div class="col-md-12">
                        <h2 id="new-position-header">Add New Position</h2>
                    </div>

                    <div class="recently-added-position panel-body" style="height: 300px; padding-bottom: 30px;">
                        
                        <div class="new-position-img col-lg-4" style="height: 100%; margin: 0 0 20px; border: 1px solid grey;">
                            <img id="new-position-img-view" src="" alt="Position Image" style="height: 100%; width: 100%"">                            
                        </div>
                        
                        <div class="col-lg-6" id="add-new-pos-form" style="height: 100%; display: flex; flex-direction: column; justify-content: space-around;">
                                                        
                                <input class="btn btn-primary save" id="new-position-img" type="file" name="newPositionImg" >

                                <div class="new-positin-price-wrapper" style="margin: 0 15px;">

                                    <label for="new-position-name">Name:</label>
                                    <input id="new-position-name" class="form-control" type="text" name="newPositionName">

                                    <label for="newPositionPrice">Price <i class="fa fa-eur" aria-hidden="true"></i> :</label>
                                    <input id="new-position-price" class="form-control" type="text" name="newPositionPrice">

                                </div>

                        </div>

                        <div class="col-lg-2" style="height: 100%; ;display: flex; align-items: flex-end; flex-direction: column; justify-content: space-around;">
                            
                            <i id="clearAddingPosition" class="fa fa-times fa-3x" style="cursor: pointer;" aria-hidden="true"></i>
                            <i id="addNewPosition" class="fa fa-check-circle-o fa-3x" style="cursor: pointer;" aria-hidden="true"></i>

                        </div>
                    </div>
                </div>   

                <div class="recently-added panel panel-bordered" style="margin-bottom: 20px;">

                    <div class="col-md-12">
                        <h2>Added Positions</h2>
                    </div>

                    <div class="recently-added-positions panel-body" style="height: 400px; padding: 0 20px 0;">
                        <div id="addedPositions" class="wrapper" style="display: flex; justify-content: flex-start;">

                            @foreach ($relPositions as $viewId=> $position)
                                
                                <div id="added-position-{{ $position->id }}" style="width: 20%; height: 80%; padding: 10px; margin-right: 20px; border: 1px solid black; text-align: center;">

                                    <div class="positions-wrapper" style="display: flex; justify-content: space-between;">   
                                        <div class="new-position-img" style="height: 100%; border: 2px dashed #eee; padding: 5px;">
                                            <img id="added-position-img-{{ $position->id }}" src="{{ asset('storage/' . $position->image) }}" alt="Position Image" style="height: 100%; width: 100%">                            
                                        </div>  

                                        <div class="" style="display: flex; flex-direction: column; justify-content: space-around;">

                                            <div class="added-position-price-wrapper" style="margin: 0 20px;">

                                                <label for="newPositionPrice">Price:</label>
                                                <p id="added-position-price-{{ $position->id }}">{{ $position->price }}</p>                                   
                                                <i class="fa fa-eur" aria-hidden="true"></i> 

                                            </div>
                                        </div>

                                        <div class="" style="display: flex; align-items: flex-end; flex-direction: column; justify-content: space-around;">
                                            <i id="edit-position-${positionId}" class="fa fa-pencil" aria-hidden="true" style="cursor: pointer" onclick="editRecent({{ $position->id }})"></i>
                                            <i id="delete-position-${positionId}" class="fa fa-times" aria-hidden="true" style="cursor: pointer" onclick="deleteFromRecent({{ $position->id }})"></i>           
                                        </div>
                                        <input type="hidden" value="{{ $position->id }}" name="existing-position">
                                    </div>
                                    <div style="margin-top: 10px;">
                                        <p id="added-position-name-{{ $position->id }}" >{{ $position->name }}</p>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                        
                </div> 

                <div class="panel panel-bordered" style="margin-bottom: 20px;">

                    <div class="panel-footer">                        
                        <button id="submitNewAds" type="submit" class="btn btn-primary save" style="width: 100%;">{{ __('voyager.generic.save') }}</button>
                    </div>
                        
                </div>                 
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager.generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager.generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager.generic.delete') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager.generic.delete_confirm') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        var params = {}
        var $image;
        var newAdsPositions = {!! $newAdsPositions !!};
        var updatePosition = false;
        var updatePositionId = '';
        var deletePositions = [];

        newAdsPositions = $.map(newAdsPositions, function(value, index) {
            return [value];
        });

        function readURL(input, img) {
            if (input && input[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    img
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input[0]);
            }
        }

        function clearForm (){
            $("#new-position-img").val('');
            $("#new-position-img-view").attr('src', '');
            $("#new-position-price").val('');
            $("#new-position-name").val('');
        }

        function editRecent(positionId){
            updatePosition = true;
            updatePositionId = positionId;
            $("#new-position-header").text('Edit Position ' + positionId);
            $("#new-position-img-view").attr('src', $("#added-position-img-"+positionId).attr('src') );
            $("#new-position-price").val($("#added-position-price-"+positionId).text());
            $("#new-position-name").val($("#added-position-name-"+positionId).text());
            $("#new-position-img").val('');
        }

        function deleteFromRecent(positionId) {
            
            deletePositions.push($("input[name=existing-position][value="+positionId+"]").val());
            $("#added-position-" + positionId).remove();
            $("#position-" +positionId+ "-img").remove();

            delete newAdsPositions[positionId];
            
            newAdsPositions.length -= 1; 
        }

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
            $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', function (e) {
                $image = $(this).siblings('img');

                params = {
                    slug:   '{{ $dataTypeContent->getTable() }}',
                    image:  $image.data('image'),
                    id:     $image.data('id'),
                    field:  $image.parent().data('field-name'),
                    _token: '{{ csrf_token() }}'
                }

                $('.confirm_delete_name').text($image.data('image'));
                $('#confirm_delete_modal').modal('show');
            });

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $image.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing image.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();

            if($("#new-position-img").prop('files')){
                readURL($("#new-position-img").prop('files'), $("#new-position-img-view"));
            }

            $("#add-new-pos-form").on("change", "#new-position-img", function () {
                readURL($("#new-position-img").prop('files'), $("#new-position-img-view"));
            });

            //addding new

            $("#submitNewAds").on("click", function(e){

                if( newAdsPositions.length > 0 ){                    
                    $("#newAds").val(JSON.stringify(newAdsPositions));
                    $("#positionsToDelete").val(JSON.stringify(deletePositions));
                    $("#mainForm").submit();
                }else{
                    $(".recently-added").css('border', '1px solid red');
                    toastr.error("Add Positions");
                }
                 
            });
            
            var positionId = {!! $lastId !!};

            $("#addNewPosition").on("click", function(){
                
                let str = $("#new-position-price").val();
                let patt = new RegExp("^[1-9]+$");
                let priceTest = patt.test(str);

                var newPosPrice = $("#new-position-price").val();
                var newPosName = $("#new-position-name").val();

                if( newPosPrice && newPosName && priceTest && $("#new-position-img").val() && !updatePosition ) {

                    positionId++;
                    
                    newAdsPositions[positionId] = { position_id: positionId, price: newPosPrice, name: newPosName} ;

                    $("#addedPositions").append(`
                        <div id="added-position-${positionId}" style="width: 20%; padding: 10px; margin-right: 20px; border: 1px solid #DC1818; text-align: center;">
                            <div class="positions-wrapper" style="height: 80%; display: flex; justify-content: space-between;">     
                                <div class="new-position-img" style="height: 100%; border: 2px dashed #eee; padding: 5px;">
                                    <img id="added-position-img-${positionId}" src="" alt="Position Image" style="height: 100%; width: 100%">                            
                                </div>  

                                <div class="" style="display: flex; flex-direction: column; justify-content: space-around;">

                                    <div class="added-position-price-wrapper" style="margin: 0 20px;">

                                        <label for="newPositionPrice">Price:</label>

                                        <p id="added-position-price-${positionId}">${newPosPrice}</p>                                   
                                        <i class="fa fa-eur" aria-hidden="true"></i> 

                                    </div>
                                </div>

                                <div class="" style="display: flex; align-items: flex-end; flex-direction: column; justify-content: space-around;">
                                    <i id="edit-position-${positionId}" class="fa fa-pencil" aria-hidden="true" style="cursor: pointer" onclick="editRecent(${positionId})"></i>
                                    <i id="delete-position-${positionId}" class="fa fa-times" aria-hidden="true" style="cursor: pointer" onclick="deleteFromRecent(${positionId})"></i>           
                                </div>
                            </div>
                            <div style="margin-top: 10px;">
                                <p id="added-position-name-${positionId}" >${newPosName}</p>
                            </div>
                        </div>`
                    );

                    let forSubmitInput = $("#new-position-img").clone();
                    forSubmitInput.attr("id", "position-" +positionId+ "-img").attr("name", "position-" +positionId+ "-img");
                    $("#position-images").append(forSubmitInput);
                    
                    if( $("#new-position-img").prop('files') ){
                        readURL($("#new-position-img").prop('files'), $("#added-position-img-"+positionId));
                    }
                    
                    $(".recently-added").css('border', '1px solid transparent');

                    clearForm();
                    
                }else if( newPosPrice && newPosName && priceTest && updatePosition) {

                    $("#added-position-price-"+updatePositionId).text($("#new-position-price").val());
                    $("#added-position-name-"+updatePositionId).text($("#new-position-name").val());  

                    if( $("#new-position-img").val().length > 0 ){
                        $("#position-" +updatePositionId+ "-img").remove();
                        let forSubmitInput = $("#new-position-img").clone(); 
                        forSubmitInput.attr("id", "position-" +updatePositionId+ "-img").attr("name", "position-" +updatePositionId+ "-img");                   
                        $("#position-images").append(forSubmitInput);                        
                    }

                    if( $("#new-position-img").val() ){
                        readURL($("#new-position-img").prop('files'), $("#added-position-img-"+updatePositionId));
                    }

                    $.each(newAdsPositions, function( i, position ) {

                        if( typeof position !== 'undefined' ){
                            if( position.position_id == updatePositionId ){
                                position.price = $("#new-position-price").val();
                                position.name = $("#new-position-name").val();
                            }
                        }

                    });

                    updatePositionId = '';
                    updatePosition = false;
                    $("#new-position-header").text('Add New Position');

                    clearForm();
                }
                
            });

            $("#clearAddingPosition").on("click", function() {
                $("#new-position-img").val('');
                $("#new-position-img-view").attr('src', '');
                $("#new-position-price").val('');
                $("#new-position-name").val('');
                $("#new-position-header").text('Add New Position');
                updatePositionId = '';
                updatePosition = false;
            });

        });
    </script>
@stop
