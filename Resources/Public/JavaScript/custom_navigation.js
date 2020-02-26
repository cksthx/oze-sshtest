$('#main-collapse').on('show.bs.collapse', function () {
  $('#main-navi, body').addClass('nav-open');
})

$('#main-collapse').on('shown.bs.collapse', function () {
  $('#main-navi').addClass('bottom-0');
})

$('#main-collapse').on('hide.bs.collapse', function () {
  $('#main-navi, body').removeClass('nav-open');
  $('#main-navi').removeClass('bottom-0');
})
