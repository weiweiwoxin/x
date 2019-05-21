$('#database-search').focus(function () {
    $(this).parent().addClass('focus');
    $(this).removeClass('is-clearable');
    $(this).addClass('js-navigation-enable');
    $(this).addClass('jump-to-field-active');
    $(this).addClass('jump-to-dropdown-visible');
    $('#database-search-box').attr('aria-expanded', 'true');

});

$('#database-search').blur(function () {
    $(this).parent().removeClass('focus');
    $(this).addClass('is-clearable');
    $(this).removeClass('js-navigation-enable');
    $(this).removeClass('jump-to-field-active');
    $(this).removeClass('jump-to-dropdown-visible');
    $('#database-search-box').attr('aria-expanded', 'false');
});