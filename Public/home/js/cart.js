// 购物车js处理程序
$(function($){
  
  // 修改商品数量，同时更新价格
  function updatePrice(ipt) {

    var goodsTotalPrice;
    var goodsNum = ipt.value;
    var goodsId = ipt.className;
    var goodsPrice = ipt.dataset.price;

    goodsTotalPrice = goodsPrice * goodsNum;

    $(ipt).parent().siblings(".price-total").find("span").html(goodsTotalPrice.toFixed(2));

    updateSession(goodsId, goodsNum);
    countTotalPrice();

  }


  // 更新购物车SESSION 
  function updateSession(goodsId, goodsNum) {

    data = {
      "goodsnum" : goodsNum,
      "goodsid" : goodsId
    };

    $.post("updateGoodsNum", data, function(msg) {
      if (msg== 1) {
        //alert("ok")
      } 
    }, "json");
  }


  // 统计购物车中商品总价
  function countTotalPrice() {

    // 显示购物车商品总价
    var totalPriceShow = $("#totalprice");

    // 记录购物车商品总价
    var cartTotalPrice;

    var goodsNumIpt = $(".goods-num input");

    goodsNumIpt.each(function(i){
      
      var goodsNum = this.value;

      var goodsPrice = this.dataset.price;

      var goodsTotalPrice = goodsNum * goodsPrice;

      cartTotalPrice = cartTotalPrice ? cartTotalPrice + goodsTotalPrice : goodsTotalPrice;

    });

    totalPriceShow.html("￥" + cartTotalPrice.toFixed(2));
  }


  // 添加修改商品数量时的逻辑处理
  function addIptHandle() {

    var goodsNumIpt = $(".goods-num input");

    goodsNumIpt.each(function(i){

      $(this).keyup(function() {

        updatePrice(this);

      })

    });

  }

  // 初始化
  function init() {
    addIptHandle();
  }

  init();

});