@extends('layouts.backend')
@section('page-title', 'Activities')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Activities
                </h3>



                <a href="{{ route('cpanel.activities.create') }}" class="btn btn-primary push">Add</a>

            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Max Children</th>
                                <th>Max Adults</th>
                                <th>Max People</th>
                                <th>Price/Person</th>
                                <th>Duration</th>
                                <th>Duration Unit</th>
                                <th>Lat</th>
                                <th>Long</th>
                                <th>Home</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($activities as $ind => $activity)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $activity->title }}</td>

                                    <td>{{ $activity->max_children }}</td>
                                    <td>{{ $activity->max_adults }}</td>
                                    <td>{{ $activity->max_people }}</td>
                                    <td>{{ $activity->price_per_person }}</td>
                                    <td>{{ $activity->duration }}</td>
                                    <td>{{ $activity->duration_unit }}</td>
                                    <td>{{ $activity->lat }}</td>
                                    <td>{{ $activity->lng }}</td>

                                    <td class="text-center">
                                        <x-home-page-badge :home_page="$activity->home_page"></x-home-page-badge>
                                    </td>
                                    <td>
                                        <x-release-status-badge :code="$activity->releaseStatus->code" :label="$activity->releaseStatus->name" />
                                    </td>

                                    <td>{{ $activity->created_at }}</td>
                                    <td>{{ $activity->updated_at }}</td>


                                    <td>

                                        <div class="btn-group me-2 mb-2" role="group"
                                            aria-label="Icons Outline Text group">

                                            <a href="{{ route('cpanel.activities.release', ['release_status' => 'published', 'activity_id' => $activity->id]) }}"
                                                class="btn btn-xs btn-outline-success " data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Publish">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <a href="{{ route('cpanel.activities.release', ['release_status' => 'not_published', 'activity_id' => $activity->id]) }}"
                                                class="btn btn-xs btn-outline-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Un Publish">
                                                <i class="fa fa-ban"></i>
                                            </a>
                                            {{-- <a href="#" class="btn btn-xs btn-outline-secondary">
                                                <i class="fa fa-archive"></i>
                                            </a> --}}
                                            <a href={{ route('cpanel.activities.edit', ['activity' => $activity]) }}
                                                class="btn btn-xs btn-outline-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <form id="form-{{ $activity->id }}"
                                                action="{{ route('cpanel.activities.destroy', $activity->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <a onclick="confirmDelete({{ $activity->id }})"
                                                    class="btn btn-xs btn-outline-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Delete">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>

                                            </form>


                                        </div>

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
    <!-- END Page Content -->
@endsection

@section('js_after')


@endsection
