<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maharlika Framework - Modern PHP Development</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="/" class="nav-brand">Maharlika</a>
            <!-- LIVE CLOCK -->
            @headerclock
            <!-- END OF LIVE CLOCK -->
            <button class="mobile-toggle" onclick="toggleMobileMenu()">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul class="nav-menu" id="navMenu">
                <li><a href="/" class="nav-link active">Home</a></li>
                <li><a href="/api/documentation" class="nav-link">Api Endpoints</a></li>
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