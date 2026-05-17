<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result — Anti-Hacker Lab</title>
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
            --orange-border: #fed7aa;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.06);
            --shadow-md: 0 4px 16px rgba(0,0,0,0.08);
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

        /* Success banner */
        .success-banner {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--green-light);
            border: 1px solid var(--green-border);
            border-radius: 999px;
            padding: 7px 20px;
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--green);
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-sm);
            animation: fadeDown 0.4s ease both;
        }
        .success-banner .icon { font-size: 1rem; }

        /* Card */
        .card {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow-lg);
            width: 100%;
            max-width: 520px;
            overflow: hidden;
            animation: fadeUp 0.5s ease 0.1s both;
        }

        /* Card top stripe */
        .card-stripe {
            height: 4px;
            background: linear-gradient(90deg, var(--orange) 0%, var(--blue) 50%, var(--green) 100%);
        }

        .card-header {
            padding: 1.75rem 2rem 1.25rem;
            border-bottom: 1px solid var(--gray-100);
        }
        .card-header h1 {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--gray-900);
            letter-spacing: -0.3px;
            margin-bottom: 0.3rem;
        }
        .card-header p {
            font-size: 0.82rem;
            color: var(--gray-400);
        }

        /* Badge row */
        .badge-row {
            display: flex;
            gap: 0.5rem;
            padding: 1rem 2rem;
            background: var(--gray-50);
            border-bottom: 1px solid var(--gray-100);
        }
        .badge {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 500;
        }
        .badge.csrf {
            background: var(--blue-light);
            color: var(--blue);
            border: 1px solid var(--blue-border);
        }
        .badge.xss {
            background: var(--green-light);
            color: var(--green);
            border: 1px solid var(--green-border);
        }

        /* Card body */
        .card-body { padding: 1.75rem 2rem; }

        /* Output box */
        .output-section { margin-bottom: 1.25rem; }
        .output-label {
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--gray-400);
            margin-bottom: 0.5rem;
        }
        .output-box {
            background: var(--gray-50);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius-sm);
            padding: 1rem 1.2rem;
            font-family: 'DM Mono', monospace;
            font-size: 0.9rem;
            color: var(--gray-800);
            word-break: break-all;
            line-height: 1.6;
            min-height: 52px;
            position: relative;
        }
        .output-box::before {
            content: 'SAFE OUTPUT';
            position: absolute;
            top: -1px; right: 10px;
            background: var(--green);
            color: white;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.6rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            padding: 2px 8px;
            border-radius: 0 0 6px 6px;
        }

        /* Explanation cards */
        .explain-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }
        .explain-card {
            border-radius: var(--radius-sm);
            padding: 0.85rem 1rem;
            font-size: 0.78rem;
            line-height: 1.6;
        }
        .explain-card .explain-title {
            font-weight: 600;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }
        .explain-card.csrf-card {
            background: var(--blue-light);
            border: 1px solid var(--blue-border);
            color: #1d4ed8;
        }
        .explain-card.xss-card {
            background: var(--orange-light);
            border: 1px solid var(--orange-border);
            color: #9a3412;
        }

        code {
            font-family: 'DM Mono', monospace;
            font-size: 0.75rem;
            background: rgba(0,0,0,0.06);
            padding: 1px 5px;
            border-radius: 4px;
        }

        /* Why it works */
        .why-box {
            background: var(--gray-50);
            border: 1px solid var(--gray-200);
            border-left: 3px solid var(--gray-800);
            border-radius: var(--radius-sm);
            padding: 0.85rem 1rem;
            font-size: 0.8rem;
            color: var(--gray-600);
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }
        .why-box strong { color: var(--gray-900); }

        /* Back button */
        .back-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            width: 100%;
            padding: 0.75rem;
            background: var(--white);
            color: var(--gray-800);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.875rem;
            font-weight: 500;
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius-sm);
            text-decoration: none;
            transition: border-color 0.2s, background 0.2s, box-shadow 0.2s;
        }
        .back-btn:hover {
            border-color: var(--gray-400);
            background: var(--gray-50);
            box-shadow: var(--shadow-sm);
        }

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

<div class="success-banner">
    <span class="icon">✅</span>
    Form submitted successfully — all security checks passed
</div>

<div class="card">
    <div class="card-stripe"></div>

    <div class="card-header">
        <h1>Security Report</h1>
        <p>Your input has been processed and safely escaped before display.</p>
    </div>

    <div class="badge-row">
        <span class="badge csrf">✓ CSRF Token Valid</span>
        <span class="badge xss">✓ XSS Output Escaped</span>
    </div>

    <div class="card-body">

        <div class="output-section">
            <div class="output-label">Your Input — Safely Displayed</div>
            <div class="output-box"><?= $user_input ?></div>
        </div>

        <div class="explain-grid">
            <div class="explain-card csrf-card">
                <div class="explain-title">🔐 CSRF</div>
                <code>csrf_field()</code> generated a hidden token. Without it, CI4 returns 403 Forbidden.
            </div>
            <div class="explain-card xss-card">
                <div class="explain-title">🛡️ XSS</div>
                <code>esc()</code> converted <code>&lt;</code> and <code>&gt;</code> into plain text — not HTML.
            </div>
        </div>

        <div class="why-box">
            <strong>Why it works:</strong> <code>esc()</code> converts
            <code>&lt;</code> → <code>&amp;lt;</code> and
            <code>&gt;</code> → <code>&amp;gt;</code> so the browser
            renders everything as text — never as executable code.
            Typing <code>&lt;b&gt;John&lt;/b&gt;</code> shows literally,
            <strong>not bold</strong>.
        </div>

        <a href="<?= base_url('form') ?>" class="back-btn">
            ← Try again with different input
        </a>

    </div>
</div>

</body>
</html>