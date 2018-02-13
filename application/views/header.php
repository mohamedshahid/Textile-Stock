<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="<?= base_url('assests/css/bootstrap.min.css');?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assests/css/dataTables.bootstrap.min.css');?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assests/css/jquery-ui.min.css');?>">
  <script src="<?= base_url('assests/js/jquery.min.js');?>"></script>
  <script src="<?= base_url('assests/js/bootstrap.min.js');?>"></script>
  <script src="<?= base_url('assests/js/jquery-ui.min.js');?>"></script>
  <script src="<?= base_url('assests/js/jquery.dataTables.min.js');?>"></script>
  <script src="<?= base_url('assests/js/dataTables.bootstrap.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assests/js/script.js')?>"></script>
</head>
<body>
<div class="container"><nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">Heena Textile</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <!-- New User -->
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">New User</a>
          <ul class="dropdown-menu" role="menu">
            <li><a  role="button" id="addSeller"> Add Seller</a></li>
            <li class="divider"></li>
            <li><a role="button" id="addBuyer">Add Buyer</a></li>
          </ul>
        </li>
      </ul>
      <!-- Entry -->
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Entry</a>
          <ul class="dropdown-menu" role="menu">
            <li><a  role="button" id="purchase">Purchase</a></li>
            <li class="divider"></li>
            <li><a role="button" id="sell">Sell</a></li>
          </ul>
        </li>
      </ul>
      <!-- Show -->
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Show</a>
          <ul class="dropdown-menu" role="menu">
            <li><a  role="button" href="<?= base_url('home/purchaseBill')?>">Purchase Bill</a></li>
            <li class="divider"></li>
            <li><a role="button" href="<?= base_url('home/sellBill')?>">Sell Bill</a></li>
            <li class="divider"></li>
            <li><a role="button" href="<?= base_url('home/stock')?>">Stock</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>
</body>
</html>