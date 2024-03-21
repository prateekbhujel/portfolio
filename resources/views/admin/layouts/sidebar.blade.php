<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <div class="form-inline mr-auto"></div>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      <img alt="image" src="{{ asset('public/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
      <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title">Logged in 5 min ago</div>
        <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profile
        </a>
        <a href="features-settings.html" class="dropdown-item has-icon">
          <i class="fas fa-cog"></i> Settings
        </a>
        <div class="dropdown-divider"></div>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
            <a href="#" 
              class="dropdown-item has-icon text-danger"
              onclick="event.preventDefault();
                      this.closest('form').submit();"
            >
              <i class="fas fa-sign-out-alt"></i> Logout
              
            </a>

        </form>
      </div>
    </li>
  </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('dashboard') }}">Admin</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('dashboard') }}">PB</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item {{ setSidebarActive(['dashboard']) }}">
          <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>

        <li class="menu-header">Sections</li>

        <li class="nav-item dropdown {{   setSidebarActive(['admin.typer-title.*', 'admin.hero.*']) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Hero</span></a>
          <ul class="dropdown-menu" style="display: none;">
            <li class="{{ setSidebarActive(['admin.typer-title.*']) }}"><a class="nav-link" href="{{ route('admin.typer-title.index') }}">Typer Title</a></li>
            <li class="{{ setSidebarActive(['admin.hero.*']) }}"><a class="nav-link" href="{{ route('admin.hero.index') }}">Hero Section</a></li>
          </ul>
        </li>

        <li class="{{ setSidebarActive(['admin.services.*']) }}"><a class="nav-link" href="{{ route('admin.services.index') }}"><i class="far fa-square"></i> <span>Services</span></a></li>

        <li class="{{ setSidebarActive(['admin.about.*']) }}"><a class="nav-link" href="{{ route('admin.about.index') }}"><i class="far fa-square"></i> <span>About</span></a></li>

        <li class="nav-item dropdown {{ setSidebarActive(['admin.category.*', 'admin.protfolio-item.*', 'admin.portfolio-section-setting.*']) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Prtotfolio</span></a>
          <ul class="dropdown-menu" style="display: none;">
            <li class="{{ setSidebarActive(['admin.category.*']) }}"><a class="nav-link" href="{{ route('admin.category.index') }}">Category</a></li>
            <li class="{{ setSidebarActive(['admin.protfolio-item.*']) }}"><a class="nav-link" href="{{ route('admin.protfolio-item.index') }}">Protfolio Item</a></li>
            <li class="{{ setSidebarActive(['admin.portfolio-section-setting.*']) }}"><a class="nav-link" href="{{ route('admin.portfolio-section-setting.index') }}">Section Setting</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown {{ setSidebarActive(['admin.skill-section-item.*', 'admin.skill-section-setting.*']) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Skills</span></a>
          <ul class="dropdown-menu" style="display: none;">
            <li class="{{ setSidebarActive(['admin.skill-section-item.*']) }}"><a class="nav-link" href="{{ route('admin.skill-section-item.index') }}">Items</a></li>
            <li class="{{ setSidebarActive(['admin.skill-section-setting.*']) }}"><a class="nav-link" href="{{ route('admin.skill-section-setting.index') }}">Setting</a></li>
          </ul>
        </li>

        <li class="{{ setSidebarActive(['admin.experience.*']) }}"><a class="nav-link" href="{{ route('admin.experience.index') }}"><i class="far fa-square"></i> <span>Experience</span></a></li>

        <li class="nav-item dropdown {{ setSidebarActive(['admin.feedback.*', 'admin.feedback-section-setting.*']) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Feedback</span></a>
          <ul class="dropdown-menu" style="display: none;">
            <li class="{{ setSidebarActive(['admin.feedback.*']) }}"><a class="nav-link" href="{{ route('admin.feedback.index') }}">Feedbacks</a></li>
            <li class="{{ setSidebarActive(['admin.feedback-section-setting.*']) }}"><a class="nav-link" href="{{ route('admin.feedback-section-setting.index') }}">Setting</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown {{ setSidebarActive(['admin.blog-category.*', 'admin.blog.*', 'admin.blog-section-setting*']) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Blog</span></a>
          <ul class="dropdown-menu" style="display: none;">
            <li class="{{ setSidebarActive(['admin.blog-category.*']) }}"><a class="nav-link" href="{{ route('admin.blog-category.index') }}">Category</a></li>
            <li class="{{ setSidebarActive(['admin.blog.*']) }}"><a class="nav-link" href="{{ route('admin.blog.index') }}">Blog List</a></li>
            <li class="{{ setSidebarActive(['admin.blog-section-setting.*']) }}"><a class="nav-link" href="{{ route('admin.blog-section-setting.index') }}">Section-Setting</a></li>
          </ul>
        </li>

        <li class="{{ setSidebarActive(['admin.contact-section-setting.*']) }}"><a class="nav-link" href="{{ route('admin.contact-section-setting.index') }}"><i class="far fa-square"></i> <span>Contact</span></a></li>

        <li class="nav-item dropdown {{ setSidebarActive(['admin.footer-contact-info.*', 'admin.footer-info.*', 'admin.footer-help-links.*', 'admin.footer-social.*', 'admin.footer-useful-links.*']) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Footer</span></a>
          <ul class="dropdown-menu" style="display: none;">
            <li class="{{ setSidebarActive(['admin.footer-contact-info.*']) }}"><a class="nav-link" href="{{ route('admin.footer-contact-info.index') }}">Contact Info</a></li>
            <li class="{{ setSidebarActive(['admin.footer-info.*']) }}"><a class="nav-link" href="{{ route('admin.footer-info.index') }}">Footer Info</a></li>
            <li class="{{ setSidebarActive(['admin.footer-help-links.*']) }}"><a class="nav-link" href="{{ route('admin.footer-help-links.index') }}">Help Links</a></li>
            <li class="{{ setSidebarActive(['admin.footer-social.*']) }}"><a class="nav-link" href="{{ route('admin.footer-social.index') }}">Social Links</a></li>
            <li class="{{ setSidebarActive(['admin.footer-useful-links.*']) }}"><a class="nav-link" href="{{ route('admin.footer-useful-links.index') }}">Useful Links</a></li>
          </ul>
        </li>

        <li class="{{ setSidebarActive(['admin.settings.*', 'admin.general-setting.*', 'admin.seo-setting.*']) }}"><a class="nav-link" href="{{ route('admin.settings.index') }}"><i class="far fa-square"></i> <span>Setting</span></a></li>
        
      </ul>
  </aside>
</div>