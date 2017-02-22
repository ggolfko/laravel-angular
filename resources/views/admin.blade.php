<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{asset('/css/reset.css')}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css' />
    <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css' />
    <link rel="stylesheet" href="{{asset('/css/style.css')}}" />
    <!-- Bootstrap CSS -->
    <!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    
    <!-- Script -->
    <!-- Angular JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-resource.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.min.js"></script>
    <!-- Firebase -->
    <script src="https://cdn.firebase.com/js/client/2.0.4/firebase.js"></script>
    <script src="https://cdn.firebase.com/libs/angularfire/0.9.0/angularfire.min.js"></script>

</head>

<body>
    <section>
        <header>
            <nav class="rad-navigation">
                <div class="rad-logo-container">
                    <a href="#" class="rad-logo">
                        <i class=" fa fa-train">
                            </i> LTTS
                    </a>
                    <a href="#" class="rad-toggle-btn pull-right">
                        <i class="fa fa-bars">
                            </i>
                    </a>
                </div>
                <a href="#" class="rad-logo-hidden">
                        live train tracking system 
                    </a>
                <div class="rad-top-nav-container">
                    <a href="" class="brand-icon">
                        <i class="fa fa-recycle">
                            </i>
                    </a>
                    <ul class="pull-right links">
                        <li class="rad-dropdown no-color">
                            <a class="rad-menu-item" href="#">
                                <img class="rad-list-img sm-img" src="https://scontent.fbkk10-1.fna.fbcdn.net/hphotos-xpt1/v/t1.0-9/12195810_1204029652947688_2413583020499087658_n.jpg?oh=307c1a70b3e80bcea98ca21557a83df2&oe=577C5347" alt="me" />
                            </a>
                            <ul class="rad-dropmenu-item sm-menu">
                                <li class="rad-notification-item">
                                    <a class="rad-notification-content lg-text" href="#">
                                        <i class="fa fa-edit">
                                            </i> My Profile
                                    </a>
                                </li>
                                <li class="rad-notification-item">
                                    <a class="rad-notification-content lg-text" href="{{url('/auth/logout')}}">
                                        <i class="fa fa-power-off">
                                            </i> Sign out
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="rad-dropdown">
                            <a class="rad-menu-item" href="#">
                                <i class="fa fa-cog">
                                    </i>
                            </a>
                            <ul class="rad-dropmenu-item rad-settings">
                                <li class="rad-dropmenu-header">
                                    <a href="#">
                                            Settings
                                        </a>
                                </li>
                                <li class="rad-notification-item text-left">
                                    <div class="pull-left">
                                        <i class="fa fa-link">
                                            </i>
                                    </div>
                                    <div class="pull-right">
                                        <label class="rad-chk-pin pull-right">
                                            <input type="checkbox" />
                                            <span>
                                                </span>
                                        </label>
                                    </div>
                                    <div class="rad-notification-body">
                                        <div class="lg-text">
                                            Change to Flat Theme
                                        </div>
                                        <div class="sm-text">
                                            Flattify it
                                        </div>
                                    </div>
                                </li>
                                <li id="rad-color-opts" class="rad-notification-item text-left hide">
                                    <div class="pull-left">
                                        <i class="fa fa-puzzle-piece">
                                            </i>
                                    </div>
                                    <div class="pull-right">
                                        <div class="rad-color-swatch">
                                            <label class="colors rad-bg-crimson rad-option-selected">
                                                <input type="radio" checked name="color" value="crimson" />
                                            </label>
                                            <label class="colors rad-bg-teal">
                                                <input type="radio" name="color" value="teal" />
                                            </label>
                                            <label class="colors rad-bg-purple">
                                                <input type="radio" name="color" value="purple" />
                                            </label>
                                            <label class="colors rad-bg-orange">
                                                <input type="radio" name="color" value="orange" />
                                            </label>
                                            <label class="colors rad-bg-twitter">
                                                <input type="radio" name="color" value="twitter" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="rad-notification-body">
                                        <div class="lg-text">
                                            Choose a color
                                        </div>
                                        <div class="sm-text">
                                            Make it colorful
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="pull-right links">
                        <li>
                            <a class="rad-menu-item" href="#">
                                <i class="fa fa-comment-o">
                                        <span class="rad-menu-badge rad-bg-success">
                                            0
                                        </span>
                                    </i>
                            </a>
                        </li>
                        <li class="rad-dropdown">
                            <a class="rad-menu-item" href="#">
                                <i class="fa fa-envelope-o">
                                        <span class="rad-menu-badge rad-bg-primary">
                                            23
                                        </span>
                                    </i>
                            </a>
                            <ul class="rad-dropmenu-item">
                                <li class="rad-dropmenu-header">
                                    <a href="#">
                                            Your Notifications
                                        </a>
                                </li>
                                <li class="rad-notification-item text-left">
                                    <a class="rad-notification-content" href="#">
                                        <div class="pull-left">
                                            <i class="fa fa-html5 fa-2x">
                                                </i>
                                        </div>
                                        <div class="rad-notification-body">
                                            <div class="lg-text">
                                                Introduction to fetch()
                                            </div>
                                            <div class="sm-text">
                                                The fetch API
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="rad-notification-item text-left">
                                    <a class="rad-notification-content" href="#">
                                        <div class="pull-left">
                                            <i class="fa fa-bitbucket fa-2x">
                                                </i>
                                        </div>
                                        <div class="rad-notification-body">
                                            <div class="lg-text">
                                                Check your BitBucket
                                            </div>
                                            <div class="sm-text">
                                                Last Chance
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="rad-notification-item text-left">
                                    <a class="rad-notification-content" href="#">
                                        <div class="pull-left">
                                            <i class="fa fa-google fa-2x">
                                                </i>
                                        </div>
                                        <div class="rad-notification-body">
                                            <div class="lg-text">
                                                Google Account
                                            </div>
                                            <div class="sm-text">
                                                sathishlxg@gmail.com
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="rad-dropmenu-footer">
                                    <a href="#">
                                            See all notifications
                                        </a>
                                </li>
                            </ul>
                        </li>
                        <li class="rad-dropdown">
                            <a class="rad-menu-item" href="#">
                                <i class="fa fa-bell-o">
                                        <span class="rad-menu-badge">
                                            49
                                        </span>
                                    </i>
                            </a>
                            <ul class="rad-dropmenu-item">
                                <li class="rad-dropmenu-header">
                                    <a href="#">
                                            Your Alerts
                                        </a>
                                </li>
                                <li class="rad-notification-item text-left">
                                    <a class="rad-notification-content" href="#">
                                        <div class="pull-left">
                                            <i class="fa fa-html5 fa-2x">
                                                </i>
                                        </div>
                                        <div class="rad-notification-body">
                                            <div class="lg-text">
                                                Introduction to fetch()
                                            </div>
                                            <div class="sm-text">
                                                The fetch API
                                            </div>
                                            <em class="pull-right sm-text">
                                                    <i class="fa fa-clock-o">
                                                    </i>
                                                    2 sec ago
                                                </em>
                                        </div>
                                    </a>
                                </li>
                                <li class="rad-notification-item text-left">
                                    <a class="rad-notification-content" href="#">
                                        <div class="pull-left">
                                            <i class="fa fa-bitbucket fa-2x">
                                                </i>
                                        </div>
                                        <div class="rad-notification-body">
                                            <div class="lg-text">
                                                Check your BitBucket
                                            </div>
                                            <div class="sm-text">
                                                Last Chance
                                            </div>
                                            <em class="pull-right sm-text">
                                                    <i class="fa fa-clock-o">
                                                    </i>
                                                    49 mins ago
                                                </em>
                                        </div>
                                    </a>
                                </li>
                                <li class="rad-notification-item text-left">
                                    <a class="rad-notification-content" href="#">
                                        <div class="pull-left">
                                            <i class="fa fa-google fa-2x">
                                                </i>
                                        </div>
                                        <div class="rad-notification-body">
                                            <div class="lg-text">
                                                Google Account
                                            </div>
                                            <div class="sm-text">
                                                sathishlxg@gmail.com
                                            </div>
                                            <em class="pull-right sm-text">
                                                    <i class="fa fa-clock-o">
                                                    </i>
                                                    2 days ago
                                                </em>
                                        </div>
                                    </a>
                                </li>
                                <li class="rad-dropmenu-footer">
                                    <a href="#">
                                            See all alerts
                                        </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    </section>
    <aside>
        <nav class="rad-sidebar">
            <ul>
                <li>
                    <a href="{{url('/home')}}">
                        <i class="fa fa-home">
                                <span class="icon-bg rad-bg-violet">
                                </span>
                            </i>
                        <span class="rad-sidebar-item">
                                Home
                            </span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/dashboard')}}" class="inbox">
                        <i class="fa fa-dashboard">
                                <span class="icon-bg rad-bg-success">
                                </span>
                            </i>
                        <span class="rad-sidebar-item">
                                Dashboard
                            </span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/maps')}}">
                        <i class="fa fa-map">
                                <span class="icon-bg rad-bg-danger">
                                </span>
                            </i>
                        <span class="rad-sidebar-item">
                                Tracking status
                            </span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/ltts')}}" class="snooz">
                        <i class="fa fa-subway">
                                <span class="icon-bg rad-bg-primary">
                                </span>
                            </i>
                        <span class="rad-sidebar-item">
                                Add/Edit Tracking
                            </span>
                    </a>
                </li>
                <li>
                    <a href="{{url('newsfeed')}}" class="done">
                        <i class="fa fa-rss">
                                <span class="icon-bg rad-bg-warning">
                                </span>
                            </i>
                        <span class="rad-sidebar-item">
                                Add/Edit News Feed
                            </span>
                    </a>
                </li>
           
                <li>
                    <a href="{{url('listtrain')}}" class="inbox">
                        <i class="fa fa-th">
                                <span class="icon-bg rad-bg-violet">
                                </span>
                            </i>
                        <span class="rad-sidebar-item">
                                Add/Edite List Train
                            </span>
                    </a>
                </li>
                     <li>
                    <a href="{{url('messages')}}">
                        <i class="fa fa-comment">
                                <span class="icon-bg rad-bg-success">
                                </span>
                            </i>
                        <span class="rad-sidebar-item">
                               Message
                            </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-wrench">
                                <span class="icon-bg rad-bg-danger">
                                </span>
                            </i>
                        <span class="rad-sidebar-item">
                                Settings
                            </span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
    <main>
        <section>
            <div class="rad-body-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </section>
    </main>
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'>
    </script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js'>
    </script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js'>
    </script>
    <script src='http://code.jquery.com/ui/1.11.4/jquery-ui.js'>
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.3/jquery.slimscroll.min.js'>
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.8.0/lodash.min.js'>
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js'>
    </script>
    <script src="{{asset('/js/index.js')}}">
    </script>
</html>
