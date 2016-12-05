function DataViewer(dataViewerId) {
    this.dataList = {};
    this.dataViewer = $("." + dataViewerId);
    this.setData = function(json) {
        this.dataList = json;
    };

    this.update = function() {

        this.dataViewer.find("tr").remove();
        var table = $("." + dataViewerId).addClass("dataViewerTable");
        var dataArray = this.dataList;

        table.append(
            $("<tr><th>Card Name</th><th>Count</th><th>Reserve Price</th><th>Current Price</th><th>Deadline</th><th>Current Buyer</th><th>Bidding</th></tr>").addClass("dataViewerTableHeader"));

        if (dataArray) {
            $.each($.parseJSON(dataArray), function() {
                var deadline = new Date(this.deadline);
                deadline = msToTime(deadline.getTime() - Date.now());
                table.append("<tr id=" + this.productid + "><td>" + this.cardid + "</td>" + "<td>" + this.count + "</td>" + "<td>" + this.current_price + "</td>" + "<td>" + this.reserve_price + "</td>" + "<td>" + deadline + "</td>" + "<td>" + this.buyerid + "</td>" + "<td>Bidding</td>" + "</tr>")
            })
        }
    };
}

function msToTime(s) {
    var ms = s % 1000;
    s = (s - ms) / 1000;
    var secs = s % 60;
    s = (s - secs) / 60;
    var mins = s % 60;
    var hrs = (s - mins) / 60;

    return hrs + ':' + mins + ':' + secs;
}
