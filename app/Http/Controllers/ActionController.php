<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ActionController extends Controller
{
    private const SDGS = [
        1 => 'No Poverty',
        2 => 'Zero Hunger',
        3 => 'Good Health and Well-being',
        4 => 'Quality Education',
        5 => 'Gender Equality',
        6 => 'Clean Water and Sanitation',
        7 => 'Affordable and Clean Energy',
        8 => 'Decent Work and Economic Growth',
        9 => 'Industry, Innovation and Infrastructure',
        10 => 'Reduced Inequalities',
        11 => 'Sustainable Cities and Communities',
        12 => 'Responsible Consumption and Production',
        13 => 'Climate Action',
        14 => 'Life Below Water',
        15 => 'Life on Land',
        16 => 'Peace, Justice and Strong Institutions',
        17 => 'Partnerships for the Goals',
    ];

    public function index()
    {
        $actions = Action::latest()->get();
        $completed = $actions->where('status', 'done')->count();

        return view('welcome', [
            'actions' => $actions,
            'sdgs' => self::SDGS,
            'stats' => [
                'total' => $actions->count(),
                'completed' => $completed,
                'impact' => $actions->sum('impact_score'),
                'completion_rate' => $actions->count() > 0 ? round(($completed / $actions->count()) * 100) : 0,
            ],
            'focusSdgs' => $actions
                ->groupBy('sdg_number')
                ->map(fn ($group) => [
                    'title' => $group->first()->sdg_title,
                    'count' => $group->count(),
                    'impact' => $group->sum('impact_score'),
                ])
                ->sortByDesc('impact')
                ->take(4),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sdg_number' => ['required', 'integer', Rule::in(array_keys(self::SDGS))],
            'title' => ['required', 'string', 'max:120'],
            'description' => ['required', 'string', 'max:600'],
            'owner' => ['required', 'string', 'max:80'],
            'impact_score' => ['required', 'integer', 'min:1', 'max:10'],
            'status' => ['required', Rule::in(['planned', 'doing', 'done'])],
        ]);

        $validated['sdg_title'] = self::SDGS[(int) $validated['sdg_number']];
        $validated['completed_at'] = $validated['status'] === 'done' ? now() : null;

        Action::create($validated);

        return redirect()->route('actions.index')->with('success', 'Action added to your SDG tracker.');
    }

    public function updateStatus(Action $action)
    {
        $nextStatus = $action->status === 'done' ? 'doing' : 'done';

        $action->update([
            'status' => $nextStatus,
            'completed_at' => $nextStatus === 'done' ? now() : null,
        ]);

        return redirect()->route('actions.index')->with('success', 'Action status updated.');
    }

    public function destroy(Action $action)
    {
        $action->delete();

        return redirect()->route('actions.index')->with('success', 'Action removed from your SDG tracker.');
    }
}
