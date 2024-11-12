<div>
    <div class="wrapper">
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
              <!-- Logo Header -->
              <div class="logo-header" data-background-color="dark">
                <a  wire:navigate href="/home" class="logo">
                  <img
                    src="/assets/img/kaiadmin/goldlogo.png"
                    alt="navbar brand"
                    class="navbar-brand mt-2 mb-2"
                    height="65"
                  />
                </a>
                <div class="nav-toggle">
                  <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                  </button>
                  <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                  </button>
                </div>
                <button class="topbar-toggler more">
                  <i class="gg-more-vertical-alt"></i>
                </button>
              </div>
              <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
              <div class="sidebar-content">
                <ul class="nav nav-secondary">
                  <li class="nav-item active">
                    <a
                    
                      data-bs-toggle="collapse"
                      href="#dashboard"
                      class="collapsed"
                      aria-expanded="false"
                    >
                      <i class="fas fa-home"></i>
                      <p>Dashboard</p>
                      <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                      <ul class="nav nav-collapse">
                        <li>
                          <a  wire:navigate href="/home">
                            <span class="sub-item">Dashboard</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
    
                  <li class="nav-section">
                    <span class="sidebar-mini-icon">
                      <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                  </li>
    
    
    
    
      
    
    
    
                  <li class="nav-item">
                    <a  wire:navigate href="/products">
                      <i class="fas fa-fill"></i>
                      <p>Entries</p>
                    </a>
                  </li>
    
                  <li class="nav-item">
                    <a  wire:navigate href="/vendors">
                      <i class="fas fa-user"></i>
                      <p>Add Clients</p>
                    </a>
                  </li>
    
                  <li class="nav-item">
                    <a  href="/paymentledger">
                      <i class="fas fa-dollar-sign"></i>
                      <p>CashBook</p>
                    </a>
                  </li>
    
                  <!-- <li class="nav-item">
                    <a  wire:navigate href="/sale">
                      <i class="fas fa-cart-plus"></i>
                      <p>Sale</p>
                    </a>
                  </li>
     -->
                  <!-- <li class="nav-item">
                    <a  wire:navigate href="/purchase">
                      <i class="fas fa-arrow-down"></i>
                      <p>Purchase</p>
                    </a>
                  </li> -->
    
                  <li class="nav-item">
                    <a  href="/vendorledgers">
                      <i class="fas fa-users"></i>
                      <p>Clients Ledgers</p>
                    </a>
                  </li>
    
                  <!-- <li class="nav-item">
                    <a href="/expense">
                      <i class="fas fa-money-bill"></i>
                      <p>Expense</p>
                    </a>
                  </li> -->
    
    
    
                </ul>
              </div>
            </div>
          </div>
          <!-- End Sidebar -->
    
          <div class="main-panel" >
            <div class="main-header">
              <div class="main-header-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                  <a href="index.html" class="logo">
                    <img
                      src="/assets/img/kaiadmin/goldlogo.png"
                      alt="navbar brand"
                      class="navbar-brand"
                      height="20px"
                    />
                  </a>
                  <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                      <i class="gg-menu-right"></i>
                    </button>
                    <button class="btn btn-toggle sidenav-toggler">
                      <i class="gg-menu-left"></i>
                    </button>
                  </div>
                  <button class="topbar-toggler more">
                    <i class="gg-more-vertical-alt"></i>
                  </button>
                </div>
                <!-- End Logo Header -->
              </div>
              <!-- Navbar Header -->
              <nav
                class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
              >
                <div class="container-fluid">
    <h4>Gold Management System (GMS)</h4>
    
                  <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
       
                    
    
                    <li class="nav-item topbar-user dropdown hidden-caret">
                      <a
                        class="dropdown-toggle profile-pic"
                        data-bs-toggle="dropdown"
                        href="#"
                        aria-expanded="false"
                      >
                        <div class="avatar-sm">
                          <img
                            src="/assets/img/kaiadmin/logo.png"
                            alt="..."
                            class="avatar-img rounded-circle"
                          />
                        </div>
                        <span class="profile-username">
                          <span class="op-7">AW</span>
                          <span class="fw-bold">Soft</span>
                        </span>
                      </a>
                      <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                          <li>
                            <div class="user-box">
                              <div class="avatar-lg">
                                <img
                                  src="/assets/img/kaiadmin/logo.png"
                                  alt="image profile"
                                  class="avatar-img rounded"
                                />
                              </div>
                              <div class="u-text">
                                <h4>AW Soft Solutions</h4>
                                <p class="text-muted">0346-7998485</p>
                
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="dropdown-divider"></div>
                            
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Logout</a>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                          </li>
                        </div>
                      </ul>
                    </li>
                  </ul>
                </div>
              </nav>
              <!-- End Navbar -->
            </div>  