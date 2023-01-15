@extends('layouts.backend')
@section('page-title', 'Rooms')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Rooms
                </h3>



                <a href="{{ route('cpanel.rooms.create') }}" class="btn btn-primary push">Add</a>

            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hotel</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Price/Night</th>
                                <th>Home</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($rooms as $ind => $room)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $room->hotel->title }}</td>
                                    <td>{{ $room->title }}</td>

                                    <td>{{ $room->sub_title }}</td>
                                    <td>{{ $room->price_per_night }}</td>
                                    <td class="text-center">
                                        <x-home-page-badge :home_page="$room->home_page"></x-home-page-badge>
                                    </td>
                                    <td>
                                        <x-release-status-badge :code="$room->releaseStatus->code" :label="$room->releaseStatus->name" />
                                    </td>
                                    <td>{{ $room->created_at }}</td>
                                    <td>{{ $room->updated_at }}</td>

                                    <td>

                                        <div class="btn-group me-2 mb-2" role="group"
                                            aria-label="Icons Outline Text group">

                                            <a href="{{ route('cpanel.rooms.release', ['release_status' => 'published', 'room_id' => $room->id]) }}"
                                                class="btn btn-xs btn-outline-success " data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Publish">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <a href="{{ route('cpanel.rooms.release', ['release_status' => 'not_published', 'room_id' => $room->id]) }}"
                                                class="btn btn-xs btn-outline-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Un Publish">
                                                <i class="fa fa-ban"></i>
                                            </a>
                                            {{-- <a href="#" class="btn btn-xs btn-outline-secondary">
                                                <i class="fa fa-archive"></i>
                                            </a> --}}
                                            <a href={{ route('cpanel.rooms.edit', ['room' => $room]) }}
                                                class="btn btn-xs btn-outline-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <form id="form-{{ $room->id }}"
                                                action="{{ route('cpanel.rooms.destroy', $room->id) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <a onclick="confirmDelete({{ $room->id }})"
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
