<nav class="navbar header navbar-expand-xl navbar-light ">
    <div class="container ">
        <a class="navbar-brand" href="index.php"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('hospital.index-front') }}">Hospitals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('doctor.index-front') }}">Doctors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cost.php">costs</a>
                </li>
                <li class="nav-item menu-item-has-children">
                    <a class="nav-link" href="{{ route('knowledge-center') }}">knowledge center</a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('testimonial.index-front') }}">testimonial</a></li>
                        <li><a class="nav-link" href="{{ route('blog.index-front') }}">blog</a></li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control bg-transparent" type="search"
                       placeholder="Search Doctors, Hospitals, Treatments">
                <button class="btn search-submit bg-white my-2 my-sm-0" type="submit">
                    <svg aria-hidden="true" focusable="false" height="15px" data-prefix="fal" data-icon="search"
                         role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                         class="svg-inline--fa fa-search fa-w-16 fa-5x">
                        <path fill="#249bdc"
                              d="M508.5 481.6l-129-129c-2.3-2.3-5.3-3.5-8.5-3.5h-10.3C395 312 416 262.5 416 208 416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c54.5 0 104-21 141.1-55.2V371c0 3.2 1.3 6.2 3.5 8.5l129 129c4.7 4.7 12.3 4.7 17 0l9.9-9.9c4.7-4.7 4.7-12.3 0-17zM208 384c-97.3 0-176-78.7-176-176S110.7 32 208 32s176 78.7 176 176-78.7 176-176 176z"
                              class=""></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</nav>
<header class="home site-header ">
    <div class="container d-flex justify-content-end py-3 position-relative">
        <ul class="list-unstyled flex-wrap d-flex mb-0 js_move">
            <li class="mr-3 mr-md-4 mb-2 mb-md-0"><a href="tel:+91-7428231453">
                    <svg version="1.1" height="15px" class="theme-svg-color" id="Layer_1"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 512 512" xml:space="preserve">
						<g>
                            <g>
                                <path d="M353.188,252.052c-23.51,0-46.594-3.677-68.469-10.906c-10.719-3.656-23.896-0.302-30.438,6.417l-43.177,32.594
									c-50.073-26.729-80.917-57.563-107.281-107.26l31.635-42.052c8.219-8.208,11.167-20.198,7.635-31.448
									c-7.26-21.99-10.948-45.063-10.948-68.583C132.146,13.823,118.323,0,101.333,0H30.813C13.823,0,0,13.823,0,30.813
									C0,225.563,158.438,384,353.188,384c16.99,0,30.813-13.823,30.813-30.813v-70.323C384,265.875,370.177,252.052,353.188,252.052z"
                                />
                            </g>
                        </g>

				</svg>
                    +91-7428231453</a>
            </li>
            <li class="mr-2 mb-2 mb-md-0"><a href="mailto:info@denesahealth.com">
                    <svg version="1.1" height="15px" class="theme-svg-color mr-2" id="Layer_1"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 512 512" xml:space="preserve">
					<g>
                        <g>
                            <g>
                                <path d="M10.688,95.156C80.958,154.667,204.26,259.365,240.5,292.01c4.865,4.406,10.083,6.646,15.5,6.646
									c5.406,0,10.615-2.219,15.469-6.604c36.271-32.677,159.573-137.385,229.844-196.896c4.375-3.698,5.042-10.198,1.5-14.719
									C494.625,69.99,482.417,64,469.333,64H42.667c-13.083,0-25.292,5.99-33.479,16.438C5.646,84.958,6.313,91.458,10.688,95.156z"/>
                                <path d="M505.813,127.406c-3.781-1.76-8.229-1.146-11.375,1.542C416.51,195.01,317.052,279.688,285.76,307.885
									c-17.563,15.854-41.938,15.854-59.542-0.021c-33.354-30.052-145.042-125-208.656-178.917c-3.167-2.688-7.625-3.281-11.375-1.542
									C2.417,129.156,0,132.927,0,137.083v268.25C0,428.865,19.135,448,42.667,448h426.667C492.865,448,512,428.865,512,405.333
									v-268.25C512,132.927,509.583,129.146,505.813,127.406z"/>
                            </g>
                        </g>
                    </g>
					</svg>
                    info@denesahealth.com</a>
            </li>
            <li class="ml-3 mb-2 mb-md-0 "><a class="d-block px-3 py-2 rounded" href="{{ route('contact-us.show') }}">CONTACT US</a>
            </li>
        </ul>
    </div>
    <?php if (\Request::is('/')) { ?>
    <div class=" pb-5 mt-5">


        <div class="container pb-5  position-relative">
            <div class="row justify-content-center pt-md-5 pt-4 pb-5	">
                <div class="col-lg-8 col-md-10 pt-xl-5 text-center">
                    <h1 class="text-white">Lorem Ipsum Dolor Sit Amet </h1>
                    <h4 class="text-white">Search Treatment</h4>
                    <form class="form-inline  search-form mb-3 mt-3 mb-md-0">


                        <input type="search" class="form-control  pl-3 py-4" value="" name="name" id="search"
                               placeholder="Search Here"/>
                        <button type="submit" class="btn themebtn" value=""/>
                        GET ESTIMATE</button>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <?php
    }
    ?>
</header>