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
  } else {
    $('#home-menu').addClass('active')
  }
});
