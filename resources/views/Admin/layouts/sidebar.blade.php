        <div class="sidebar" data-image="{{asset('Dashboard/assets/img/sidebar-5.jpg')}}">
            <div class="sidebar-wrapper">
                <div class="logo" style="background: #FFF; ">
                    <a href="#" class="simple-text">
                        <img src="{{asset('img/logo.png')}}" alt="" width="100px">
                    </a>
                </div>
                <ul class="nav">
                    <li class="{{ Request::segment(2) == '' ? 'active' : null }}">
                        <a class="nav-link" href="{{route('index')}}">
                            <i class="nc-icon nc-align-center"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'about' ? 'active' : null }}">
                        <a class="nav-link" href="{{route('about.index')}}">
                            <i class="nc-icon nc-badge"></i>
                            <p>About</p>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'slider' ? 'active' : null }}">
                        <a class="nav-link" href="{{route('slider.index')}}">
                            <i class="nc-icon nc-album-2"></i>
                            <p>Slider</p>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'category' ? 'active' : null }}">
                        <a class="nav-link" href="{{route('category.index')}}">
                            <i class="nc-icon nc-align-center"></i>
                            <p>Category</p>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'product' ? 'active' : null }}">
                        <a class="nav-link" href="{{route('product.index')}}">
                            <i class="nc-icon nc-layers-3"></i>
                            <p>Product</p>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'messages' ? 'active' : null }}">
                        <a class="nav-link" href="{{route('messages')}}">
                            <i class="nc-icon nc-chat-round"></i>
                            <p>Messages</p>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'order' ? 'active' : null }}">
                        <a class="nav-link" href="{{route('order')}}">
                            <i class="nc-icon nc-cart-simple"></i>
                            <p>Orders</p>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'testmonials' ? 'active' : null }}">
                        <a class="nav-link" href="{{route('testmonials.index')}}">
                            <i class="nc-icon nc-notification-70"></i>
                            <p>Testmonials</p>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'news' ? 'active' : null }}">
                        <a class="nav-link" href="{{route('news.index')}}">
                            <i class="nc-icon nc-tv-2"></i>
                            <p>News</p>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'settings' ? 'active' : null }}">
                        <a class="nav-link" href="{{route('settings')}}">
                            <i class="nc-icon nc-settings-gear-64"></i>
                            <p>Settings</p>
                        </a>
                    </li>

                </ul>
              
            </div>
        </div>
