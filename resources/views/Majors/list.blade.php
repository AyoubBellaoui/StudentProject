@extends('pages.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-dark text-white rounded-top">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">List of Majors</h5>
                        <a href="{{ route('Major.create') }}" class="btn btn-light btn-sm">
                            + Add Major
                        </a>
                    </div>
                </div>

                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table align-middle table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Nom</th>
                                    <th>Created at</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($majors->count() > 0)
                                @foreach ($majors as $major)
                                <tr>
                                    <td class="fw-semibold">{{ $major->name }}</td>
                                    <td>{{ $major->created_at->diffForHumans() }}</td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">

                                            <a href="{{ route('Major.edit', $major->id) }}"
                                                class="btn btn-outline-success btn-sm"
                                                title="edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>


                                            <button class="btn btn-outline-danger btn-sm"
                                                title="delete"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteMajor{{ $major->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                        {{-- Modal --}}
                                        <div class="modal fade"
                                            id="deleteMajor{{ $major->id }}"
                                            tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Confirm deletion
                                                        </h5>
                                                        <button type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <form action="{{ route('Major.delete', $major->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <div class="modal-body">
                                                            <p class="mb-0">
                                                                is you are confirmed that you want to delete this Major:
                                                                <strong>{{ $major->name }}</strong> ?
                                                            </p>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                Cancel
                                                            </button>
                                                            <button type="submit" class="btn btn-danger">
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        Major not found.
                                    </td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
