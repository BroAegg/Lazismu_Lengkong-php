<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramPillar;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $pillars = ProgramPillar::active()->ordered()->get();

        $query = Program::with('pillar')->active();

        if ($request->filled('pilar')) {
            $query->whereHas('pillar', fn($q) => $q->where('slug', $request->pilar));
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $programs = $query->latest()->paginate(9);

        return view('pages.program', compact('programs', 'pillars'));
    }

    public function show(string $slug)
    {
        $program = Program::with(['pillar', 'donations' => function ($q) {
            $q->verified()->latest()->take(10);
        }])->where('slug', $slug)->firstOrFail();

        $relatedPrograms = Program::active()
            ->where('id', '!=', $program->id)
            ->where('pillar_id', $program->pillar_id)
            ->take(3)
            ->get();

        return view('pages.program-detail', compact('program', 'relatedPrograms'));
    }
}
