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
                        <h5 class="card-title">Add Roles</h5>

                        <!-- General Form Elements -->
                        @if (session('success'))
                            <div class="text-success text-center mt-4">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('add.roles') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Role Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="role" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label"
                                    style="display: block"><b>Permissions</b></label>
                                @foreach ($permission as $group)
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            {{ $group['groupby'] }}
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                @foreach ($group['permissions'] as $item)
                                                    <div class="col-md-3">
                                                        <label for="permission_{{ $item['id'] }}">
                                                            <input type="checkbox" id="permission_{{ $item['id'] }}"
                                                                name="permission[]" value="{{ $item['id'] }}">
                                                            {{ $item['name'] }}
                                                        </label>

                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection
