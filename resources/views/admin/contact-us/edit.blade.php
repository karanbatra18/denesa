@extends('admin.layouts.app')

@section('content')

    @push('head')
        <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    @endpush

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">EDIT CONTACT US PAGE</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">

        <div class="col-lg-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    * Please fill all the required details.
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ route('admin.contact-us.update')  }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Support</h4>
                                <div class="panel panel-default treat">
                                    <div class="panel-heading treat_head">
                                        <label>Support Text</label>
                                        <i style="float: right" class="fa fa-minus fa-fw"></i>
                                    </div>

                                    <div class="panel-body treat_body" style="display:none">
                                        <div class="form-group">
                                            <label>Support Text</label>
                                            <textarea id="myeditor" rows="3" class="form-control"
                                                      name="support_text"
                                                      placeholder="Enter The Support Text">{!! (old('support_text') != null) ? old('support_text') : $contactSupport->support_text  !!} </textarea>
                                            <p class="help-block"></p>
                                            @error('support_text')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Browse Text</label>
                                            <input class="form-control"
                                                   name="support_browse_text"
                                                   placeholder="Enter Browse Text"
                                                   value="{{ isset($contactSupport->support_browse_text) ? $contactSupport->support_browse_text : old('support_browse_text') }}">
                                            @error('support_browse_text')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Browse Email</label>
                                            <input class="form-control"
                                                   name="support_email_id"
                                                   placeholder="Enter Browse Email"
                                                   value="{{ isset($contactSupport->support_email_id) ? $contactSupport->support_email_id : old('support_email_id') }}">
                                            @error('support_email_id')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Support Link</label>
                                            <input class="form-control"
                                                   name="support_link"
                                                   placeholder="Enter Support Link"
                                                   value="{{ isset($contactSupport->support_link) ? $contactSupport->support_link : old('support_link') }}">
                                            @error('support_link')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Support Watsapp Link</label>
                                            <input class="form-control"
                                                   name="support_whatsapp"
                                                   placeholder="Whatsapp"
                                                   value="{{ isset($contactSupport->support_whatsapp) ? $contactSupport->support_whatsapp : old('support_whatsapp') }}">
                                            @error('support_whatsapp')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Support Email Link</label>
                                            <input class="form-control"
                                                   name="support_email"
                                                   placeholder="Email"
                                                   value="{{ isset($contactSupport->support_email) ? $contactSupport->support_email : old('support_email') }}">
                                            @error('support_email')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Support Call Link</label>
                                            <input class="form-control"
                                                   name="support_call"
                                                   placeholder="Call"
                                                   value="{{ isset($contactSupport->support_call) ? $contactSupport->support_call : old('support_call') }}">
                                            @error('support_call')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <h4 class="top_to_height">Call Sales Numbers</h4>
                                @if($callSales->count())
                                    @foreach($callSales as $callSale)

                                        <div class="panel panel-default treat">
                                            <div class="panel-heading treat_head">
                                                <label>Call Sales Numbers</label>
                                                <i style="float: right" class="fa fa-minus fa-fw"></i>
                                            </div>

                                            <div class="panel-body treat_body" style="display:none">
                                                <div class="form-group">
                                                    <label>Place</label>
                                                    <input class="form-control"
                                                           name="callSale[{{$callSale->id}}][place]"
                                                           placeholder="Enter Title"
                                                           value="{{ isset($callSale->place) ? $callSale->place : old('place') }}">
                                                    @error('place')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea rows="3" class="form-control"
                                                              name="callSale[{{$callSale->id}}][address]"
                                                              placeholder="Enter The Address">{!! (old('address') != null) ? old('address') : $callSale->address  !!} </textarea>
                                                    <p class="help-block"></p>
                                                    @error('address')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input class="form-control"
                                                           name="callSale[{{$callSale->id}}][phone]"
                                                           placeholder="Enter Phone"
                                                           value="{{ isset($callSale->phone) ? $callSale->phone : old('phone') }}">
                                                    @error('phone')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <h4>General Queries</h4>
                                <div class="panel panel-default treat">
                                    <div class="panel-heading treat_head">
                                        <label>Support Text</label>
                                        <i style="float: right" class="fa fa-minus fa-fw"></i>
                                    </div>

                                    <div class="panel-body treat_body" style="display:none">
                                        <div class="form-group">
                                            <label>General Text</label>
                                            <textarea id="myeditor1" rows="3" class="form-control"
                                                      name="general_text"
                                                      placeholder="Enter The Support Text">{{ (old('general_text') != null) ? old('general_text') : $contactSupport->general_text }}</textarea>
                                            <p class="help-block"></p>
                                            @error('general_text')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Browse Text</label>
                                            <input class="form-control"
                                                   name="general_browse_text"
                                                   placeholder="Enter Browse Text"
                                                   value="{{ isset($contactSupport->general_browse_text) ? $contactSupport->general_browse_text : old('general_browse_text') }}">
                                            @error('general_browse_text')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Browse Email</label>
                                            <input class="form-control"
                                                   name="general_email_id"
                                                   placeholder="Enter Browse Email"
                                                   value="{{ isset($contactSupport->general_email_id) ? $contactSupport->general_email_id : old('general_email_id') }}">
                                            @error('general_email_id')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>General Link</label>
                                            <input class="form-control"
                                                   name="general_link"
                                                   placeholder="Enter Support Link"
                                                   value="{{ isset($contactSupport->general_link) ? $contactSupport->general_link : old('general_link') }}">
                                            @error('general_link')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>General Watsapp Link</label>
                                            <input class="form-control"
                                                   name="general_whatsapp"
                                                   placeholder="Whatsapp"
                                                   value="{{ isset($contactSupport->general_whatsapp) ? $contactSupport->general_whatsapp : old('general_whatsapp') }}">
                                            @error('general_whatsapp')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>General Email Link</label>
                                            <input class="form-control"
                                                   name="general_email"
                                                   placeholder="Email"
                                                   value="{{ isset($contactSupport->general_email) ? $contactSupport->general_email : old('general_email') }}">
                                            @error('general_email')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>General Call Link</label>
                                            <input class="form-control"
                                                   name="general_call"
                                                   placeholder="Call"
                                                   value="{{ isset($contactSupport->general_call) ? $contactSupport->general_call : old('general_call') }}">
                                            @error('general_call')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row btn-set-row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-warning">Submit</button>
                                <button type="reset" class="btn btn-default">Reset Button</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    @push('foot')
        <!-- creating a CKEditor instance called myeditor -->
        <script type="text/javascript">
                  CKEDITOR.replace('myeditor');
                  CKEDITOR.replace('myeditor1');
        </script>

        <!-- Modal -->

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Please Select An Image To Upload</h4>
                    </div>
                    <input type="hidden" id="image_type" value="">
                    <div class="modal-body">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#menu1">Upload Image</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#menu2">ALl Images</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="menu1" class="tab-pane fade in active">
                                <h3></h3>
                                <form method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- Name/Description fields, irrelevant for this article --}}
                                    <div class="form-group">
                                        <div class="needsclick dropzone" id="document-dropzone">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <div id="image-content">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .treat {
                margin-bottom: 5px;
            }

            .treat, .treat label {
                cursor: pointer;
            }

            .treat label {
                margin-bottom: 0px;
            }

            .btn-set-row {
                margin-top: 40px;
            }

            .top_to_height {
                margin-top: 25px;
            }

            .addMoreService {
                padding: 5px;
                margin-top: 5px;
                display: inline-block;
            }
        </style>
        <script>
            var uploadedDocumentMap = {}

            Dropzone.options.documentDropzone = {

                url: '{{ route('image-upload.upload') }}',

                maxFilesize: 2, // MB

                addRemoveLinks: true,

                headers: {

                    'X-CSRF-TOKEN': "{{ csrf_token() }}"

                },

                success: function (file, response) {

                    $('form').append('<input type="hidden" name="document[]" value="' + file.name + '">')

                    uploadedDocumentMap[file.name] = response.name

                },

                removedfile: function (file) {

                    file.previewElement.remove()

                    var name = ''

                    if (typeof file.name !== 'undefined') {

                        name = file.name

                    } else {

                        name = uploadedDocumentMap[file.name]

                    }

                    console.log(name);

                    $('form').find('input[name="document[]"][value="' + name + '"]').remove()

                },

                init: function () {

                            @if(isset($project) && $project->document)

                    var files =

                    {!! json_encode($project->document) !!}

                        for (var i in files) {

                        var file = files[i]

                        this.options.addedfile.call(this, file)

                        file.previewElement.classList.add('dz-complete')

                        $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')

                    }

                    @endif

                }

            }


            $(document).on('click', '.image-upload', function () {
                $('#image_type').val($(this).data('id'));

                $.ajax({

                    type: "get",

                    url: "{{ route('image-upload.all') }}",

                    data: '',

                    headers: {

                        'X-CSRF-TOKEN': "{{ csrf_token() }}"

                    },

                    success: function (data) {

                        $("#image-content").html(data);

                    }

                });

            });

            $(document).on('click', '.image-upload1', function () {

                $('#image_type').val($(this).data('id'));

                $.ajax({

                    type: "get",

                    url: "{{ route('image-upload.all') }}",

                    data: '',

                    headers: {

                        'X-CSRF-TOKEN': "{{ csrf_token() }}"

                    },

                    success: function (data) {

                        $("#image-content").html(data);

                    }

                });

            });

            $(document).on('click', '.treat_head', function () {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                    $(this).find('.fa').removeClass('fa-plus').addClass('fa-minus');
                    $('.treat_body').hide();
                } else {
                    $('.treat_head').removeClass('active');
                    $(this).addClass('active');
                    $('.treat_head i').removeClass('fa-plus').addClass('fa-minus');
                    $(this).find('.fa').removeClass('fa-minus').addClass('fa-plus');
                    $('.treat_body').hide();
                    $(this).closest('.treat').find('.treat_body').show();
                }
            });

            function addImageToHidden(image_path) {

                var image_full_path = "{{ asset('') }}/" + image_path;

                var hidden_type = $('#image_type').val();

                setTimeout(function () {

                    $("#hidden-image-" + hidden_type).val(image_path);

                    $("#hidden-" + hidden_type).html('<img class="img-thumbnail" width="150px" src="' + image_full_path + '">');

                    $("#close-model").click();

                }, 300);

            }

            var ctr = 0;
            $('.addMoreService').on('click', function () {
                var html = '<div class="panel panel-default treat"><div class="panel-heading treat_head"><label>Service Item New</label><i style="float: right" class="fa fa-minus fa-fw"></i></div><div class="panel-body treat_body" style="display:none"><div class="form-group"><label>Featured Image </label><br><button type="button" class="image-upload btn btn-info" data-toggle="modal" data-target="#myModal" data-id="feature_type_' + ctr + '">Upload /Replace Image</button><input id="hidden-image-feature_type_' + ctr + '" type="hidden" name="overallFigureNew[' + ctr + '][featured_image]" value=""> <div id="hidden-feature_type_' + ctr + '" style="padding:25px"></div></div><div class="form-group"><label>Title</label> <input class="form-control" name="overallFigureNew[' + ctr + '][title]" placeholder="Enter Title" value=""> </div><div class="form-group"> <label>Total Count</label><input class="form-control" name="overallFigureNew[' + ctr + '][total_count]" placeholder="Enter Total Count" value=""> <p class="help-block"></p></div></div>';
                ctr++;
                $('.addMoreService').before(html);
            });


        </script>

    @endpush

@endsection