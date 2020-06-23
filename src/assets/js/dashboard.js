/* enable lib feather icon */

(function () {
  'use strict'
  feather.replace()
}())

/* sidebar script */
$(function() {
  const pathname = window.location.pathname;
  if (pathname === '/pages/position.php') {
    $('#position-page').addClass('active')
    $('#setting-submenu').collapse('show')
  } else if (pathname === '/pages/department.php') {
    $('#department-page').addClass('active')
    $('#setting-submenu').collapse('show')
  } else if (pathname === '/pages/employee.php') {
    $('#employee-page').addClass('active')
    $('#setting-submenu').collapse('show')
  } else if (pathname === '/pages/building.php') {
    $('#building-page').addClass('active')
    $('#setting-submenu').collapse('show')
  } else if (pathname === '/pages/room.php') {
    $('#room-page').addClass('active')
    $('#setting-submenu').collapse('show')
  } else if (pathname === '/pages/material-type.php') {
    $('#material-type-page').addClass('active')
    $('#product-submenu').collapse('show')
  } else if (pathname === '/pages/product-type.php') {
    $('#product-type-page').addClass('active')
    $('#product-submenu').collapse('show')
  } else if (pathname === '/pages/material.php') {
    $('#material-page').addClass('active')
    $('#product-submenu').collapse('show')
  } else if (pathname === '/pages/product.php') {
    $('#product-page').addClass('active')
    $('#product-submenu').collapse('show')
  } else if (pathname === '/pages/notify-repair.php') {
    $('#notify-repair-page').addClass('active')
    $('#repair-submenu').collapse('show')
  } else if (pathname === '/pages/approve-repair.php') {
    $('#approve-repair-page').addClass('active')
    $('#repair-submenu').collapse('show')
  } else if (pathname === '/pages/assign-repair.php') {
    $('#assign-repair-page').addClass('active')
    $('#repair-submenu').collapse('show')
  } else if (pathname === '/pages/finish-repair.php') {
    $('#finish-repair-page').addClass('active')
    $('#repair-submenu').collapse('show')
  } else if (pathname === '/pages/mat-with.php') {
    $('#mat-with-page').addClass('active')
    $('#material-submenu').collapse('show')
  } else if (pathname === '/pages/mat-with-approve.php') {
    $('#mat-with-approve-page').addClass('active')
    $('#material-submenu').collapse('show')
  } else if (pathname === '/pages/product-report.php') {
    $('#product-report-page').addClass('active')
    $('#report-submenu').collapse('show')
  } else if (pathname === '/pages/product-history-report.php') {
    $('#product-history-report-page').addClass('active')
    $('#report-submenu').collapse('show')
  } else if (pathname === '/pages/product-repair-report.php') {
    $('#product-repair-report-page').addClass('active')
    $('#report-submenu').collapse('show')
  } else if (pathname === '/pages/product-inactive-report.php') {
    $('#product-inactive-report-page').addClass('active')
    $('#report-submenu').collapse('show')
  } else if (pathname === '/pages/mat-with-report.php') {
    $('#mat-with-report-page').addClass('active')
    $('#report-submenu').collapse('show')
  } else if (pathname === '/pages/mat-use-report.php') {
    $('#mat-use-report-page').addClass('active')
    $('#report-submenu').collapse('show')
  } else if (pathname === '/pages/mat-with-approve-report.php') {
    $('#mat-with-approve-report-page').addClass('active')
    $('#report-submenu').collapse('show')
  } else {
    $('#home-menu').addClass('active')
  }
});
