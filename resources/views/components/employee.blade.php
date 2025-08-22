@extends('components.layout.app')  <!-- Use the default layout -->

@section('title', 'Employee Management')  <!-- Set the page title specific to employee management -->

@section('content')
<div class="p-4 sm:p-8">
    <div class="mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Employee Management</h1>
        <p class="mt-1 text-base text-gray-600 dark:text-gray-400">
            Lihat, Tambah, Edit, and Kelola Karyawan dalam Perusahaan Anda.
        </p>
    </div>

    <div class="flex justify-end mb-4 space-x-4">
    </div>


    <livewire:employee.employee-table />

</div>
@endsection
