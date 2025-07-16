@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-success text-white rounded-top-4">
                    <h5 class="mb-0">@lang('messages.create_task')</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">@lang('messages.title')</label>
                            <input type="text" class="form-control rounded-pill" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">@lang('messages.description')</label>
                            <textarea class="form-control rounded-4" id="description" name="description" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tags" class="form-label">@lang('messages.tags')</label>
                            <input type="text" class="form-control rounded-pill" id="tags" name="tags" placeholder="@lang('messages.tags_placeholder')">
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="due_date" class="form-label">@lang('messages.due_date')</label>
                                <input type="date" class="form-control rounded-pill" id="due_date" name="due_date">
                            </div>
                            <div class="col">
                                <label for="estimated_time" class="form-label">@lang('messages.estimated_time_h')</label>
                                <input type="number" class="form-control rounded-pill" id="estimated_time" name="estimated_time" min="0">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="assigned_to" class="form-label">@lang('messages.assign_to')</label>
                                <select class="form-select rounded-pill" id="assigned_to" name="assigned_to">
                                    <option value="">@lang('messages.select_user')</option>
                                    {{-- Aquí irán los usuarios --}}
                                </select>
                            </div>
                            <div class="col">
                                <label for="priority" class="form-label">@lang('messages.priority')</label>
                                <select class="form-select rounded-pill" id="priority" name="priority">
                                    <option value="low">@lang('messages.low')</option>
                                    <option value="medium">@lang('messages.medium')</option>
                                    <option value="high">@lang('messages.high')</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg rounded-pill px-4">@lang('messages.save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 