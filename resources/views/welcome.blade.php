<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maharlika Framework - Modern PHP Development</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #0a0a0a;
            --paper: #fdfdf8;
            --accent: #d4af37;
            --ruby: #e63946;
            --slate: #475569;
            --border: #2d2d2d;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'JetBrains Mono', monospace;
            background: var(--paper);
            color: var(--ink);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(253, 253, 248, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 2px solid var(--border);
            z-index: 1000;
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-100%);
            }
            to {
                transform: translateY(0);
            }
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 900;
            color: var(--ink);
            text-decoration: none;
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-brand:hover {
            color: var(--accent);
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
            align-items: center;
            list-style: none;
        }

        .nav-link {
            color: var(--slate);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            position: relative;
            padding: 0.5rem 0;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s ease;
        }

        .nav-link:hover {
            color: var(--ink);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link.active {
            color: var(--accent);
        }

        /* Auth buttons */
        .nav-auth {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .nav-btn {
            padding: 0.6rem 1.5rem;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border: 2px solid var(--border);
            background: transparent;
            color: var(--ink);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .nav-btn:hover {
            background: var(--ink);
            color: var(--paper);
            border-color: var(--ink);
        }

        .nav-btn-primary {
            background: var(--ink);
            color: var(--paper);
            border-color: var(--ink);
        }

        .nav-btn-primary:hover {
            background: var(--accent);
            border-color: var(--accent);
            color: var(--ink);
        }

        /* User dropdown */
        .user-dropdown {
            position: relative;
        }

        .user-trigger {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1rem;
            background: transparent;
            border: 2px solid var(--border);
            color: var(--ink);
            cursor: pointer;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .user-trigger:hover {
            background: var(--ink);
            color: var(--paper);
            border-color: var(--ink);
        }

        .user-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--ink);
            font-weight: 700;
        }

        .dropdown-menu {
            position: absolute;
            top: calc(100% + 0.5rem);
            right: 0;
            background: var(--paper);
            border: 2px solid var(--border);
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .user-dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            display: block;
            padding: 1rem 1.5rem;
            color: var(--slate);
            text-decoration: none;
            font-size: 0.85rem;
            border-bottom: 1px solid var(--border);
            transition: all 0.3s ease;
        }

        .dropdown-item:last-child {
            border-bottom: none;
        }

        .dropdown-item:hover {
            background: var(--ink);
            color: var(--paper);
        }

        .dropdown-item.logout {
            color: var(--ruby);
        }

        .dropdown-item.logout:hover {
            background: var(--ruby);
            color: var(--paper);
        }

        /* Mobile menu toggle */
        .mobile-toggle {
            display: none;
            background: none;
            border: 2px solid var(--border);
            padding: 0.5rem;
            cursor: pointer;
            color: var(--ink);
        }

        .mobile-toggle span {
            display: block;
            width: 24px;
            height: 2px;
            background: var(--ink);
            margin: 4px 0;
            transition: all 0.3s ease;
        }

        /* Animated gradient background */
        .hero {
            min-height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background: 
                linear-gradient(135deg, rgba(212, 175, 55, 0.05) 0%, transparent 50%),
                linear-gradient(225deg, rgba(230, 57, 70, 0.03) 0%, transparent 50%),
                var(--paper);
            overflow: hidden;
            padding-top: 80px;
        }

        /* Animated grid pattern */
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                linear-gradient(var(--border) 1px, transparent 1px),
                linear-gradient(90deg, var(--border) 1px, transparent 1px);
            background-size: 60px 60px;
            opacity: 0.03;
            animation: gridMove 20s linear infinite;
        }

        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(60px, 60px); }
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        /* Logo and title */
        .logo-section {
            text-align: center;
            margin-bottom: 4rem;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3rem, 10vw, 7rem);
            font-weight: 900;
            letter-spacing: -0.03em;
            line-height: 1;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--ink) 0%, var(--slate) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
            display: inline-block;
        }

        .logo::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: var(--accent);
            animation: expandWidth 1s ease-out 0.5s both;
        }

        @keyframes expandWidth {
            from { width: 0; }
            to { width: 60px; }
        }

        .tagline {
            font-size: clamp(1rem, 2vw, 1.25rem);
            color: var(--slate);
            font-weight: 400;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            animation: fadeIn 1s ease-out 0.3s both;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Features grid */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 4rem 0;
            animation: fadeInUp 1s ease-out 0.6s both;
        }

        .feature-card {
            border: 2px solid var(--border);
            padding: 2.5rem;
            position: relative;
            background: var(--paper);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, var(--accent) 0%, var(--ruby) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 0;
        }

        .feature-card:hover::before {
            opacity: 0.05;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            border-color: var(--accent);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .feature-card > * {
            position: relative;
            z-index: 1;
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            display: inline-block;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .feature-card:nth-child(2) .feature-icon {
            animation-delay: 0.3s;
        }

        .feature-card:nth-child(3) .feature-icon {
            animation-delay: 0.6s;
        }

        .feature-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            color: var(--ink);
        }

        .feature-description {
            color: var(--slate);
            font-size: 0.9rem;
            line-height: 1.7;
        }

        /* Code snippet section */
        .code-showcase {
            margin: 6rem 0;
            padding: 3rem;
            border: 2px solid var(--border);
            background: var(--ink);
            position: relative;
            animation: fadeInUp 1s ease-out 0.9s both;
        }

        .code-showcase::before {
            content: '<?php';
            position: absolute;
            top: 1rem;
            right: 2rem;
            font-size: 0.8rem;
            color: var(--accent);
            opacity: 0.5;
        }

        .code-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--accent);
            margin-bottom: 2rem;
            font-weight: 700;
        }

        pre {
            overflow-x: auto;
            padding: 0;
            margin: 0;
        }

        code {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.95rem;
            line-height: 1.8;
            color: #e2e8f0;
        }

        .code-line {
            display: block;
            padding: 0.25rem 0;
        }

        .comment { color: #64748b; }
        .keyword { color: #f472b6; }
        .function { color: #60a5fa; }
        .string { color: #34d399; }
        .variable { color: #fbbf24; }
        .operator { color: #e2e8f0; }

        /* CTA Section */
        .cta-section {
            text-align: center;
            margin: 6rem 0 4rem;
            animation: fadeInUp 1s ease-out 1.2s both;
        }

        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .btn {
            padding: 1.25rem 3rem;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            border: 2px solid var(--border);
            background: var(--paper);
            color: var(--ink);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--ink);
            transition: left 0.4s ease;
            z-index: 0;
        }

        .btn:hover::before {
            left: 0;
        }

        .btn:hover {
            color: var(--paper);
            border-color: var(--ink);
        }

        .btn span {
            position: relative;
            z-index: 1;
        }

        .btn-primary {
            background: var(--ink);
            color: var(--paper);
            border-color: var(--ink);
        }

        .btn-primary::before {
            background: var(--accent);
        }

        .btn-primary:hover {
            border-color: var(--accent);
            color: var(--ink);
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 3rem 2rem;
            border-top: 2px solid var(--border);
            color: var(--slate);
            font-size: 0.85rem;
            animation: fadeIn 1s ease-out 1.5s both;
        }

        .footer-links {
            margin-top: 1rem;
            display: flex;
            gap: 2rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .footer-link {
            color: var(--slate);
            text-decoration: none;
            transition: color 0.3s ease;
            position: relative;
        }

        .footer-link::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--accent);
            transition: width 0.3s ease;
        }

        .footer-link:hover {
            color: var(--accent);
        }

        .footer-link:hover::after {
            width: 100%;
        }

        /* Stats bar */
        .stats {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 2rem;
            margin: 4rem 0;
            padding: 3rem 2rem;
            border-top: 2px solid var(--border);
            border-bottom: 2px solid var(--border);
            animation: fadeInUp 1s ease-out 1.1s both;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 900;
            color: var(--ink);
            display: block;
            line-height: 1;
        }

        .stat-label {
            color: var(--slate);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            margin-top: 0.5rem;
        }

        /* Responsive */
        @media (max-width: 968px) {
            .mobile-toggle {
                display: block;
            }

            .nav-menu {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--paper);
                border-bottom: 2px solid var(--border);
                flex-direction: column;
                padding: 1rem 0;
                gap: 0;
                opacity: 0;
                visibility: hidden;
                transform: translateY(-10px);
                transition: all 0.3s ease;
            }

            .nav-menu.active {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }

            .nav-menu li {
                width: 100%;
                text-align: center;
                padding: 1rem;
                border-bottom: 1px solid var(--border);
            }

            .nav-auth {
                flex-direction: column;
                width: 100%;
            }

            .nav-btn {
                width: 90%;
                margin: 0 auto;
            }

            .user-dropdown {
                width: 100%;
            }

            .user-trigger {
                width: 90%;
                margin: 0 auto;
                justify-content: center;
            }

            .dropdown-menu {
                position: static;
                width: 90%;
                margin: 0.5rem auto 0;
                opacity: 1;
                visibility: visible;
                transform: none;
            }
        }

        @media (max-width: 768px) {
            .feature-card {
                padding: 2rem;
            }

            .code-showcase {
                padding: 2rem 1.5rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: stretch;
            }

            .btn {
                width: 100%;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            background: var(--paper);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border);
            border: 2px solid var(--paper);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--accent);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="/" class="nav-brand">Maharlika</a>
            
            <button class="mobile-toggle" onclick="toggleMobileMenu()">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul class="nav-menu" id="navMenu">
                <li><a href="/" class="nav-link active">Home</a></li>
                <li><a href="/api/documentation" class="nav-link">Documentation</a></li>
                <li><a href="https://github.com/joshdevkit/maharlika-framework" class="nav-link">GitHub</a></li>
                
                <div class="nav-auth">
                    @auth
                        <!-- Authenticated user -->
                        <div class="user-dropdown">
                            <button class="user-trigger">
                                <span class="user-icon">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                                <span>{{ auth()->user()->name }}</span>
                            </button>
                            <div class="dropdown-menu">
                                @if (Route::has('dashboard'))
                                    <a href="{{ router('dashboard') }}" class="dropdown-item">Dashboard</a>
                                @endif
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Settings</a>
                                <form method="POST" action="{{ router('logout') }}" style="margin: 0;">
                                    @csrf
                                    <button type="submit" class="dropdown-item logout" style="width: 100%; text-align: left; background: none; border: none; cursor: pointer; font: inherit;">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <!-- Guest user -->
                        @if (Route::has('login'))
                            <a href="{{ router('login') }}" class="nav-btn">Login</a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ router('register') }}" class="nav-btn nav-btn-primary">Register</a>
                        @endif
                    @endauth
                </div>
            </ul>
        </div>
    </nav>

    <div class="hero">
        <div class="container">
            <div class="logo-section">
                <h1 class="logo">Maharlika</h1>
                <p class="tagline">Modern PHP Framework</p>
            </div>

            <div class="features">
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <h3 class="feature-title">Lightning Fast</h3>
                    <p class="feature-description">
                        Built for performance with optimized routing, efficient query builder, and intelligent caching out of the box.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🎨</div>
                    <h3 class="feature-title">Elegant Syntax</h3>
                    <p class="feature-description">
                        Beautiful, expressive code that feels natural. Blade templating, component system, and intuitive API design.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🛡️</div>
                    <h3 class="feature-title">Secure by Default</h3>
                    <p class="feature-description">
                        Built-in CSRF protection, SQL injection prevention, XSS filtering, and secure session handling.
                    </p>
                </div>
            </div>

            <div class="code-showcase">
                <h2 class="code-title">Beautiful Code, Powerful Results</h2>
                <pre><code><span class="code-line"><span class="comment">// Define your routes with attributes</span></span>
<span class="code-line"><span class="keyword">class</span> <span class="function">UserController</span></span>
<span class="code-line">{</span>
<span class="code-line">    <span class="comment">#[HttpGet('/api/users')]</span></span>
<span class="code-line">    <span class="keyword">public function</span> <span class="function">index</span>()</span>
<span class="code-line">    {</span>
<span class="code-line">        <span class="keyword">return</span> <span class="function">response</span>()<span class="operator">-></span><span class="function">json</span>([</span>
<span class="code-line">            <span class="string">'users'</span> <span class="operator">=></span> <span class="variable">User</span><span class="operator">::</span><span class="function">all</span>()</span>
<span class="code-line">        ]);</span>
<span class="code-line">    }</span>
<span class="code-line">}</span>
<span class="code-line"></span>
<span class="code-line"><span class="comment">// Blade components that just work</span></span>
<span class="code-line"><span class="operator">&lt;</span><span class="keyword">x-layout</span><span class="operator">&gt;</span></span>
<span class="code-line">    <span class="operator">&lt;</span><span class="keyword">x-card</span> <span class="variable">:title</span><span class="operator">=</span><span class="string">"$pageTitle"</span><span class="operator">&gt;</span></span>
<span class="code-line"><span class="comment">// this will render the action from your component if present.</span></span>
<span class="code-line">        <span class="function">&lcub;&lcub; $this->getContent() &rcub;&rcub;</span></span>
<span class="code-line">    <span class="operator">&lt;/</span><span class="keyword">x-card</span><span class="operator">&gt;</span></span>
<span class="code-line"><span class="operator">&lt;/</span><span class="keyword">x-layout</span><span class="operator">&gt;</span></span></code></pre>
            </div>

            <div class="stats">
                <div class="stat-item">
                    <span class="stat-number">&lt; 1ms</span>
                    <span class="stat-label">Average Response</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Type Safe</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">Zero</span>
                    <span class="stat-label">Dependencies</span>
                </div>
            </div>

            <div class="cta-section">
                <div class="cta-buttons">
                    <a href="/api/documentation" class="btn">
                        <span>View Api Documentation</span>
                    </a>
                    <a href="https://github.com/joshdevkit/maharlika-framework" class="btn">
                        <span>Star on GitHub</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>Maharlika Framework &copy; {{ date('Y') }} - Crafted for modern PHP developers</p>
        <div class="footer-links">
            <a href="#" class="footer-link">Documentation</a>
            <a href="/api/documentation" class="footer-link">API Reference</a>
            <a href="https://github.com/joshdevkit/maharlika-framework" class="footer-link">GitHub</a>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const navMenu = document.getElementById('navMenu');
            navMenu.classList.toggle('active');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const navMenu = document.getElementById('navMenu');
            const mobileToggle = document.querySelector('.mobile-toggle');
            
            if (!navMenu.contains(event.target) && !mobileToggle.contains(event.target)) {
                navMenu.classList.remove('active');
            }
        });
    </script>
</body>
</html>