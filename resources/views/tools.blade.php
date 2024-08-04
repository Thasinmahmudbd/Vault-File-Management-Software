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
    <link rel="stylesheet" href="{{ asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{ asset('css/tools.css')}}">

    <!-- Script -->
    <script defer src="{{ asset('js/contextMenu.js')}}"></script>
    <script defer src="{{ asset('js/tools.js')}}"></script>

    <!--Jquery (AJAX)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="nunito">

    <!--NAV BAR-->

    <div class="navType_2 bgGold">

        <!-- Text Logo. -->
        <p class="txtLogo">VAULT</p>

        <!-- Search Form. -->
        <span></span>

        <!-- Links. -->
        <div class="mainLinks_2">

            <div class="mainLink_2">
                <a href="#"><i class="fas fa-eye"></i>
                    <div class="subLinks_2">
                        <a class="subLink_2" href="#" onclick="grid_view()"><abbr title="View as grid"><i class="fas fa-th-large"></i></abbr></a>
                        <a class="subLink_2" href="#" onclick="list_view()"><abbr title="View as List"><i class="fas fa-list"></i></abbr></a>
                        <a class="subLink_2" href="#" onclick="themeChange()"><abbr title="Light or dark mode"><i class="fas fa-adjust"></i></abbr></a>
                    </div>
                </a>
            </div>

            <div class="mainLink_2">
                <a href="#" class="nunitoBold">Operations
                    <div class="subLinks_2 fSize_12px">
                        <!--<a class="subLink_2" href="#">sub 1
                            <div class="exSubLinks_2">
                                <a class="exSubLink_2" href="#">extra sub 1</a>
                                <a class="exSubLink_2" href="#">extra sub 2</a>
                            </div>
                        </a>-->
                        <a class="subLink_2" href="{{ url('/dashboard') }}">Dashboard</a>
                        <a class="subLink_2" href="#">Refresh</a>
                        <a class="subLink_2" target="blank" href="https://thasinmahmud.com/open/contact/page">Meet Dev</a>
                    </div>
                </a>
            </div>

            <div class="mainLink_2">
                <a href="{{ url('/logout') }}" class="nunitoBold">Logout</a>
            </div>

        </div>

        <div class="mainLinks">
                <a class="hamburger" href="#" id="ham" onclick="MobNavOpen()"><i class="fas fa-bars"></i></a>
                <a class="hamburger disNone" href="#" id="cross" onclick="MobNavClose()"><i class="fas fa-times"></i></a>
        </div>

    </div>

    <!--CONTENT BODY-->

    <div class="rightClick LightMode themeMode">

        <div id="view_type" class="m_20px pt_60px folderContainer">

            <div class="folderPack">
                <a href="#" class="folder" onclick="CodeChangerOpen()">
                    <i class="fas fa-fingerprint"></i>
                    <span class="folderName">Change<br>Code</span>
                </a>
            </div>

            <!--<div class="folderPack">
                <a href="#" class="folder">
                    <i class="fas fa-random"></i>
                    <span class="folderName">Vault<br>Transfer</span>
                </a>
            </div>

            <div class="folderPack">
                <a href="#" class="folder">
                    <i class="fas fa-shapes"></i>
                    <span class="folderName">Include<br>Apps</span>
                </a>
            </div>-->

            <div class="folderPack">
                <a href="#" class="folder" onclick="IntensiveSearchOpen()">
                    <i class="fab fa-searchengin"></i>
                    <span class="folderName">Intensive<br>Search</span>
                </a>
            </div>

            <div class="folderPack">
                <a href="#" class="folder" onclick="RecycleBinOpen()">
                    <i class="fas fa-recycle"></i>
                    <span class="folderName">Recycle<br>Bin</span>
                </a>
            </div>

            <div class="folderPack">
                <a href="#" class="folder" onclick="AccReqOpen()">
                    <i class="far fa-list-alt"></i>
                    <span class="folderName">Account<br>Requests</span>
                </a>
            </div>

            <div class="folderPack">
                <a href="#" class="folder" onclick="ManPermissionOpen()">
                    <i class="far fa-check-square"></i>
                    <span class="folderName">Manage<br>Permissions</span>
                </a>
            </div>

            <div class="folderPack">
                <a href="#" class="folder" onclick="UpLimOpen()">
                    <i class="fas fa-thermometer-quarter"></i>
                    <span class="folderName">Upload<br>Limit</span>
                </a>
            </div>

            <p class="NoteMsg"><span class="Note">Note:</span> {{Session::get('NOTE')}}</p>

        </div>

        <!---CONTEXT MENU MODAL-->

        <div class="modals_container" id="popupR">

            <div class="bgwhite modals modalRight">

                <i class="fas fa-folder"></i>
                <a href="{{ url('/dashboard') }}">Dashboard</a>

                <i class="fas fa-sync-alt"></i>
                <a href="{{ url('/tools') }}">Refresh</a>

                <i class="fas fa-eye"></i>
                <div class="dualBtn">
                    <a href="#" onclick="grid_view()">Grid</a>
                    <a href="#" onclick="list_view()">List</a>
                </div>

                <i class="fas fa-adjust"></i>
                <a href="#" onclick="themeChange()">Change Theme</a>

                <i class="fas fa-cogs"></i>
                <a target="blank" href="https://thasinmahmud.com/open/contact/page">Meet Dev</a>

                <i class="fas fa-window-close"></i>
                <a href="#" onclick="closeMenu()">Close Menu</a>

                <i class="fa-solid fa-right-from-bracket"></i>
                <a href="{{ url('/logout') }}">Logout</a>

            </div>

        </div>

        <!---TOOLS MODAL--->

        <!---Code changer--->

        <div class="contentBox disNone" id="CodeChange">

            <div class="titleBox">
                <h3>Change Pass Code:</h3>
                <a href="#" onclick="CodeChangerClose()"><i class="fas fa-times"></i></a>
            </div>

            <form action="" class="formBoxContainer">

                <div class="frmElm_10 formBox">
                    <label  for=""> Old Code </label>
                    <input  type="password">
                </div>

                <div class="frmElm_10 formBox">
                    <label  for=""> New Code </label>
                    <input  type="password">
                </div>

                <div class="frmElm_10 formBox">
                    <label  for=""> Confirm Code </label>
                    <input  type="password">
                </div>

                <input class="frmBtnR" value="Change Code" type="button">

            </form>
        </div>

        <!---Intensive searcher--->

        <div class="contentBox disNone" id="IntensiveSearch">

            <div class="titleBox">
                <h3>Search Intensively:</h3>
                <a href="#" onclick="IntensiveSearchClose()"><i class="fas fa-times"></i></a>
            </div>

            <!-- Search Form. -->
            <form class="searchBar intensSearch" action="#">
                <input class="searchField" type="text" placeholder="Will show file regardless of folder structure">
                <button class="searchBtn" type="input"><i class="fas fa-search"></i></button>
            </form>

        </div>

        <!---Recycle Bin--->

        <div class="contentBox disNone" id="RecycleBin">

            <div class="titleBox">
                <h3>Recycle Bin:</h3>
                <a href="#" onclick="RecycleBinClose()"><i class="fas fa-times"></i></a>
            </div>

            <!-- Search Form. -->
            <form class="intensSearch frmElm_5" action="#">
                <input class="searchField autoSearch" type="text" placeholder="Type in file name to search" name="package_name" id="package_name">
                <!--<button class="searchBtn" type="input"><i class="fas fa-search"></i></button>-->
            </form>

            <!--Folder Container-->
            <div class="folderContainerList modalRecycle" id="folderCont">

            @foreach($packages as $package)

                @if($package->package_type == 'folder')
                <!--Folder template-->
               <div class="folderPack">
                   <a href="#" class="folder">
                       <i class="fas fa-folder"></i>
                       <span class="folderName">{{$package->package_name}}</span>
                   </a>
                   <div class="option_menu">
                       <i class="fas fa-trash-restore-alt"></i>
                       <a href="{{ url('/restore', $package->package_id) }}">Restore Folder</a>
                       <i class="fas fa-folder-minus"></i>
                       <a href="{{ url('/delete', $package->package_id) }}">Delete Folder</a>
                       <i class="fas fa-window-close"></i>
                       <a href="#" onclick="close_folder_option()">Close Menu</a>
                   </div>
               </div>

               @elseif($package->package_type == 'word')
               <!--Word file template-->
               <div class="folderPack">
                   <a href="#" class="folder">
                       <i class="fas fa-file-word"></i>
                       <span class="folderName">{{$package->package_name}}</span>
                   </a>
                   <div class="option_menu">
                       <i class="fas fa-trash-restore-alt"></i>
                       <a href="{{ url('/restore', $package->package_id) }}">Restore File</a>
                       <i class="fas fa-minus-circle"></i>
                       <a href="{{ url('/delete', $package->package_id) }}">Delete File</a>
                       <i class="fas fa-window-close"></i>
                       <a href="#" onclick="close_folder_option()">Close Menu</a>
                   </div>
               </div>

               @elseif($package->package_type == 'powerpoint')
               <!--Powerpoint file template-->
               <div class="folderPack">
                   <a href="#" class="folder">
                       <i class="fas fa-file-powerpoint"></i>
                       <span class="folderName">{{$package->package_name}}</span>
                   </a>
                   <div class="option_menu">
                       <i class="fas fa-trash-restore-alt"></i>
                       <a href="{{ url('/restore', $package->package_id) }}">Restore File</a>
                       <i class="fas fa-minus-circle"></i>
                       <a href="{{ url('/delete', $package->package_id) }}">Delete File</a>
                       <i class="fas fa-window-close"></i>
                       <a href="#" onclick="close_folder_option()">Close Menu</a>
                   </div>
               </div>

               @elseif($package->package_type == 'pdf')
               <!--PDF file template-->
               <div class="folderPack">
                   <a href="#" class="folder">
                       <i class="fas fa-file-pdf"></i>
                       <span class="folderName">{{$package->package_name}}</span>
                   </a>
                   <div class="option_menu">
                       <i class="fas fa-trash-restore-alt"></i>
                       <a href="{{ url('/restore', $package->package_id) }}">Restore File</a>
                       <i class="fas fa-minus-circle"></i>
                       <a href="#{{ url('/delete', $package->package_id) }}">Delete File</a>
                       <i class="fas fa-window-close"></i>
                       <a href="#" onclick="close_folder_option()">Close Menu</a>
                   </div>
               </div>

               @elseif($package->package_type == 'excel')
               <!--Excel file template-->
               <div class="folderPack">
                   <a href="#" class="folder">
                       <i class="fas fa-file-excel"></i>
                       <span class="folderName">{{$package->package_name}}</span>
                   </a>
                   <div class="option_menu">
                       <i class="fas fa-trash-restore-alt"></i>
                       <a href="{{ url('/restore', $package->package_id) }}">Restore File</a>
                       <i class="fas fa-minus-circle"></i>
                       <a href="{{ url('/delete', $package->package_id) }}">Delete File</a>
                       <i class="fas fa-window-close"></i>
                       <a href="#" onclick="close_folder_option()">Close Menu</a>
                   </div>
               </div>

               @elseif($package->package_type == 'code')
               <!--Code file template-->
               <div class="folderPack">
                   <a href="#" class="folder">
                       <i class="fas fa-code"></i>
                       <span class="folderName">{{$package->package_name}}</span>
                   </a>
                   <div class="option_menu">
                       <i class="fas fa-trash-restore-alt"></i>
                       <a href="{{ url('/restore', $package->package_id) }}">Restore File</a>
                       <i class="fas fa-minus-circle"></i>
                       <a href="{{ url('/delete', $package->package_id) }}">Delete File</a>
                       <i class="fas fa-window-close"></i>
                       <a href="#" onclick="close_folder_option()">Close Menu</a>
                   </div>
               </div>

               @elseif($package->package_type == 'image')
               <!--Image file template-->
               <div class="folderPack">
                   <a href="#" class="folder">
                       <i class="fas fa-image"></i>
                       <span class="folderName">{{$package->package_name}}</span>
                   </a>
                   <div class="option_menu">
                       <i class="fas fa-trash-restore-alt"></i>
                       <a href="{{ url('/restore', $package->package_id) }}">Restore File</a>
                       <i class="fas fa-minus-circle"></i>
                       <a href="{{ url('/delete', $package->package_id) }}">Delete File</a>
                       <i class="fas fa-window-close"></i>
                       <a href="#" onclick="close_folder_option()">Close Menu</a>
                   </div>
               </div>

               @elseif($package->package_type == 'audio')
               <!--Audio file template-->
               <div class="folderPack">
                   <a href="#" class="folder">
                       <i class="fas fa-compact-disc"></i>
                       <span class="folderName">{{$package->package_name}}</span>
                   </a>
                   <div class="option_menu">
                       <i class="fas fa-trash-restore-alt"></i>
                       <a href="{{ url('/restore', $package->package_id) }}">Restore File</a>
                       <i class="fas fa-minus-circle"></i>
                       <a href="{{ url('/delete', $package->package_id) }}">Delete File</a>
                       <i class="fas fa-window-close"></i>
                       <a href="#" onclick="close_folder_option()">Close Menu</a>
                   </div>
               </div>

               @elseif($package->package_type == 'video')
               <!--Video file template-->
               <div class="folderPack">
                   <a href="#" class="folder">
                       <i class="fas fa-film"></i>
                       <span class="folderName">{{$package->package_name}}</span>
                   </a>
                   <div class="option_menu">
                       <i class="fas fa-trash-restore-alt"></i>
                       <a href="{{ url('/restore', $package->package_id) }}">Restore File</a>
                       <i class="fas fa-minus-circle"></i>
                       <a href="{{ url('/delete', $package->package_id) }}">Delete File</a>
                       <i class="fas fa-window-close"></i>
                       <a href="#" onclick="close_folder_option()">Close Menu</a>
                   </div>
               </div>

               @elseif($package->package_type == 'archive')
               <!--Archived/Zip file template-->
               <div class="folderPack">
                   <a href="#" class="folder">
                       <i class="fas fa-archive"></i>
                       <span class="folderName">{{$package->package_name}}</span>
                   </a>
                   <div class="option_menu">
                       <i class="fas fa-trash-restore-alt"></i>
                       <a href="{{ url('/restore', $package->package_id) }}">Restore Archive</a>
                       <i class="fas fa-minus-circle"></i>
                       <a href="{{ url('/delete', $package->package_id) }}">Delete Archive</a>
                       <i class="fas fa-window-close"></i>
                       <a href="#" onclick="close_folder_option()">Close Menu</a>
                   </div>
               </div>

               @else
               <!--Miscellaneous file template-->
               <div class="folderPack">
                   <a href="#" class="folder">
                       <i class="fas fa-question-circle"></i>
                       <span class="folderName">{{$package->package_name}}</span>
                   </a>
                   <div class="option_menu">
                       <i class="fas fa-trash-restore-alt"></i>
                       <a href="{{ url('/restore', $package->package_id) }}">Restore File</a>
                       <i class="fas fa-minus-circle"></i>
                       <a href="{{ url('/delete', $package->package_id) }}">Delete File</a>
                       <i class="fas fa-window-close"></i>
                       <a href="#" onclick="close_folder_option()">Close Menu</a>
                   </div>
               </div>

               @endif

               @endforeach

           </div>

        </div>

        <!---Account Requests--->

        <div class="contentBox disNone" id="AccReq">

            <div class="titleBox">
                <h3>Account Requests:</h3>
                <a href="#" onclick="AccReqClose()"><i class="fas fa-times"></i></a>
            </div>

            <!--Account Container-->
            <div class="folderContainerList modalRecycle">

                <!--Account template-->
               <div class="folderPack reqList">
                   <div class="reqListItem">
                       <span>1</span>
                       <span>Handel Name</span>
                       <a class="link accept" href="#">Accept</a>
                       <a class="link deny" href="#">Deny</a>
                   </div>
               </div>

            </div>

        </div>

        <!---Manage Permissions--->

        <div class="contentBox disNone" id="ManPermission">

            <div class="titleBox">
                <h3>Manage Permissions:</h3>
                <a href="#" onclick="ManPermissionClose()"><i class="fas fa-times"></i></a>
            </div>

            <!--Permissions Container-->
            <div class="folderContainerList modalRecycle">

                <!--Permissions template-->
               <div class="folderPack reqList">
                   <div class="reqListItem2">
                       <span>1</span>
                       <span>Handel Name</span>
                       <div class="dropdown" onclick="toggleDropdown()">

                            <span>Activate Tools</span>

                            <form class="dropdown-content" id="dropdownContent" onclick="stopPropagation(event)">

                                <label><input type="checkbox" name="changeCode" onclick="stopPropagation(event)"> Change Code</label>

                                <label><input type="checkbox" name="intensiveSearch" onclick="stopPropagation(event)"> Intensive Search</label>

                                <label><input type="checkbox" name="recycleBin" onclick="stopPropagation(event)"> Recycle Bin</label>

                                <label><input type="checkbox" name="recycleBin" onclick="stopPropagation(event)"> Account Requests</label>

                                <label><input type="checkbox" name="recycleBin" onclick="stopPropagation(event)"> Manage Permissions</label>

                                <label><input type="checkbox" name="recycleBin" onclick="stopPropagation(event)"> Upload Limit</label>
                            <!-- Add more options as needed -->
                            </form>
                      </div>
                   </div>
               </div>

            </div>

        </div>

        <!---Upload Limit--->

        <div class="contentBox disNone" id="UpLim">

            <div class="titleBox">
                <h3>Upload Limit:</h3>
                <a href="#" onclick="UpLimClose()"><i class="fas fa-times"></i></a>
            </div>

            <!--Upload limiter Container-->
            <div class="folderContainerList upLimContainer">

                <div class="form-container">
                    <form>
                        <label for="volume" class="slider-label">Select Value:</label>
                        <div class="slider-container">
                            <input type="range" id="slider" name="volume" class="slider" min="0" max="10240" step="1" value="50">
                            <div class="slider-value" id="sliderValue">5000</div>
                        </div>
                        <br>
                        <input class="frmBtnR" value="Set Limit" type="button">

                    </form>
                </div>

            </div>

        </div>

        <!--Mobile Nav-->

        <div class="mobnav_container" id="MobNav">

            <div class="bgwhite mobnav modalRight">

                <i class="fas fa-folder"></i>
                <a href="{{ url('/dashboard') }}">Dashboard</a>

                <i class="fas fa-sync-alt"></i>
                <a href="{{ url('/tools') }}">Refresh</a>

                <i class="fas fa-eye"></i>
                <div class="dualBtn">
                    <a href="#" onclick="grid_view()">Grid</a>
                    <a href="#" onclick="list_view()">List</a>
                </div>

                <i class="fas fa-adjust"></i>
                <a href="#" onclick="themeChange()">Change Theme</a>

                <i class="fas fa-cogs"></i>
                <a target="blank" href="https://thasinmahmud.com/open/contact/page">Meet Dev</a>

                <i class="fas fa-window-close"></i>
                <a href="#" onclick="MobNavClose()">Close Menu</a>

                <i class="fa-solid fa-right-from-bracket"></i>
                <a href="{{ url('/logout') }}">Logout</a>

            </div>

        </div>

    </div>




    <!--Auto search using AJAX-->
    <script>

    $(document).ready(function(){
        $("#package_name").on('keyup', function(){
            var value = $(this).val();
            $.ajax({
                url:"{{ route('searchBin') }}",
                type:"GET",
                data:{'package_name':value},
                success:function(data){
                    $("#folderCont").html(data);
                }
            });
        });
    });

    </script>


</body>
</html>
