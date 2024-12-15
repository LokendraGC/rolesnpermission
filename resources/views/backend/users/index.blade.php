@extends('backend.layouts.app')

@section('main-content')
    <div class="pagetitle">
        <h1>General Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">General</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                <div class="text-end pb-4">
                    <button class="btn btn-primary"><a href="{{ route('addUser') }}" style="color: white">Add
                            User</a></button>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">Users</h5>
                        </div>

                        <!-- Table with stripped rows -->
                        @if (session('success'))
                            <div class="text-success text-center mt-4">{{ session('success') }}</div>
                        @endif
                        @if ($userRecord)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">S.N</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($userRecord as $item)
                                        <tr>
                                            <th scope="row">{{ $item->id }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            @foreach ($roles as $role)
                                                <td>{{ $role->role }}</td>
                                            @endforeach
                                            <td>{{ $item->created_at }}</td>
                                            <td><a href="{{ route('edit.user', $item->id) }}">Edit</a> <a
                                                    href="{{ route('delete.user', $item->id) }}"
                                                    style="color: red">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @endif
                        <!-- End Table with stripped rows -->

                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection
