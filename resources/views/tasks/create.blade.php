@extends('tasks.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h4 class="mb-0">Tạo công việc mới</h4>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Có lỗi xảy ra:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Tên công việc</label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                class="form-control"
                                value="{{ old('title') }}"
                                placeholder="Nhập tên công việc"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả</label>
                            <textarea
                                id="description"
                                name="description"
                                class="form-control"
                                rows="4"
                                placeholder="Nhập mô tả nếu cần"
                            >{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="due_date" class="form-label">Hạn chót</label>
                            <input
                                type="date"
                                id="due_date"
                                name="due_date"
                                class="form-control"
                                value="{{ old('due_date') }}"
                            >
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select id="status" name="status" class="form-select" required>
                                @foreach ($statusOptions as $value => $label)
                                    <option value="{{ $value }}" @selected((string) old('status', 0) === (string) $value)>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
                                Quay lại
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Lưu công việc
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
