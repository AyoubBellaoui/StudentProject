@extends('pages.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-dark text-white text-center rounded-top">
                    <h5 class="mb-0">Create Student</h5>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Student fullname -->
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Student fullname <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="fullname"
                                id="fullname"
                                placeholder="Ex : Student fullname"
                                class="form-control @error('name') is-invalid @enderror"
                                >

                            @error('fullname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Student Date of Birth -->
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">
                                Date of Birth <span class="text-danger">*</span>
                            </label>

                            <input
                                type="date"
                                name="date_of_birth"
                                id="date_of_birth"
                                class="form-control @error('date_of_birth') is-invalid @enderror"
                            >

                            @error('date_of_birth')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Student Gender -->
                        <div class="mb-3">
                            <label for="gender" class="form-label">
                                Gender <span class="text-danger">*</span>
                            </label>

                            <select
                                name="gender"
                                id="gender"
                                class="form-control @error('gender') is-invalid @enderror"
                            >
                                <option value="">Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>

                            @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Student Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label">
                                Student Image <span class="text-danger">*</span>
                            </label>

                            <input
                                type="file"
                                name="image"
                                id="image"
                                class="form-control @error('image') is-invalid @enderror"
                            >

                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Student Major -->
                        <div class="mb-4">
                            <label class="form-label">
                                Major <span class="text-danger">*</span>
                            </label>
                            <select
                                name="major_id"
                                class="form-select @error('major_id') is-invalid @enderror"
                            >
                                <option value="">Select an Major</option>
                                @foreach ($majors as $major)
                                    <option
                                        value="{{ $major->id }}"
                                        {{ old('major_id') == $major->id ? 'selected' : '' }}
                                    >
                                        {{ $major->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('major_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark">
                                Submit
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
