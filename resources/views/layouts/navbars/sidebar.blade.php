<div class="sidebar" data-color="orange">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <a href="#" class="simple-text logo-mini">
      {{ __('LF') }}
    </a>
    <a href="#" class="simple-text logo-normal">
      {{ __('Laravel Fire') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <!-- <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li>
        <a data-toggle="collapse" href="#laravelExamples">
            <i class="fab fa-laravel"></i>
          <p>
            {{ __("Laravel Examples") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExamples">
          <ul class="nav">
            <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('profile.edit') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("User Profile") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'users') active @endif">
              <a href="{{ route('user.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("User Management") }} </p>
              </a>
            </li>
          </ul>
        </div>
      <li class="@if ($activePage == 'icons') active @endif">
        <a href="{{ route('page.index','icons') }}">
          <i class="now-ui-icons education_atom"></i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'maps') active @endif">
        <a href="{{ route('page.index','maps') }}">
          <i class="now-ui-icons location_map-big"></i>
          <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'notifications') active @endif">
        <a href="{{ route('page.index','notifications') }}">
          <i class="now-ui-icons ui-1_bell-53"></i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li> -->
      <li class = " @if ($activePage == 'users') active @endif">
        <a href="{{ route('page.index','users') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Users List') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'cities') active @endif">
        <a href="{{ route('page.index','cities') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Cities List') }}</p>
        </a>
      </li>
      <!-- <li class = " @if ($activePage == 'foods') active @endif">
        <a href="{{ route('page.index','foods') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Foods List') }}</p>
        </a>
      </li> -->
      <li class = " @if ($activePage == 'offices') active @endif">
        <a href="{{ route('page.index','offices') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Offices List') }}</p>
        </a>
      </li>
      <!-- <li class = "@if ($activePage == 'typography') active @endif">
        <a href="{{ route('page.index','typography') }}">
          <i class="now-ui-icons text_caps-small"></i>
          <p>{{ __('Typography') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'upgrade') active @endif active-pro">
        <a href="{{ route('page.index','upgrade') }}" class="color-ev">
          <i class="now-ui-icons arrows-1_cloud-download-93"></i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li> -->
    </ul>
  </div>
</div>