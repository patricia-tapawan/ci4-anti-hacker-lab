<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Result</title>
    <style>
        body { font-family: sans-serif; background: #0d1117; color: #ccc; display: flex; justify-content: center; padding: 4rem; }
        .card { background: #161b22; border: 1px solid #30363d; border-radius: 12px; padding: 2rem; width: 100%; max-width: 480px; }
        h1 { color: #e6edf3; margin-bottom: 1rem; }
        .result-box { background: #0d1117; border: 1px solid #3fb950; border-radius: 8px; padding: 1.2rem; margin-bottom: 1rem; }
        .result-box label { font-size: 0.75rem; color: #3fb950; display: block; margin-bottom: 0.5rem; text-transform: uppercase; }
        .value { font-size: 1.1rem; color: #e6edf3; word-break: break-all; }
        .explain { background: #21262d; border-left: 3px solid #f0883e; border-radius: 6px; padding: 0.8rem 1rem; font-size: 0.82rem; color: #8b949e; line-height: 1.6; margin-bottom: 1rem; }
        .explain strong { color: #f0883e; }
        code { background: #0d1117; padding: 2px 6px; border-radius: 4px; color: #79c0ff; }
        a { color: #1f6feb; font-size: 0.9rem; }
    </style>
</head>
<body>
<div class="card">
    <h1>✅ Submitted Successfully!</h1>

    <div class="result-box">
        <label>Your input (safely escaped):</label>
        <div class="value"><?= $user_input ?></div>
    </div>

    <div class="explain">
        <strong>Why it's safe:</strong> <code>esc()</code> converts
        <code>&lt;</code> to <code>&amp;lt;</code> and <code>&gt;</code> to <code>&amp;gt;</code>
        so the browser reads it as text — not HTML or JavaScript.
    </div>

    <a href="<?= base_url('form') ?>">← Go back and try again</a>
</div>
</body>
</html>