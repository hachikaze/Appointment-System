<?php

namespace App\Http\Controllers;

use App\Models\AuditTrail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuditTrailController extends Controller
{
    public function index(Request $request)
    {
        $query = AuditTrail::with(['user' => function ($query) {
            $query->select('id', 'firstname', 'middleinitial', 'lastname');
        }])->latest();

        if ($request->filled('search')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middleinitial', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('filter')) {
            $query->where('action', $request->filter);
        }

        $perPage = $request->get('perPage', 10);
        $auditTrails = $query->paginate($perPage)->appends($request->except('page'));

        return view('admin.log-history', compact('auditTrails'));
    }
}
