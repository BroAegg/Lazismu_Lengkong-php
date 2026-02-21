<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\ProgramPillar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProgramController extends Controller
{
    public function index()
    {
        $programs = Program::with('pillar')->latest()->paginate(10);
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        $pillars = ProgramPillar::active()->ordered()->get();
        return view('admin.programs.create', compact('pillars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required|string|max:255',
            'pillar_id'       => 'required|exists:program_pillars,id',
            'description'     => 'required|string',
            'content'         => 'nullable|string',
            'psak_fund_type'  => 'required|string|in:' . implode(',', array_column(\App\Enums\PsakFundType::cases(), 'value')),
            'target_amount'   => 'required|numeric|min:0',
            'collected_amount'=> 'nullable|numeric|min:0',
            'donor_count'     => 'nullable|integer|min:0',
            'image'           => 'nullable|image|max:2048',
            'start_date'      => 'nullable|date',
            'end_date'        => 'nullable|date|after_or_equal:start_date',
        ]);

        $data = $request->except('image');
        $data['slug']        = Str::slug($request->title);
        $data['is_active']   = $request->boolean('is_active');
        $data['is_featured'] = $request->boolean('is_featured');
        $data['collected_amount'] = $request->input('collected_amount', 0);
        $data['donor_count']      = $request->input('donor_count', 0);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('programs', 'public');
        }

        Program::create($data);

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil dibuat.');
    }

    public function edit(Program $program)
    {
        $pillars = ProgramPillar::active()->ordered()->get();
        return view('admin.programs.edit', compact('program', 'pillars'));
    }

    public function update(Request $request, Program $program)
    {
        $request->validate([
            'title'           => 'required|string|max:255',
            'pillar_id'       => 'required|exists:program_pillars,id',
            'description'     => 'required|string',
            'content'         => 'nullable|string',
            'psak_fund_type'  => 'required|string|in:' . implode(',', array_column(\App\Enums\PsakFundType::cases(), 'value')),
            'target_amount'   => 'required|numeric|min:0',
            'collected_amount'=> 'nullable|numeric|min:0',
            'donor_count'     => 'nullable|integer|min:0',
            'image'           => 'nullable|image|max:2048',
            'start_date'      => 'nullable|date',
            'end_date'        => 'nullable|date|after_or_equal:start_date',
        ]);

        $data = $request->except('image');
        $data['is_active']   = $request->boolean('is_active');
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('programs', 'public');
        }

        $program->update($data);

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('admin.program.index')->with('success', 'Program berhasil dihapus.');
    }
}
