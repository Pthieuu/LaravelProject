@extends('tasks.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">✏️ Sửa công việc</h5>
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

                <form action="{{ route('tasks.update', $task) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Tên công việc</label>
                        <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            value="{{ old('title', $task->title) }}"
                            required
                        >
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea
                            class="form-control"
                            id="description"
                            name="description"
                            rows="3"
                        >{{ old('description', $task->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="due_date" class="form-label">Hạn chót</label>
                        <input
                            type="date"
                            class="form-control"
                            id="due_date"
                            name="due_date"
                            value="{{ old('due_date', $task->due_date) }}"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select id="status" class="form-select" name="status">
                            @foreach ($statusOptions as $value => $label)
                                <option value="{{ $value }}" @selected((string) old('status', $task->status) === (string) $value)>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">⬅ Quay lại</a>
                        <button type="submit" class="btn btn-success">✔ Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
