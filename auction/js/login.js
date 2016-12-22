function login(name, pwd){
	$.ajax({
            url: "php/controller.php",
            dataType: 'html',
            type: 'POST',
            data:{ act: 'login', name: name, pwd: pwd},
            success: function(retMessage) { //the call back function when ajax call succeed
                if(retMessage != "Success"){
                	var ele = $("#wraper");
                	ele.empty();
                	ele.append("<h1><span id='errorMsg'>" + retMessage + "</span>");
                	setTimeout(function(){
                		window.location = "index.php";
                	}, 1000);
                } else{
                    window.location = "auction.php";
                }
            },
            error: function(retMessage) { //the call back function when ajax call fails
                console.log('Login Ajax error.')
            }
    });
}