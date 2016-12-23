function DataUpdater(timeout, dataViewer) {
    this.dataViewer = dataViewer;
    this.timeout = timeout;
    var self = this
    this.reloadData = function() {
        if(location.pathname == "/auction/auction.php"){
            $.ajax({
                url: "php/controller.php",
                dataType: 'html',
                type: 'POST',
                data:{ act: 'getItem'},
                success: function(json) { //the call back function when ajax call succeed
                    dataViewer.setData(json);
                    dataViewer.update();
                },
                error: function(response) { //the call back function when ajax call fails
                    console.log('Ajax error.')
                }
            });

        } else if(location.pathname == "/auction/record.php"){
            // 取得目前競標中的商品
            $.ajax({
                url: "php/controller.php",
                dataType: 'html',
                type: 'POST',
                data:{ act: 'getBidding'},
                success: function(json) { //the call back function when ajax call succeed
                    dataViewer.setData(json);
                    dataViewer.update();
                },
                error: function(response) { //the call back function when ajax call fails
                    console.log('Ajax error.')
                }
            });

            // 取得已得標商品
            $.ajax({
                url: "php/controller.php",
                dataType: 'html',
                type: 'POST',
                data:{ act: 'getPurchased'},
                success: function(json) { //the call back function when ajax call succeed
                    dataViewer.setData(json);
                    dataViewer.update();
                },
                error: function(response) { //the call back function when ajax call fails
                    console.log('Ajax error.')
                }
            });
        }
        /* Refresh after timeoutSeconds */  
        window.setTimeout(function() {
            self.reloadData();  
        }, self.timeout);
    } 
}
