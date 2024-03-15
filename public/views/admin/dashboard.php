<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    // echo "Welcome to the member's area, " . htmlspecialchars($_SESSION['email']) . "!";
} else {
    header("Location: /sporttime_template/public/admin"); 
    exit; 
}
?>


<section class="admin-dashboard">
    <aside class="admin-dashboard__sidebar">
        <div class="admin-dashboard__sidebar__logo">
            <img src="/sporttime_template/public/img/linrime_logo_black.png" alt="">
        </div>
        <nav class="admin-dashboard__sidebar__nav">
            <ul class="admin-dashboard__sidebar__nav__lists">
                <li class="admin-dashboard__sidebar__nav__lists__list">
                    <span class="admin-dashboard__sidebar__nav__lists__list --active"></span>
                    <a href="/sporttime_template/public/admin/dashboard"
                    class="admin-dashboard__sidebar__nav__lists__list__item --active">
                        <i class="fa-solid fa-house --active"></i> 
                        Dashboard
                    </a>
                </li>
                <li class="admin-dashboard__sidebar__nav__lists__list">
                    <a href="/sporttime_template/public/admin/clients"
                    class="admin-dashboard__sidebar__nav__lists__list__item">
                        <i class="fa-solid fa-person"></i>    
                        Clients
                    </a>
                </li>
                <li class="admin-dashboard__sidebar__nav__lists__list">
                    <a href="/sporttime_template/public/admin/employees"
                    class="admin-dashboard__sidebar__nav__lists__list__item">
                        <i class="fa-solid fa-user"></i>    
                        Employees
                    </a>
                </li>
                <li class="admin-dashboard__sidebar__nav__lists__list">
                    <a href="/sporttime_template/public/admin/transactions"
                    class="admin-dashboard__sidebar__nav__lists__list__item">
                        <i class="fa-solid fa-money-bill"></i>    
                        Transactions
                    </a>
                </li>
                <li class="admin-dashboard__sidebar__nav__lists__list">
                    <a href="/sporttime_template/public/admin/logout"
                    class="admin-dashboard__sidebar__nav__lists__list__item">
                        <i class="fa-solid fa-right-from-bracket"></i>    
                        Logout
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
    <section class="admin-dashboard__navigation">
        <div class="admin-dashboard__navigation__title">
            <h2>Dashboard</h2>
        </div>
        <nav class="admin-dashboard__navigation__nav">
            <ul class="admin-dashboard__navigation__nav__lists">
                <li class="admin-dashboard__navigation__nav__lists__list">
                    <div class="form-search">
                        <input type="text" placeholder="Search">
                        <button>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </li>
                <li class="admin-dashboard__navigation__nav__lists__list">
                    <button class="settings">
                        <i class="fa-solid fa-gear"></i>
                    </button>
                </li>
                <li class="admin-dashboard__navigation__nav__lists__list">
                    <button class="settings">
                        <i class="fa-regular fa-bell"></i>
                    </button>
                </li>
                <li class="admin-dashboard__navigation__nav__lists__list">
                    <button class="profile">
                        <img src="/sporttime_template/public/img/avatar.jpg" alt="">
                    </button>
                </li>
            </ul>
        </nav>
    </section>
</section>
