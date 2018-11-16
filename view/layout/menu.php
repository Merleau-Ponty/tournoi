<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!-- HEADER -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <!-- MENU -->
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Messages</a>
                </li>
                <li class="nav-item dropdown ml-md-auto">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">Dropdown link</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider">
                        </div> <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <?php
            if(isset($_SESSION['info'])){
                echo $_SESSION['info'];
                unset($_SESSION['info']);
            }
            ?>

