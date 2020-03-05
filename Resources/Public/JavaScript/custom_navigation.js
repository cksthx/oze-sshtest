$('#main-collapse').on('show.bs.collapse', function () {
  $('#main-navi, body').addClass('nav-open');
})

$('#main-collapse').on('hide.bs.collapse', function () {
  $('#main-navi, body').removeClass('nav-open');
})
