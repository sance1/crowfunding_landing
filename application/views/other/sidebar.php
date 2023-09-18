<div class="navigation">
    <div class="navigation-header">
        <span>Navigation</span>
        <a href="#">
            <i class="ti-close"></i>
        </a>
    </div>
    <div class="navigation-menu-body">
        <ul>
            <li>
                <a class="<?php if(!empty($event)){ echo $event;} ?>" href="<?php echo base_url("event.html") ?>">
                    <span class="nav-link-icon">
                        <i data-feather="star"></i>
                    </span>
                    <span>Event</span>
                </a>
            </li>
            <li>
                <a class="<?php if(!empty($shoot)){ echo $shoot;} ?>" href="<?php echo base_url("shoot.html") ?>">
                    <span class="nav-link-icon">
                        <i data-feather="camera"></i>
                    </span>
                    <span>Shoot</span>
                </a>
            </li>
            <li>
                <a class="<?php if(!empty($user)){ echo $user;} ?>" href="<?php echo base_url("user.html") ?>">
                    <span class="nav-link-icon">
                        <i data-feather="user"></i>
                    </span>
                    <span>User</span>
                </a>
            </li>
            <li>
                <a class="<?php if(!empty($background)){ echo $background;} ?>" href="<?php echo base_url("background.html") ?>">
                    <span class="nav-link-icon">
                        <i data-feather="image"></i>
                    </span>
                    <span>Background</span>
                </a>
            </li>
            <li>
                <a class="<?php if(!empty($frame)){ echo $frame;} ?>" href="<?php echo base_url("frame.html") ?>">
                    <span class="nav-link-icon">
                        <i data-feather="crop"></i>
                    </span>
                    <span>Frame</span>
                </a>
            </li>
            <li>
                <a class="<?php if(!empty($sticker)){ echo $sticker;} ?>" href="<?php echo base_url("sticker.html") ?>">
                    <span class="nav-link-icon">
                        <i data-feather="heart"></i>
                    </span>
                    <span>Sticker</span>
                </a>
            </li>
            <li>
                <a class="<?php if(!empty($voucher)){ echo $voucher;} ?>" href="<?php echo base_url("voucher.html") ?>">
                    <span class="nav-link-icon">
                        <i data-feather="percent"></i>
                    </span>
                    <span>Voucher</span>
                </a>
            </li>
            <li>
                <a class="<?php if(!empty($planning)){ echo $planning;} ?>" href="<?php echo base_url("planning.html") ?>">
                    <span class="nav-link-icon">
                        <i data-feather="box"></i>
                    </span>
                    <span>Planning</span>
                </a>
            </li>
            <li>
                <a class="<?php if(!empty($admin)){ echo $admin;} ?>" href="<?php echo base_url("admin.html") ?>">
                    <span class="nav-link-icon">
                        <i data-feather="shield"></i>
                    </span>
                    <span>Admin</span>
                </a>
            </li>
            <!-- <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i data-feather="shopping-cart"></i>
                    </span>
                    <span>E-commerce</span>
                </a>
                <ul>
                    <li>
                        <a href="orders.html">Orders</a>
                    </li>
                    <li>
                        <a href="products.html">Products</a>
                    </li>
                    <li>
                        <a href="product-detail.html">Product Detail</a>
                    </li>
                </ul>
            </li> -->
        </ul>
    </div>
</div>