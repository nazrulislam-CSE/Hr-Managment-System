<style type="text/css">
  .user-panel .info {
    display: inline-block;
    padding: 5px 5px 5px 51px;
  }
  [class*=sidebar-dark-] .sidebar a {
    color: white;
  }

  [class*=sidebar-dark] .user-panel {
    border-bottom: 1px solid #fff;
  }
  [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link {
    color: #fff;
  }
  [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
    background-color: #7c10f2ba;
    color: #f4f6f9;
    border-radius: 10px;
}
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar_common">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><span>Hellow! {{ Auth::user()->name }}</span></a></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item menu-open ">
              <a href="{{ route('admin.dashboard') }}" class="nav-link {{(request()->route()->getName()=='admin.dashboard')?'active':''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</i>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link
              {{(request()->route()->getName()=='client.index')?'active':''}}
              {{(request()->route()->getName()=='client.create')?'active':''}}
              {{(request()->route()->getName()=='client.edit')?'active':''}}

              {{(request()->route()->getName()=='department.index')?'active':''}}
              {{(request()->route()->getName()=='department.create')?'active':''}}
              {{(request()->route()->getName()=='department.edit')?'active':''}}

              {{(request()->route()->getName()=='notice.index')?'active':''}}
              {{(request()->route()->getName()=='notice.create')?'active':''}}
              {{(request()->route()->getName()=='notice.edit')?'active':''}}

              {{(request()->route()->getName()=='leave.index')?'active':''}}
              {{(request()->route()->getName()=='leave.create')?'active':''}}
              {{(request()->route()->getName()=='leave.edit')?'active':''}}

              {{(request()->route()->getName()=='employe.index')?'active':''}}
              {{(request()->route()->getName()=='employe.create')?'active':''}}
              {{(request()->route()->getName()=='employe.edit')?'active':''}}

              {{(request()->route()->getName()=='role.index')?'active':''}}
              {{(request()->route()->getName()=='role.create')?'active':''}}
              {{(request()->route()->getName()=='role.edit')?'active':''}}
              ">
                  <i class="nav-icon fa fa-user"></i>
                  <p>Hr Management
                    <i class="right fas fa-angle-right"></i>

                  </p>
              </a>
              <ul class="nav nav-treeview" style="background-color: #4975d6; border-radius:10px;">
                @if(Auth::user()->role == '1' || in_array('1', json_decode(Auth::user()->employe->role->permissions)))
                <li class="nav-item">
                    <a href="{{ route('client.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Clients <span class="badge badge-danger right">{{ DB::table('clients')->count() }}</span></p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->role == '1' || in_array('1', json_decode(Auth::user()->employe->role->permissions)))
                <li class="nav-item">
                    <a href="{{ route('employe.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Employes <span class="badge badge-danger right">{{ DB::table('employes')->count() }}</span></p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->role == '1')
                <li class="nav-item">
                    <a href="{{ route('role.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Roles Premissions <span class="badge badge-danger right">{{ DB::table('roles')->count() }}</span></p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->role == '1' || in_array('9', json_decode(Auth::user()->employe->role->permissions)))
                <li class="nav-item">
                    <a href="{{ route('department.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Deparments <span class="badge badge-danger right">{{ DB::table('departments')->count() }}</span></p>
                    </a>
                </li>
                @endif
               <!--  @if(Auth::user()->role == '1')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Holydeys <span class="badge badge-danger right">10</span></p>
                    </a>
                </li>
                @endif -->
                <li class="nav-item">
                    <a href="{{ route('notice.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Notice <span class="badge badge-danger right">{{ DB::table('notices')->count() }}</span></p>
                    </a>
                </li>
                @if(Auth::user()->role == '1' || in_array('17', json_decode(Auth::user()->employe->role->permissions)))
                <li class="nav-item">
                    <a href="{{ route('leave.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Leave Types <span class="badge badge-danger right">{{ DB::table('leaves')->count() }}</span></p>
                    </a>
                </li>
                @endif
               <!--  @if(Auth::user()->role == '1')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Attendance <span class="badge badge-danger right">10</span></p>
                    </a>
                </li>
                @endif -->
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link
              {{(request()->route()->getName()=='banking.index')?'active':''}}
              {{(request()->route()->getName()=='banking.create')?'active':''}}
              {{(request()->route()->getName()=='banking.edit')?'active':''}}
              {{(request()->route()->getName()=='transfer.index')?'active':''}}
              {{(request()->route()->getName()=='transfer.create')?'active':''}}
              {{(request()->route()->getName()=='transfer.edit')?'active':''}}
              ">
                  <i class="nav-icon fa fa-home"></i>
                  <p>Banking
                    <i class="right fas fa-angle-right"></i>

                  </p>
              </a>
              <ul class="nav nav-treeview" style="background-color: #4975d6; border-radius:10px;">
                <li class="nav-item">
                    <a href="{{ route('banking.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Account <span class="badge badge-danger right">{{ DB::table('bankings')->count() }}</span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transfer.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Transfer <span class="badge badge-danger right">{{ DB::table('transfers')->count() }}</span></p>
                    </a>
                </li>
              </ul>
            </li>
           <!--  <li class="nav-item">
              <a href="{{ route('product.index') }}" class="nav-link
              {{(request()->route()->getName()=='product.index')?'active':''}}
              ">
                  <i class="nav-icon fa fa-home"></i>
                  <p>Product & Services</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('product.create') }}" class="nav-link
              {{(request()->route()->getName()=='product.create')?'active':''}}
              ">
                  <i class="nav-icon fa fa-home"></i>
                  <p>Product Create</p>
              </a>
            </li> -->
            @if(Auth::user()->role == '1')
            <!-- <li class="nav-item">
              <a href="#" class="nav-link
              ">
                  <i class="nav-icon  fa fa-home"></i>
                  <p>Cases
                    <i class="right fas fa-angle-right"></i>

                  </p>
              </a>
              <ul class="nav nav-treeview" style="background-color: #4975d6; border-radius:10px;">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Cases <span class="badge badge-danger right">10</span></p>
                    </a>
                </li>
              </ul>
            </li> -->
            @endif
            @if(Auth::user()->role == '1')
           <!--  <li class="nav-item">
              <a href="#" class="nav-link
              ">
                  <i class="nav-icon fa fa-building"></i>
                  <p>Tasks
                    <i class="right fas fa-angle-right"></i>

                  </p>
              </a>
              <ul class="nav nav-treeview" style="background-color: #4975d6; border-radius:10px;">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tasks <span class="badge badge-danger right">10</span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>My Tasks <span class="badge badge-danger right">10</span></p>
                    </a>
                </li>
              </ul>
            </li> -->
            @endif
            @if(Auth::user()->role == '1')
            <li class="nav-item">
              <a href="#" class="nav-link
              ">
                  <i class="nav-icon fa fa-building"></i>
                  <p>Reports
                  </p>
              </a>
            </li>
            @endif
            @if(Auth::user()->role == '1')
            <li class="nav-item">
              <a href="{{ route('employe.sallary') }}" class="nav-link
              {{(request()->route()->getName()=='employe.sallary')?'active':''}}
              {{(request()->route()->getName()=='employe.sallary.index')?'active':''}}
              ">
                  <i class="nav-icon fa fa-building"></i>
                  <p>Employees Sallary
                  </p>
              </a>
            </li>
            @endif
            @if(Auth::user()->role == '1')
            <li class="nav-item">
              <a href="#" class="nav-link
              ">
                  <i class="nav-icon fab fa-edge-legacy"></i>
                  <p>Expense
                  </p>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
                      @csrf
                <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                this.closest('form').submit();">
                               <i class="nav-icon fas fa-sign-out-alt"></i>
                    {{ __('Logout') }}
                </a>
              </form>
            </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
