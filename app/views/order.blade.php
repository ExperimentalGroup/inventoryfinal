<html>
  <head>
    <title>Inventory system</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- STYLES START -->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
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
                <img class="responsive-img circle" src="img/logo_1.jpg"/>
              </div>
              <div class="account-pane center-align">
                <!-- use amber for admin, blue for employee, ?? for manager -->
                Logged in as: <span class="bold amber-text text-accent-4">Han Seoul-Oh(Admin)</span>
                <br/>
                Branch: <span class="bold">Main</span>
              </div>
              <li class="bold"><a href="/index">Dashboard</a></li>
              <li class="bold"><a href="/inventory">Inventory</a></li>
              <li class="bold active"><a href="/order">Order</a></li>
              <!-- <li class="bold"><a href="/request">Requests</a></li> -->
              <li class="bold"><a href="/delivery">Delivery</a></li>
              <li class="bold"><a href="/release">Release</a></li>
              <li class="bold"><a href="/branches">Branches</a></li>
              <li class="bold"><a href="/employees">Employees</a></li>
              <li class="bold"><a href="/suppliers">Suppliers</a></li>
              <li class="bold"><a href="/logout">Log out</a></li>
            </ul>
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
          </div>
        </nav>
      </div>
    </header>

    <main>
      <div class="main-wrapper">
        <!-- ACTUAL PAGE CONTENT GOES HERE -->
        <div class="row">
          <div class="col s12 m12 l12">
            <span class="page-title">Order</span>
          </div>

          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <span class="card-title">Items Ordered from Suppliers</span>
                <div class="divider"></div>
                <div class="card-content">
                  <div class="col s12 m12 l4">
                    <div class="input-field">
                      <i class="prefix mdi-action-search"></i>
                      <input id="search" type="text" placeholder="Search by name"/>
                    </div>
                  </div>

                  <div class="col s12 m12 l12 overflow-x">
                    <table class="centered">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Supplier</th>
                          <th>Date Ordered</th>
                          <th>Placed by</th>
                          <th>Status</th>
                        </tr>
                      </thead>

                       <tbody>
                        @foreach($jt as $joined)
                        <tr>
                          <td>{{ $joined -> strOrdersID }}</td>
                          <td>{{ $joined -> strSuppCompanyName }}</td>
                          <td>{{ $joined -> dtOrdDate }}</td>
                          <td>{{ $joined -> strEmpLName.', '. $joined -> strEmpFName}}</td> 
                          @if($joined -> strOrdNotesStat == 'Pending')
                          <td class="orange-text bold">PENDING</td>
                          @elseif($joined -> strOrdNotesStat == 'Declined')
                          <td class="red-text bold">DECLINED</td>
                          @elseif($joined -> strOrdNotesStat == 'Accepted')
                          <td class="green-text bold">ACCEPTED</td>
                          @endif                         
                          <td>
                            <!-- <div class="center-btn">
                              <a class="waves-effect waves-light btn btn-small center-text" href="/details">View Details</a>
                            </div> -->
                            {{ HTML::link('/details/'.$joined -> strOrdersID, 'View Details') }}
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <!-- <p>
                    You have no items.
                  </p> -->

                  <div class="clearfix">

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col s12 m12 l6">
              <div class="card-panel">
                <span class="card-title">Temp Order Form</span>
                <div class="divider"></div>
                <div class="card-content">
                  <div class="col s12 m12 l10">
                      <div class="form-group">
                      <form action="/order" method="POST">
                      <label for="price">Order ID</label>
                      <input type="text" class="form-control" name="ordID" id="ordID" placeholder="OrdID">
                      </div>
                      <label for="price">Supplier</label>
                      <div class="form-group">
                      <input type="text" class="form-control" name="suppName" id="suppName" placeholder="SuppName">
                      </div>
                      <label for="price">Date Ordered</label>
                      <div class="form-group">
                      <input type="text" class="form-control" name="ordDate" id="ordDate" placeholder="ordDate">
                      </div>
                      <div class="form-group">
                      <label for="price">Placed By</label>
                      <input type="text" class="form-control" name="ordEmp" id="ordEmp" placeholder="ordEmp">
                      </div>
                      <button class="waves-effect waves-light btn btn-small center-text">ADD(WAG ICLICK DI PA TAPOS)</button>
                    </form>
                    </div>
                  </div>
           
           

                  <div class="clearfix">

                  </div>
                </div>
              </div>
            </div>
          

          </div>

        </div>
      </div>
    </main>

    <!-- SCRIPTS START -->
    <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="js/materialize.min.js" type="text/javascript"></script>
    <script src="js/app.js" type="text/javascript"></script>
    <!-- SCRIPTS END -->
  </body>
</html>
