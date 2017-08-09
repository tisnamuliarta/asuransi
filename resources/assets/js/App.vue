<template>
	<div id="app">
		<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
              <span class="sr-only">Toggle Navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>

            <!-- Branding Image -->
           <div class="navbar-brand">
           	 <router-link to="/">Brand Name</router-link>
           </div>
        	</div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <ul class="nav navbar-nav navbar-right">
            	<li>
            		<router-link to="/downline">Downline</router-link>
            	</li>
              <li>
                <a href="/logout"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="IIHotvKhKyKgbpT8aU1aS2977baBlfryiY9PMuxG">
                </form>
              </li>
            </ul>
        </div>
      </div>
    </nav>

    <router-view></router-view>
	</div>
</template>