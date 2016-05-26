$(function($) {
  
  // 计算高度
  function countHeight() {

    var liHeight = $(".my-order-box");

    liHeight.each(function(i) {

      var liNum = $(this).find("ul").size();

      $(this).find(".order-1").css("height",160 * liNum);
      $(this).find(".order-2").css("lineHeight",160 * liNum + "px");

      console.log(liNum)
    })



  }


  function init() {
    countHeight();
  }

  init();

});