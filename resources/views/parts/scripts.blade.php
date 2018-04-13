<script type="text/javascript" src="{!! asset('vendor/jquery/jquery-3.2.1.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('vendor/animsition/js/animsition.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('vendor/bootstrap/js/popper.js') !!}"></script>
<script type="text/javascript" src="{!! asset('vendor/bootstrap/js/bootstrap.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('vendor/select2/select2.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('vendor/daterangepicker/moment.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('vendor/daterangepicker/daterangepicker.js') !!}"></script>
<script type="text/javascript" src="{!! asset('vendor/countdowntime/countdowntime.js') !!}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="{!! asset('js/main.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/SmoothScroll.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/form-js.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/table.js') !!}"></script>
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