<header class="header-mobile header-mobile-2 d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="{{url('template/').'/'}}images/azert.png" width="60"alt="CoolAdmin" />
                </a>
                <strong class="text-white">DREAM-DIGITAL</strong> 
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="{{url('/Dashbord')}}">
                        <i class="fas fa-home"></i>
                        <span class="bot-line"></span>Home </a>
                </li>
                <li class="has-sub">
                    <a href="{{url('/Liste_Client')}}">
                        <i class="fas fa-users"></i>
                        <span class="bot-line"></span>Client</a>
                </li> 
                <li class="active">
                    <a href="{{url('/Liste_Decoder')}}">
                        <i class="fas fa-desktop"></i>
                        <span class="bot-line"></span>Décodeur</a>
                </li>
                <li class="has-sub">
                    <a href="{{url('/Liste_Abonnement')}}">
                        <i class="fas fa-download"></i>
                        <span class="bot-line"></span>Abonnement</a></a>
                </li>
            </ul>
        </div>
    </nav>
</header>