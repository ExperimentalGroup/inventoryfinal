<html>
  <head>
    <title>Inventory system</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- STYLES START -->
    {{ HTML::style('css/materialize.min.css') }}
    {{ HTML::style('css/style.css') }}
    {{-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css"> --}}
    {{-- <link type="text/css" rel="stylesheet" href="css/style.css"> --}}
    <!-- STYLES END -->
  </head>
  <body>
    <header>
      <!-- NAVBAR GOES HERE -->
      <div class="navbar-fixed">
        <nav class="blue darken-1">
          <div class="nav-wrapper">
            <span class="app-name">Inventory System</span>
            <ul id="slide-out" class="side-nav fixed">
              <!-- might be horrible to put div inside ul but it works -->
              <div class="logo">
                {{ HTML::image('img/logo_1.jpg', 'logo', array('class' => 'responsive-img circle')) }}

                {{-- <img class="responsive-img circle" src="img/logo_1.jpg"/> --}}
              </div>
              <div class="account-pane center-align">
                <!-- use amber for admin, blue for employee, ?? for manager -->
                Logged in as: <span class="bold amber-text text-accent-4">Han Seoul-Oh(Admin)</span>
                <br/>
                Branch: <span class="bold">Main</span>
              </div>
              <li class="bold {{ strpos(Request::url(), 'index') !== false ? 'active' : '' }}"><a href="/index">Dashboard</a></li>
              <li class="bold {{ strpos(Request::url(), 'inventory') !== false ? 'active' : '' }}"><a href="/inventory">Inventory</a></li>
              <li class="bold {{ strpos(Request::url(), 'order') !== false ? 'active' : '' }}"><a href="/order">Order</a></li>
              <!-- <li class="bold"><a href="/request">Requests</a></li> -->
              <li class="bold {{ strpos(Request::url(), 'delivery') !== false ? 'active' : '' }}"><a href="/delivery">Delivery</a></li>
              <li class="bold {{ strpos(Request::url(), 'release') !== false ? 'active' : '' }}"><a href="/release">Release</a></li>
              <li class="bold {{ strpos(Request::url(), 'branches') !== false ? 'active' : '' }}"><a href="/branches">Branches</a></li>
              <li class="bold {{ strpos(Request::url(), 'employees') !== false ? 'active' : '' }}"><a href="/employees">Employees</a></li>
              <li class="bold {{ strpos(Request::url(), 'suppliers') !== false ? 'active' : '' }}"><a href="/suppliers">Suppliers</a></li>
              <li class="bold"><a href="/logout">Log out</a></li>
            </ul>
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
          </div>
        </nav>
      </div>
    </header>

    <main>
      @yield('content')
    </main>

    <!-- SCRIPTS START -->
    {{ HTML::script('js/jquery-2.1.4.min.js') }}
    {{ HTML::script('js/materialize.min.js') }}
    {{ HTML::script('js/app.js') }}
    {{-- <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="js/materialize.min.js" type="text/javascript"></script>
    <script src="js/app.js" type="text/javascript"></script> --}}
    <!-- SCRIPTS END -->
  </body>
</html>
