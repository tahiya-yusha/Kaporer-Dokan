
    <link rel="stylesheet" href="{{ asset('assets/css/h_style.css') }}">


    <header>
    <a href="" class="logo">Logo</a>
    <div class="group">
        <ul class="navigation">
            <li><a href="">Home</a></li>
            <li><a href="">Shop</a></li>
            <li><a href="{{route('tshirt.upload')}}">Custom Order</a></li>
            @auth
                <li><a href="{{route('logout')}}">Logout</a></li>
            @else
                <li><a href="{{route('register')}}">Login/Register</a></li>
            @endauth
            <li><a href="">Contact</a></li>
            
        </ul>
        <span>
        @auth
            {{ auth()->user()->name }}
        @endauth
        </span>
        <div class="search">
            <span class="icon">
            <ion-icon name="search-outline" class ="searchBtn"></ion-icon>
            <ion-icon name="close-outline" class ="closeBtn"></ion-icon>
            </span>
        </div>
        <ion-icon name="menu-outline" class="menuToggle"></ion-icon>
    </div>
    <div class="searchBox">
        <input type="text" placeholder = "Search here...">
    </div>
    </header>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
    let searchBtn = document.querySelector('.searchBtn');
    let closeBtn = document.querySelector('.closeBtn');
    let searchBox = document.querySelector('.searchBox');
    let navigation = document.querySelector('.navigation');
    let menuToggle = document.querySelector('.menuToggle');
    let header = document.querySelector('header');

    searchBtn.addEventListener('click', function() {
        searchBox.classList.add('active');
        closeBtn.classList.add('active');
        searchBtn.classList.add('active');
        menuToggle.classList.add('hide');
        header.classList.remove('open');
    });

    closeBtn.addEventListener('click', function() {
        searchBox.classList.remove('active');
        closeBtn.classList.remove('active');
        searchBtn.classList.remove('active');
        menuToggle.classList.remove('hide');
    });

    menuToggle.addEventListener('click', function() {
        header.classList.toggle('open');
        searchBox.classList.remove('active');
        closeBtn.classList.remove('active');
        searchBtn.classList.remove('active');
    });
    </script>




