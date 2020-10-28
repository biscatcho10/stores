@extends('layouts.admin')

@section('title', __('admin/languages.languages') )

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> {{__('admin/languages.languages')}} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href=" route('admin.dashboard') ">{{__('admin/languages.home')}}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{__('admin/languages.languages')}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{__('admin/languages.all languages')}} </h4>
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
                                <div class="card-body card-dashboard">
                                    <table class="table display nowrap table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th> {{__('admin/languages.name')}}</th>
                                                <th>{{__('admin/languages.abbr')}}</th>
                                                <th>{{__('admin/languages.dir')}}</th>
                                                <th>{{__('admin/languages.status')}}</th>
                                                <th>{{__('admin/languages.actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($langs)
                                            @foreach ($langs as $lang)
                                            <tr>
                                                <td> {{ $lang->name }} </td>
                                                <td> {{ $lang->abbr }} </td>
                                                <td> {{ $lang->direction }} </td>
                                                <td> {{ $lang->getActive() }} </td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href=" {{ route('admin.languages.edit', $lang->id) }} "
                                                            class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{__('admin/languages.edit')}}</a>

                                                        <a href=" {{ route('admin.languages.delete', $lang->id) }} "
                                                            class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{__('admin/languages.delete')}}</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endisset
                                        </tbody>
                                    </table>
                                    <div class="justify-content-center d-flex">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection