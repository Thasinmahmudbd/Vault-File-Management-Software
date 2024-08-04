<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your description.">
    <meta name="keywords" content="tag, tag, tag">
    <meta name="author" content="Your Name">
    <!-- Title -->
    <title>Vault</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="#">
    <link rel="icon" type="image/png" sizes="32x32" href="#">
    <link rel="icon" type="image/png" sizes="16x16" href="#">
    <link rel="manifest" href="#">
    <!-- CDN Development -->
    <link rel="stylesheet" href="https://raw.githack.com/Thasinmahmudbd/TcSS-Framework/Thasin/dist/css/tcss.min.css">
    <!-- CDN Backup -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Thasinmahmudbd/TcSS-Framework/dist/css/tcss.min.css">
    <!-- CDN Production (current version)-->
    <link rel="stylesheet" href="https://rawcdn.githack.com/Thasinmahmudbd/TcSS-Framework/8272c261b90f1bd691ade6402fa9f73ada36fa12/dist/css/tcss.min.css">
    <!-- Custom Style-->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/tcss.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    <!-- Script -->
    <script defer src="{{ asset('js/script.js')}}"></script>
    <script defer src="{{ asset('js/blockBackButton.js')}}"></script>
</head>

<body class="bgGold nunito blockSelect">

    <div class="container" id="base">
        <img src="{{ asset('Vault/Vault_png.png')}}" alt="" class="rotate">
        <div class="btncontainer">
            <a class="indexbtns" href="#" onclick="modal1_Open()"><abbr title="Log in vault"><i class="fas fa-power-off"></i></abbr></a>
            <a class="indexbtns" href="#" onclick="modal2_Open()"><abbr title="Click for help"><i class="fas fa-question"></i></abbr></a>
            <a class="indexbtns" href="https://thasinmahmud.com/open/contact/page" target="_blank"><abbr title="Contact Developer"><i class="far fa-lightbulb"></i></abbr></a>
        </div>
    </div>

    <!---MODALS-->

    <div class="modals_container">

        <!---LOGIN MODAL-->

        <div class="bgwhite modals modalOne disNone" id="modal_1">
            <div class="title bgGold">
                <p class="nunitoBold">Enter Vault</p>
                <a href="#" class="titleBtn" onclick="modals_Close()">&times;</a>
            </div>
            <p>Enter your handel & pass code to access your vault. 3 attempts remaining.</p>
            <form action="{{ url('checkCode') }}" method="post">
            @csrf
                    <div class="frmElm_14">

                        <label  for=""> Handel: </label>
                        <input  type="text" class="blockSelect" placeholder="Enter a valid email" name="handel" value="{{old('handel')}}">

                    </div>
                    @error('handel') {{$message}} @enderror

                    <div class="gap"></div>

                    <div class="frmElm_14">

                        <label  for=""> Pass Code: </label>
                        <input  type="password" class="blockSelect" placeholder="Enter your pass code" name="code">

                    </div>
                    @error('code') {{$message}} @enderror

                    <div class="gap"></div>

                    <input class="successBtn w_100Per p_5px" value="Login" type="submit">
            </form>

            <div class="button_tab bgGold modalFooter">
                <p class="nunitoBold">You can also visit</p>
                <a class="link clrBlack" href="#" onclick="modal2_Open()"><abbr title="Click for help">Help</abbr></a>
                <a class="link clrBlack" href="https://thasinmahmud.com/open/contact/page" target="_blank"><abbr title="Contact Developer">#Dev</abbr></a>
            </div>

        </div>

        <!---INFO MODAL-->

        <div class="bgwhite modals modalOne disNone" id="modal_2">
            <div class="title bgGold">
                <p class="nunitoBold">Enter Vault</p>
                <a href="#" class="titleBtn" onclick="modals_Close()">&times;</a>
            </div>

            <ul>
                <li class="listIn listDecFrom_0">Lorem, ipsum dolor sit amet</li>
                <div class="gap"></div>
                <li class="listIn listDecFrom_0">Lorem, ipsum dolor sit amet</li>
                <div class="gap"></div>
                <li class="listIn listDecFrom_0">Lorem, ipsum dolor sit amet</li>
                <li class="link curPointer">Apply for an account.</li>
            </ul>

            <div class="button_tab bgGold modalFooter">
                <p class="nunitoBold">You can also visit</p>
                <a class="link clrBlack" href="#" onclick="modal1_Open()"><abbr title="Log in vault">Vault</abbr></a>
                <a class="link clrBlack" href="https://thasinmahmud.com/open/contact/page" target="_blank"><abbr title="Contact Developer">#Dev</abbr></a>
            </div>

        </div>

    </div>

</body>
</html>
