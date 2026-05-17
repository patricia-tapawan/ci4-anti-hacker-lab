<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anti-Hacker Lab</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --white: #ffffff;
            --gray-50: #f8f9fb;
            --gray-100: #f0f2f5;
            --gray-200: #e2e6ed;
            --gray-400: #9ba3af;
            --gray-600: #4b5563;
            --gray-800: #1f2937;
            --gray-900: #111827;
            --blue: #2563eb;
            --blue-light: #eff6ff;
            --blue-border: #bfdbfe;
            --green: #16a34a;
            --green-light: #f0fdf4;
            --green-border: #bbf7d0;
            --orange: #ea580c;
            --orange-light: #fff7ed;
            --red: #dc2626;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
            --shadow-md: 0 4px 16px rgba(0,0,0,0.08), 0 2px 6px rgba(0,0,0,0.04);
            --shadow-lg: 0 10px 40px rgba(0,0,0,0.1);
            --radius: 14px;
            --radius-sm: 8px;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--gray-50);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            background-image:
                radial-gradient(circle at 20% 20%, #dbeafe55 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, #dcfce755 0%, transparent 50%);
        }

        /* Top badge */
        .lab-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 999px;
            padding: 6px 16px;
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--gray-600);
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-sm);
            animation: fadeDown 0.5s ease both;
        }
        .lab-badge .dot {
            width: 7px; height: 7px;
            background: var(--green);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.85); }
        }

        /* Main card */
        .card {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow-lg);
            width: 100%;
            max-width: 500px;
            overflow: hidden;
            animation: fadeUp 0.5s ease 0.1s both;
        }

        /* Card header */
        .card-header {
            padding: 2rem 2rem 1.5rem;
            border-bottom: 1px solid var(--gray-100);
        }
        .card-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 0.35rem;
            letter-spacing: -0.3px;
        }
        .card-header p {
            font-size: 0.875rem;
            color: var(--gray-400);
            line-height: 1.5;
        }

        /* Task pills row */
        .tasks-row {
            display: flex;
            gap: 0.5rem;
            padding: 1rem 2rem;
            border-bottom: 1px solid var(--gray-100);
            background: var(--gray-50);
        }
        .task-pill {
            flex: 1;
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: var(--radius-sm);
            padding: 0.5rem 0.6rem;
            text-align: center;
            box-shadow: var(--shadow-sm);
        }
        .task-pill .num {
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--gray-400);
            margin-bottom: 2px;
        }
        .task-pill .label {
            font-size: 0.7rem;
            font-weight: 500;
            color: var(--gray-800);
        }
        .task-pill.t1 { border-top: 3px solid var(--orange); }
        .task-pill.t2 { border-top: 3px solid var(--blue); }
        .task-pill.t3 { border-top: 3px solid var(--green); }

        /* Form area */
        .card-body { padding: 1.75rem 2rem 2rem; }

        .hint-box {
            background: var(--blue-light);
            border: 1px solid var(--blue-border);
            border-radius: var(--radius-sm);
            padding: 0.75rem 1rem;
            font-size: 0.8rem;
            color: #1d4ed8;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        .hint-box strong { font-weight: 600; }
        code {
            font-family: 'DM Mono', monospace;
            font-size: 0.78rem;
            background: #dbeafe;
            padding: 1px 5px;
            border-radius: 4px;
            color: #1e40af;
        }

        label {
            display: block;
            font-size: 0.82rem;
            font-weight: 500;
            color: var(--gray-600);
            margin-bottom: 0.5rem;
        }

        .input-wrap {
            position: relative;
            margin-bottom: 1.25rem;
        }
        .input-wrap input {
            width: 100%;
            padding: 0.75rem 1rem;
            font-family: 'DM Mono', monospace;
            font-size: 0.875rem;
            color: var(--gray-800);
            background: var(--gray-50);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius-sm);
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }
        .input-wrap input:focus {
            border-color: var(--blue);
            background: var(--white);
            box-shadow: 0 0 0 3px #2563eb18;
        }
        .input-wrap input::placeholder { color: var(--gray-400); }

        .submit-btn {
            width: 100%;
            padding: 0.8rem;
            background: var(--gray-900);
            color: var(--white);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            font-weight: 500;
            border: none;
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: background 0.2s, transform 0.1s, box-shadow 0.2s;
            letter-spacing: 0.1px;
        }
        .submit-btn:hover {
            background: #374151;
            box-shadow: var(--shadow-md);
        }
        .submit-btn:active { transform: scale(0.99); }

        /* Footer */
        .card-footer {
            padding: 1rem 2rem;
            background: var(--gray-50);
            border-top: 1px solid var(--gray-100);
            font-size: 0.75rem;
            color: var(--gray-400);
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .card-footer span { color: var(--green); font-size: 0.8rem; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeDown {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="lab-badge">
    <div class="dot"></div>
    Hands-On Activity — The Anti-Hacker Lab
</div>

<div class="card">
    <div class="card-header">
        <h1>🛡️ Security Lab</h1>
        <p>Secure a CI4 form against CSRF and XSS attacks through hands-on implementation.</p>
    </div>

    <div class="tasks-row">
        <div class="task-pill t1">
            <div class="num">Task 01</div>
            <div class="label">CSRF Filter</div>
        </div>
        <div class="task-pill t2">
            <div class="num">Task 02</div>
            <div class="label">CSRF Token</div>
        </div>
        <div class="task-pill t3">
            <div class="num">Task 03</div>
            <div class="label">Escape Output</div>
        </div>
    </div>

    <div class="card-body">
        <div class="hint-box">
            <strong>Try these inputs:</strong> <code>&lt;b&gt;John&lt;/b&gt;</code> or
            <code>&lt;script&gt;document.title='Hacked'&lt;/script&gt;</code>
            — see how <code>esc()</code> neutralizes them.
        </div>

        <form method="post" action="<?= base_url('form/submit') ?>">

            <?= csrf_field() ?>

            <label for="user_input">Enter your input</label>
            <div class="input-wrap">
                <input
                    type="text"
                    id="user_input"
                    name="user_input"
                    placeholder="e.g. <b>John</b>"
                    autocomplete="off"
                >
            </div>

            <button type="submit" class="submit-btn">Submit Securely →</button>
        </form>
    </div>

    <div class="card-footer">
        <span>✓</span> CSRF token active &nbsp;·&nbsp; <span>✓</span> Output escaping enabled
    </div>
</div>

</body>
</html>