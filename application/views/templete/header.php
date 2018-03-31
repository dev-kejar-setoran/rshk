<div class="ui fixed blue inverted menu">
    <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/pjnhk-new-mockup/pages/dashboard.php'; ?>" class="header item" STYLE="letter-spacing: 3px">
        <!-- <img class="logo" src="{{ asset('img/icon.png')}}">&nbsp;&nbsp; -->
        PJNHK
    </a>
    <div class="menu">
      <!-- @include('partials.backend.menu', ['items' => $mainMenu->roots()]) -->
        <a href="#" class="item" onclick="toggleSidebar()">
            <i class="sidebar icon"></i>
        </a>
    </div>

    <div class="right menu">
        <div class="ui pointing dropdown item" tabindex="0">
            <div class="floating ui red small label">22</div>
            <i class="ui bell icon" style="margin-right: 0"></i>
            <div class="menu transition hidden" tabindex="-1">
                <a class="item" href="#">Item Notif 1</a>
                <a class="item" href="#">Item Notif 2</a>
                <a class="item" href="#">Item Notif 3</a>
            </div>
        </div>

        <div class="ui pointing dropdown item" tabindex="0">
            <img class="ui avatar image" src="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/rsharapankita/assets/img/avatar04.png'; ?>"> <span><?php  echo $this->session->userdata('username'); ?></span> <i class="dropdown icon"></i>
            <div class="menu transition hidden" tabindex="-1">
                <a class="item" href="#"><i class="user icon"></i> Profil</a>
                <a class="item" href="<?php echo base_url('Auth/get_logout'); ?>"><i class="sign out icon"></i> Logout</a>
            </div>
        </div>
    </div>
</div>

<form id="logout-form" action="{{ url('/logout') }}" method="POST">
    <!-- {{ csrf_field() }} -->
</form>