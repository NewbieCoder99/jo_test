<link rel="stylesheet" href="{{ asset('assets/themes/materialize/plugins/materialize/css/materialize.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/themes/materialize/plugins/material-preloader/css/materialPreloader.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/plugins/datatables/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables/css/dataTables.material.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/themes/materialize/plugins/select2/css/select2.css') }}">
<link rel="stylesheet" href="{{ asset('assets/themes/materialize/css/alpha.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/themes/materialize/css/jquery.fancybox.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/themes/materialize/css/custom.css') }}">

<link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-5.3.1/css/all.min.css')}}">
<link rel="shortcut icon" type="image/png" href="">

<style type="text/css">
.panelBox {
    box-shadow: 0 2px 0 rgba(0,0,0,0.075);
    border-radius: 0;
    border: 0;
    bottom : 0;
    right : 0;
    margin-bottom: 0;
    background-color:#212121;
    color: #fff;
    position: fixed;
    width: 30%;
    z-index: 10;
}
.panelBox .panelBox-heading, .panelBox>:first-child {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.panelBox-heading {
    position: relative;
    height: 50px;
    padding: 0;
    border-bottom:1px solid #eee;
}
.panelBox-control {
    height: 100%;
    position: relative;
    float: right;
    padding: 0 15px;
}
.panelBox-title {
    font-weight: normal;
    padding: 0 20px 0 20px;
    font-size: 1.416em;
    line-height: 50px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.panelBox-control>.btn:last-child, .panelBox-control>.btn-group:last-child>.btn:first-child {
    border-bottom-right-radius: 0;
}
.panelBox-control .btn, .panelBox-control .dropdown-toggle.btn {
    border: 0;
}
.nano {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
}
.nano>.nano-content {
    position: absolute;
    overflow: scroll;
    overflow-x: hidden;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}
.pad-all {
    padding: 15px;
}
.mar-btm {
    margin-bottom: 15px;
}
.media-block .media-left {
    display: block;
    float: left;
}
.media-block .media-body {
    display: block;
    overflow: hidden;
    width: auto;
}
.pad-hor {
    padding-left: 15px;
    padding-right: 15px;
}

.media-block .media-right {
    float: right;
}

.pad-hor {
    padding-left: 15px;
    padding-right: 15px;
}
.nano>.nano-pane {
    background-color: rgba(0,0,0,0.1);
    position: absolute;
    width: 5px;
    right: 0;
    top: 0;
    bottom: 0;
    opacity: 0;
    -webkit-transition: all .7s;
    transition: all .7s;
}
</style>