document.addEventListener('DOMContentLoaded', function(){
  var pwd = document.getElementById('pwd');
  var pwdRepeat = document.getElementById('pwd-repeat');
  var pwdInfo = document.getElementById('pwdInfo');
  function check(){
    if (pwd.value!=pwdRepeat.value) {
      pwd.style.backgroundColor="pink";
      pwdRepeat.style.backgroundColor="pink";
      pwdInfo.innerHTML="Hasła muszą być takie same!"
    }else {
      pwdInfo.innerHTML="";
      pwd.style.backgroundColor="white";
      pwdRepeat.style.backgroundColor="white";
    }
  }
  pwdRepeat.addEventListener("focus",function(){
      pwdRepeat.addEventListener("keyup",function(){
        check();
      });
  });
});
