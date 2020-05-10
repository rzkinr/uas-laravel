<section class="sidebar">
  <!-- Sidebar user panel -->
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">BERANDA</li>
    <li><a href="{{ url('/') }}"><i class="fa fa-fw fa-home"></i> Home</span></a></li>

    <li class="header">MASTER DATA</li>
    <li class="treeview {{ ( Request::segment(1) == 'merk' ) ? 'active' : '' }}">
      <a href="#">
        <span class="glyphicon glyphicon-list-alt"></span> <span>Merk</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">

        <li class="{{ (Request::path() == 'merk') ? 'active' : '' }}"><a href="{{ url('merk') }}"><i class="fa fa-circle-o"></i> List Merk</a></li>

        <li class="{{ (Request::path() == 'merk/add') ? 'active' : '' }}"><a href="{{ url('merk/add') }}"><i class="fa fa-circle-o"></i> Tambah Merk</a></li>

      </ul>
    </li>
    <li class="treeview {{ ( Request::segment(1) == 'supplier' ) ? 'active' : '' }}">
      <a href="#">
        <span class="glyphicon glyphicon-user"></span> <span>Supplier</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">

        <li class="{{ (Request::path() == 'supplier') ? 'active' : '' }}"><a href="{{ url('supplier') }}"><i class="fa fa-circle-o"></i> List Supplier</a></li>

        <li class="{{ (Request::path() == 'supplier/add') ? 'active' : '' }}"><a href="{{ url('supplier/add') }}"><i class="fa fa-circle-o"></i> Tambah Supplier</a></li>

      </ul>
    </li>
    <li class="treeview {{ ( Request::segment(1) == 'kategori' ) ? 'active' : '' }}">
      <a href="#">
        <span class="glyphicon glyphicon-tags"></span> <span>Kategori</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">

        <li class="{{ (Request::path() == 'kategori') ? 'active' : '' }}"><a href="{{ url('kategori') }}"><i class="fa fa-circle-o"></i> List Kategori</a></li>

        <li class="{{ (Request::path() == 'kategori/add') ? 'active' : '' }}"><a href="{{ url('kategori/add') }}"><i class="fa fa-circle-o"></i> Tambah Kategori</a></li>

      </ul>
    </li>

    <li class="treeview {{ ( Request::segment(1) == 'item' ) ? 'active' : '' }}">
      <a href="#">
        <span class="glyphicon glyphicon-check"></span> <span>Item</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">

        <li class="{{ (Request::path() == 'item') ? 'active' : '' }}"><a href="{{ url('item') }}"><i class="fa fa-circle-o"></i> List Item</a></li>

        <li class="{{ (Request::path() == 'item/add') ? 'active' : '' }}"><a href="{{ url('item/add') }}"><i class="fa fa-circle-o"></i> Tambah Item</a></li>

      </ul>
    </li>

    <li class="header">OTHER</li>

    <li><a href="{{ url('/keluar') }}"><i class="fa fa-fw fa-home"></i> Logout</span></a></li>


  </ul>
</section>