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
    <link rel="stylesheet" href="{{ asset('css/tools.css')}}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css')}}">

    <!-- Script -->
    <script defer src="{{ asset('js/contextMenu.js')}}"></script>
    <script defer src="{{ asset('js/tools.js')}}"></script>
    <script defer src="{{ asset('js/uploader.js')}}"></script>
</head>

<body class="nunito">

    <!--NAV BAR-->

    <div class="navType_2 bgGold">

        <!-- Text Logo. -->
        <p class="txtLogo">VAULT</p>

        <!-- Search Form. -->
        <form class="searchBar" action="#">
            <input class="searchField" type="text">
            <button class="searchBtn" type="input"><i class="fas fa-search"></i></button>
        </form>

        <!-- Links. -->
        <div class="mainLinks_2">

            <div class="mainLink_2">
                <a href="{{ url('/go/back') }}" class="nunitoBold">Go Back</a>
            </div>

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
                        <a class="subLink_2" href="#" onclick="fileFolderAdderOpen()">Add Folder</a>
                        <a class="subLink_2" href="{{ url('/dashboard') }}">Dashboard</a>
                        <a class="subLink_2" href="#">Refresh</a>
                        <a class="subLink_2" target="blank" href="https://thasinmahmud.com/open/contact/page">Meet Dev</a>
                        <a class="subLink_2" href="url('/tools')">Tools</a>
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

            @foreach($packages as $package)

            @if($package->package_status == 'unlocked')

                @if($package->package_type == 'folder')

                <!--Folder template-->
                <div class="folderPack">
                    <a href="#" class="folder">
                        <i class="fas fa-folder"></i>
                        <span class="folderName">{{$package->package_name}}</span>
                    </a>
                    <div class="option_menu">
                        <i class="fas fa-folder-open"></i>
                        <a href="{{ url('/dashboard', $package->package_id) }}">Open Folder</a>
                        <i class="fas fa-folder-minus"></i>
                        <a href="{{ url('/delete', $package->package_id) }}">Delete Folder</a>
                        <i class="fas fa-expand-arrows-alt"></i>
                        <a href="{{ url('/session/set/move', $package->package_id) }}" onclick="MoveFileOpen()">Move Folder</a>
                        <i class="fas fa-lock"></i>
                        <a href="{{ url('/session/set/lock', $package->package_id) }}" onclick="LockFileOpen()">Lock Folder</a>
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
                        <i class="fas fa-download"></i>
                        <a href="#">Download File</a>
                        <i class="fas fa-minus-circle"></i>
                        <a href="{{ url('/delete', $package->package_id) }}">Delete File</a>
                        <i class="fas fa-expand-arrows-alt"></i>
                        <a href="{{ url('/session/set/move', $package->package_id) }}" onclick="MoveFileOpen()">Move File</a>
                        <i class="fas fa-lock"></i>
                        <a href="{{ url('/session/set/lock', $package->package_id) }}" onclick="LockFileOpen()">Lock File</a>
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
                        <i class="fas fa-download"></i>
                        <a href="#">Download File</a>
                        <i class="fas fa-minus-circle"></i>
                        <a href="{{ url('/delete', $package->package_id) }}">Delete File</a>
                        <i class="fas fa-expand-arrows-alt"></i>
                        <a href="{{ url('/session/set/move', $package->package_id) }}" onclick="MoveFileOpen()">Move File</a>
                        <i class="fas fa-lock"></i>
                        <a href="{{ url('/session/set/lock', $package->package_id) }}" onclick="LockFileOpen()">Lock File</a>
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
                        <i class="fas fa-download"></i>
                        <a href="#">Download File</a>
                        <i class="fas fa-minus-circle"></i>
                        <a href="{{ url('/delete', $package->package_id) }}">Delete File</a>
                        <i class="fas fa-expand-arrows-alt"></i>
                        <a href="{{ url('/session/set/move', $package->package_id) }}" onclick="MoveFileOpen()">Move File</a>
                        <i class="fas fa-lock"></i>
                        <a href="{{ url('/session/set/lock', $package->package_id) }}" onclick="LockFileOpen()">Lock File</a>
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
                        <i class="fas fa-download"></i>
                        <a href="#">Download File</a>
                        <i class="fas fa-minus-circle"></i>
                        <a href="{{ url('/delete', $package->package_id) }}">Delete File</a>
                        <i class="fas fa-expand-arrows-alt"></i>
                        <a href="{{ url('/session/set/move', $package->package_id) }}" onclick="MoveFileOpen()">Move File</a>
                        <i class="fas fa-lock"></i>
                        <a href="{{ url('/session/set/lock', $package->package_id) }}" onclick="LockFileOpen()">Lock File</a>
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
                        <i class="fas fa-download"></i>
                        <a href="#">Download File</a>
                        <i class="fas fa-minus-circle"></i>
                        <a href="{{ url('/delete', $package->package_id) }}">Delete File</a>
                        <i class="fas fa-expand-arrows-alt"></i>
                        <a href="{{ url('/session/set/move', $package->package_id) }}" onclick="MoveFileOpen()">Move File</a>
                        <i class="fas fa-lock"></i>
                        <a href="{{ url('/session/set/lock', $package->package_id) }}" onclick="LockFileOpen()">Lock File</a>
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
                        <i class="fas fa-download"></i>
                        <a href="#">Download File</a>
                        <i class="fas fa-minus-circle"></i>
                        <a href="{{ url('/delete', $package->package_id) }}">Delete File</a>
                        <i class="fas fa-expand-arrows-alt"></i>
                        <a href="{{ url('/session/set/move', $package->package_id) }}" onclick="MoveFileOpen()">Move File</a>
                        <i class="fas fa-lock"></i>
                        <a href="{{ url('/session/set/lock', $package->package_id) }}" onclick="LockFileOpen()">Lock File</a>
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
                        <i class="fas fa-download"></i>
                        <a href="#">Download File</a>
                        <i class="fas fa-minus-circle"></i>
                        <a href="{{ url('/delete', $package->package_id) }}">Delete File</a>
                        <i class="fas fa-expand-arrows-alt"></i>
                        <a href="{{ url('/session/set/move', $package->package_id) }}" onclick="MoveFileOpen()">Move File</a>
                        <i class="fas fa-lock"></i>
                        <a href="{{ url('/session/set/lock', $package->package_id) }}" onclick="LockFileOpen()">Lock File</a>
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
                        <i class="fas fa-download"></i>
                        <a href="#">Download File</a>
                        <i class="fas fa-minus-circle"></i>
                        <a href="{{ url('/delete', $package->package_id) }}">Delete File</a>
                        <i class="fas fa-expand-arrows-alt"></i>
                        <a href="{{ url('/session/set/move', $package->package_id) }}" onclick="MoveFileOpen()">Move File</a>
                        <i class="fas fa-lock"></i>
                        <a href="{{ url('/session/set/lock', $package->package_id) }}" onclick="LockFileOpen()">Lock File</a>
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
                        <i class="fas fa-download"></i>
                        <a href="#">Download Archive</a>
                        <i class="fas fa-minus-circle"></i>
                        <a href="{{ url('/delete', $package->package_id) }}">Delete Archive</a>
                        <i class="fas fa-expand-arrows-alt"></i>
                        <a href="{{ url('/session/set/move', $package->package_id) }}" onclick="MoveFileOpen()">Move Archive</a>
                        <i class="fas fa-lock"></i>
                        <a href="{{ url('/session/set/lock', $package->package_id) }}" onclick="LockFileOpen()">Lock Archive</a>
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
                        <i class="fas fa-download"></i>
                        <a href="#">Download File</a>
                        <i class="fas fa-minus-circle"></i>
                        <a href="{{ url('/delete', $package->package_id) }}">Delete File</a>
                        <i class="fas fa-expand-arrows-alt"></i>
                        <a href="{{ url('/session/set/move', $package->package_id) }}" onclick="MoveFileOpen()">Move File</a>
                        <i class="fas fa-lock"></i>
                        <a href="{{ url('/session/set/lock', $package->package_id) }}" onclick="LockFileOpen()">Lock File</a>
                        <i class="fas fa-window-close"></i>
                        <a href="#" onclick="close_folder_option()">Close Menu</a>
                    </div>
                </div>

                @endif

            @else

                <!--Locked template-->
                <div class="folderPack">
                    <a href="#" class="folder">
                        <i class="fas fa-shield-alt"></i>
                        <span class="folderName">{{$package->package_name}}</span>
                    </a>
                    <div class="option_menu">
                        <i class="fas fa-unlock"></i>
                        <a href="{{ url('/session/set/lock', $package->package_id) }}" onclick="LockFileOpen()">Unlock Folder</a>
                        <i class="fas fa-window-close"></i>
                        <a href="#" onclick="close_folder_option()">Close Menu</a>
                    </div>
                </div>

            @endif


            @endforeach

            <p>file name: {{Session::get('FILENAME')}}</p>
            <p>user id: {{Session::get('USERID')}}</p>
            <p>file add: {{Session::get('FILEADD')}}</p>
            <p>child of: {{Session::get('CHILDOF')}}</p>
            <p>set session: {{Session::get('IDPASSER')}}</p>
            <p class="NoteMsg"><span class="Note">Note:</span> {{Session::get('NOTE')}}</p>

        </div>

        <!---CONTEXT MENU MODAL-->

        <div class="modals_container" id="popupR">

            <div class="bgwhite modals modalRight">

                <i class="fa-solid fa-folder-plus"></i>
                <a href="#" onclick="fileFolderAdderOpen()">Add Folder</a>

                <i class="fas fa-folder"></i>
                <a href="{{ url('/dashboard') }}">Dashboard</a>

                <i class="fas fa-sync-alt"></i>
                <a href="#">Refresh</a>

                <i class="fas fa-eye"></i>
                <div class="dualBtn">
                    <a href="#" onclick="grid_view()">Grid</a>
                    <a href="#" onclick="list_view()">List</a>
                </div>

                <i class="fas fa-adjust"></i>
                <a href="#" onclick="themeChange()">Change Theme</a>

                <i class="fas fa-cogs"></i>
                <a target="blank" href="https://thasinmahmud.com/open/contact/page">Meet Dev</a>

                <i class="fas fa-tools"></i>
                <a href="tools.html">Tools</a>

                <i class="fas fa-arrow-left"></i>
                <a href="{{ url('/go/back') }}">Go Back</a>

                <i class="fas fa-window-close"></i>
                <a href="#" onclick="closeMenu()">Close Menu</a>

                <i class="fa-solid fa-right-from-bracket"></i>
                <a href="{{ url('/logout') }}">Logout</a>

            </div>

        </div>

        <!--Mobile Nav-->

        <div class="mobnav_container" id="MobNav">

            <div class="bgwhite mobnav modalRight">

                <i class="fa-solid fa-folder-plus"></i>
                <a href="#" onclick="fileFolderAdderOpen()">Add Folder</a>

                <i class="fas fa-folder"></i>
                <a href="{{ url('/dashboard') }}">Dashboard</a>

                <i class="fas fa-sync-alt"></i>
                <a href="#">Refresh</a>

                <i class="fas fa-eye"></i>
                <div class="dualBtn">
                    <a href="#" onclick="grid_view()">Grid</a>
                    <a href="#" onclick="list_view()">List</a>
                </div>

                <i class="fas fa-adjust"></i>
                <a href="#" onclick="themeChange()">Change Theme</a>

                <i class="fas fa-cogs"></i>
                <a target="blank" href="https://thasinmahmud.com/open/contact/page">Meet Dev</a>

                <i class="fas fa-tools"></i>
                <a href="tools.html">Tools</a>

                <i class="fas fa-arrow-left"></i>
                <a href="{{ url('/go/back') }}">Go Back</a>

                <i class="fas fa-window-close"></i>
                <a href="#" onclick="MobNavClose()">Close Menu</a>

                <i class="fa-solid fa-right-from-bracket"></i>
                <a href="{{ url('/logout') }}">Logout</a>

            </div>

        </div>

        <!--Add New Folder/File-->

        <div class="contentBox disNone" id="fileFolderAdder">

            <div class="titleBox">
                <h3>Create File/Folder:</h3>
                <a href="#" onclick="fileFolderAdderClose()"><i class="fas fa-times"></i></a>
            </div>

            <!--Create Folder File Form-->
            <form action="{{ url('addPackage') }}" method="post" class="formBoxContainer" enctype="multipart/form-data">
            @csrf

                <div class="frmElm_10 formBox">
                    <label for="name"> Name </label>
                    <input name="name" type="text" required>
                </div>

                <div class="formBox">
                    <div><b>Open</b></div>
                    <div class="select_1">
                        <select name="open_as" id="open_as" required>
                            <option value="folder">Folder</option>
                            <option value="file">File</option>
                        </select>
                        <span></span> <!--Important-->
                    </div>
                </div>

                <div class="formBox">
                    <div><b>File Type</b></div>
                    <div class="select_1">
                        <select name="file_type" id="file_type" required>
                            <option value="folder">Folder</option>
                            <option value="word">Word/Text</option>
                            <option value="powerpoint">Powerpoint</option>
                            <option value="excel">Excel</option>
                            <option value="pdf">PDF</option>
                            <option value="code">Code</option>
                            <option value="image">Image</option>
                            <option value="audio">Audio</option>
                            <option value="video">Video</option>
                            <option value="archive">Archive</option>
                            <option value="miscellaneous">Miscellaneous</option>
                        </select>
                        <span></span> <!--Important-->
                    </div>
                </div>

                <div class="drop-container" id="dropContainer">
                    <!--<p class="drop-label" id="dropLabel">Drag & drop files here to upload</p>-->
                    <input type="file" id="fileInput" name="file_input" class="">
                    <!--<div class="file-list" id="fileList"></div>-->
                </div>

                <input class="frmBtnR" value="Create" type="submit">

            </form>

        </div>


        @if(Session::get('REASON') == "moving")

            <!---Move File--->

            @if(!empty(Session::get('IDPASSER')))

            <div class="contentBox disGrid" id="MoveFile">

                <div class="titleBox">
                    <h3>Move {{Session::get('NAMEPASSER')}}:</h3>
                    <a href="{{ url('/session/delete') }}" onclick="MoveFileClose()"><i class="fas fa-times"></i></a>
                </div>

                <!--Folder Container-->
                <div class="folderContainerList modalRecycle">

                    <!--Folder template (for Root)-->
                    <div class="folderPack">
                        <a href="#" class="folder">
                            <i class="fas fa-folder"></i>
                            <span class="folderName">Root Folder.</span>
                        </a>
                        <div class="option_menu">
                            <i class="fas fa-clone"></i>
                            <a href="{{ url('/make/mother', 'ROOT') }}">Move Here</a>
                            <i class="fas fa-window-close"></i>
                            <a href="#" onclick="close_folder_option()">Close Menu</a>
                        </div>
                    </div>

                    @foreach($folders as $folder)

                    @if($folder->package_status == 'unlocked' && Session::get('IDPASSER') != $folder->package_id)

                    <!--Folder template-->
                    <div class="folderPack">
                        <a href="#" class="folder">
                            <i class="fas fa-folder"></i>
                            <span class="folderName">{{$folder->package_name}}</span>
                        </a>
                        <div class="option_menu">
                            <i class="fas fa-clone"></i>
                            <a href="{{ url('/make/mother', $folder->package_id) }}">Move Here</a>
                            <i class="fas fa-window-close"></i>
                            <a href="#" onclick="close_folder_option()">Close Menu</a>
                        </div>
                    </div>

                    @endif

                    @endforeach

                </div>

            </div>

            @else

            <div class="contentBox disNone" id="MoveFile">

                <div class="titleBox">
                    <h3>Processing Request...</h3>
                    <a href="#" onclick="MoveFileClose()"><i class="fas fa-times"></i></a>
                </div>

                <!--Folder Container-->
                <div class="folderContainerList modalRecycle">

                </div>

            </div>

            @endif

        @elseif(Session::get('REASON') == "locking")

            <!--Lock File -->

            @if(!empty(Session::get('IDPASSER')))

                <div class="contentBox disGrid" id="LockFile">

                    @if(Session::get('STATUSPASSER') == 'unlocked')

                    <div class="titleBox">
                        <h3>Lock: {{Session::get('NAMEPASSER')}}</h3>
                        <a href="{{ url('/session/delete') }}" onclick="LockFileClose()"><i class="fas fa-times"></i></a>
                    </div>

                    <form action="{{ url('/lock/file', ['IDPASSER' => session('IDPASSER')]) }}" method="post" class="formBoxContainer">
                    @csrf

                        <div class="frmElm_10 formBox">
                            <label  for=""> Password </label>
                            <input  type="password" name="code" required>
                        </div>

                        <div class="frmElm_10 formBox">
                            <label  for=""> Confirm Password </label>
                            <input  type="password" name="confirmCode" required>
                        </div>

                        <input class="frmBtnR" value="Lock File" type="submit">

                    </form>

                    @else

                    <div class="titleBox">
                        <h3>Unlock: {{Session::get('NAMEPASSER')}}</h3>
                        <a href="{{ url('/session/delete') }}" onclick="LockFileClose()"><i class="fas fa-times"></i></a>
                    </div>

                    <form action="{{ url('/unlock/file', ['IDPASSER' => session('IDPASSER')]) }}" method="post" class="formBoxContainer">
                    @csrf

                        <div class="frmElm_10 formBox">
                            <label  for=""> Password </label>
                            <input  type="password" name="code" required>
                        </div>

                        <div class="frmElm_10 formBox">
                            <label  for=""> Confirm Password </label>
                            <input  type="password" name="confirmCode" required>
                        </div>

                        <input class="frmBtnR" value="Lock File" type="submit">

                    </form>

                    @endif

                </div>

            @else

            <div class="contentBox disNone" id="LockFile">

                <div class="titleBox">
                    <h3>Processing Request...</h3>
                    <a href="#" onclick="LockFileClose()"><i class="fas fa-times"></i></a>
                </div>

                <form action="" class="formBoxContainer">
                @csrf

                    <div class="frmElm_10 formBox">
                        <label  for=""> Password </label>
                        <input  type="password" name="code" class="shadeLight" disable>
                    </div>

                    <div class="frmElm_10 formBox">
                        <label  for=""> Confirm Password </label>
                        <input  type="password" name="confirmCode" class="shadeLight" disable>
                    </div>

                    <input class="frmBtnR" value="Lock File" type="button">

                </form>
            </div>

            @endif

        @endif



    </div>


</body>
</html>
