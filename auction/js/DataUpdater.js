function DataUpdater(timeout, dataViewer) {
    this.dataViewer = dataViewer;
    this.timeout = timeout;
    var self = this
    this.reloadData = function() {
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

        /* Refresh after timeoutSeconds */
        window.setTimeout(function() {
            self.reloadData(); 	
        }, self.timeout);
    } 
}
