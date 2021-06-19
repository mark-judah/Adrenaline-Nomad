<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Post</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

</head>

<body>
    @extends('layouts.admin-master')


    @section('content')
        <div class="col-xl-12">
            <div class="section_title text-center mb-55">
                <br>
                <h3><b>Write Blog</b> </h3>

            </div>
        </div>
        <div class="container col-md-12 text-center">
            <form action="/new-post" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group col-md-12 col-md-offset-5 ">
                    <label for="title">Blog Title</label>
                    <input required="required" value="{{ old('title') }}" type="text" name="title" class="form-control" />
                    <br>
                    <div class="form-group">
                        <label for="blog_thumbnail">Choose Post Thumbnail</label>
                        {{-- <input required type="file" class="form-control" name="images[]" id="gallery-photo-add" multiple> --}}

                        <input type="file" name="blog_thumbnail" id="blog_thumbnail" onchange="loadPreview(this);"
                            class="form-control">
                        <div class="gallery">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="blog_thumbnail">Blog Content</label>
                        <textarea class="description" name="body">{{ old('body') }}</textarea>
                        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
                        <script>
                            tinymce.init({
                                selector: 'textarea.description',
                                width: 900,
                                height: 300,
                                plugins: 'paste',
                                paste_data_images: true,

                                image_class_list: [{
                                    title: 'img-responsive',
                                    value: 'img-responsive'
                                }, ]
                            });

                        </script>
                    </div>
                </div>


                <div class="col-md-12 text-center">
                    <input type="submit" name='publish' class="btn btn-success" value="Publish" />
                    <input type="submit" name='save' class="btn btn-default" value="Save Draft" />
                </div>
            </form>
        </div>
        <br>
        {{-- <script>
     $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
    
    </script> --}}
    @endsection
</body>

</html>
