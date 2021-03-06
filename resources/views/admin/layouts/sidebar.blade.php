<!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">
                    {{ config('app.name', 'Laravel') }}</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a target="_blank" href="{{ url('/') }}"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                   {{-- <li class="dropdown navbar-inverse">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>--}}
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            {{--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>--}}
                            <li><a href="{{ route('logout') }}" 
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out fa-fw"></i> {{ __('Logout') }}
                                </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                           {{-- <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>--}}
                            <li>
                                <a href="{{ url('/admin/dashboard') }}" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-user-md fa-fw"></i> Manage Doctors<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('doctor.create') }}">Add</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('doctor.index') }}">List</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('doctor.trash') }}">Trash</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> Manage Categories<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li>
                                                <a href="{{ route('category.create.type',['type' => 'doctor']) }}">Add</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('category.index.type',['type' => 'doctor']) }}">List</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-second-level -->
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> Manage Specialities<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li>
                                                <a href="{{ route('speciality.create.type',['type' => 'doctor']) }}">Add</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('speciality.index.type',['type' => 'doctor']) }}">List</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-second-level -->
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-hospital-o fa-fw"></i> Manage Hospitals<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('hospital.create') }}">Add</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('hospital.index') }}">List</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('hospital.trash') }}">Trash</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> Manage Specialities<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li>
                                                <a href="{{ route('speciality.create.type',['type' => 'hospital']) }}">Add</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('speciality.index.type',['type' => 'hospital']) }}">List</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-second-level -->
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-stethoscope fa-fw"></i> Manage Treatments<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('treatment.create') }}">Add</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('treatment.index') }}">List</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> Manage Categories<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li>
                                                <a href="{{ route('category.create.type',['type' => 'treatment']) }}">Add</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('category.index.type',['type' => 'treatment']) }}">List</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-second-level -->
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-comment fa-fw"></i> Manage Testimonials<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('testimonial.create') }}">Add</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('testimonial.index') }}">List</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> Testimonial Categories<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="{{ route('category.create.type',['type' => 'testimonial']) }}">Add</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('category.index.type',['type' => 'testimonial']) }}">List</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-second-level -->
                                    </li>

                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="{{ url('blog_admin') }}"><i class="fa fa-rss fa-fw"></i> Manage Blogs<span class="fa arrow"></span></a>
                                <!-- /.nav-second-level -->
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('admin.post.create') }}">Add</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.post.index') }}">List</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> Post Categories<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="{{ route('category.create.type',['type' => 'post']) }}">Add</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('category.index.type',['type' => 'post']) }}">List</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-second-level -->
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> Manage Knowledge Centers<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('admin.knowledge_center.create') }}">Add</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.knowledge_center.index') }}">List</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> News Categories<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="{{ route('category.create.type',['type' => 'news']) }}">Add</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('category.index.type',['type' => 'news']) }}">List</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-second-level -->
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> Testimonial Topics<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="{{ route('topic.create.type',['type' => 'news']) }}">Add</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('topic.index.type',['type' => 'news']) }}">List</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-second-level -->
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>


                            @if(auth()->user()->role_id == 1)
                            <li>
                                <a href="#"><i class="fa fa-files-o fa-fw"></i> Manage Pages<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('admin.home.edit') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.about.edit') }}">About</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.contact-us.edit') }}">Contact Us</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-files-o fa-fw"></i> Section Settings <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('admin.setting.footer.edit') }}">Footer</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.banner.edit') }}">Banners</a>
                                    </li>
                                   {{-- <li>
                                        <a href="{{ route('admin.blog-counters.edit') }}">Blog</a>
                                    </li>--}}
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-files-o fa-fw"></i> Upload CSV <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('admin.csv.hospitals_upload') }}">Hospitals</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.csv.doctors_upload') }}">Doctors</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.csv.treatments_upload') }}">Treatments</a>
                                    </li>
                                    {{-- <li>
                                         <a href="{{ route('admin.blog-counters.edit') }}">Blog</a>
                                     </li>--}}
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-files-o fa-fw"></i> Permissions <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('admin.user.index') }}">List All</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.user.create') }}">Add User</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.user.trash') }}">Trash</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.permissions.create') }}">Permissions</a>
                                    </li>
                                                                      {{-- <li>
                                         <a href="{{ route('admin.blog-counters.edit') }}">Blog</a>
                                     </li>--}}
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                                @endif
                        </ul>
                    </div>
                </div>
            </nav>