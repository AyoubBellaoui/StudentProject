@extends('pages.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-dark text-white text-center">
                    <h5>Edit Student</h5>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Fullname -->
                        <div class="mb-3">
                            <label class="form-label">Fullname</label>
                            <input type="text" name="fullname"
                                value="{{ old('fullname', $student->fullname) }}"
                                class="form-control">
                        </div>

                        <!-- Date -->
                        <div class="mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="date_of_birth"
                                value="{{ old('date_of_birth', $student->date_of_birth) }}"
                                class="form-control">
                        </div>

                        <!-- Gender -->
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">

                            <br>
                            <img src="{{ asset('storage/'.$student->image) }}" width="80">
                        </div>

                        <!-- Major -->
                        <div class="mb-3">
                            <label class="form-label">Major</label>
                            <select name="major_id" class="form-control">
                                @foreach ($majors as $major)
                                    <option value="{{ $major->id }}"
                                        {{ $student->major_id == $major->id ? 'selected' : '' }}>
                                        {{ $major->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-dark w-100">Update</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
