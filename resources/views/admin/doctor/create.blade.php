@extends('admin.layouts.app')

@section('content')

@push('head')
<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
@endpush

@php
    
    $qualification = isset($doctor->qualification) ? explode(',', $doctor->qualification) : [];
    $qualification = (old('qualification') != null) ? old('qualification') : $qualification;


    $speciality = isset($doctor->speciality) ? explode(',', $doctor->speciality) : [];
    $speciality = (old('speciality') != null) ? old('speciality') : $speciality;
@endphp

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ (Route::currentRouteName() == 'doctor.create') ? 'ADD' : 'EDIT' }} DOCTOR</h1>
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
                <form role="form" action="{{ (Route::currentRouteName() == 'doctor.create') ? route('doctor.store') : route('doctor.update', ['doctor' => $doctor->id])  }}" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            
                                @csrf

                                @if(Route::currentRouteName() == 'doctor.edit')
                                <input type="hidden" name="_method" value="PUT">
                                @endif
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" placeholder="Enter Doctor Name" value="{{ isset($doctor->name) ? $doctor->name : old('name') }}">
                                    @error('name')
                                        <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" name="slug" placeholder="Enter The Slug" value="{{ isset($doctor->slug) ? $doctor->slug : old('slug') }}">
                                    <p class="help-block">Example: random-doctor</p>
                                    @error('slug')
                                        <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input class="form-control" name="designation" placeholder="Designation" value="{{ isset($doctor->designation) ? $doctor->designation : old('designation') }}">
                                    @error('designation')
                                        <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Experience</label>
                                    <select class="form-control" name="experience">
                                        @for($i=1; $i<=50; $i++)
                                        <option  value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>    
                                    
                                   <!-- <input class="form-control" name="experience" placeholder="Experience" value="{{ isset($doctor->experience) ? $doctor->experience : old('experience') }}">
                                    @error('experience')
                                        <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>-->

                                <div class="form-group">
                                    <label>Qualification&nbsp;</label>
                                    <label class="checkbox-inline">
                                        <input @if(in_array('MBBS', $qualification)) checked @endif type="checkbox" name="qualification[]" value="MBBS">MBBS
                                    </label>
                                    <label class="checkbox-inline">
                                        <input @if(in_array('MS', $qualification)) checked @endif type="checkbox" name="qualification[]" value="MS">MS
                                    </label>
                                    <label class="checkbox-inline">
                                        <input @if(in_array('MD', $qualification)) checked @endif type="checkbox" name="qualification[]" value="MD">MD
                                    </label>
                                    <label class="checkbox-inline">
                                        <input @if(in_array('MCH', $qualification)) checked @endif type="checkbox" name="qualification[]" value="MCH">MCH
                                    </label>
                                    @error('qualification')
                                        <br><label class="error">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Speciality</label>
                                    <select name="speciality[]" multiple class="form-control speciality_class">
                                        @if($doctorSpecialities->count())
                                            @foreach($doctorSpecialities as $doctorSpeciality)
                                                <option @if(in_array($doctorSpeciality->name, $speciality)) selected @endif>{{ $doctorSpeciality->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('speciality')
                                        <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Categories</label>
                                    <select name="category_id" class="form-control">
                                    @forelse($categories as $category)
                                        <option @if( $category->id == old('category_id') || $category->id == @$doctor->category_id) selected  @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty

                                    @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Hospital</label>
                                    <select name="hospital_id" class="form-control">
                                    @forelse($hospitals as $hospital)
                                        <option @if( $hospital->id == old('hospital_id') || $hospital->id == @$doctor->hospital_id) selected  @endif value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                    @empty

                                    @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                <label>About Doctor</label>
                                <textarea name="about" class="form-control" id="myeditor" rows="3">{{ (old('about') != null) ? old('about') : @$doctor->about }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Specializations</label>
                                <!-- creating a text area for my editor in the form -->
                                <textarea name="specialization" class="form-control" id="myeditor1" name="specialization">{{ (old('specialization') != null) ? old('specialization') : @$doctor->specialization }}</textarea>
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
                                       name="image"
                                       value="{{ $doctor->image ?? null }}">
                                <div id="hidden-vision_1"
                                     style="padding:25px">
                                    @if(!empty($doctor->image))
                                        <img class="img-thumbnail" style="width:150px"
                                             src="{{ asset($doctor->image) }}">
                                    @endif
                                </div>
                            </div>
                    {{--        <div class="form-group">
                                <label>Inner Image </label><br>
                                <button type="button" id="image-upload1" class="btn btn-info" data-toggle="modal" data-target="#myModal">Upload / Replace Image</button>
                                <input id="hidden-image-inner" type="hidden" name="image">
                                <div id="hidden-inner" style="padding:25px">
                                    @if(@$doctor->image!="")
                                        <img class="img-thumbnail" style="width:150px" src="{{ asset(@$hospital->image) }}">
                                    @endif
                                </div>
                            </div>--}}
                        </div>

                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6">

                        <div class="form-group">
                            <div class="form-group">
                                <label>Seo Title</label>
                                <input class="form-control" name="meta_title" placeholder="Enter the Seo Title" value="{{ isset($doctor->meta_title) ? $doctor->meta_title : old('meta_title') }}">
                                @error('meta_title')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Seo Description</label>
                                <textarea name="meta_description" class="form-control" {{--id="myeditor2"--}} rows="3">{{ (old('meta_description') != null) ? old('meta_description') : (!empty($doctor) ? $doctor->meta_description : null) }}</textarea>
                                @error('meta_description')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                                <label>States</label>
                                <select required id="state" class="form-control" name="state">
                                <option value="">-- Please select --</option>
                                @foreach($states as $state)
                                    <option @if($state->name == @ $doctor->state || old('state') == $state->name) selected @endif value="{{ $state->name }}">{{ $state->name }}</option>
                                @endforeach
                                </select>
                                </div>

                                <div class="form-group">
                                <label>Cities</label>
                                <div id="cities">
                                <select required  class="form-control" name="city">
                                <option value="">-- Please select --</option>
                                @forelse($cities as $city)
                                    <option @if($city->name == @ $doctor->city || old('city') == $city->name) selected @endif value="{{ $city->name }}">{{ $city->name }}</option>
                                @empty

                                @endforelse  
                                </select>
                                </div>
                                </div> 

                                <div class="form-group">
                                <label>Location</label>
                                <input type="text" name="location" value="{{ isset($doctor->location) ? $doctor->location : old('location') }}" class="form-control">
                                </div>

                            <div class="form-group">
                                <label>List Of Awards</label>
                                <textarea name="list_of_awards" id="myeditor2" class="form-control" rows="3">{{ (old('list_of_awards') != null) ? old('list_of_awards') : @$doctor->list_of_awards }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Work Experience</label>
                                <textarea name="work_experience" class="form-control" id="myeditor3" rows="3">{{ (old('work_experience') != null) ? old('work_experience') : @$doctor->work_experience }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Education & Training</label>
                                <textarea name="education_training" class="form-control" id="myeditor4" rows="3">{{ (old('education_training') != null) ? old('education_training') : @$doctor->education_training }}</textarea>
                            </div>

                        </div>



                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-warning">Submit</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>
                        </div>
                    
                    </div>
                    <!-- /.row (nested) -->
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
<!-- /.row -->

@push('foot')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!-- creating a CKEditor instance called myeditor -->
    <script type="text/javascript">
        CKEDITOR.replace('myeditor');
        CKEDITOR.replace('myeditor1');
        CKEDITOR.replace('myeditor2');
        CKEDITOR.replace('myeditor3');
        CKEDITOR.replace('myeditor4');
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

              /*$('form').append('<input type="hidden" name="document[]" value="' + file.name + '">')*/
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


      $(document).on('click','.image-upload', function () {
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

$('#image-upload1').on('click', function(){
    $('#image_type').val('inner');
    $.ajax({
        type: "get",
        url: "{{ route('image-upload.all') }}",
        data: '',
        headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function(data){
            $("#image-content").html(data);
        }
    });  
});

$('#state').on('change', function(){
    var datastring = $(this).val();
    $.ajax({
        url: "{{ route('city-list') }}",
        type: "post",
        data: {stateId: datastring},
        headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function(data){
            $("#cities").html(data);
        }
    });
});

      $(document).ready(function() {
          $('.speciality_class').select2();
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