@extends('admin.layouts.app')

@section('content')

    @push('head')
        <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

    @endpush

    @php
        $speciality = isset($hospital->speciality) ? explode(',', $hospital->speciality) : [];
        $speciality = (old('speciality') != null) ? old('speciality') : $speciality;
    @endphp
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ (Route::currentRouteName() == 'hospital.create') ? 'ADD' : 'EDIT' }}
                HOSPITAL</h1>
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
                    <form role="form"
                          action="{{ (Route::currentRouteName() == 'hospital.create') ? route('hospital.store') : route('hospital.update', ['hospital' => isset($hospital->id) ? $hospital->id : ''])  }}"
                          method="post">
                        <div class="row">

                            <div class="col-lg-6">

                                @csrf

                                @if(Route::currentRouteName() == 'hospital.edit')
                                    <input type="hidden" name="_method" value="PUT">
                                @endif
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" placeholder="Enter hospital Name"
                                           value="{{ isset($hospital->name) ? $hospital->name : old('name') }}">
                                    @error('name')
                                    <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" name="slug" placeholder="Enter The Slug"
                                           value="{{ isset($hospital->slug) ? $hospital->slug : old('slug') }}">
                                    <p class="help-block">Example: random-hospital</p>
                                    @error('slug')
                                    <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Established In</label>
                                    <input class="form-control" name="established" placeholder="Enter Established Year"
                                           value="{{ isset($hospital->established) ? $hospital->established : old('established') }}">
                                    @error('established')
                                    <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>About</label>
                                    <textarea name="description" class="form-control" id="myeditor"
                                              rows="3">{{ (old('description') != null) ? old('description') : @$hospital->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Team Specialities Text</label>
                                    <!-- creating a text area for my editor in the form -->
                                    <textarea name="team_specialities" class="form-control" id="myeditor1"
                                              name="team_specialities">{{ (old('team_specialities') != null) ? old('team_specialities') : @$hospital->team_specialities }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Speciality</label>
                                    <select name="speciality[]" multiple class="form-control">
                                        <option @if(in_array('Multi Speciality', $speciality)) selected @endif>Multi Speciality</option>
                                        <option @if(in_array('Obstetrics and Gynaecology', $speciality)) selected @endif>Obstetrics and Gynaecology</option>
                                        <option @if(in_array('Neurology and Neurosurgery', $speciality)) selected @endif>Neurology and Neurosurgery</option>
                                        <option @if(in_array('Haematology', $speciality)) selected @endif>Haematology</option>
                                        <option @if(in_array('Cardiology', $speciality)) selected @endif>Cardiology</option>
                                        <option @if(in_array('Surgery and Urology', $speciality)) selected @endif>Surgery and Urology</option>
                                        <option @if(in_array('Rheumatology', $speciality)) selected @endif>Rheumatology</option>
                                        <option @if(in_array('Gastroenterology', $speciality)) selected @endif>Gastroenterology</option>
                                        <option @if(in_array('Oral and Maxillofacial', $speciality)) selected @endif>Oral and Maxillofacial</option>
                                        <option @if(in_array('Psychiatry and many more', $speciality)) selected @endif>Psychiatry and many more</option>
                                        <option @if(in_array('Organ transplants', $speciality)) selected @endif>Organ transplants</option>
                                    </select>
                                    @error('speciality')
                                    <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Infrastructure</label>
                                    <textarea name="infrastructure" id="myeditor2" class="form-control"
                                              rows="3">{{ (old('infrastructure') != null) ? old('infrastructure') : @$hospital->infrastructure }}</textarea>
                                </div>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label>Seo Title</label>
                                    <input class="form-control" name="meta_title" placeholder="Enter the Seo Title" value="{{ isset($hospital->meta_title) ? $hospital->meta_title : old('meta_title') }}">
                                    @error('meta_title')
                                    <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Seo Description</label>
                                    <textarea name="meta_description" class="form-control" {{--id="myeditor2"--}} rows="3">{{ (old('meta_description') != null) ? old('meta_description') : (!empty($hospital) ? $hospital->meta_description : null) }}</textarea>
                                    @error('meta_description')
                                    <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>States</label>
                                    <select required id="state" class="form-control" name="state">
                                        <option value="">-- Please select --</option>
                                        @foreach($states as $state)
                                            <option @if($state->name == @ $hospital->state || old('state') == $state->name) selected
                                                    @endif value="{{ $state->name }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Cities</label>
                                    <div id="cities">
                                        <select required class="form-control" name="city">
                                            <option value="">-- Please select --</option>
                                            @forelse($cities as $city)
                                                <option @if($city->name == @ $hospital->city || old('city') == $city->name) selected
                                                        @endif value="{{ $city->name }}">{{ $city->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input name="zip_code" class="form-control"
                                           value="{{ (old('zip_code') != null) ? old('zip_code') : @$hospital->zip_code }}">
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="address" class="form-control" id=""
                                              rows="3">{{ (old('address') != null) ? old('address') : @$hospital->address }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Featured Image </label><br>
                                    <button type="button" class="image-upload btn btn-info"
                                            data-toggle="modal" data-target="#myModal"
                                            data-id="vision_1">Upload / Replace
                                        Image
                                    </button>
                                    <input id="hidden-image-vision_1"
                                           type="hidden"
                                           name="featured_image"
                                           value="{{ $hospital->featured_image ?? null }}">
                                    <div id="hidden-vision_1"
                                         style="padding:25px">
                                        @if(!empty($hospital->featured_image))
                                            <img class="img-thumbnail" style="width:150px"
                                                 src="{{ asset($hospital->featured_image) }}">
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Infrastructure Image </label><br>
                                    <button type="button" class="image-upload btn btn-info"
                                            data-toggle="modal" data-target="#myModal"
                                            data-id="vision_2">Upload / Replace
                                        Image
                                    </button>
                                    <input id="hidden-image-vision_2"
                                           type="hidden"
                                           name="image"
                                           value="{{ $hospital->image ?? null }}">
                                    <div id="hidden-vision_2"
                                         style="padding:25px">
                                        @if(!empty($hospital->image))
                                            <img class="img-thumbnail" style="width:150px"
                                                 src="{{ asset($hospital->image) }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="panel panel-default treat">
                                    <div class="panel-heading treat_head">
                                        <label>Facilities</label>
                                        <i style="float: right" class="fa fa-minus fa-fw"></i>
                                    </div>
                                    <div class="panel-body treat_body" style="display:none">
                                        <div class="form-group">
                                            <label>Confirm During Stay</label>
                                            <textarea name="confirm_during_stay" id="confirm_during_stay"
                                                      class="form-control"
                                                      rows="3">{{ (old('confirm_during_stay') != null) ? old('confirm_during_stay') : @$hospital->confirm_during_stay }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Money Matters</label>
                                            <textarea name="money_matters" id="money_matters" class="form-control"
                                                      rows="3">{{ (old('money_matters') != null) ? old('money_matters') : @$hospital->money_matters }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Food</label>
                                            <textarea name="food" id="food" class="form-control"
                                                      rows="3">{{ (old('food') != null) ? old('food') : @$hospital->food }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Treatment Related</label>
                                            <textarea name="treatment_related" id="treatment_related"
                                                      class="form-control"
                                                      rows="3">{{ (old('treatment_related') != null) ? old('treatment_related') : @$hospital->treatment_related }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Languauge</label>
                                            <textarea name="languauge" id="languauge" class="form-control"
                                                      rows="3">{{ (old('languauge') != null) ? old('languauge') : @$hospital->languauge }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Transportation</label>
                                            <textarea name="transportation" id="transportation" class="form-control"
                                                      rows="3">{{ (old('transportation') != null) ? old('transportation') : @$hospital->transportation }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.col-lg-6 (nested) -->
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
            CKEDITOR.replace('myeditor2');

            CKEDITOR.replace('confirm_during_stay');
            CKEDITOR.replace('money_matters');
            CKEDITOR.replace('food');
            CKEDITOR.replace('treatment_related');
            CKEDITOR.replace('languauge');
            CKEDITOR.replace('transportation');
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

            $('#state').on('change', function () {
                var datastring = $(this).val();
                $.ajax({
                    url: "{{ route('city-list') }}",
                    type: "post",
                    data: {stateId: datastring},
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        $("#cities").html(data);
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

        </script>

    @endpush

@endsection