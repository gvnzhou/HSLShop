$(function($) {

  // 后台登陆
  $("#login-btn").click( function () {
    var username = $("#inputUserName").val();
    var password = $("#inputPassword").val();
    var tip = $("#tip");

    if (!username) {
      tip.show();
      tip.html("请输入用户名!");
      return false;
    } else if (!password) {
      tip.show();
      tip.html("请输入密码！");
      return false;
    }

    data = {
      "username" : username,
      "password" : password
    }

    $.post("login", data, function(msg) {

      if (msg.status == 1) {
        location.href = msg.url;
      } else if (msg.status == 0) {
        tip.show();
        tip.html("用户名或密码错误，请重新输入！");
      } else {
        tip.show();
        tip.html("这是一个未知错误，请联系管理员！");
      }

    }, "json");

  });

  $("#add_goods")[0].onsubmit = function () {
    var flag;
    $("input[type='text']").each(function () {

      if ($(this).val() == "") {
        flag = 1;  
      }

    })
     
    if (flag) {
      alert("选项不能为空！");
      return false;
    } 
  }


  

});