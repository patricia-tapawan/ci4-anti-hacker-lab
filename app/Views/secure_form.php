<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anti-Hacker Lab</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #0d1117;
            color: #c9d1d9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem;
        }
        .card {
            background: #161b22;
            border: 1px solid #30363d;
            border-radius: 12px;
            padding: 2rem;
            width: 100%;
            max-width: 480px;
        }
        h1 { color: #e6edf3; margin-bottom: 0.5rem; }
        p { color: #8b949e; margin-bottom: 1.5rem; font-size: 0.9rem; }
        label { display: block; font-size: 0.85rem; color: #8b949e; margin-bottom: 0.4rem; }
        input[type="text"] {
            width: 100%;
            padding: 0.7rem;
            background: #0d1117;
            border: 1px solid #30363d;
            border-radius: 8px;
            color: #e6edf3;
            font-size: 0.95rem;
            margin-bottom: 1.2rem;
        }
        button {
            width: 100%;
            padding: 0.75rem;
            background: #238636;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
        }
        button:hover { background: #2ea043; }
        code {
            background: #0d1117;
            padding: 2px 6px;
            border-radius: 4px;
            color: #79c0ff;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
<div class="card">
    <h1>🧪 Anti-Hacker Lab</h1>
    <p>Try typing <code>&lt;b&gt;John&lt;/b&gt;</code> or <code>&lt;script&gt;document.title='Hacked'&lt;/script&gt;</code></p>

    <form method="post" action="<?= base_url('form/submit') ?>">

        <?= csrf_field() ?>

        <label for="user_input">Enter your input:</label>
        <input type="text" id="user_input" name="user_input" placeholder="Try some HTML tags...">

        <button type="submit">Submit Securely →</button>
    </form>
</div>
</body>
</html>