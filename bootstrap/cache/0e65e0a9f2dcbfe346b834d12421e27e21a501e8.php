
<header class="header">
  <nav class="nav">
    <div class="nav-logo">
      <h4>🍊rganic|<span class="nav-logo__span">STORE</span></h4>
    </div>
    <ul class="nav__list">
      <li class="nav__item"><a class="nav__link" href="/">HOME</a></li>
      <li class="nav__item"><a class="nav__link" href="#">About us</a></li>
      <li class="nav__item"><a class="nav__link" href="/shop">Shop</a></li>
      <li class="nav__item"><a class="nav__link" href="#">Contact us</a></li>
    </ul>
    <div class="nav-right">
      <div class="nav-right__toggle">
        <?php if(isAuthenticated()): ?>
          <a class="nav__link" href="#"><i class="far fa-user"></i><?php echo e(user()->username); ?>

            <ul class="login__dropdown">
              <li><a href="/logout"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
            </ul>
          </a>
        <?php else: ?>
        <a class="nav__link" href="#"><i class="far fa-user"></i>Login
          <ul class="login__dropdown">
            <li><a href="/login"><i class="fas fa-sign-in-alt"></i>Login</a></li>
            <hr>
            <li><a href="/register"><i class="fas fa-user-plus"></i>Register</a></li>
          </ul>
        </a>
      <?php endif; ?>
      </div>
      <a class="nav__link" href="/cart"><i class="fas fa-shopping-basket"></i><sup id="cart-itm" class="badge badge-pill badge-info"></sup>
        
      </a>
    </div>
    <div class="nav__burger">
      <div class="nav__burger-line line-1"></div>
      <div class="nav__burger-line line-2"></div>
      <div class="nav__burger-line line-3"></div>
    </div>
  </nav>
</header>
<?php /**PATH /var/www/html/organicstore/resources/views/includes/nav.blade.php ENDPATH**/ ?>