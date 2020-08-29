<footer class="site-footer position-relative overlay"
        style="background:url({{ asset('assets/images/footer-bg.jpg') }}) no-repeat center center / cover;    ">
    <div class="container ">
        @include('flash-message')
        <form name="consultation_form" id="consultation_form" method="post" action="{{ route('consultation_form') }}"
              class="row ">
            <div class="col-md-10 mx-auto">
                @csrf
                <div class="bg-white p-5 free-consultation">
                    <h4 class="text-center h4 text-dark mb-4 fw-600">Free Consultation</h4>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name*" name="name"/>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="eamil" class="form-control" placeholder="Email*" name="email"/>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone Number*" name="phone"
                                       name="phone"/>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Country*" name="country"/>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <textarea class="form-control" rows="4"
                                          placeholder="Details (Treatment Required*)"
                                          name="treatment_details"/></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="form-group">
                                <input type="submit" class="themebtn" value="Contact us now"/>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <div class="container pt-5">
        <div class="row pt-3">
            <div class="col-md-6 col-lg-3">
                <a href="index.php" class="d-inline-block pb-4"><img src="assets/images/logo.png" alt="Denesa Health"/></a><br/>
                <p>{!! !empty($footerIntroduction->description) ? $footerIntroduction->description : '' !!}</p>
                <address>
                    <ul class="list-unstyled">
                        <li class="position-relative "><span class="d-inline-block position-absolute l-0 t-0"><img
                                        src="assets/images/location.png"
                                        alt=""/></span>{!! !empty($footerIntroduction->address) ? $footerIntroduction->address : ''!!}
                        </li>

                        <li class="position-relative "><span class="d-inline-block position-absolute l-0 t-0"><svg
                                        version="1.1" height="15px" style="fill:#b4dbf0;" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        x="0px" y="0px"
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

					       </svg></span><a
                                    href="tel:(+91)7428231453">{{ !empty($footerIntroduction->phone) ? $footerIntroduction->phone : ''}}</a>
                        </li>
                        <li class="position-relative "><span class="d-inline-block position-absolute l-0 t-0"><svg
                                        version="1.1" height="15px" style="fill:#b4dbf0;" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        x="0px" y="0px"
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
						</svg></span><a
                                    href="mailto:{{ !empty($footerIntroduction->email1) ? $footerIntroduction->email1 : '' }}">{{ !empty($footerIntroduction->email1) ? $footerIntroduction->email1 : '' }}</a><br/>
                            <a href="mailto:{{ !empty($footerIntroduction->email2) ? $footerIntroduction->email2 : ''}}">{{ !empty($footerIntroduction->email2) ? $footerIntroduction->email2 : '' }}</a>
                        </li>
                    </ul>
                </address>
            </div>
            <div class="col-md-6 col-lg-3">
                <h6 class="theme-color fs-14 fw-600 open-sans mt-2 mb-3">{{ !empty($footerIntroduction->hospital_heading) ? $footerIntroduction->hospital_heading : ''}}</h6>
                <ul class="list-unstyled">
                    @if(!empty($footerHospitals))
                        @foreach($footerHospitals as $footerHospital)

                            <li class="mb-2">{{ $footerHospital->name }}, {{ $footerHospital->place }}</li>
                        @endforeach
                    @endif

                </ul>
            </div>
            <div class="col-md-6 col-lg-3">
                <h6 class="theme-color fs-14 fw-600 open-sans mt-2 mb-3">{{ !empty($footerIntroduction->doctor_heading) ? $footerIntroduction->doctor_heading : ''}}</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">Dr Sandeep Vaishya,Gurugram</li>
                    @if(!empty($footerDoctors))
                        @foreach($footerDoctors as $footerDoctor)

                            <li class="mb-2">{{ $footerDoctor->name }}, {{ $footerDoctor->place }}</li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="col-md-6 col-lg-3">
                <h6 class="theme-color fs-14 fw-600 open-sans mt-2 mb-3">{{ !empty($footerIntroduction->service_heading) ? $footerIntroduction->service_heading : ''}}</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">Free Quote & Opinion from Best Hospitals</li>
                    @if(!empty($footerServices))
                        @foreach($footerServices as $footerService)

                            <li class="mb-2">{{ $footerService->name }}</li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="container position-relative mt-5">
        <div class="site-info py-3 row">

            <div class="col-lg-4 d-flex order-lg-2 py-2 justify-content-center">
                <ul class="list-unstyled social mb-0 d-flex">
                    <li class="f"><a href="{{ !empty($socialLinks->facebook_url) ? $socialLinks->facebook_url : '#' }}"
                                     target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="t"><a href="{{ !empty($socialLinks->twitter_url) ? $socialLinks->twitter_url : '#' }}"
                                     target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li class="l"><a href="{{ !empty($socialLinks->linkedin_url) ? $socialLinks->linkedin_url : '#' }}"
                                     target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                    <li class="i"><a
                                href="{{ !empty($socialLinks->instagram_url) ? $socialLinks->instagram_url : '#' }}"
                                target="_blank"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="col-lg-4 order-lg-3 py-2 justify-content-center align-items-center d-flex justify-content-lg-end">
                <ul class="list-unstyled footer-link mb-0 d-flex">
                    <li><a href="#" class="theme-color text-uppercase ">Connect to Specialist</a></li>
                    <span class="mx-2 theme-color">|</span>
                    <li><a href="#" class="theme-color text-uppercase">Get Quote</a></li>
                </ul>
            </div>
            <div class="col-lg-4 order-lg-1 py-2 text-center text-lg-left">
                <p class="mb-2 mb-lg-0">
                    © {{ !empty($socialLinks->copyright_text) ? $socialLinks->copyright_text : '2020 Denesa Health. All Rights Reserved.' }}</p>
            </div>
        </div>

    </div>
</footer>

<a href="#" class="whatsapp position-fixed m-2  l-0 b-0"><img src="assets/images/whatsapp.png" alt=""/></a>
<a href="#" id="scroll" style="display: none;"><span></span></a>


<!--modal video start  here-->
{{--<div class="modal video-flex-modal  fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class=" position-relative">
                <a class="close position-absolute" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>

                <div class="embed-responsive embed-responsive-16by9">

                    <iframe class="embed-responsive-item" id="vidpop" src="https://www.youtube.com/embed/ScMzIvxBSi4?"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>--}}
<!--modal video  ends here-->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>

<script src="{{asset('assets/js/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<style>
    .ui-autocomplete-category {
        font-weight: bold;
        padding: .2em .4em;
        margin: .8em 0 .2em;
        line-height: 1.5;
    }
</style>
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.widget("custom.catcomplete", $.ui.autocomplete, {
        _renderMenu: function (ul, items) {
            var that = this,
                currentCategory = "";
            $.each(items, function (index, item) {
                if (item.category != currentCategory) {
                    ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
                    currentCategory = item.category;
                }
                that._renderItemData(ul, item);
            });
        }
    });

    $(document).ready(function () {

        $(".form-inline input.bg-transparent").catcomplete({
            source: function (request, response) {
// Fetch data
                $.ajax({
                    url: "{{route('treatment.getSearchData')}}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
            select: function (event, ui) {
                window.location.href = ui.item.url;
            }
        });
    });
</script>

