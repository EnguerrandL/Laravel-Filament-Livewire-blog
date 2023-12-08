
<div  class="flex space-x-2">
    <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
        {{ __('menu.login') }}
    </x-nav-link>
    <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
        {{ __('menu.register') }}
    </x-nav-link>
    </div>
