@extends('layout.master')

@section('content')

    @if (Session::get('success.message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="{{ trans('common.close') }}"><span aria-hidden="true">&times;</span></button>
            <strong>{{ trans('common.success') }}!</strong> {{ Session::get('success.message') }}
        </div>
    @endif

    @if (Session::get('error.message'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="{{ trans('common.close') }}"><span aria-hidden="true">&times;</span></button>
            <strong>{{ trans('common.error') }}!</strong> {{ Session::get('error.message') }}
        </div>
    @endif

    <div class="row">

        @include('layout.partials.navadmin')

        <div class="col-md-10">

            <div class="row">
                <div class="col-md-12">


                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('common.projects') }}</div>
                        <div class="panel-body">
                            <p>
                                {{ trans('common.projects_description') }}
                            </p>
                            <p>
                                {{ trans('common.projects_description_second') }}
                            </p>

                            <a class="btn btn-default" href="{{ url('admin/project/create') }}" role="button">{{ trans('common.create_project' )}}</a>
                        </div>

                        <!-- Table -->
                        <table class="table table-striped small">
                            <thead>
                            <tr>
                                <th>{{ trans('common.name') }}</th>
                                <th class="hidden-xs">{{ trans('common.issues') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td class="hidden-xs">{{ count($project->issues) }}</td>
                                    <td>
                                        <a class="btn btn-danger btn-xs pull-right" style="white-space: normal; margin-left: 5px;" href="{{ url('admin/project/delete/' . $project->id) }}" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <a class="btn btn-default btn-xs pull-right" style="white-space: normal;" href="{{ url('admin/project/edit/' . $project->id) }}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>



                </div>

            </div>




        </div>


    </div>

@endsection