<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text logo-normal">
      {{ __('e-Response') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <hr>
      <!-- <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Laravel Examples') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li> -->
      <li class="nav-item{{ $activePage == 'menu' ? ' active' : '' }}">
        <a class="nav-link">
          <!-- <i class="material-icons">content_paste</i> -->
            <p>{{ __('Main Menu') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'inquiry' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('inquiry.index') }}">
          <i class="material-icons">help_center</i>
            <p>{{ __('Tickets') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'complaint' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('complaint.index') }}">
          <i class="material-icons">record_voice_over</i>
          <p>{{ __('Complaints') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'suggestion' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('suggestion.index') }}">
          <i class="material-icons">new_label</i>
            <p>{{ __('Suggestions') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'appreciation' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('appreciation.index') }}">
          <i class="material-icons">thumb_up</i>
          <p>{{ __('Appreciations') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">thumb_up</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <hr>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link">
          <!-- <i class="material-icons">settings</i> -->
          <p>{{ __('Settings') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">settings</i>
          <p>{{ __('Users') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">settings</i>
          <p>{{ __('Statuses') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'departments' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('department.index') }}">
          <i class="material-icons">settings</i>
          <p>{{ __('Department') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
