

<div class="container-contact100">
    <div class="wrap-contact100">
        <form class="contact100-form validate-form">
				<span class="contact100-form-title">
					Send Us A Message
				</span>


            <div class="wrap-input100 validate-input" data-validate="Name is required">
                <label class="label-input100" for="name">Full name</label>
                <input id="name" class="input100" type="text" name="name" placeholder="Enter your name...">
                <span class="focus-input100"></span>
            </div>


            <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                <label class="label-input100" for="email">Email Address</label>
                <input id="email" class="input100" type="text" name="email" placeholder="Enter your email...">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "Message is required">
                <label class="label-input100" for="message">Message</label>
                <textarea id="message" class="input100" name="message" placeholder="Type your message here..."></textarea>
                <span class="focus-input100"></span>
            </div>

            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
                    Send
                </button>
            </div>

            <div class="contact100-form-social flex-c-m">
                <a href="#" class="contact100-form-social-item flex-c-m bg1 m-r-5">
                    <i class="fa fa-facebook-f" aria-hidden="true"></i>
                </a>

                <a href="#" class="contact100-form-social-item flex-c-m bg2 m-r-5">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>

                <a href="#" class="contact100-form-social-item flex-c-m bg3">
                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                </a>
            </div>
        </form>

        <div class="contact100-more flex-col-c-m" style="background-image: url({{asset('img/bg-01.jpg')}});">
        </div>
    </div>
</div>



<script type="text/javascript" src="{!! asset('vendor/animsition/js/animsition.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('vendor/bootstrap/js/popper.js') !!}"></script>
<script type="text/javascript" src="{!! asset('vendor/bootstrap/js/bootstrap.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('vendor/select2/select2.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('vendor/daterangepicker/moment.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('vendor/daterangepicker/daterangepicker.js') !!}"></script>
<script type="text/javascript" src="{!! asset('vendor/countdowntime/countdowntime.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/form-js.js') !!}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
<script>
    $(".js-select2").each(function(){
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
    $(".js-select2").each(function(){
        $(this).on('select2:open', function (e){
            $(this).parent().next().addClass('eff-focus-selection');
        });
    });
    $(".js-select2").each(function(){
        $(this).on('select2:close', function (e){
            $(this).parent().next().removeClass('eff-focus-selection');
        });
    });


</script>
