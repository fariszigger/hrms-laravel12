@extends('components.layout.app')

@section('title', 'Create Employee Management')

@section('content')
<div class="p-4 sm:p-8">
    <div class="mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Create Employee Management</h1>
        <p class="mt-1 text-base text-gray-600 dark:text-gray-400">
            Create Employee to your Corporation.
        </p>
    </div>
    <livewire:employee.employee-create/>
</div>
@endsection

@push('js')

@endpush
