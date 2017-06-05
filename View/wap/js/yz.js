    //验证密码（长度在8个字符到16个字符）
    function checkPassword(){
        var password=document.getElementById("password").value.trim();
        var repassword=document.getElementById("repassword").value.trim();
        //var password=$("#password").value;
        $("#passwordInfo").innerHTML="";
        //密码长度在8个字符到16个字符，由字母、数字和".""-""_""@""#""$"组成
        //var passwordRegex=/^[0-9A-Za-z.\-\_\@\#\$]{8,16}$/;
        //密码长度在8个字符到16个字符，由字母、数字和"_"组成
        var passwordRegex=/^[0-9A-Za-z_]\w{7,15}$/;
        if(!passwordRegex.test(password)){
            document.getElementById("passwordInfo").innerHTML="密码长度必须在8个字符到16个字符之间";
        }else{
            document.getElementById("passwordInfo").innerHTML="";
        };
        //校验密码和上面密码必须一致
        if(repassword !== password){
            document.getElementById("repasswordInfo").innerHTML="两次输入的密码不一致";
        }else if(repassword == password){
            document.getElementById("repasswordInfo").innerHTML="";
        }
    }
    
    function checkUserName(){
        var name=document.getElementById("user-name").value.trim();
        var nameRegex=/^[^@#]{3,16}$/;
        if(!nameRegex.test(name)){
            document.getElementById("nameInfo").innerHTML="用户名为3~16个字符，且不能包含”@”和”#”字符";
        }else{
            document.getElementById("nameInfo").innerHTML="";
            return true;
        }

    }

    function validate_email(field,alerttxt){ with(field)
    {
        apos=value.indexOf("@")
        dotpos=value.lastIndexOf(".")
        if (apos<1||dotpos-apos<2) 
        {
            alert(alerttxt);
            return false
        }
        else {
            return true
        }
        }
    }

    function validate_form(thisform){
        with (thisform)
        {
        if (validate_email(email,"请输入正确的邮箱地址!")==false)
          {email.focus();return false}
        }
    }
