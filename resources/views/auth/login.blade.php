<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Sign in</title>
    <style>
        :root{
            --bg-url: url('/images/tickets-bg.jpg');
            --card-bg: rgba(16,16,20,.55);
            --card-border: rgba(255,255,255,.14);
            --text:#f7f7fb; --muted:#cfd2dc; --accent:#6aa9ff; --accent-2:#ffb25e; --radius:16px;
        }
        *{box-sizing:border-box} html,body{height:100%}
        body{
            margin:0; font-family:system-ui,-apple-system,Segoe UI,Roboto,Helvetica,Arial;
            color:var(--text); background-image:var(--bg-url); background-size:cover;
            background-position:center; background-attachment:fixed; display:grid; place-items:center;
        }
        body::before{content:''; position:fixed; inset:0;
            background:radial-gradient(1200px 700px at 70% 20%,transparent 0%,rgba(0,0,0,.35) 60%,rgba(0,0,0,.75) 100%),
            linear-gradient(180deg,rgba(0,0,0,.25) 0%,rgba(0,0,0,.55) 60%); pointer-events:none}
        .card{width:min(92vw,420px); background:var(--card-bg); backdrop-filter:blur(10px) saturate(120%);
            border:1px solid var(--card-border); border-radius:var(--radius); padding:26px 26px 22px;
            box-shadow:0 20px 60px rgba(0,0,0,.45), 0 2px 8px rgba(0,0,0,.35) inset}
        .brand{display:flex;gap:12px;justify-content:center;align-items:center;margin-bottom:18px}
        .brand .logo{width:42px;height:42px;border-radius:10px;display:grid;place-items:center;
            background:linear-gradient(135deg,var(--accent),var(--accent-2))}
        .brand h1{margin:0;font-size:1.25rem} .brand p{margin:2px 0 0;color:var(--muted);font-size:.9rem}
        form{display:grid;gap:14px} label{font-size:.9rem;color:var(--muted)}
        .field{display:grid;gap:8px}
        .control{display:grid;grid-template-columns:1fr auto;align-items:center;background:rgba(0,0,0,.35);
            border:1px solid rgba(255,255,255,.12); border-radius:12px}
        input{background:transparent;border:0;outline:none;padding:12px 14px;color:var(--text);font-size:1rem}
        .toggle{background:transparent;border:0;color:var(--muted);padding:0 12px;cursor:pointer}
        .row{display:flex;justify-content:space-between;align-items:center;margin:2px 0 6px}
        .checkbox{display:inline-flex;gap:8px;color:var(--muted);font-size:.92rem}
        a{color:var(--accent);text-decoration:none} a:hover{text-decoration:underline}
        .btn{border:0;cursor:pointer;width:100%;padding:12px 16px;border-radius:12px;color:#0a0a0a;font-weight:700;
            background:linear-gradient(135deg,var(--accent),var(--accent-2));box-shadow:0 10px 30px rgba(0,0,0,.35)}
        .divider{display:flex;align-items:center;gap:10px;color:var(--muted);font-size:.85rem;margin:6px 0 2px}
        .divider::before,.divider::after{content:'';flex:1;height:1px;background:rgba(255,255,255,.15)}
        .providers{display:grid;gap:10px;grid-template-columns:1fr 1fr}
        .provider{border-radius:12px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.16);
            padding:10px 12px;color:var(--text);cursor:pointer}
        @media(max-width:420px){.providers{grid-template-columns:1fr}}
    </style>
</head>
<body>
<main class="card" role="main" aria-labelledby="signin-title">
    <div class="brand">
        <div><h1 id="signin-title">Welcome back</h1><p>Sign in to your account</p></div>
    </div>

    <form method="POST" action="#">
        @csrf
        <div class="field">
            <label for="email">Email</label>
            <div class="control">
                <input id="email" type="email" name="email" placeholder="you@example.com" required autocomplete="username">
                <span style="padding:0 12px; opacity:.65">@</span>
            </div>
        </div>

        <div class="field">
            <label for="password">Password</label>
            <div class="control">
                <input id="password" type="password" name="password" placeholder="••••••••" required autocomplete="current-password">
                <button type="button" class="toggle" onclick="
            const i=document.getElementById('password');
            this.textContent=(i.type==='password'?'Hide':'Show');
            i.type=(i.type==='password'?'text':'password');">Show</button>
            </div>
        </div>

        <div class="row">
            <label class="checkbox"><input type="checkbox" name="remember"> Remember me</label>
            <a href="#">Forgot password?</a>
        </div>

        <button class="btn" type="submit">Sign in</button>

        <div class="divider">or continue with</div>
        <div class="providers">
            <button type="button" class="provider">Google</button>
            <button type="button" class="provider">Microsoft</button>
        </div>
    </form>
</main>
</body>
</html>
