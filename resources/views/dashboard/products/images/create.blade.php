@extends('layouts.admin')

@section('title', __("admin\products.product images") )

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href=" {{route('admin.dashboard')}} ">{{__("admin\products.home")}} </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href=" {{route('admin.products')}} ">{{__("admin\products.products")}}</a>
                            </li>
                            <li class="breadcrumb-item active">
                                {{__("admin\products.product images")}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">  {{__("admin\products.product images")}} </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @include('dashboard.includes.alerts.success')
                            @include('dashboard.includes.alerts.errors')
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        @isset($images)
                                            @foreach ($images as $image)
                                            <div class="col-2">
                                                <img src=" {{$image->photo}} " class="rounded mb-1" style="width: 150px; height: 150px;"> <br>
                                                <a href=" {{route('admin.products.delete.images', $image->id)}} " class="btn btn-danger w-25 mx-3"> X </a>
                                            </div>
                                            @endforeach
                                        @endisset
                                    </div>
                                    <form class="form" action="{{route('admin.products.images.store.db')}}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="product_id" value="{{$id}}">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i>  {{__("admin\products.product images")}} </h4>
                                            <div class="form-group">
                                                <div id="dpz-multiple-files" class="dropzone dropzone-area">
                                                    <div class="dz-message">{{__('admin\products.you can upload more than photo')}}</div>
                                                </div>
                                                <br><br>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                onclick="history.back();">
                                                <i class="ft-x"></i> {{__("admin\products.back")}}
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> {{__("admin\products.update")}}
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>

@stop

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>

<script>
    var uploadedDocumentMap = {}
    Dropzone.options.dpzMultipleFiles = {
        paramName: "dzfile", // The name that will be used to transfer the file
        //autoProcessQueue: false,
        maxFilesize: 5, // MB
        clickable: true,
        addRemoveLinks: true,
        acceptedFiles: 'image/*',
        dictFallbackMessage: " المتصفح الخاص بكم لا يدعم خاصيه تعدد الصوره والسحب والافلات ",
        dictInvalidFileType: "لايمكنك رفع هذا النوع من الملفات ",
        dictCancelUpload: "الغاء الرفع ",
        dictCancelUploadConfirmation: " هل انت متاكد من الغاء رفع الملفات ؟ ",
        dictRemoveFile: "حذف الصوره",
        dictMaxFilesExceeded: "لايمكنك رفع عدد اكثر من هضا ",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        url: "{{ route('admin.products.images.store') }}", // Set the url
        success: function (file, response) {
            $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name
        },
        removedfile: function (file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            $('form').find('input[name="document[]"][value="' + name + '"]').remove()
        },
        // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
        init: function () {
            @if(isset($event) && $event -> document)
            var files = {
                !!json_encode($event -> document) !!
            }
            for (var i in files) {
                var file = files[i]
                this.options.addedfile.call(this, file)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
            }
            @endif
        }
    }

    // $(document).on('click', '.delete', function(){
    //  user_id = $(this).attr('id');
    //  $('#confirmModal').modal('show');
    // });
    // $('#ok_button').click(function(){
    //  $.ajax({
    //   url:"ajax-crud/destroy/"+user_id,
    //   beforeSend:function(){
    //    $('#ok_button').text('Deleting...');
    //   },
    //   success:function(data)
    //   {
    //    setTimeout(function(){
    //     $('#confirmModal').modal('hide');
    //     $('#user_table').DataTable().ajax.reload();
    //    }, 2000);
    //   }
    //  })
    // });
</script>
@stop
