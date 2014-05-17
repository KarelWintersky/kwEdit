/* Привязывает стили и действия к элементу "scroll to top" */
function bindScrollTopAction(target)
{
    $(target).css('float','right').attr('title', 'Наверх').on('click', function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });
}