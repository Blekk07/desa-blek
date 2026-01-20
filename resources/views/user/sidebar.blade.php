<!-- Modern Sidebar User -->
<div class="sidebar-container p-4 position-relative">

    <!-- Background Pattern -->
    <div class="sidebar-bg-pattern"></div>

    <!-- Logo / Profil User -->
    <div class="sidebar-header text-center mb-5">
        <div class="avatar-wrapper position-relative mb-3">
            <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('assets/images/user/avatar-1.jpg') }}" 
                 class="sidebar-avatar" 
                 alt="User Avatar"
                 onerror="this.src='{{ asset('assets/images/user/avatar-1.jpg') }}'">
            <div class="online-indicator"></div>
        </div>
        <h5 class="fw-bold text-dark mb-1">{{ auth()->user()->name }}</h5>
        <div class="user-badge">
            <i class="ti ti-user-circle me-1"></i>
            <span>Warga Desa</span>
        </div>        @if(auth()->user()->hasVerifiedEmail())
            <div class="email-verification-badge">
                <i class="ti ti-mail-check text-success me-1"></i>
                <small class="text-success fw-medium">Email Terverifikasi</small>
            </div>
        @else
            <div class="email-verification-badge">
                <i class="ti ti-mail-x text-warning me-1"></i>
                <small class="text-warning fw-medium">Email Belum Terverifikasi</small>
            </div>
        @endif    </div>

    <ul class="sidebar-menu">

            <!-- Divider -->
        <li class="sidebar-divider">
            <span>Menu User</span>
        </li>

        <!-- Dashboard -->
        <li class="sidebar-item">
            <a href="{{ route('user.dashboard') }}" class="sidebar-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                <div class="sidebar-icon-wrapper">
                    <i class="ti ti-home"></i>
                </div>
                <span class="sidebar-text">Dashboard</span>
            </a>
        </li>

        <!-- Profil Saya -->
        <li class="sidebar-item">
            <a href="{{ route('myprofile') }}" class="sidebar-link {{ request()->routeIs('myprofile') ? 'active' : '' }}">
                <div class="sidebar-icon-wrapper">
                    <i class="ti ti-user"></i>
                </div>
                <span class="sidebar-text">Profil Saya</span>
            </a>
        </li>

        <!-- Informasi Desa -->
        <li class="sidebar-item">
            <a href="{{ route('user.profile-desa') }}" class="sidebar-link {{ request()->routeIs('user.profile-desa') ? 'active' : '' }}">
                <div class="sidebar-icon-wrapper">
                    <i class="ti ti-building"></i>
                </div>
                <span class="sidebar-text">Informasi Desa</span>
            </a>
        </li>

        <!-- Pengajuan Surat -->
        <li class="sidebar-item">
            <a href="{{ route('user.pengajuan-surat.index') }}" class="sidebar-link {{ request()->routeIs('user.pengajuan-surat.*') ? 'active' : '' }}">
                <div class="sidebar-icon-wrapper">
                    <i class="ti ti-file-text"></i>
                </div>
                <span class="sidebar-text">Pengajuan Surat</span>
            </a>
        </li>

        <!-- Pengaduan Warga -->
        <li class="sidebar-item">
            <a href="{{ route('pengaduan.index') }}" class="sidebar-link {{ request()->routeIs('pengaduan.*') ? 'active' : '' }}">
                <div class="sidebar-icon-wrapper">
                    <i class="ti ti-report"></i>
                </div>
                <span class="sidebar-text">Laporan Warga</span>
            </a>
        </li>

            <!-- Divider -->
        <li class="sidebar-divider">
            <span></span>
        </li>


        <!-- Logout -->
        <li class="sidebar-item">
            <form method="POST" action="{{ route('logout') }}" class="d-inline w-100">
                @csrf
                <button type="submit" class="sidebar-link logout-btn w-100 text-start">
                    <div class="sidebar-icon-wrapper">
                        <i class="ti ti-logout"></i>
                    </div>
                    <span class="sidebar-text">Keluar</span>
                </button>
            </form>
        </li>

    </ul>

    <!-- Sidebar Footer -->
    <div class="sidebar-footer mt-auto">
        <div class="app-version">
            <small class="text-muted">v2.1.0</small>
        </div>
    </div>
</div>

<style>
:root {
    --sidebar-bg: #ffffff;
    --sidebar-primary: #0052d4;
    --sidebar-secondary: #00a8ff;
    --sidebar-text: #334155;
    --sidebar-hover: #f1f5f9;
    --sidebar-border: #e2e8f0;
    --sidebar-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Sidebar Container */
.sidebar-container {
    width: 280px;
    background: var(--sidebar-bg);
    border-right: 1px solid var(--sidebar-border);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    box-shadow: var(--sidebar-shadow);
    position: relative;
    overflow: hidden;
}

.sidebar-bg-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 80%, rgba(0, 82, 212, 0.03) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(0, 168, 255, 0.02) 0%, transparent 50%);
    pointer-events: none;
}

/* Sidebar Header */
.sidebar-header {
    position: relative;
    z-index: 2;
}

.avatar-wrapper {
    display: inline-block;
    position: relative;
}

.sidebar-avatar {
    width: 80px;
    height: 80px;
    border-radius: 20px;
    object-fit: cover;
    border: 3px solid white;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    transition: var(--transition);
}

.avatar-wrapper:hover .sidebar-avatar {
    transform: scale(1.05);
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
}

.online-indicator {
    position: absolute;
    bottom: 5px;
    right: 5px;
    width: 12px;
    height: 12px;
    background: #10b981;
    border: 2px solid white;
    border-radius: 50%;
}

.user-badge {
    display: inline-flex;
    align-items: center;
    background: rgba(0, 82, 212, 0.1);
    color: var(--sidebar-primary);
    padding: 0.4rem 0.8rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 500;
    margin-top: 0.5rem;
}

/* Sidebar Menu */
.sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 0;
    flex: 1;
    position: relative;
    z-index: 2;
}

.sidebar-item {
    margin-bottom: 0.5rem;
}

.sidebar-link {
    display: flex;
    align-items: center;
    padding: 0.875rem 1rem;
    border-radius: 12px;
    color: var(--sidebar-text);
    text-decoration: none;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.sidebar-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(0, 82, 212, 0.05), transparent);
    transition: var(--transition);
}

.sidebar-link:hover::before {
    left: 100%;
}

.sidebar-link:hover {
    background: var(--sidebar-hover);
    transform: translateX(5px);
    color: var(--sidebar-primary);
}

.sidebar-link.active {
    background: linear-gradient(135deg, var(--sidebar-primary), var(--sidebar-secondary));
    color: white !important;
    box-shadow: 0 4px 15px rgba(0, 82, 212, 0.3);
}

.sidebar-link.active .sidebar-icon-wrapper {
    background: rgba(255, 255, 255, 0.2);
    color: white;
}

.sidebar-link.active .sidebar-badge {
    color: rgba(255, 255, 255, 0.8);
}

/* Icon Wrapper */
.sidebar-icon-wrapper {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: rgba(0, 82, 212, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 0.75rem;
    color: var(--sidebar-primary);
    transition: var(--transition);
    font-size: 1.1rem;
}

.sidebar-link:hover .sidebar-icon-wrapper {
    background: rgba(0, 82, 212, 0.15);
    transform: scale(1.1);
}

/* Text */
.sidebar-text {
    flex: 1;
    font-weight: 500;
    font-size: 0.9rem;
}

/* Badge */
.sidebar-badge {
    display: flex;
    align-items: center;
    color: #64748b;
    transition: var(--transition);
}

.notification-badge {
    background: #ef4444;
    color: white;
    font-size: 0.7rem;
    padding: 0.2rem 0.5rem;
    border-radius: 10px;
    font-weight: 600;
    min-width: 20px;
    text-align: center;
}

/* Logout Button */
.logout-btn {
    border: none;
    background: transparent;
    font: inherit;
    cursor: pointer;
}

.logout-btn:hover {
    background: rgba(239, 68, 68, 0.1) !important;
    color: #ef4444 !important;
}

.logout-btn:hover .sidebar-icon-wrapper {
    background: rgba(239, 68, 68, 0.15);
    color: #ef4444;
}

/* Divider */
.sidebar-divider {
    padding: 1rem 1rem 0.5rem;
    margin-top: 1rem;
    border-top: 1px solid var(--sidebar-border);
}

.sidebar-divider span {
    font-size: 0.75rem;
    font-weight: 600;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Sidebar Footer */
.sidebar-footer {
    position: relative;
    z-index: 2;
    padding-top: 1rem;
    border-top: 1px solid var(--sidebar-border);
}

.app-version {
    text-align: center;
}

/* Responsive Design */
@media (max-width: 991px) {
    .sidebar-container {
        width: 100%;
        min-height: auto;
        border-right: none;
        border-bottom: 1px solid var(--sidebar-border);
    }
    
    .sidebar-menu {
        display: flex;
        flex-direction: column;
        overflow: visible;
        padding: 1rem 0;
    }
    
    .sidebar-item {
        flex: none;
        margin-bottom: 0.5rem;
        margin-right: 0;
    }
    
    .sidebar-link {
        flex-direction: row;
        padding: 0.875rem 1rem;
        min-width: auto;
        text-align: left;
        align-items: center;
    }
    
    .sidebar-icon-wrapper {
        margin-right: 0.75rem;
        margin-bottom: 0;
    }
    
    .sidebar-text {
        font-size: 0.9rem;
    }
    
    .sidebar-badge {
        position: static;
        display: flex;
    }
    
    .user-badge,
    .sidebar-divider,
    .sidebar-footer {
        display: none;
    }
}

/* Animation for active state */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(-10px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.sidebar-item {
    animation: slideIn 0.3s ease-out;
}

.sidebar-item:nth-child(1) { animation-delay: 0.1s; }
.sidebar-item:nth-child(2) { animation-delay: 0.2s; }
.sidebar-item:nth-child(3) { animation-delay: 0.3s; }
.sidebar-item:nth-child(4) { animation-delay: 0.4s; }
.sidebar-item:nth-child(5) { animation-delay: 0.5s; }
.sidebar-item:nth-child(6) { animation-delay: 0.6s; }
</style>

<script>
// Add interactive effects
document.addEventListener('DOMContentLoaded', function() {
    const sidebarLinks = document.querySelectorAll('.sidebar-link');
    
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Remove active class from all links
            sidebarLinks.forEach(l => l.classList.remove('active'));
            
            // Add active class to clicked link
            this.classList.add('active');
        });
    });
    
    // Add ripple effect
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.5);
                transform: scale(0);
                animation: ripple 0.6s linear;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                pointer-events: none;
            `;
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
});

// Add ripple animation
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    .email-verification-badge {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 4px 8px;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 12px;
        font-size: 0.75rem;
        backdrop-filter: blur(4px);
        border: 1px solid rgba(0, 0, 0, 0.05);
    }
`;
document.head.appendChild(style);
</script>