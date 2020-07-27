@extends('admin.layouts.app')

@section('content')

    @push('head')
        <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    @endpush

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">EDIT FOOTER SECTION</h1>
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
                    <form role="form" action="{{ route('admin.setting.footer.update')  }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row">

                            <div class="col-lg-6">
                                <h4>Introduction</h4>
                                <div class="panel panel-default treat">
                                    <div class="panel-heading treat_head">
                                        <label>Introduction</label>
                                        <i style="float: right" class="fa fa-minus fa-fw"></i>
                                    </div>
                                    <div class="panel-body treat_body" style="display:none">
                                        <div class="form-group">
                                            <label>Introduction Text</label>
                                            <textarea id="intro_editor" rows="3" class="form-control"
                                                      name="description"
                                                      placeholder="Enter Footer Description Text">{{ (old('description') != null) ? old('description') : (isset($footerIntroduction) ? $footerIntroduction->description : null) }}</textarea>
                                            <p class="help-block"></p>
                                            @error('description')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea id="address_editor" rows="3" class="form-control"
                                                      name="address"
                                                      placeholder="Enter Footer Description Text">{{ (old('address') != null) ? old('address') : (isset($footerIntroduction) ? $footerIntroduction->address : null) }}</textarea>
                                            <p class="help-block"></p>
                                            @error('address')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input class="form-control"
                                                   name="phone"
                                                   placeholder="Enter Phone Number"
                                                   value="{{ isset($footerIntroduction->phone) ? $footerIntroduction->phone : old('phone') }}">
                                            @error('phone')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>First Email</label>
                                            <input class="form-control"
                                                   name="email1"
                                                   placeholder="Enter First Email"
                                                   value="{{ isset($footerIntroduction->email1) ? $footerIntroduction->email1 : old('email1') }}">
                                            @error('email1')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Second Email</label>
                                            <input class="form-control"
                                                   name="email2"
                                                   placeholder="Enter Second Email"
                                                   value="{{ isset($footerIntroduction->email2) ? $footerIntroduction->email2 : old('email2') }}">
                                            @error('email2')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Hospital Section Heading</label>
                                            <input class="form-control"
                                                   name="hospital_heading"
                                                   placeholder="Enter Second Email"
                                                   value="{{ isset($footerIntroduction->hospital_heading) ? $footerIntroduction->hospital_heading : old('hospital_heading') }}">
                                            @error('hospital_heading')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Doctor Section Heading</label>
                                            <input class="form-control"
                                                   name="doctor_heading"
                                                   placeholder="Enter Second Email"
                                                   value="{{ isset($footerIntroduction->doctor_heading) ? $footerIntroduction->doctor_heading : old('doctor_heading') }}">
                                            @error('doctor_heading')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Service Section Heading</label>
                                            <input class="form-control"
                                                   name="service_heading"
                                                   placeholder="Enter Second Email"
                                                   value="{{ isset($footerIntroduction->service_heading) ? $footerIntroduction->service_heading : old('service_heading') }}">
                                            @error('service_heading')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>


                                    </div>


                                </div>

                                <h4>Social Links</h4>
                                <div class="panel panel-default treat">
                                    <div class="panel-heading treat_head">
                                        <label>Social Links</label>
                                        <i style="float: right" class="fa fa-minus fa-fw"></i>
                                    </div>
                                    <div class="panel-body treat_body" style="display:none">
                                        <div class="form-group">
                                            <label>Facebook URL</label>
                                            <input class="form-control"
                                                   name="facebook_url"
                                                   placeholder="Enter Facebook URL"
                                                   value="{{ isset($socialLinks->facebook_url) ? $socialLinks->facebook_url : old('facebook_url') }}">
                                            @error('facebook_url')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Twitter URL</label>
                                            <input class="form-control"
                                                   name="twitter_url"
                                                   placeholder="Enter Twitter URL"
                                                   value="{{ isset($socialLinks->twitter_url) ? $socialLinks->twitter_url : old('twitter_url') }}">
                                            @error('twitter_url')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Linkedin Url</label>
                                            <input class="form-control"
                                                   name="linkedin_url"
                                                   placeholder="Enter Linkedin URL"
                                                   value="{{ isset($socialLinks->linkedin_url) ? $socialLinks->linkedin_url : old('linkedin_url') }}">
                                            @error('linkedin_url')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Instagram</label>
                                            <input class="form-control"
                                                   name="instagram_url"
                                                   placeholder="Enter Instagram URL"
                                                   value="{{ isset($socialLinks->instagram_url) ? $socialLinks->instagram_url : old('instagram_url') }}">
                                            @error('instagram_url')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>


                                    </div>


                                </div>
                                <h4>Copyright Text</h4>
                                <div class="panel panel-default treat">
                                    <div class="panel-heading treat_head">
                                        <label>Copyright Text</label>
                                        <i style="float: right" class="fa fa-minus fa-fw"></i>
                                    </div>
                                    <div class="panel-body treat_body" style="display:none">

                                        <div class="form-group">
                                            <label>Copyright Text</label>
                                            <textarea id="denesa_obj" rows="3" class="form-control"
                                                      name="copyright_text"
                                                      placeholder="Enter Copyright Text">{{ (old('copyright_text') != null) ? old('copyright_text') : (isset($socialLinks) ? $socialLinks->copyright_text : null) }}</textarea>
                                            <p class="help-block"></p>
                                            @error('copyright_text')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-lg-6">
                                <h4>Hospitals</h4>
                                @if(!empty($footerHospitals))
                                    @foreach($footerHospitals as $footerHospital)
                                        <div class="panel panel-default treat">
                                            <i class="fa fa-times-circle-o fa-fw close_gallery_panel"></i>
                                            <div class="panel-heading treat_head">
                                                <label>Hospital</label>
                                                <i style="float: right" class="fa fa-minus fa-fw"></i>
                                            </div>
                                            <div class="panel-body treat_body" style="display:none">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input class="form-control"
                                                           name="footerHospitalsOld[{{$footerHospital->id}}][name]"
                                                           placeholder="Enter Name"
                                                           value="{{ isset($footerHospital->name) ? $footerHospital->name : old('name') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Link</label>
                                                    <input class="form-control"
                                                           name="footerHospitalsOld[{{$footerHospital->id}}][link]"
                                                           placeholder="Enter Link"
                                                           value="{{ isset($footerHospital->link) ? $footerHospital->link : old('link') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Place</label>
                                                    <input class="form-control"
                                                           name="footerHospitalsOld[{{$footerHospital->id}}][place]"
                                                           placeholder="Enter Place"
                                                           value="{{ isset($footerHospital->place) ? $footerHospital->place : old('place') }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <a href="javascript:;" class="addMoreHospital btn-warning">Add New Hospital <i
                                            class="fa fa-fw fa-plus"></i></a>

                                <h4>Doctors</h4>
                                @if(!empty($footerDoctors))
                                    @foreach($footerDoctors as $footerDoctor)
                                        <div class="panel panel-default treat">
                                            <i class="fa fa-times-circle-o fa-fw close_gallery_panel"></i>
                                            <div class="panel-heading treat_head">
                                                <label>Doctor</label>
                                                <i style="float: right" class="fa fa-minus fa-fw"></i>
                                            </div>
                                            <div class="panel-body treat_body" style="display:none">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input class="form-control"
                                                           name="footerDoctorsOld[{{$footerDoctor->id}}][name]"
                                                           placeholder="Enter Name"
                                                           value="{{ isset($footerDoctor->name) ? $footerDoctor->name : old('name') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Link</label>
                                                    <input class="form-control"
                                                           name="footerDoctorsOld[{{$footerDoctor->id}}][link]"
                                                           placeholder="Enter Link"
                                                           value="{{ isset($footerDoctor->link) ? $footerDoctor->link : old('link') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Place</label>
                                                    <input class="form-control"
                                                           name="footerDoctorsOld[{{$footerDoctor->id}}][place]"
                                                           placeholder="Enter Place"
                                                           value="{{ isset($footerDoctor->place) ? $footerDoctor->place : old('place') }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <a href="javascript:;" class="addMoreDoctor btn-warning">Add New Doctor <i
                                            class="fa fa-fw fa-plus"></i></a>

                                <h4>Services</h4>
                                @if(!empty($footerServices))
                                    @foreach($footerServices as $footerService)
                                        <div class="panel panel-default treat">
                                            <i class="fa fa-times-circle-o fa-fw close_gallery_panel"></i>
                                            <div class="panel-heading treat_head">
                                                <label>Service</label>
                                                <i style="float: right" class="fa fa-minus fa-fw"></i>
                                            </div>
                                            <div class="panel-body treat_body" style="display:none">
                                                <div class="form-group">
                                                    <label>Text</label>
                                                    <input class="form-control"
                                                           name="footerServiceOld[{{$footerService->id}}][name]"
                                                           placeholder="Enter Name"
                                                           value="{{ isset($footerService->name) ? $footerService->name : old('name') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Link</label>
                                                    <input class="form-control"
                                                           name="footerServiceOld[{{$footerService->id}}][link]"
                                                           placeholder="Enter Link"
                                                           value="{{ isset($footerService->link) ? $footerService->link : old('link') }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <a href="javascript:;" class="addMoreService btn-warning">Add New Service <i
                                            class="fa fa-fw fa-plus"></i></a>


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
                      CKEDITOR.replace('intro_editor');
                      CKEDITOR.replace('address_editor');
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

                $(document).on('click', '.close_gallery_panel', function () {
                    $(this).closest('.treat').remove();
                });


                var ctr = 0;
                $('.addMoreDoctor').on('click', function () {
                    var html = '<div class="panel panel-default treat"><i class="fa fa-times-circle-o fa-fw close_gallery_panel"></i><div class="panel-heading treat_head"><label>New Doctor</label><i style="float: right" class="fa fa-minus fa-fw"></i></div><div class="panel-body treat_body" style="display:none"><div class="form-group"><label>Name</label> <input class="form-control" name="footerDoctors[' + ctr + '][name]" placeholder="Enter Name" value=""> </div><div class="form-group"><label>Link</label> <input class="form-control" name="footerDoctors[' + ctr + '][link]" placeholder="Enter Link" value=""> </div><div class="form-group"><label>Place</label> <input class="form-control" name="footerDoctors[' + ctr + '][place]" placeholder="Enter Place" value=""> </div></div>';
                    ctr++;
                    $('.addMoreDoctor').before(html);
                });

                var ctr1 = 0;
                $('.addMoreHospital').on('click', function () {
                    var html = '<div class="panel panel-default treat"><i class="fa fa-times-circle-o fa-fw close_gallery_panel"></i><div class="panel-heading treat_head"><label>New Hospital</label><i style="float: right" class="fa fa-minus fa-fw"></i></div><div class="panel-body treat_body" style="display:none"><div class="form-group"><label>Name</label> <input class="form-control" name="footerHospitals[' + ctr1 + '][name]" placeholder="Enter Name" value=""> </div><div class="form-group"><label>Link</label> <input class="form-control" name="footerHospitals[' + ctr1 + '][link]" placeholder="Enter Link" value=""> </div><div class="form-group"><label>Place</label> <input class="form-control" name="footerHospitals[' + ctr1 + '][place]" placeholder="Enter Place" value=""> </div></div>';
                    ctr1++;
                    $('.addMoreHospital').before(html);
                });

                var ctr2 = 0;
                $('.addMoreService').on('click', function () {
                    var html = '<div class="panel panel-default treat"><i class="fa fa-times-circle-o fa-fw close_gallery_panel"></i><div class="panel-heading treat_head"><label>New Service</label><i style="float: right" class="fa fa-minus fa-fw"></i></div><div class="panel-body treat_body" style="display:none"><div class="form-group"><label>Text</label> <input class="form-control" name="footerService[' + ctr2 + '][name]" placeholder="Enter Text" value=""> </div><div class="form-group"><label>Link</label> <input class="form-control" name="footerService[' + ctr2 + '][link]" placeholder="Enter Link" value=""> </div></div>';
                    ctr2++;
                    $('.addMoreService').before(html);
                });


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