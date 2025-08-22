<?php

namespace App\Livewire\User;

use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\User;
use App\Exports\UsersExport;

class ExportUser extends Component
{
     public function exportPdf()
    {
        $users = User::all();
        $pdf = Pdf::loadView('export.userpdf', compact('users'));

        return response()->streamDownload(
            fn () => print($pdf->output()), 'users.pdf'
        );
    }

    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function render()
    {
        return <<<'blade'
            <div class="space-x-2 flex">
                <button wire:click="exportPdf" class="flex items-center px-4 py-2 bg-red-700 hover:bg-red-800 text-white rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19.5 3H9C7.9 3 7 3.9 7 5v14c0 1.1.9 2 2 2h6c.55 0 1-.45 1-1v-1.17l3.29 3.3c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41l-3.3-3.29H19.5c1.1 0 2-.9 2-2v-9.5c0-1.1-.9-2-2-2zm-5 14H9v-2h5.5v1.17l1.83 1.83H14.5zm3-6h-4V7h2.5L17.5 9.5z"/>
                    </svg>
                    Export PDF
                </button>
                <button wire:click="exportExcel" class="flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 19h16M4 5h16M9 5v14M15 5v14M12 9v6"/>
                    </svg>
                    Export Excel
                </button>
                <a href="{{ route('export.users.txt') }}" class="flex items-center px-4 py-2 bg-gray-700 hover:bg-gray-800 text-white rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16v16H4z"/>
                        <path d="M8 8h8M8 12h8M8 16h8"/>
                    </svg>
                    Export TXT
                </a>
            </div>
        blade;

    }
}
