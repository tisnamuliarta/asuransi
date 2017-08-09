$(function() {
    // change active
    var url = window.location;
    $('ul.treeview-menu li a[href="' + url + '"]').parent().parent().parent().addClass('active');
    $('li a[href="' + url + '"]').parent().addClass('active');
});