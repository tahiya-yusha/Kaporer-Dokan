<link rel="stylesheet" href="{{ asset('assets/css/h_style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<header>
  <a href="{{ url('/')}}" class="logo">Kaporer Dokan</a>
  <div class="group">
    <ul class="navigation">
      <li><a href="{{ url('/')}}">Home</a></li>
      <li class="dropdown">
        <a href="#">Shop</a>
        <ul class="dropdown-menu">
          <li><a href="{{ url('/collections') }}">Category</a></li>
          <li><a href="{{ url('/new-arrivals') }}">New Arrivals</a></li>
          <li><a href="{{ url('') }}">Featured Products</a></li>
        </ul>
      </li>
      <li><a href="{{route('tshirt.upload')}}">Custom Order</a></li>
      <li class="dropdown">
        <a href="#">
          @auth
          <span class="user-dropdown">{{ auth()->user()->name }}</span>
          @else
          <span>Login/Register</span>
          @endauth
        </a>
        <ul class="dropdown-menu user-dropdown-menu">
          <li><a href="{{url('orders') }}">Orders</a></li>
          @auth
          <li><a href="{{ route('logout') }}">Logout</a></li>
          @else
          <li><a href="{{ route('register') }}">Login/Register</a></li>
          @endauth
        </ul>
      </li>
      <li>
        <a href="{{ url('wishlist') }}">
          <i class="fa fa-heart"></i>(<livewire:frontend.wishlist-count/>)
        </a>
      </li>
      <li>
        <a href="{{ url('cart') }}" >
          <i class="fa fa-shopping-cart"></i> (<livewire:frontend.cart.cart-count />)
        </a>
      </li>
    </ul>
    
  <div class="box">
  <div class="container-2">
      <input type="search" id="search" placeholder="Search..." />
      <span class="icon"><i class="fa fa-search"></i></span>
  </div>
</div>
</header>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
  document.getElementById('search').addEventListener('click', function() {
  const searchInput = document.getElementById('search-input');
  searchInput.classList.toggle('active');
});

</script>


