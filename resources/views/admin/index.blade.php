@extends('layouts.app')

@section('content')

<div id="mySidenav" class="sidenav">
    <a href="#" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
</div>
    
    <!-- Use any element to open the sidenav -->
    <div id="main">
        <span style="font-size:24px;cursor:pointer" onclick="openNav()">&#9776;</span>
    </div>

@endsection
<script>

    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.addEventListener('click', closeNavOutside); // Dodatni event listener
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        document.body.removeEventListener('click', closeNavOutside); // Ukloni event listener
    }

    function closeNavOutside(event) {
        if (!event.target.closest('#mySidenav') && !event.target.closest('#main')) { // Proveri da li je kliknut element van side navigacije i glavnog sadržaja
            closeNav();
        }
    }
</script>
