@extends('admin.layouts.app')

@section('content')

@push('head')
<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
@endpush
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ (Route::currentRouteName() == 'admin.user.create') ? 'ADD' : 'EDIT' }} User</h1>
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
                <form role="form" action="{{ (Route::currentRouteName() == 'admin.user.create') ? route('admin.user.store') : route('admin.user.update', ['user' => $user->id])  }}" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            
                                @csrf

                                @if(Route::currentRouteName() == 'admin.user.edit')
                                <input type="hidden" name="_method" value="PUT">
                                @endif
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" placeholder="Enter Name" value="{{ isset($user->name) ? $user->name : old('name') }}">
                                    @error('name')
                                        <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email" placeholder="Enter Email" value="{{ isset($user->slug) ? $user->slug : old('email') }}">
                                    @error('email')
                                        <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    @error('password')
                                        <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Password">
                                    @error('password_confirmation')
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