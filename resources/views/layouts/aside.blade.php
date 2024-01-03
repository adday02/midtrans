<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li class="{{ (request()->is('home')) ? 'mm-active' : '' }}">
                    <a href="{{route('home')}}" class="waves-effect">
                        <i class="bx bx-package"></i><span key="t-chat">Product</span>
                    </a>
                </li>
                <li class="{{ (request()->is('cart')) ? 'mm-active' : '' }}">
                    <a href="{{route('cart.index')}}" class="waves-effect">
                        <i class="bx bx-cart"></i><span key="t-chat">Cart</span>
                    </a>
                </li>
                <li class="{{ (request()->is('order')) ? 'mm-active' : '' }}">
                    <a href="{{route('order.index')}}" class="waves-effect">
                        <i class="bx bx-file"></i><span key="t-chat">Order</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>