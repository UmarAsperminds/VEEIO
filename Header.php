<?php 
include('Backend/config.php');
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title> Semico </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
	<link href="assets/styles/main.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="assets/styles/datatable_style_me.css">
	<link rel='stylesheet' href='assets/styles/animate.min.css'>
    <link rel='stylesheet' href='assets/styles/Autocomplete.css'>
    <link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
    <style type="text/css">
    td.details-control {
        background: url(https://www.datatables.net/examples/resources/details_open.png) no-repeat center center;
        cursor: pointer;
        width: 30px;
        transition: .5s;
    }
    tr.shown td.details-control {
        background: url(https://www.datatables.net/examples/resources/details_close.png) no-repeat center center;
        width: 30px;
        transition: .5s;
    }
    td.details-control1 {
        background: url(https://www.datatables.net/examples/resources/details_open.png) no-repeat center center;
        cursor: pointer;
        width: 40px;
        transition: .5s;
    }
    tr.shown td.details-control1 {
        background: url(https://www.datatables.net/examples/resources/details_close.png) no-repeat center center;
        width: 40px;
        transition: .5s;
    }
    </style>
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <!-- <div class="logo-src"></div> --><h4 class="card-title" style="font-size: 20px; text-align: center;">VEE`IO</h4>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    
            <div class="app-header__content">
                <a href='#' style='margin-left:40%' id='SignOut'><b><i class='SignOut'>Sign Out</i></b></a>
            </div>
        </div>        
        <div class="ui-theme-settings">
            <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
                <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
            </button>
            <div class="theme-settings__inner">
                <div class="scrollbar-container">
                    <div class="theme-settings__options-wrapper">
                        <h3 class="themeoptions-heading">Layout Options
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-header">
                                                    <div class="switch-animate switch-on">
                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Header
                                                </div>
                                                <div class="widget-subheading">Makes the header top fixed, always visible!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-sidebar">
                                                    <div class="switch-animate switch-on">
                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Sidebar
                                                </div>
                                                <div class="widget-subheading">Makes the sidebar left fixed, always visible!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-footer">
                                                    <div class="switch-animate switch-off">
                                                        <input type="checkbox" data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Footer
                                                </div>
                                                <div class="widget-subheading">Makes the app footer bottom fixed, always visible!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div>
                                Header Options
                            </div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class" data-class="">
                                Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Choose Color Scheme
                                    </h5>
                                    <div class="theme-settings-swatches">
                                        <div class="swatch-holder bg-primary switch-header-cs-class" data-class="bg-primary header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-secondary switch-header-cs-class" data-class="bg-secondary header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-success switch-header-cs-class" data-class="bg-success header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-info switch-header-cs-class" data-class="bg-info header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-warning switch-header-cs-class" data-class="bg-warning header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-danger switch-header-cs-class" data-class="bg-danger header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-light switch-header-cs-class" data-class="bg-light header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-dark switch-header-cs-class" data-class="bg-dark header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-focus switch-header-cs-class" data-class="bg-focus header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-alternate switch-header-cs-class" data-class="bg-alternate header-text-light">
                                        </div>
                                        <div class="divider">
                                        </div>
                                        <div class="swatch-holder bg-vicious-stance switch-header-cs-class" data-class="bg-vicious-stance header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-midnight-bloom switch-header-cs-class" data-class="bg-midnight-bloom header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-night-sky switch-header-cs-class" data-class="bg-night-sky header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-slick-carbon switch-header-cs-class" data-class="bg-slick-carbon header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-asteroid switch-header-cs-class" data-class="bg-asteroid header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-royal switch-header-cs-class" data-class="bg-royal header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-warm-flame switch-header-cs-class" data-class="bg-warm-flame header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-night-fade switch-header-cs-class" data-class="bg-night-fade header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-sunny-morning switch-header-cs-class" data-class="bg-sunny-morning header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-tempting-azure switch-header-cs-class" data-class="bg-tempting-azure header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-amy-crisp switch-header-cs-class" data-class="bg-amy-crisp header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-heavy-rain switch-header-cs-class" data-class="bg-heavy-rain header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-mean-fruit switch-header-cs-class" data-class="bg-mean-fruit header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-malibu-beach switch-header-cs-class" data-class="bg-malibu-beach header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-deep-blue switch-header-cs-class" data-class="bg-deep-blue header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-ripe-malin switch-header-cs-class" data-class="bg-ripe-malin header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-arielle-smile switch-header-cs-class" data-class="bg-arielle-smile header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-plum-plate switch-header-cs-class" data-class="bg-plum-plate header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-happy-fisher switch-header-cs-class" data-class="bg-happy-fisher header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-happy-itmeo switch-header-cs-class" data-class="bg-happy-itmeo header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-mixed-hopes switch-header-cs-class" data-class="bg-mixed-hopes header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-strong-bliss switch-header-cs-class" data-class="bg-strong-bliss header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-grow-early switch-header-cs-class" data-class="bg-grow-early header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-love-kiss switch-header-cs-class" data-class="bg-love-kiss header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-premium-dark switch-header-cs-class" data-class="bg-premium-dark header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-happy-green switch-header-cs-class" data-class="bg-happy-green header-text-light">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div>Sidebar Options</div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class" data-class="">
                                Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Choose Color Scheme
                                    </h5>
                                    <div class="theme-settings-swatches">
                                        <div class="swatch-holder bg-primary switch-sidebar-cs-class" data-class="bg-primary sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-secondary switch-sidebar-cs-class" data-class="bg-secondary sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-success switch-sidebar-cs-class" data-class="bg-success sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-info switch-sidebar-cs-class" data-class="bg-info sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-warning switch-sidebar-cs-class" data-class="bg-warning sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-danger switch-sidebar-cs-class" data-class="bg-danger sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-light switch-sidebar-cs-class" data-class="bg-light sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-dark switch-sidebar-cs-class" data-class="bg-dark sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-focus switch-sidebar-cs-class" data-class="bg-focus sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-alternate switch-sidebar-cs-class" data-class="bg-alternate sidebar-text-light">
                                        </div>
                                        <div class="divider">
                                        </div>
                                        <div class="swatch-holder bg-vicious-stance switch-sidebar-cs-class" data-class="bg-vicious-stance sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-midnight-bloom switch-sidebar-cs-class" data-class="bg-midnight-bloom sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-night-sky switch-sidebar-cs-class" data-class="bg-night-sky sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-slick-carbon switch-sidebar-cs-class" data-class="bg-slick-carbon sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-asteroid switch-sidebar-cs-class" data-class="bg-asteroid sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-royal switch-sidebar-cs-class" data-class="bg-royal sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-warm-flame switch-sidebar-cs-class" data-class="bg-warm-flame sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-night-fade switch-sidebar-cs-class" data-class="bg-night-fade sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-sunny-morning switch-sidebar-cs-class" data-class="bg-sunny-morning sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-tempting-azure switch-sidebar-cs-class" data-class="bg-tempting-azure sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-amy-crisp switch-sidebar-cs-class" data-class="bg-amy-crisp sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-heavy-rain switch-sidebar-cs-class" data-class="bg-heavy-rain sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-mean-fruit switch-sidebar-cs-class" data-class="bg-mean-fruit sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-malibu-beach switch-sidebar-cs-class" data-class="bg-malibu-beach sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-deep-blue switch-sidebar-cs-class" data-class="bg-deep-blue sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-ripe-malin switch-sidebar-cs-class" data-class="bg-ripe-malin sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-arielle-smile switch-sidebar-cs-class" data-class="bg-arielle-smile sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-plum-plate switch-sidebar-cs-class" data-class="bg-plum-plate sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-happy-fisher switch-sidebar-cs-class" data-class="bg-happy-fisher sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-happy-itmeo switch-sidebar-cs-class" data-class="bg-happy-itmeo sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-mixed-hopes switch-sidebar-cs-class" data-class="bg-mixed-hopes sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-strong-bliss switch-sidebar-cs-class" data-class="bg-strong-bliss sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-grow-early switch-sidebar-cs-class" data-class="bg-grow-early sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-love-kiss switch-sidebar-cs-class" data-class="bg-love-kiss sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-premium-dark switch-sidebar-cs-class" data-class="bg-premium-dark sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-happy-green switch-sidebar-cs-class" data-class="bg-happy-green sidebar-text-light">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div>Main Content Options</div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto active btn btn-focus btn-sm">Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Page Section Tabs
                                    </h5>
                                    <div class="theme-settings-swatches">
                                        <div role="group" class="mt-2 btn-group">
                                            <button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="body-tabs-line">
                                                Line
                                            </button>
                                            <button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="body-tabs-shadow">
                                                Shadow
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                    	<br><h4 class="card-title" id="CompanyName" style="font-size: 20px; text-align: center;">SEMICO</h4>
                    	<div id="Sidebarmenu" style="display: none;">
		                    <ul class="vertical-nav-menu">
		                        <li class="app-sidebar__heading">
		                        </li>
		                        <li class="app-sidebar__heading DashboardName">Dashboard</li>
		                        <li>
                                    <a class="mover" Reason="Dashboard" File="Dashboard">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        Dashboard
                                        <i class="metismenu-state-icon pe-7s-angle-right caret-left"></i>
                                    </a>
                                </li>
		                        <li class="app-sidebar__heading">Add / Edit</li>
		                        <li>
		                            <a>
		                                <i class="metismenu-icon pe-7s-diamond"></i>
		                                Ledgers
		                                <i class="metismenu-state-icon pe-7s-angle-right caret-left"></i>
		                            </a>
                                    <ul>
                                        <li>
                                            <a class="mover" Reason="AddNew" File="AddNew">
                                                <i class="metismenu-icon"></i>
                                                Add / Edit Criteria
                                            </a>
                                        </li>
                                        <li>
                                            <a class="mover" Reason="UserMaster" File="UserMaster">
                                                <i class="metismenu-icon"></i>
                                                User Master
                                            </a>
                                        </li>
                                    </ul>
		                        </li>
		                        <li class="app-sidebar__heading">Reports</li>
		                        <li>
		                            <a>
		                                <i class="metismenu-icon pe-7s-diamond"></i>
		                                All Reports
		                                <i class="metismenu-state-icon pe-7s-angle-right caret-left"></i>
		                            </a>
		                            <ul>
		                                <li>
		                                    <a class="mover" Reason="VehicleReport" File="Report">
		                                        <i class="metismenu-icon"></i>
		                                        Vehicle Report
		                                    </a>
		                                </li>
		                                <li>
		                                    <a class="mover" Reason="EquipmentReport" File="Report">
		                                        <i class="metismenu-icon"></i>
		                                        Equipment Report
		                                    </a>
		                                </li>
		                                <li>
		                                    <a class="mover" Reason="EmployeeReport" File="Report">
		                                        <i class="metismenu-icon"></i>
		                                        Employee Report
		                                    </a>
		                                </li>
		                                <li>
		                                    <a class="mover" Reason="ProjectReport" File="Report">
		                                        <i class="metismenu-icon"></i>
		                                        Project Report
		                                    </a>
		                                </li>
		                            </ul>
		                        </li>
		                    </ul>
		                </div>
                        <ul class="vertical-nav-menu" id="DesignerName">
                        	<li style="margin-left: 10%;"><br><br><br>Design & Developed By<br><b><i>Maan Systems Pvt Ltd</i></b><br>Email : info@maansystems.com</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner" id="MainLoader" Content="Dashboard">
                    
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./assets/scripts/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="./assets/scripts/main.js"></script>
	<script type="text/javascript" src="./assets/scripts/dataTables.keyTable.js"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>


	<script type="text/javascript" src='assets/scripts/bootstrap-notify.min.js'></script>
    <script type="text/javascript" src='assets/scripts/Autocomplete.js'></script>
    <script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
</body>
</html>
<script type="text/javascript">
function notifications(title,context,type,icon){
    $('.animated').remove();
	$.notify({
		title: '<strong>'+title+'</strong>',
		icon: icon,
		message: context
	},{
		type: type,
		animate: {
			enter: 'animated fadeInUp',
			exit: 'animated fadeOutRight'
		},
		placement: {
			from: "bottom",
			align: "right"
		},
		offset: 5,
		spacing: 10,
		z_index: 1031,
	});
}
$('#SignOut').on('click', function(){
    var queryString = window.location.search;
    split = queryString.split('?');
    authby = split[1].split('&')[0].split('=');
    $.ajax({ url:"Backend/Security/LoginProcedure.php?Logout", success: function(){ 
        if(authby[1] === 'Admin')
            location.href='Login.html'; 
        else
            location.href='SecurityLogin.php'; 
        sessionStorage.setItem('IsAdmin', false);
    } });
});
$('.mover').on('click', function(){
    $('#MainLoader').load('Pages/Admin/'+$(this).attr('Reason')+'.php');
    if(!$('.close-sidebar-btn').hasClass('is-active'))
        $('.hamburger').click();
    $('#CompanyName, #DesignerName').hide()
    /*if($('#MainLoader').attr('content') != $(this).attr('File'))
        $('#MainLoader').load('Pages/Admin/'+$(this).attr('File')+'.php');
    $('#MainLoader').attr('content',$(this).attr('File'));*/
    $('#ReportTable').hide().DataTable().clear().destroy();
});
$('.hamburger').on('click', function(){
    if(!$('.close-sidebar-btn').hasClass('is-active'))
        $('#CompanyName, #DesignerName').hide()
    else
        $('#CompanyName, #DesignerName').show()
})
$(document).ready(function(){
    if(sessionStorage.getItem('IsAdmin') === "false" || sessionStorage.getItem('IsAdmin') === null)
        window.location.href='Login.html';
    var queryString = window.location.search;
    split = queryString.split('?');
    allowedsplit = split[1].split('&');
    allowedsplit = allowedsplit[0].split('=');
    if(allowedsplit[1] == 'Transport')
        $('#MainLoader').load('Pages/Transport/AddGatePass.php');
    else if(allowedsplit[1] == 'Security')
        $('#MainLoader').load('Pages/Security/Entry.php');
    else if(allowedsplit[1] == 'Admin'){
    	$('#Sidebarmenu').show();
        $('#MainLoader').load('Pages/Admin/Dashboard.php');
    }
    $('.nav-item[customid]').hide();
    var AllowedPages = "<?php echo $_SESSION['AllowedPages']; ?>";
    $('.mover').hide();
    $.each(AllowedPages.split(','), function(index){
        $('a[Reason="'+AllowedPages.split(',')[index]+'"]').show()
    });
    //$('#MainLoader').load('Pages/Admin/Report.php');
    //$('#MainLoader').load('Pages/Transport/AddGatePass.php');
	/*notifications('Success : ','Collection Saved Successfully','success','icon-check');*/
    $.fn.dataTable.ext.errMode = 'none';
});
$(document).on('keydown', 'input', function (e) {
    if (e.which === 13) {
        if($(this).val()!='')
        var index = $(':input:not([type=hidden])').index(this) + 1;
        $(':input:not([type=hidden])').eq(index).focus();
    }
});
</script>