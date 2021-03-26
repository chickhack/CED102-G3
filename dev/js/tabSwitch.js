$(function(){
    var $li = $('ul.tab-title li');
        $($li.eq(0).addClass('selected').find('a').attr('href')).siblings('.tab-inner').hide();

        $li.click(function(){
          $($(this).find('a').attr('href')).show().siblings('.tab-inner').hide();
          $(this).addClass('selected').siblings('.selected').removeClass('selected');
        });
  });