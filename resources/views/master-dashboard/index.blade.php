@extends('layouts.app')
@section('title', __('Dashboard'))

@section('content')
<div class="container">
  <div class="row flex-nowrap">
    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light">
      <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <span class="fs-5 d-none d-sm-inline text-primary-emphasis">Menu</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start " id="menu">
          <li class="nav-item ">
            <a href="{{ route('dashboard.index') }}" class="nav-link align-middle px-0 text-black">
              <i class="fa fa-users"></i> <span class="ms-1 d-none d-sm-inline ">Users</span>
            </a>
          </li>
          <li>
            <a href="{{ route('role.index') }}" class="nav-link px-0 align-middle text-black">
              <i class="fa-solid fa-user-gear"></i> <span class="ms-1 d-none d-sm-inline">Roles</span></a>
          </li>
          <li>
            <a href="{{ route('category.index') }}" class="nav-link px-0 align-middle text-black">
              <i class="fa-solid fa-layer-group"></i> <span class="ms-1 d-none d-sm-inline">Categories</span> </a>
          </li>
        </ul>

      </div>
    </div>
    <div class="col py-3 ">
      @yield('content-admin')

    </div>
  </div>


</div>
@endsection