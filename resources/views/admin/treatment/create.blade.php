@extends('admin.layouts.app')

@section('content')

    @push('head')
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">

        <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    @endpush

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ (Route::currentRouteName() == 'treatment.create') ? 'ADD' : 'EDIT' }}
                TREATMENT</h1>
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
            <form role="form"
                  action="{{ (Route::currentRouteName() == 'treatment.create') ? route('treatment.store') : route('treatment.update', ['treatment' => $treatment->id])  }}"
                  method="post">
            <div class="panel panel-default">
                <div class="panel-heading">
                    * Please fill all the required details.
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">



                                @csrf

                                @if(Route::currentRouteName() == 'treatment.edit')
                                    <input type="hidden" name="_method" value="PUT">
                                @endif
                                <div class="form-group">
                                    <label>Treatement Title</label>
                                    <input class="form-control" name="title" placeholder="Enter treatment title"
                                           value="{{ isset($treatment->title) ? $treatment->title : old('title') }}">
                                    @error('title')
                                    <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" name="slug" placeholder="Enter slug"
                                           value="{{ isset($treatment->slug) ? $treatment->slug : old('slug') }}">
                                    @error('slug')
                                    <label class="error">{{ $message }}</label>
                                    @enderror

                                </div>

                            {{--<div class="form-group">
                                <label>Liver Transplant Label</label>
                                <input class="form-control" name="transplant_label" placeholder="Enter Transplant label"
                                       value="{{ isset($treatment->transplant_label) ? $treatment->transplant_label : old('transplant_label') }}">
                                @error('transplant_label')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>--}}

                            <div class="form-group">
                                <label>Liver Transplant Price</label>
                                <input class="form-control" name="transplant_price" placeholder="Enter Transplant Price"
                                       value="{{ isset($treatment->transplant_price) ? $treatment->transplant_price : old('transplant_price') }}">
                                @error('transplant_price')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                          {{--  <div class="form-group">
                                <label>No of Travellers label</label>
                                <input class="form-control" name="travellers_label" placeholder="Enter Travellers label"
                                       value="{{ isset($treatment->travellers_label) ? $treatment->travellers_label : old('travellers_label') }}">
                                @error('travellers_label')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>--}}

                            <div class="form-group">
                                <label>No of Travellers</label>
                                <input class="form-control" name="travellers_count" placeholder="Enter Travellers Count"
                                       value="{{ isset($treatment->travellers_count) ? $treatment->travellers_count : old('travellers_count') }}">
                                @error('travellers_count')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                           {{-- <div class="form-group">
                                <label>Days in Hospital Label</label>
                                <input class="form-control" name="hospital_days_label" placeholder="Enter Hospital Days Label"
                                       value="{{ isset($treatment->hospital_days_label) ? $treatment->hospital_days_label : old('hospital_days_label') }}">
                                @error('hospital_days_label')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>--}}

                            <div class="form-group">
                                <label>Days in Hospital Count</label>
                                <input class="form-control" name="hospital_days_count" placeholder="Enter Hospital Days Label"
                                       value="{{ isset($treatment->hospital_days_count) ? $treatment->hospital_days_count : old('hospital_days_count') }}">
                                @error('hospital_days_count')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                            {{--<div class="form-group">
                                <label>Days Outside Label</label>
                                <input class="form-control" name="days_outside_label" placeholder="Enter Hospital Days Label"
                                       value="{{ isset($treatment->days_outside_label) ? $treatment->days_outside_label : old('days_outside_label') }}">
                                @error('days_outside_label')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>--}}

                            <div class="form-group">
                                <label>Days Outside Count</label>
                                <input class="form-control" name="days_outside_count" placeholder="Enter Hospital Days Count"
                                       value="{{ isset($treatment->days_outside_count) ? $treatment->days_outside_count : old('days_outside_count') }}">
                                @error('days_outside_count')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                           {{-- <div class="form-group">
                                <label>Total Days in India Label</label>
                                <input class="form-control" name="total_days_label" placeholder="Enter Hospital Days Label"
                                       value="{{ isset($treatment->total_days_label) ? $treatment->total_days_label : old('total_days_label') }}">
                                @error('total_days_label')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>--}}

                            <div class="form-group">
                                <label>Total Days in India Count</label>
                                <input class="form-control" name="total_days_count" placeholder="Enter Hospital Days Count"
                                       value="{{ isset($treatment->total_days_count) ? $treatment->total_days_count : old('total_days_count') }}">
                                @error('total_days_count')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                                <div class="form-group">
                                    <label>Hospital</label><br>
                                    <select name="hospital_id[]" class="boot-multiselect-hospitals" multiple="multiple" style="display:none">
                                    @foreach($hospitals as $hospital)
                                                <option @if( $hospital->id == old('hospital_id') || (isset($treatmentDoctors) && in_array($hospital->id,$treatmentDoctors))) selected  @endif value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                    @endforeach
                                    </select>
                                    {{-- @error('hospital')
                                        <label class="error">{{ $message }}</label>
                                    @enderror --}}
                                </div>
                                <div class="form-group">
                                    <label>Doctor</label><br>
                                    <select name="doctor_id[]" class="boot-multiselect-doctors" multiple="multiple" style="display:none">
                                    @foreach($doctors as $doctor)
                                        <option @if( $doctor->id == old('doctor_id') || (isset($treatmentHospitals) && in_array($doctor->id,$treatmentHospitals))) selected  @endif value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endforeach
                                    </select>
                                    {{-- @error('doctor')
                                        <label class="error">{{ $message }}</label>
                                    @enderror --}}
                                </div>
                                <div class="form-group">
                                    <label>Introduction</label>
                                    <!-- creating a text area for my editor in the form -->
                                    <textarea class="form-control" id="intro_editor"
                                              name="introduction">{{ (old('introduction') != null) ? old('introduction') : @$treatment->introduction }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Liver Transplant Cost in India</label>
                                    <!-- creating a text area for my editor in the form -->
                                    <textarea class="form-control" id="cost_editor"
                                              name="cost">{{ (old('cost') != null) ? old('cost') : @$treatment->cost }}</textarea>
                                </div>



                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Seo Title</label>
                                <input class="form-control" name="meta_title" placeholder="Enter the Seo Title" value="{{ isset($treatment->meta_title) ? $treatment->meta_title : old('meta_title') }}">
                                @error('meta_title')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Seo Description</label>
                                <textarea name="meta_description" class="form-control" {{--id="myeditor2"--}} rows="3">{{ (old('meta_description') != null) ? old('meta_description') : (!empty($treatment) ? $treatment->meta_description : null) }}</textarea>
                                @error('meta_description')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h4 class="top_to_height object_denesa">Treatment Specifications</h4>
                                @if(isset($specifications) && $specifications->count())
                                    @foreach($specifications as $specification)
                                        <div class="panel panel-default treat">
                                            <div class="panel-heading treat_head">
                                                <label>Specifications</label>
                                                <i style="float: right" class="fa fa-minus fa-fw"></i>
                                            </div>

                                            <div class="panel-body treat_body" style="display:none">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input class="form-control"
                                                           name="specifications[{{$specification->id}}][title]"
                                                           placeholder="Enter Title"
                                                           value="{{ isset($specification->title) ? $specification->title : old('title') }}">
                                                    @error('title')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea id="denesa_obj" rows="3" class="form-control"
                                                              name="specifications[{{$specification->id}}][description]"
                                                              placeholder="Enter The Description">{{ (old('description') != null) ? old('description') : $specification->description }}</textarea>
                                                    <p class="help-block"></p>
                                                    @error('description')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <a href="javascript:;" class="addMoreSpecs btn-warning">Add More Specification <i class="fa fa-fw fa-plus"></i></a>
                            </div>

                            <div class="form-group">
                                <h4 class="top_to_height object_denesa">FAQ</h4>
                                @if(isset($faqs) && $faqs->count())
                                    @foreach($faqs as $faqs)
                                        <div class="panel panel-default treat">
                                            <i class="fa fa-times-circle-o fa-fw close_gallery_panel"></i>
                                            <div class="panel-heading treat_head">
                                                <label>FAQ</label>
                                                <i style="float: right" class="fa fa-minus fa-fw"></i>
                                            </div>

                                            <div class="panel-body treat_body" style="display:none">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input class="form-control"
                                                           name="faqs[{{$faqs->id}}][title]"
                                                           placeholder="Enter Title"
                                                           value="{{ isset($faqs->title) ? $faqs->title : old('title') }}">
                                                    @error('title')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea id="denesa_obj" rows="3" class="form-control"
                                                              name="faqs[{{$faqs->id}}][description]"
                                                              placeholder="Enter The Description">{{ (old('description') != null) ? old('description') : $faqs->description }}</textarea>
                                                    <p class="help-block"></p>
                                                    @error('description')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <a href="javascript:;" class="addMoreFaq btn-warning">Add More Faq <i class="fa fa-fw fa-plus"></i></a>
                            </div>

                            <div class="form-group">
                                <label>Categories</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @if($categories->count())
                                    @foreach($categories as $category)
                                        <option @if( $category->id == old('category_id') || (isset($treatment) && $category->id == $treatment->category_id))) selected  @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                        @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Featured Image </label><br>
                                <button type="button" class="image-upload btn btn-info"
                                        data-toggle="modal" data-target="#myModal"
                                        data-id="feature_type">Upload /
                                    Replace Image
                                </button>
                                <input id="hidden-image-feature_type"
                                       type="hidden"
                                       name="featured_image"
                                       value="{{ $treatment->featured_image ?? null }}">
                                <div id="hidden-feature_type"
                                     style="padding:25px">
                                    @if(!empty($treatment->featured_image))
                                        <img class="img-thumbnail" style="width:150px"
                                             src="{{ asset($treatment->featured_image) }}">
                                    @endif
                                </div>
                                @error('featured_image')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-warning">Submit</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>
                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </form>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
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
    @push('foot')

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
            .addMoreFaq, .addMoreSpecs{
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
        <!-- creating a CKEditor instance called myeditor -->
        <script type="text/javascript">
            CKEDITOR.replace('intro_editor');
            CKEDITOR.replace('cost_editor');
           // CKEDITOR.replace('specs_editor');
          //  CKEDITOR.replace('faq_editor');

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

            $(document).ready(function() {

                $(document).on('click', '.close_gallery_panel', function () {
                    $(this).closest('.treat').remove();
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

            var ctr = 0;
            $('.addMoreSpecs').on('click', function () {
                var html = '<div class="panel panel-default treat"><div class="panel-heading treat_head"><label>Specifications</label><i style="float: right" class="fa fa-minus fa-fw"></i></div><div class="panel-body treat_body" style="display:none"><div class="form-group"><label>Title</label><input class="form-control" name="specifications[' + ctr + '][title]" placeholder="Enter Title"></div><div class="form-group"><label>Description</label><textarea id="denesa_obj" rows="3" class="form-control" name="specifications[' + ctr + '][description]" placeholder="Enter The Description"></textarea><p class="help-block"></p></div></div></div>';
                ctr++;
                $('.addMoreSpecs').before(html);
            });

            var ctr1 = 0;
            $('.addMoreFaq').on('click', function () {
                var html1 = '<div class="panel panel-default treat"><i class="fa fa-times-circle-o fa-fw close_gallery_panel"></i><div class="panel-heading treat_head"><label>FAQ</label><i style="float: right" class="fa fa-minus fa-fw"></i></div><div class="panel-body treat_body" style="display:none"><div class="form-group"><label>Title</label><input class="form-control" name="faqs[' + ctr1 + '][title]" placeholder="Enter Title"></div><div class="form-group"><label>Description</label><textarea id="denesa_obj" rows="3" class="form-control" name="faqs[' + ctr1 + '][description]" placeholder="Enter The Description"></textarea><p class="help-block"></p></div></div></div>';
                ctr1++;
                $('.addMoreFaq').before(html1);
            });


            $('.boot-multiselect-hospitals').multiselect({
                includeSelectAllOption: true,
                buttonWidth: 250,
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                filterPlaceholder: 'Hospitals...'
            });

            $('.boot-multiselect-doctors').multiselect({
                includeSelectAllOption: true,
                buttonWidth: 250,
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                filterPlaceholder: 'Doctors...'
            });

            $('.image-upload').on('click', function () {

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


            $('.image-upload1').on('click', function () {

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