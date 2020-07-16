/* enable lib feather icon */

(function () {
  'use strict'
  feather.replace()
}())

/* sidebar script */
$(function() {
  const pathname = window.location.pathname;
  if (/position/ig.test(pathname)) {
    $('#position-page').addClass('active')
    $('#setting-submenu').collapse('show')
  } else if (/department/ig.test(pathname)) {
    $('#department-page').addClass('active')
    $('#setting-submenu').collapse('show')
  } else if (/employee/ig.test(pathname)) {
    $('#employee-page').addClass('active')
    $('#setting-submenu').collapse('show')
  } else if (/building/ig.test(pathname)) {
    $('#building-page').addClass('active')
    $('#setting-submenu').collapse('show')
  } else if (/room/ig.test(pathname)) {
    $('#room-page').addClass('active')
    $('#setting-submenu').collapse('show')
  } else if (/material-type/ig.test(pathname)) {
    $('#material-type-page').addClass('active')
    $('#product-submenu').collapse('show')
  } else if (/product-type/ig.test(pathname)) {
    $('#product-type-page').addClass('active')
    $('#product-submenu').collapse('show')
  } else if (/material/ig.test(pathname)) {
    $('#material-page').addClass('active')
    $('#product-submenu').collapse('show')
  } else if (/product/ig.test(pathname)) {
    $('#product-page').addClass('active')
    $('#product-submenu').collapse('show')
  } else if (/notify-repair/ig.test(pathname)) {
    $('#notify-repair-page').addClass('active')
    $('#repair-submenu').collapse('show')
  } else if (/approve-repair/ig.test(pathname)) {
    $('#approve-repair-page').addClass('active')
    $('#repair-submenu').collapse('show')
  } else if (/assign-repair/ig.test(pathname)) {
    $('#assign-repair-page').addClass('active')
    $('#repair-submenu').collapse('show')
  } else if (/finish-repair/ig.test(pathname)) {
    $('#finish-repair-page').addClass('active')
    $('#repair-submenu').collapse('show')
  } else if (/mat-with/ig.test(pathname)) {
    $('#mat-with-page').addClass('active')
    $('#material-submenu').collapse('show')
  } else if (/mat-with-approve/ig.test(pathname)) {
    $('#mat-with-approve-page').addClass('active')
    $('#material-submenu').collapse('show')
  } else if (/product-report/ig.test(pathname)) {
    $('#product-report-page').addClass('active')
    $('#report-submenu').collapse('show')
  } else if (/product-history-report/ig.test(pathname)) {
    $('#product-history-report-page').addClass('active')
    $('#report-submenu').collapse('show')
  } else if (/product-repair-report/ig.test(pathname)) {
    $('#product-repair-report-page').addClass('active')
    $('#report-submenu').collapse('show')
  } else if (/product-inactive-report/ig.test(pathname)) {
    $('#product-inactive-report-page').addClass('active')
    $('#report-submenu').collapse('show')
  } else if (/mat-with-report/ig.test(pathname)) {
    $('#mat-with-report-page').addClass('active')
    $('#report-submenu').collapse('show')
  } else if (/mat-use-report/ig.test(pathname)) {
    $('#mat-use-report-page').addClass('active')
    $('#report-submenu').collapse('show')
  } else if (/mat-with-approve-report/ig.test(pathname)) {
    $('#mat-with-approve-report-page').addClass('active')
    $('#report-submenu').collapse('show')
  } else {
    $('#home-menu').addClass('active')
  }
});
