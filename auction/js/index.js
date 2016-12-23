window.onload = function(){
	var dataViewer = new DataViewer("dataViewer");
	var dataUpdater = new DataUpdater(450, dataViewer); // 450 is the good time
	var self = this
	dataUpdater.reloadData();
	$(".fancybox").fancybox();
	this.pakageTimer = function(){
		$.ajax({
            url: "php/controller.php",
            dataType: 'html',
            type: 'POST',
            data:{ act: 'createPackage'}
        });
        window.setTimeout(function() {
            self.pakageTimer(); 	
        }, 60000);
	}
	pakageTimer();
	// var element = document.createElement("tr");
	// element.append(document.createElement("div"))
	// $('.responstable').append(element);
	// 所有其他操作供用的js都在此新增物件

	// 控制按鈕被點擊時的動作
}
