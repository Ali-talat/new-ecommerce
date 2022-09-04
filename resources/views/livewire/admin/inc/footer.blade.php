<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; {{date('Y')}}<a class="text-bold-800 grey darken-2" href=""
                                                                                          target="_blank">Ahmed Emam </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block"> done <i class="ft-heart pink"></i></span>
    </p>
</footer>


<!-- BEGIN VENDOR JS-->
<script src="{{asset('admin')}}/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<script src="{{asset('admin')}}/vendors/js/tables/datatable/datatables.min.js"
        type="text/javascript"></script>
<script src="{{asset('admin')}}/vendors/js/tables/datatable/dataTables.buttons.min.js"
        type="text/javascript"></script>

<script src="{{asset('admin')}}/vendors/js/forms/toggle/bootstrap-switch.min.js"
        type="text/javascript"></script>
<script src="{{asset('admin')}}/vendors/js/forms/toggle/bootstrap-checkbox.min.js"
        type="text/javascript"></script>
<script src="{{asset('admin')}}/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="{{asset('admin')}}/js/scripts/forms/switch.js" type="text/javascript"></script>
<script src="{{asset('admin')}}/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
<script src="{{asset('admin')}}/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>

<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('admin')}}/vendors/js/charts/chart.min.js" type="text/javascript"></script>
<script src="{{asset('admin')}}/vendors/js/charts/echarts/echarts.js" type="text/javascript"></script>

<script src="{{asset('admin')}}/vendors/js/extensions/datedropper.min.js" type="text/javascript"></script>
<script src="{{asset('admin')}}/vendors/js/extensions/timedropper.min.js" type="text/javascript"></script>

<script src="{{asset('admin')}}/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
<script src="{{asset('admin')}}/js/scripts/pages/chat-application.js" type="text/javascript"></script>
<script src="{{asset('admin/vendors/js/extensions/dropzone.min.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{asset('admin')}}/js/core/app-menu.js" type="text/javascript"></script>
<script src="{{asset('admin')}}/js/core/app.js" type="text/javascript"></script>
<script src="{{asset('admin')}}/js/scripts/customizer.js" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('admin')}}/js/scripts/pages/dashboard-crypto.js" type="text/javascript"></script>


<script src="{{asset('admin')}}/js/scripts/tables/datatables/datatable-basic.js"
        type="text/javascript"></script>
<script src="{{asset('admin')}}/js/scripts/extensions/date-time-dropper.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<script src="{{asset('admin')}}/js/scripts/forms/checkbox-radio.js" type="text/javascript"></script>

<script src="{{asset('admin')}}/js/scripts/modal/components-modal.js" type="text/javascript"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
<script>
    $('#meridians1').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians2').timeDropper({
        meridians: true,setCurrentTime: false

    });
    $('#meridians3').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians4').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians5').timeDropper({
        meridians: true,setCurrentTime: false

    });
    $('#meridians6').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians7').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians8').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians9').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians10').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians11').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians12').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians13').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians14').timeDropper({
        meridians: true,setCurrentTime: false
    });
</script>
@yield('script')

</body>
</html>

