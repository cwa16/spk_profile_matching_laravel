<div class="nav">
    <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
        <div class="d-flex justify-content-start align-items-center">
            <button id="toggle-navbar" onclick="toggleNavbar()">
                <img src="./assets/img/global/burger.svg" class="mb-2" alt="">
            </button>
            <h2 class="nav-title"></h2>
        </div>
        <button class="btn-notif d-block d-md-none"><img src="./assets/img/global/bell.svg" alt=""></button>
    </div>

    <div class="d-flex justify-content-between align-items-right">
           <form action="{{ route('logout') }}" method="post" class="text-right">
            @csrf
            <button class="btn btn-danger btn-sm" style="background: transparent; border: none; color: black;">{{ Auth::user()->name }}, Keluar</button>
           </form>
        </div>
</div>
