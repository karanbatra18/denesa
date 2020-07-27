@extends('admin.layouts.app')

@section('content')

    @push('head')
        <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    @endpush

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">EDIT PAGE BANNERS</h1>
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
                    <form role="form" action="{{ route('admin.banner.update')  }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row">


                            @if(!empty($banners))
                                @foreach($banners as $banner)
                                    <div class="col-lg-6">
                                        <div class="panel panel-default treat">
                                            <div class="panel-heading treat_head">
                                                <label> #{{ $banner->banner_page_label }}</label>
                                                <i style="float: right" class="fa fa-minus fa-fw"></i>
                                            </div>
                                            <div class="panel-body treat_body" style="display:none">
                                                <div class="form-group">
                                                    <label>{{ $banner->banner_page_label }} </label><br>
                                                    <button type="button" class="image-upload btn btn-info"
                                                            data-toggle="modal" data-target="#myModal"
                                                            data-id="feature_type_{{ $banner->banner_page }}">Upload /
                                                        Replace
                                                        Image
                                                    </button>
                                                    <input id="hidden-image-feature_type_{{ $banner->banner_page }}"
                                                           type="hidden"
                                                           name="{{ $banner->banner_page }}"
                                                           value="{{ $banner->featured_image ?? null }}">

                                                    <div id="hidden-feature_type_{{$banner->banner_page}}"
                                                         style="padding:25px">
                                                        @if(!empty($banner->featured_image))
                                                            <img class="img-thumbnail" style="width:150px"
                                                                 src="{{ asset($banner->featured_image) }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif


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

            .addMoreDoctor, .addMoreHospital, .addMoreService {
                padding: 5px;
                margin-top: 5px;
                display: inline-block;
            }

            .close_gallery_panel {
                float: right;
                position: relative;
                bottom: 8px;
                left: 10px;
                font-size: 18px;
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

            $(document).ready(function () {

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


        </script>

    @endpush

@endsection