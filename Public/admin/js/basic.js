$(function($) {
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
});