@extends('layouts.admin')

@section('title', __("admin\products.add product") )

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__("admin\products.home")}} </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('admin.products')}}"> {{__("admin\products.products")}} </a>
                            </li>
                            <li class="breadcrumb-item active">  {{__("admin\products.add product")}}
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
                                <h4 class="card-title" id="basic-layout-form"> {{__("admin\products.add product")}} </h4>
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
                                    <form class="form" action="{{route('admin.products.general.store')}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> {{__("admin\products.product data")}} </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">{{__("admin\products.name")}}
                                                        </label>
                                                        <input type="text" id="name" class="form-control"
                                                            placeholder="  " value="{{old('name')}}" name="name">
                                                        @error("name")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="slug">{{__("admin\products.slug")}}
                                                        </label>
                                                        <input type="text" id="slug" class="form-control"
                                                            placeholder="  " value="{{old('slug')}}" slug="slug">
                                                        @error("slug")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="description"> {{__("admin\products.desc")}}
                                                        </label>
                                                        <textarea name="description" id="description"  rows="2" class="form-control"></textarea>
                                                        @error("description")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="short_description"> {{__("admin\products.short-desc")}}
                                                        </label>
                                                        <textarea name="short_description" id="short_description"  rows="2" class="form-control"></textarea>
                                                        @error("short_description")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label> {{__('admin/products.choose the category')}}</label>
                                                        <select name="categories[]" class="select2 form-control" multiple>
                                                            <optgroup>
                                                                @if($categories && $categories -> count() > 0)
                                                                    @foreach($categories as $category)
                                                                        <option
                                                                            value="{{$category->id }}" class="form-control">{{$category->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </optgroup>
                                                        </select>
                                                        @error('categories')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label> {{__('admin/products.choose the tags')}}</label>
                                                        <select name="tags[]" class="select2 form-control" multiple>
                                                            <optgroup>
                                                                @if($tags && $tags -> count() > 0)
                                                                    @foreach($tags as $tag)
                                                                        <option
                                                                            value="{{$tag->id }}" class="form-control">{{$tag->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </optgroup>
                                                        </select>
                                                        @error('tags')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label> {{__('admin/products.choose the brand')}}</label>
                                                        <select name="brand_id" class="select2 form-control">
                                                            <optgroup>
                                                                <option value="" selected>Select The Brand</option>
                                                                @if($brands && $brands -> count() > 0)
                                                                    @foreach($brands as $brand)
                                                                        <option
                                                                            value="{{$brand->id }}" class="form-control">{{$brand->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </optgroup>
                                                        </select>
                                                        @error('brand_id')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" value="1" name="is_active"
                                                            id="switcheryColor4" class="switchery" data-color="success"
                                                            checked />
                                                        <label for="switcheryColor4" class="card-title ml-1">{{__("admin\products.status")}}</label>
                                                        @error("is_active")
                                                        <span class="text-danger">{{$message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                onclick="history.back();">
                                                <i class="ft-x"></i> {{__("admin\products.back")}}
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> {{__("admin\products.save")}}
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
