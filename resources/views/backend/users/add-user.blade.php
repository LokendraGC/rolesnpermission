@extends('backend.layouts.app')

@section('main-content')
    <div class="pagetitle">
        <h1>Form Elements</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Elements</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Users</h5>

                        <!-- General Form Elements -->
                        @if (session('success'))
                            <div class="text-success text-center mt-4">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('add.user') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            @if (session('error'))
                                <div class="text-danger text-center mt-4">{{ session('success') }}</div>
                            @endif
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Roles</label>
                                <div class="col-sm-10">
                                    @if ($roles)
                                        <select name="role_id" id="role">
                                            <option value="default">Select Roles</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->role }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection
