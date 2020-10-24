@extends('admin.layouts.app')

@section('content')

    @push('head')
        <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

    @endpush

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">EDIT BLOG COUNTERS</h1>
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
                    <form role="form" action="{{ route('admin.home.update')  }}" method="post">
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
                                            <label>Introduction</label>
                                            <textarea id="intro_editor" rows="3" class="form-control"
                                                      name="introduction[{{$introduction->id}}][description]"
                                                      placeholder="Enter The Description">{{ (old('description') != null) ? old('description') : $introduction->description }}</textarea>
                                            <p class="help-block"></p>
                                            @error('description')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <h4 class="top_to_height">Overall Figures</h4>
                                @if(!empty($overallFigures))
                                    @foreach($overallFigures as $overallFigure)
                                        <div class="panel panel-default treat">
                                            <div class="panel-heading treat_head">
                                                <label>Overall Figure #{{$overallFigure->id}}</label>
                                                <i style="float: right" class="fa fa-minus fa-fw"></i>
                                            </div>
                                            <div class="panel-body treat_body" style="display:none">
                                                <div class="form-group">
                                                    <label>Featured Image </label><br>
                                                    <button type="button" class="image-upload btn btn-info"
                                                            data-toggle="modal" data-target="#myModal"
                                                            data-id="feature_type_{{$overallFigure->id}}">Upload /
                                                        Replace Image
                                                    </button>
                                                    <input id="hidden-image-feature_type_{{$overallFigure->id}}"
                                                           type="hidden"
                                                           name="overallFigure[{{$overallFigure->id}}][featured_image]"
                                                           value="{{ $overallFigure->featured_image ?? null }}">
                                                    <div id="hidden-feature_type_{{$overallFigure->id}}"
                                                         style="padding:25px">
                                                        @if(!empty($overallFigure->featured_image))
                                                            <img class="img-thumbnail" style="width:150px"
                                                                 src="{{ asset($overallFigure->featured_image) }}">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input class="form-control"
                                                           name="overallFigure[{{$overallFigure->id}}][title]"
                                                           placeholder="Enter Title"
                                                           value="{{ isset($overallFigure->title) ? $overallFigure->title : old('title') }}">
                                                    @error('title')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Total Count</label>
                                                    <input class="form-control"
                                                           name="overallFigure[{{$overallFigure->id}}][total_count]"
                                                           placeholder="Enter Total Count"
                                                           value="{{ isset($overallFigure->total_count) ? $overallFigure->total_count : old('total_count') }}">
                                                    <p class="help-block"></p>
                                                    @error('total_count')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <h4 class="top_to_height">Top Doctors in India</h4>
                                @if(!empty($doctors))
                                    @foreach($doctors as $doctor)
                                        <div class="panel panel-default treat">
                                            <div class="panel-heading treat_head">
                                                <label>Top Doctor #{{$doctor->id}}</label>
                                                <i style="float: right" class="fa fa-minus fa-fw"></i>
                                            </div>
                                            <div class="panel-body treat_body" style="display:none">
                                                <div class="form-group">
                                                    <label>Featured Image </label><br>
                                                    <button type="button" class="image-upload btn btn-info"
                                                            data-toggle="modal" data-target="#myModal"
                                                            data-id="feature_doctor_{{$doctor->id}}">Upload / Replace
                                                        Image
                                                    </button>
                                                    <input id="hidden-image-feature_doctor_{{$doctor->id}}"
                                                           type="hidden" name="doctor[{{$doctor->id}}][featured_image]"
                                                           value="{{ $doctor->featured_image ?? null }}">
                                                    <div id="hidden-feature_doctor_{{$doctor->id}}"
                                                         style="padding:25px">
                                                        @if(!empty($doctor->featured_image))
                                                            <img class="img-thumbnail" style="width:150px"
                                                                 src="{{ asset($doctor->featured_image) }}">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input class="form-control" name="doctor[{{$doctor->id}}][name]"
                                                           placeholder="Enter Name"
                                                           value="{{ isset($doctor->name) ? $doctor->name : old('name') }}">
                                                    @error('name')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Link</label>
                                                    <input class="form-control" name="doctor[{{$doctor->id}}][name]"
                                                           placeholder="Enter Name"
                                                           value="{{ isset($doctor->link) ? $doctor->link : old('link') }}">
                                                    @error('link')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <textarea class="form-control"
                                                              name="doctor[{{$doctor->id}}][designation]"
                                                              placeholder="Enter The Designation">{{ (old('designation') != null) ? old('designation') : $doctor->designation }}</textarea>
                                                    <p class="help-block"></p>
                                                    @error('designation')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <h4 class="top_to_height">Estimation Cost</h4>
                                <div class="panel panel-default treat">
                                    <div class="panel-heading treat_head">
                                        <label>Estimation Cost</label>
                                        <i style="float: right" class="fa fa-minus fa-fw"></i>
                                    </div>

                                    <div class="panel-body treat_body" style="display:none">
                                        <div class="form-group">
                                            <label>Featured Image </label><br>
                                            <button type="button" class="image-upload btn btn-info" data-toggle="modal"
                                                    data-target="#myModal"
                                                    data-id="feature_estimation_{{$estimationCost->id}}">Upload /
                                                Replace Image
                                            </button>
                                            <input id="hidden-image-feature_estimation_{{$estimationCost->id}}"
                                                   type="hidden"
                                                   name="estimationCost[{{$estimationCost->id}}][featured_image]"
                                                   value="{{ $estimationCost->featured_image ?? null }}">
                                            <div id="hidden-feature_estimation_{{$estimationCost->id}}"
                                                 style="padding:25px">
                                                @if(!empty($estimationCost->featured_image))
                                                    <img class="img-thumbnail" style="width:150px"
                                                         src="{{ asset($estimationCost->featured_image) }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control"
                                                   name="estimationCost[{{$estimationCost->id}}][title]"
                                                   placeholder="Enter Title"
                                                   value="{{ isset($estimationCost->title) ? $estimationCost->title : old('title') }}">
                                            @error('title')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control"
                                                      name="estimationCost[{{$estimationCost->id}}][description]"
                                                      placeholder="Enter The Description">{{ (old('description') != null) ? old('description') : $estimationCost->description }}</textarea>
                                            <p class="help-block"></p>
                                            @error('description')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <h4 class="top_to_height">Department Costs</h4>
                                @if(!empty($departmentCosts))
                                    @foreach($departmentCosts as $departmentCost)
                                        <div class="panel panel-default treat">
                                            <div class="panel-heading treat_head">
                                                <label>Department Cost #{{$departmentCost->id}}</label>
                                                <i style="float: right" class="fa fa-minus fa-fw"></i>
                                            </div>
                                            <div class="panel-body treat_body" style="display:none">

                                                <div class="form-group">
                                                    <label>Department Name</label>
                                                    <input class="form-control"
                                                           name="departmentCost[{{$departmentCost->id}}][name]"
                                                           placeholder="Enter Name"
                                                           value="{{ isset($departmentCost->name) ? $departmentCost->name : old('name') }}">
                                                    @error('name')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Cost Description</label>
                                                    <textarea class="form-control"
                                                              name="departmentCost[{{$departmentCost->id}}][cost_description]"
                                                              placeholder="Enter The Description">{{ (old('cost_description') != null) ? old('cost_description') : $departmentCost->cost_description }}</textarea>
                                                    <p class="help-block"></p>
                                                    @error('cost_description')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <h4>Denesa Services</h4>
                                @if(!empty($denesaServices))
                                    @foreach($denesaServices as $denesaService)
                                        <div class="panel panel-default treat">
                                            <div class="panel-heading treat_head">
                                                <label>Denesa Service #{{$denesaService->id}}</label>
                                                <i style="float: right" class="fa fa-minus fa-fw"></i>
                                            </div>
                                            <div class="panel-body treat_body" style="display:none">
                                                <div class="form-group">
                                                    <label>Featured Image </label><br>
                                                    <button type="button" class="image-upload btn btn-info"
                                                            data-toggle="modal" data-target="#myModal"
                                                            data-id="feature_denesaService_{{$denesaService->id}}">Upload / Replace
                                                        Image
                                                    </button>
                                                    <input id="hidden-image-feature_denesaService_{{$denesaService->id}}"
                                                           type="hidden"
                                                           name="denesaService[{{$denesaService->id}}][featured_image]"
                                                           value="{{ $denesaService->featured_image ?? null }}">
                                                    <div id="hidden-feature_denesaService_{{$denesaService->id}}"
                                                         style="padding:25px">
                                                        @if(!empty($denesaService->featured_image))
                                                            <img class="img-thumbnail" style="width:150px"
                                                                 src="{{ asset($denesaService->featured_image) }}">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input class="form-control"
                                                           name="denesaService[{{$denesaService->id}}][title]"
                                                           placeholder="Enter Title"
                                                           value="{{ isset($denesaService->title) ? $denesaService->title : old('title') }}">
                                                    @error('title')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control"
                                                              name="denesaService[{{$denesaService->id}}][description]"
                                                              placeholder="Enter The Description">{{ (old('description') != null) ? old('description') : $denesaService->description }}</textarea>
                                                    <p class="help-block"></p>
                                                    @error('description')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif


                            </div>
                            <div class="col-lg-6">
                                <h4>Featured Treatments</h4>
                                @if(!empty($treatments))
                                    @foreach($treatments as $treatment)
                                        <div class="panel panel-default treat">
                                            <div class="panel-heading treat_head">
                                                <label>Featured Treatment #{{$treatment->id}}</label>
                                                <i style="float: right" class="fa fa-minus fa-fw"></i>
                                            </div>
                                            <div class="panel-body treat_body" style="display:none">
                                                <div class="form-group">
                                                    <label>Featured Image </label><br>
                                                    <button type="button" class="image-upload btn btn-info"
                                                            data-toggle="modal" data-target="#myModal"
                                                            data-id="feature_type_{{$treatment->id}}">Upload / Replace
                                                        Image
                                                    </button>
                                                    <input id="hidden-image-feature_type_{{$treatment->id}}"
                                                           type="hidden"
                                                           name="treatment[{{$treatment->id}}][featured_image]"
                                                           value="{{ $treatment->featured_image ?? null }}">
                                                    <div id="hidden-feature_type_{{$treatment->id}}"
                                                         style="padding:25px">
                                                        @if(!empty($treatment->featured_image))
                                                            <img class="img-thumbnail" style="width:150px"
                                                                 src="{{ asset($treatment->featured_image) }}">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input class="form-control"
                                                           name="treatment[{{$treatment->id}}][title]"
                                                           placeholder="Enter Title"
                                                           value="{{ isset($treatment->title) ? $treatment->title : old('title') }}">
                                                    @error('title')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Link</label>
                                                    <input class="form-control"
                                                           name="treatment[{{$treatment->id}}][link]"
                                                           placeholder="Enter Title"
                                                           value="{{ isset($treatment->link) ? $treatment->link : old('link') }}">
                                                    @error('link')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control"
                                                              name="treatment[{{$treatment->id}}][description]"
                                                              placeholder="Enter The Description">{{ (old('description') != null) ? old('description') : $treatment->description }}</textarea>
                                                    <p class="help-block"></p>
                                                    @error('description')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Icon Image </label><br>
                                                    <button type="button" class="image-upload1 btn btn-info"
                                                            data-toggle="modal" data-target="#myModal"
                                                            data-id="icon_type_{{$treatment->id}}">Upload / Replace
                                                        Image
                                                    </button>
                                                    <input id="hidden-image-icon_type_{{$treatment->id}}" type="hidden"
                                                           name="treatment[{{$treatment->id}}][icon_image]"
                                                           value="{{ $treatment->icon_image ?? null }}">
                                                    <div id="hidden-icon_type_{{$treatment->id}}" style="padding:25px">
                                                        @if(!empty($treatment->icon_image))
                                                            <img class="img-thumbnail" style="width:70px"
                                                                 src="{{ asset($treatment->icon_image) }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <h4 class="top_to_height">Featured Hospitals</h4>
                                @if(!empty($hospitals))
                                    @foreach($hospitals as $hospital)
                                        <div class="panel panel-default treat">
                                            <div class="panel-heading treat_head">
                                                <label>Featured Hospital #{{$hospital->id}}</label>
                                                <i style="float: right" class="fa fa-minus fa-fw"></i>
                                            </div>
                                            <div class="panel-body treat_body" style="display:none">
                                                <div class="form-group">
                                                    <label>Featured Image </label><br>
                                                    <button type="button" class="image-upload btn btn-info"
                                                            data-toggle="modal" data-target="#myModal"
                                                            data-id="feature_hospital_{{$hospital->id}}">Upload /
                                                        Replace Image
                                                    </button>
                                                    <input id="hidden-image-feature_hospital_{{$hospital->id}}"
                                                           type="hidden"
                                                           name="hospital[{{$hospital->id}}][featured_image]"
                                                           value="{{ $hospital->featured_image ?? null }}">
                                                    <div id="hidden-feature_hospital_{{$hospital->id}}"
                                                         style="padding:25px">
                                                        @if(!empty($hospital->featured_image))
                                                            <img class="img-thumbnail" style="width:150px"
                                                                 src="{{ asset($hospital->featured_image) }}">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Link</label>
                                                    <input class="form-control" name="hospital[{{$hospital->id}}][link]"
                                                           placeholder="Enter Link"
                                                           value="{{ isset($hospital->link) ? $hospital->link : old('link') }}">
                                                    @error('link')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <h4 class="top_to_height">About Medical Section</h4>
                                <div class="panel panel-default treat">
                                    <div class="panel-heading treat_head">
                                        <label>About Medical</label>
                                        <i style="float: right" class="fa fa-minus fa-fw"></i>
                                    </div>

                                    <div class="panel-body treat_body" style="display:none">

                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control"
                                                   name="aboutMedical[{{$aboutMedical->id}}][title]"
                                                   placeholder="Enter Title"
                                                   value="{{ isset($aboutMedical->title) ? $aboutMedical->title : old('title') }}">
                                            @error('title')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea id="myeditor" rows="3" class="form-control"
                                                      name="aboutMedical[{{$aboutMedical->id}}][description]"
                                                      placeholder="Enter The Description">{{ (old('description') != null) ? old('description') : $aboutMedical->description }}</textarea>
                                            <p class="help-block"></p>
                                            @error('description')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <h4 class="top_to_height">Country Flags</h4>
                                @if(!empty($countryFlags))
                                    @foreach($countryFlags as $countryFlag)
                                        <div class="panel panel-default treat">
                                            <div class="panel-heading treat_head">
                                                <label>Country Flag #{{$countryFlag->id}}</label>
                                                <i style="float: right" class="fa fa-minus fa-fw"></i>
                                            </div>
                                            <div class="panel-body treat_body" style="display:none">
                                                <div class="form-group">
                                                    <label>Featured Image </label><br>
                                                    <button type="button" class="image-upload btn btn-info"
                                                            data-toggle="modal" data-target="#myModal"
                                                            data-id="feature_countryFlag_{{$countryFlag->id}}">Upload / Replace
                                                        Image
                                                    </button>
                                                    <input id="hidden-image-feature_countryFlag_{{$countryFlag->id}}"
                                                           type="hidden" name="countryFlag[{{$countryFlag->id}}][featured_image]"
                                                           value="{{ $countryFlag->featured_image ?? null }}">
                                                    <div id="hidden-feature_countryFlag_{{$countryFlag->id}}"
                                                         style="padding:25px">
                                                        @if(!empty($countryFlag->featured_image))
                                                            <img class="img-thumbnail" style="width:150px"
                                                                 src="{{ asset($countryFlag->featured_image) }}">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input class="form-control" name="countryFlag[{{$countryFlag->id}}][name]"
                                                           placeholder="Enter Name"
                                                           value="{{ isset($countryFlag->name) ? $countryFlag->name : old('name') }}">
                                                    @error('name')
                                                    <label class="error">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif


                            </div>
                        </div>

                        <!-- /.col-lg-6 (nested) -->

                        <!-- /.col-lg-6 (nested) -->
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
            CKEDITOR.replace('intro_editor');
            /*

                  CKEDITOR.replace('myeditor1');

                  CKEDITOR.replace('myeditor2');

                  CKEDITOR.replace('myeditor3');

                  CKEDITOR.replace('myeditor4');*/
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

                    /* $('form').append('<input type="hidden" name="document[]" value="' + file.name + '">')*/
                    addImageToHidden(response.name);

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