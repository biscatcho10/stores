@extends('layouts.admin')

@section('title', __('admin\languages. languages') )

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('admin/languages.home')}} </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('admin.languages')}}"> {{__('admin/languages.languages')}} </a>
                            </li>
                            <li class="breadcrumb-item active">{{__('admin/languages.add language')}}
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
                                <h4 class="card-title" id="basic-layout-form"> {{__('admin/languages.add language')}} </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
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
                                    <form class="form" action=" {{ route('admin.languages.store') }} " method="POST" ctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> {{__('admin/languages.language data')}} </h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> {{__('admin/languages.name')}} </label>
                                                        <input type="text" value="" id="name"
                                                               class="form-control"
                                                               placeholder="{{__('admin/languages.enter language name')}} "
                                                               name="name">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> {{__('admin/languages.abbr')}}</label>
                                                        <input type="text" value="" id="name"
                                                               class="form-control"
                                                               placeholder="{{__('admin/languages.enter language abbr')}}  "
                                                               name="abbr">
                                                        @error('abbr')
                                                            <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                   </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2"> {{__('admin/languages.dir')}} </label>
                                                        <select name="direction" class="select2 form-control">
                                                            <optgroup label="{{__('admin/languages.please choose the dir')}} ">
                                                                <option value="rtl">{{__('admin/languages.right to left')}}</option>
                                                                <option value="ltr">{{__('admin/languages.left to right')}}</option>
                                                            </optgroup>
                                                        </select>
                                                        @error('direction')
                                                            <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" name="active"
                                                               id="switcheryColor4"
                                                               value="1"
                                                               class="switchery" data-color="success"
                                                               checked/>
                                                        <label for="switcheryColor4"
                                                               class="card-title ml-1">{{__('admin/languages.status')}} </label>
                                                        @error('active')
                                                            <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> {{__('admin/languages.back')}}
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> {{__('admin/languages.save')}}
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
@endsection
