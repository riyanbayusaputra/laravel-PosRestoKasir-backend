<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Pos Resto Riyan</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>
                   
                
               
            </li>   
            <li class="menu-header">Users</li>
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link"><i class="fas fa-users"></i><span>All Users</span></a>
            </li>
            <li class="menu-header">Items</li>
            <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link"><i class="fas fa-box"></i><span>All Products</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link"><i class="fas fa-tags"></i><span>All Categories</span></a>
            </li>
           
        </ul>
    </li>
    
    </aside>
</div>
