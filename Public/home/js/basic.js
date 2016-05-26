$(function($) {

  $("#reg-btn").click( function () {

    var email = $("#useremail").val();
    var username = $("#username").val();
    var password = $("#password").val();
    var password2 = $("#password2").val();
    var tip = $("#tip");

    if (!email) {
      tip.show();
      tip.html("请输入邮箱!");
      return false;
    } else if (!username) {
      tip.show();
      tip.html("请输入用户名!");
      return false;
    } else if (!password) {
      tip.show();
      tip.html("请输入密码!");
      return false;
    } else if (password.length < 6) {
      tip.show();
      tip.html("密码长度小于6位!");
      return false;
    } else if (password !== password2) {
      tip.show();
      tip.html("两次密码输入不一致!");
      return false;
    }

    data = {
      "email" : email,
      "username" : username,
      "password" : password
    };

    $.post("register", data, function(msg) {

      if (msg.status == 1) {
        location.href = msg.url;
      } else if (msg.status == 2) {
        tip.show();
        tip.html("该邮箱已存在！");
      } else {
        tip.show();
        tip.html("这是一个未知错误，请联系管理员！");
      }

    }, "json");

  });

  $("#login-btn").click( function () {

    var tip = $("#tip");
    var userName = $("#username").val();
    var passWord = $("#password").val();

    data = {
      "username" : userName,
      "password" : passWord
    };

    $.post("login", data, function(msg) {

      if (msg.status == 1) {
        location.href = msg.url;
      } else {
        tip.show();
        tip.html(msg.test+"用户名或密码错误！");
      }

    }, "json");


  })






});