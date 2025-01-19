<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'total_reports' => Report::count(),
            'approved_reports' => Report::where('status', 'approved')->count(),
            'rejected_reports' => Report::where('status', 'rejected')->count(),
            'pending_reports' => Report::where('status', 'pending')->count(),
        ];
    
        $reports = Report::all();
    
        return view('admin.index', compact('stats', 'reports'));
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('admin.show', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->status = $request->status;
        $report->save();

        return redirect('/admin');
    }
    public function downloadPDF($id)
    {
        $report = Report::findOrFail($id);

        $pdf = PDF::loadView('admin.report_pdf', compact('report'));
        return $pdf->download('Laporan_Jalan_Rusak.pdf');
    }
}
