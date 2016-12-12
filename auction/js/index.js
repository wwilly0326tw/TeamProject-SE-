window.onload = function(){
	var dataViewer = new DataViewer("dataViewer");
	var dataUpdater = new DataUpdater(200, dataViewer); // 200 is the good time
	dataUpdater.reloadData();
	// var element = document.createElement("tr");
	// element.append(document.createElement("div"))
	// $('.responstable').append(element);
	// 所有其他操作供用的js都在此新增物件

	// 控制按鈕被點擊時的動作
}
