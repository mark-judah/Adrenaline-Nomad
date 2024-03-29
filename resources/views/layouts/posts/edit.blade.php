 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Edit Post</title>
     <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
     <!-- Fonts -->
     <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

 </head>


 <body>
    @extends('layouts.admin.admin_master')

     @section('content')
         <div class="col-xl-12">
             <div class="section_title text-center mb-55">
                 <br>
                 <h3><b>Edit Blog Post</b> </h3>

             </div>
         </div>

         <div class="container col-md-12 text-center">
             <form method="post" action='{{ url('/update_blog') }}'>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <input type="hidden" name="post_id" value="{{ $post->id }}{{ old('post_id') }}">
                 <div class="form-group">
                     <label for="blog_thumbnail">Blog Content</label>

                     <input required="required" placeholder="Enter title here" type="text" name="title" class="form-control"
                         value="@if (!old('title')) {{ $post->title }} @endif{{ old('title') }}" />
                 </div>

                 <fieldset class="form-group">
                     <label for="exampleSelect1">Edit Post Thumbnail?</label>
                     <select class="form-control" id="EditThumbnail">
                         <option value="option 1">No</option>
                         <option value="option 2">Yes</option>
                     </select>
                 </fieldset>

                 <div class="form-group" id="edit-thumbnail-field" style="display:none;">
                     <label for="blog_thumbnail">Edit Post Thumbnail</label>
                     <input type="file" name="blog_thumbnail" id="blog_thumbnail" onchange="loadPreview(this);"
                         class="form-control">
                     <div class="gallery">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="blog_thumbnail">Blog Content</label>
                     <textarea class="description" name="body">@if (!old('body'))
                                  {!! $post->body !!}
                                  @endif
                                  {!! old('body') !!}</textarea>
                     <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
                     <script>
                         tinymce.init({
                             selector: 'textarea.description',
                             width: 900,
                             height: 300,
                             plugins: 'paste',
                             paste_data_images: true

                         });

                     </script>
                 </div>

                 <div class="col-md-12 text-center">

                     @if ($post->active == '1')
                         <input type="submit" name='update' class="btn btn-success" value="Update" />
                     @else
                         <input type="submit" name='publish' class="btn btn-success" value="Publish" />
                     @endif
                     <input type="submit" name='save' class="btn btn-default" value="Save As Draft" />
                     <a href="{{ url('delete/' . $post->id . '?_token=' . csrf_token()) }}"
                         class="btn btn-danger">Delete</a>
                 </div>
             </form>
         </div>
         <br>
         <br>
     @endsection
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

     <script>
         $(document).ready(function() {
             $("#EditThumbnail").on("change", function(e) {
                 var v = $(this).val();
                 if (v == 'option 2') {
                     $("#edit-thumbnail-field").slideDown();
                 } else {
                     $("#edit-thumbnail-field").slideUp();
                 }
             });
         });

     </script>
 </body>

 </html>
