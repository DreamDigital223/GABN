<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="hidden" name="search" placeholder="Search for datas &amp; reports..." />
                   
                </form>
                <div > <strong class="text-black">  {{ Auth::user()->name }}   </strong> <a href="{{url('/profile')}}" class="h3"><i class="fas fa-user"></i></a>   </div>
                
            </div>
        </div>
    </div>
</header>