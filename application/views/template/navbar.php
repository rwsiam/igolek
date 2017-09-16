<header class="hero is-light">
  <div class="hero-head">
    <nav class="navbar has-shadow is-info" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a href="<?php echo site_url()?>" class="navbar-item">
          <img src="<?php echo site_url('node_modules/asset/logo.png')?>" alt="Igolek logo">
        </a>
        <a href="<?php echo site_url();?>" class="navbar-item is-tab is-hidden-mobile">Home</a>
        <a class="navbar-item is-tab is-hidden-mobile">Pencarian Lanjut</a>
        <a class="navbar-item is-tab is-hidden-mobile">About</a>

        <div id="nav-toggle" class="is-info navbar-burger nav-toggle">
        	<span></span>
        	<span></span>
        	<span></span>
        </div>
      </div>
      <div class="has-text-dark navbar-menu navbar-end" id="navMenu">
        <a href="<?php echo site_url();?>" class="navbar-item is-tab is-hidden-tablet">Home</a>
        <a class="navbar-item is-tab is-hidden-tablet">Pencarian Lanjut</a>
        <a class="navbar-item is-tab is-hidden-tablet">About</a>
        
        <div id="search-form" class="navbar-item is-hidden">
          <div class="control has-icons-left">
            <input class="input is-small is-info" name="keyword" id="keyword" type="text" placeholder="Cari barang hilang..">
            <span class="icon is-small is-right">
              <i class="fa fa-search"></i>
            </span>
          </div>
        </div>
        <a onclick="search_form($(this))" class="navbar-item nav-tag">              
          <span class="icon is-small">
            <i class="fa fa-search"></i>
          </span>
        </a>  
        
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
          <?php 
            if ($this->session->login) {
          ?>              
            <figure class="image is-32x32 sidebar-image" style="margin-right:.5em;">
              <img src="<?php echo $this->session->profil;?>">
            </figure>
          <?php
              echo $this->session->username;
            }else{
              echo "Menu";
            }
          ?>
          </a>
        
          <div class="has-text-dark navbar-dropdown is-right">              
            <?php 
                if ($this->session->login) {
            ?>
              <a href="<?php echo site_url("page/profil?uid={$this->session->username}");?>" class="navbar-item">
                <span class="icon is-small">
                  <i class="fa fa-user-o"></i>
                </span>
                Profile
              </a>
              <a class="navbar-item">
                <span class="icon is-small">
                  <i class="fa fa-search-plus"></i>
                </span>
                Temuan Anda
              </a>
              <a class="navbar-item">
                <span class="icon is-small">
                  <i class="fa fa-volume-up"></i>
                </span>
                Buat Pengumuman
              </a>
              <hr class="navbar-divider">
              <a href="<?php echo site_url('page/action_login/logout');?>" class="navbar-item">
                <span class="icon is-small">
                  <i class="fa fa-power-off"></i>
                </span>
                Logout
              </a>
            <?php
              }else{
            ?>
              <a onclick="login_form()" class="navbar-item">
                <span class="icon is-small">
                  <i class="fa fa-key"></i>
                </span>
                Login
              </a>
              <hr class="navbar-divider">
              <a onclick="register_form()" class="navbar-item">
                <span class="icon is-small">
                  <i class="fa fa-connectdevelop"></i>
                </span>
                Register
              </a>
            <?php
              }
            ?>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>
<?php
  if (!$this->session->login) {
?>
<!-- Login Modal -->
<div id="login-modal" class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">
          <span class="fa fa-key modal-title">
            LOGIN
          </span>
      </p>
      <button onclick="login_form()" class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <form action="<?php echo site_url('page/action_login')?>" method="POST">
        <div class="field">
          <label class="label">Email</label>
          <div class="control has-icons-left">
            <input name="email" id="email" class="input" type="email" placeholder="Your Email" required>
            <span class="icon is-small is-left">
              <i class="fa fa-envelope"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <label class="label">Password</label>
          <div class="control has-icons-left">
            <input name="password" id="password" class="input" type="password" placeholder="password" required>
            <span class="icon is-small is-left">
              <i class="fa fa-lock"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <div class="control">
            <label class="checkbox">
              <input type="checkbox">
              Remember me.
            </label>
          </div>
        </div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-info">Login</button>
      </form>
      <button onclick="login_form()" class="button">Cancel</button>
    </footer>
  </div>
</div>

<!-- Modal Register -->
<div id="register-modal" class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">
          <span class="fa fa-key modal-title">
            Daftar
          </span>
      </p>
      <button onclick="register_form()" class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <form action="<?php echo site_url('page/register');?>" method="POST">
        <div class="field">
          <label class="label">Username</label>
          <div class="control has-icons-left">
            <input name="username" id="username" class="input" type="text" placeholder="Username" required>
            <span class="icon is-small is-left">
              <i class="fa fa-user-o"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <label class="label">Email</label>
          <div class="control has-icons-left">
            <input name="email" id="email" class="input" type="email" placeholder="Your Email" required>
            <span class="icon is-small is-left">
              <i class="fa fa-envelope"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <label class="label">Password</label>
          <div class="control has-icons-left">
            <input name="password" id="password" class="input" type="password" placeholder="password" required>
            <span class="icon is-small is-left">
              <i class="fa fa-lock"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <label class="label">Re-Password</label>
          <div class="control has-icons-left">
            <input name="repassword" id="repassword" class="input" type="password" placeholder="re password" required>
            <span class="icon is-small is-left">
              <i class="fa fa-lock"></i>
            </span>
          </div>
        </div>
        <div class="field">
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" required>
            I agree to the <a href="#">terms and conditions</a>
          </label>
        </div>
      </div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-info">Daftar</button>
      <button onclick="register_form()" class="button">Cancel</button>
    </footer>
    </form>
  </div>
</div>
<?php
  }
?>
<script type="text/javascript">
  function search_form(event) {
    event.toggleClass('is-hidden');
    $('#search-form').toggleClass('is-hidden');
  }
</script>