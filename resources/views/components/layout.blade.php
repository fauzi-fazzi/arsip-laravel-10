<!DOCTYPE html>
<html lang="en">

<x-header>{{ $title }}</x-header>

<body class="nav-fixed">
    <x-Navbar></x-Navbar>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <x-Sidebar></x-Sidebar>
        </div>
        <div id="layoutSidenav_content">

            {{ $slot }}

        </div>
    </div>
    {{-- ini tempat scrpit --}}
    <x-Footer></x-Footer>


</body>

</html>
