$(function(){
  var $button = $('div.tabList button');
      $($button.eq(0).addClass('active').find('button').siblings('.tab-inner').hide());

      $button.click(function(){
        $($(this).find('a').attr('href')).show().siblings('.tab-inner').hide();
        $(this).addClass('active').siblings('.active').removeClass('active');
      });
});