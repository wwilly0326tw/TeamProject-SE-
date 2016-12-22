function regist(name, pwd){
	$.ajax({
            url: "php/controller.php",
            dataType: 'html',
            type: 'POST',
            data:{ act: 'regist', name: name, pwd: pwd},
            success: function(retMessage) { //the call back function when ajax call succeed
                if(retMessage == "Success"){
                	var ele = $("#wraper");
                	ele.empty();
                	ele.append("<h1><span>Regist Success.</span>");
                	setTimeout(function(){
                		window.location = "index.php";
                	}, 1000);
                } else{
                	var ele = $('#errorMsg');
                	ele.text(retMessage);
                }
            },
            error: function(retMessage) { //the call back function when ajax call fails
                console.log('Regist Ajax error.')
            }
    });
}