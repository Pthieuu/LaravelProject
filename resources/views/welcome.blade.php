<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SDG Action Tracker</title>
    <style>
        :root {
            color-scheme: light;
            --ink: #18232f;
            --muted: #64717f;
            --line: #dfe6ee;
            --paper: #ffffff;
            --soft: #f5f8fb;
            --green: #15855a;
            --blue: #1f6feb;
            --red: #d64045;
            --yellow: #f2b705;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--soft);
            color: var(--ink);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            line-height: 1.5;
        }

        a {
            color: inherit;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 5;
            border-bottom: 1px solid var(--line);
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(14px);
        }

        .shell {
            width: min(1180px, calc(100% - 32px));
            margin: 0 auto;
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            min-height: 70px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 800;
        }

        .mark {
            display: grid;
            width: 40px;
            height: 40px;
            place-items: center;
            border-radius: 8px;
            background: conic-gradient(from 20deg, #e5243b, #dda63a, #4c9f38, #26bde2, #fcc30b, #c5192d, #e5243b);
            color: #fff;
            font-size: 13px;
            letter-spacing: 0;
            text-shadow: 0 1px 8px rgba(0, 0, 0, 0.35);
        }

        .nav-links {
            display: flex;
            gap: 14px;
            color: var(--muted);
            font-size: 14px;
        }

        .hero {
            display: grid;
            grid-template-columns: minmax(0, 1.08fr) minmax(340px, 0.92fr);
            gap: 28px;
            padding: 42px 0 24px;
            align-items: stretch;
        }

        .hero-copy {
            min-height: 390px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .eyebrow {
            margin: 0 0 14px;
            color: var(--green);
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 0;
            text-transform: uppercase;
        }

        h1 {
            margin: 0;
            max-width: 760px;
            font-size: clamp(42px, 6vw, 76px);
            line-height: 0.96;
            letter-spacing: 0;
        }

        .lead {
            max-width: 680px;
            margin: 22px 0 0;
            color: var(--muted);
            font-size: 18px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 28px;
        }

        .button,
        button {
            min-height: 42px;
            border: 0;
            border-radius: 8px;
            padding: 10px 16px;
            background: var(--ink);
            color: #fff;
            font: inherit;
            font-weight: 750;
            cursor: pointer;
            text-decoration: none;
        }

        .button.secondary,
        button.secondary {
            border: 1px solid var(--line);
            background: #fff;
            color: var(--ink);
        }

        .button.danger,
        button.danger {
            background: #fff1f1;
            color: var(--red);
        }

        .panel {
            border: 1px solid var(--line);
            border-radius: 8px;
            background: var(--paper);
        }

        .impact-panel {
            display: grid;
            align-content: space-between;
            min-height: 390px;
            padding: 24px;
            overflow: hidden;
        }

        .wheel {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 8px;
        }

        .tile {
            aspect-ratio: 1;
            display: grid;
            place-items: center;
            border-radius: 6px;
            color: #fff;
            font-weight: 800;
            font-size: 13px;
        }

        .tile:nth-child(1) { background: #e5243b; }
        .tile:nth-child(2) { background: #dda63a; }
        .tile:nth-child(3) { background: #4c9f38; }
        .tile:nth-child(4) { background: #c5192d; }
        .tile:nth-child(5) { background: #ff3a21; }
        .tile:nth-child(6) { background: #26bde2; }
        .tile:nth-child(7) { background: #fcc30b; color: #172033; }
        .tile:nth-child(8) { background: #a21942; }
        .tile:nth-child(9) { background: #fd6925; }
        .tile:nth-child(10) { background: #dd1367; }
        .tile:nth-child(11) { background: #fd9d24; }
        .tile:nth-child(12) { background: #bf8b2e; }
        .tile:nth-child(13) { background: #3f7e44; }
        .tile:nth-child(14) { background: #0a97d9; }
        .tile:nth-child(15) { background: #56c02b; }
        .tile:nth-child(16) { background: #00689d; }
        .tile:nth-child(17) { background: #19486a; }
        .tile:nth-child(18) { background: #f5f8fb; color: var(--muted); border: 1px dashed var(--line); }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin: 18px 0 32px;
        }

        .stat {
            padding: 18px;
        }

        .stat span {
            color: var(--muted);
            font-size: 13px;
            font-weight: 700;
        }

        .stat strong {
            display: block;
            margin-top: 8px;
            font-size: 32px;
            line-height: 1;
        }

        .grid {
            display: grid;
            grid-template-columns: minmax(320px, 0.82fr) minmax(0, 1.18fr);
            gap: 22px;
            padding-bottom: 48px;
        }

        .section-head {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 14px;
        }

        .section-head h2 {
            margin: 0;
            font-size: 24px;
        }

        .section-head p {
            margin: 4px 0 0;
            color: var(--muted);
        }

        form.create {
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 14px;
            color: var(--muted);
            font-size: 13px;
            font-weight: 800;
        }

        input,
        select,
        textarea {
            width: 100%;
            margin-top: 7px;
            border: 1px solid var(--line);
            border-radius: 8px;
            padding: 11px 12px;
            background: #fff;
            color: var(--ink);
            font: inherit;
        }

        textarea {
            min-height: 118px;
            resize: vertical;
        }

        .split {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .flash,
        .errors {
            margin-bottom: 16px;
            border-radius: 8px;
            padding: 12px 14px;
        }

        .flash {
            border: 1px solid #bde7cf;
            background: #effaf4;
            color: #17633f;
        }

        .errors {
            border: 1px solid #f0c4c7;
            background: #fff5f5;
            color: #9e2f35;
        }

        .errors ul {
            margin: 6px 0 0;
            padding-left: 18px;
        }

        .actions {
            display: grid;
            gap: 12px;
        }

        .action-card {
            padding: 18px;
        }

        .action-top {
            display: flex;
            align-items: start;
            justify-content: space-between;
            gap: 16px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border-radius: 999px;
            padding: 5px 9px;
            background: #eef6ff;
            color: #1758a8;
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
        }

        .status {
            background: #f3f5f7;
            color: #56616e;
        }

        .status.done {
            background: #e8f8ef;
            color: var(--green);
        }

        .status.doing {
            background: #fff7dd;
            color: #8a6500;
        }

        .action-card h3 {
            margin: 12px 0 6px;
            font-size: 19px;
        }

        .action-card p {
            margin: 0;
            color: var(--muted);
        }

        .meta {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 14px;
        }

        .card-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 16px;
        }

        .card-actions form {
            margin: 0;
        }

        .empty {
            padding: 26px;
            color: var(--muted);
            text-align: center;
        }

        .focus-list {
            display: grid;
            gap: 10px;
            margin-top: 18px;
        }

        .focus-row {
            display: grid;
            grid-template-columns: 42px 1fr auto;
            gap: 12px;
            align-items: center;
            color: var(--muted);
            font-size: 14px;
        }

        .focus-row strong {
            color: var(--ink);
        }

        @media (max-width: 860px) {
            .hero,
            .grid,
            .stats {
                grid-template-columns: 1fr;
            }

            .hero-copy,
            .impact-panel {
                min-height: auto;
            }

            .nav {
                align-items: start;
                flex-direction: column;
                padding: 14px 0;
            }
        }

        @media (max-width: 560px) {
            .shell {
                width: min(100% - 20px, 1180px);
            }

            h1 {
                font-size: 40px;
            }

            .split {
                grid-template-columns: 1fr;
            }

            .wheel {
                grid-template-columns: repeat(3, 1fr);
            }

            .action-top {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <div class="shell nav">
            <div class="brand">
                <div class="mark">SDG</div>
                <div>
                    <div>SDG Action Tracker</div>
                    <small>Laravel learning project</small>
                </div>
            </div>
            <nav class="nav-links" aria-label="Primary navigation">
                <a href="#tracker">Tracker</a>
                <a href="#new-action">New action</a>
                <a href="https://sdgs.un.org/goals" target="_blank" rel="noreferrer">UN Goals</a>
            </nav>
        </div>
    </header>

    <main class="shell">
        <section class="hero">
            <div class="hero-copy">
                <p class="eyebrow">Sustainable Development Goals</p>
                <h1>Track small actions that support big global goals.</h1>
                <p class="lead">
                    Build a list of SDG actions, estimate impact, and mark progress as your class, club,
                    or local community moves from ideas to finished work.
                </p>
                <div class="hero-actions">
                    <a class="button" href="#new-action">Add an action</a>
                    <a class="button secondary" href="#tracker">View tracker</a>
                </div>
            </div>

            <aside class="panel impact-panel" aria-label="SDG overview">
                <div class="wheel">
                    @for ($i = 1; $i <= 17; $i++)
                        <div class="tile">{{ $i }}</div>
                    @endfor
                    <div class="tile">+</div>
                </div>

                <div>
                    <h2>Focus areas</h2>
                    @if ($focusSdgs->isEmpty())
                        <p class="lead">Add your first action to see which SDGs get the most attention.</p>
                    @else
                        <div class="focus-list">
                            @foreach ($focusSdgs as $number => $focus)
                                <div class="focus-row">
                                    <span class="badge">SDG {{ $number }}</span>
                                    <strong>{{ $focus['title'] }}</strong>
                                    <span>{{ $focus['impact'] }} pts</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </aside>
        </section>

        <section class="stats" aria-label="Tracker statistics">
            <div class="panel stat">
                <span>Total actions</span>
                <strong>{{ $stats['total'] }}</strong>
            </div>
            <div class="panel stat">
                <span>Completed</span>
                <strong>{{ $stats['completed'] }}</strong>
            </div>
            <div class="panel stat">
                <span>Impact points</span>
                <strong>{{ $stats['impact'] }}</strong>
            </div>
            <div class="panel stat">
                <span>Completion rate</span>
                <strong>{{ $stats['completion_rate'] }}%</strong>
            </div>
        </section>

        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="errors">
                <strong>Please fix these fields:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="grid">
            <div id="new-action">
                <div class="section-head">
                    <div>
                        <h2>New action</h2>
                        <p>Create a measurable SDG activity.</p>
                    </div>
                </div>

                <form class="panel create" action="{{ route('actions.store') }}" method="POST">
                    @csrf
                    <label>
                        SDG goal
                        <select name="sdg_number" required>
                            @foreach ($sdgs as $number => $title)
                                <option value="{{ $number }}" @selected(old('sdg_number') == $number)>
                                    SDG {{ $number }} - {{ $title }}
                                </option>
                            @endforeach
                        </select>
                    </label>

                    <label>
                        Action title
                        <input name="title" value="{{ old('title') }}" maxlength="120" required placeholder="Campus plastic audit">
                    </label>

                    <label>
                        Description
                        <textarea name="description" maxlength="600" required placeholder="Describe what will happen and how it connects to the SDG.">{{ old('description') }}</textarea>
                    </label>

                    <div class="split">
                        <label>
                            Owner
                            <input name="owner" value="{{ old('owner', 'Community') }}" maxlength="80" required>
                        </label>

                        <label>
                            Impact score
                            <input name="impact_score" type="number" min="1" max="10" value="{{ old('impact_score', 5) }}" required>
                        </label>
                    </div>

                    <label>
                        Status
                        <select name="status" required>
                            <option value="planned" @selected(old('status') === 'planned')>Planned</option>
                            <option value="doing" @selected(old('status') === 'doing')>Doing</option>
                            <option value="done" @selected(old('status') === 'done')>Done</option>
                        </select>
                    </label>

                    <button type="submit">Save action</button>
                </form>
            </div>

            <div id="tracker">
                <div class="section-head">
                    <div>
                        <h2>Action tracker</h2>
                        <p>{{ $actions->count() }} action{{ $actions->count() === 1 ? '' : 's' }} in the workspace.</p>
                    </div>
                </div>

                <div class="actions">
                    @forelse ($actions as $action)
                        <article class="panel action-card">
                            <div class="action-top">
                                <span class="badge">SDG {{ $action->sdg_number }} - {{ $action->sdg_title }}</span>
                                <span class="badge status {{ $action->status }}">{{ ucfirst($action->status) }}</span>
                            </div>

                            <h3>{{ $action->title }}</h3>
                            <p>{{ $action->description }}</p>

                            <div class="meta">
                                <span class="badge status">Owner: {{ $action->owner }}</span>
                                <span class="badge status">Impact: {{ $action->impact_score }}/10</span>
                                @if ($action->completed_at)
                                    <span class="badge status done">Completed {{ $action->completed_at->diffForHumans() }}</span>
                                @endif
                            </div>

                            <div class="card-actions">
                                <form action="{{ route('actions.status', $action) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="secondary" type="submit">
                                        {{ $action->is_complete ? 'Move back to doing' : 'Mark done' }}
                                    </button>
                                </form>

                                <form action="{{ route('actions.destroy', $action) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </article>
                    @empty
                        <div class="panel empty">
                            No actions yet. Add one on the left and the dashboard will update instantly.
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
</body>
</html>
