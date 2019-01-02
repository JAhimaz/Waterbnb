<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{route('listing.index')}}"><span style="color: #33A2FF">WATERBNB</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">

        <?php
        if(is_logged_in())
        { ?>
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo ucfirst(current_user()->name) ?>
          </a>
        <?php } else { ?>
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Account (Guest)
          </a>
        <?php } ?>

        <?php
        if(is_logged_in())
        { ?>
          <!-- Happens if Logged in -->
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Welcome <?php echo ucfirst(current_user()->name) ?>!</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{route('login.show')}}">Settings</a>
            <a class="dropdown-item" href="{{route('logout')}}">Log Out</a>
          </div>
        <?php } else { ?>
          <!-- Happens if NOT Logged in -->
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">My Account</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{route('login.show')}}">Login</a>
            <a class="dropdown-item" href="{{route('signup.show')}}">Sign Up</a>
          </div>
        <?php } ?>

      </li>
    </ul>
  </div>
</nav>
