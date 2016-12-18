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
            $("<tr><th>Card</th><th>Count</th><th>Reserve Price</th><th>Current Price</th><th>Deadline</th><th>Current Buyer</th><th>Bidding</th></tr>").addClass("dataViewerTableHeader"));

        if (dataArray) {
            $.each($.parseJSON(dataArray), function() {
                var deadline = new Date(this.deadline);
                deadline = msToTime(deadline.getTime() - Date.now());
                var buyer = this.account;
                if (!buyer){
                    buyer = "--";
                }
                var bindStr = "<input type=button value=\"出價 \" onClick='bidding(" + this.productid + "," + this.current_price +")'>";
                var imgPath = "<a class='fancybox' rel='group' href='img/" + this.cardid + ".jpg'><img width='80px' src='img/" + this.cardid + ".jpg' alt='' /></a>"
                table.append("<tr id=" + this.productid + "><td>" + imgPath + "</td>" + "<td>" + this.count + "</td>" + "<td>" + this.reserve_price + "</td>" + "<td>" + this.current_price + "</td>" + "<td>" + deadline + "</td>" + "<td>" + buyer + "</td>" + "<td>" + bindStr + "</td>" + "</tr>");
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

function bidding(productID, current_price){
    var price = prompt("請輸入競標價格 (以10元為最低出價) ", current_price + 10);
    if (!price){
        return;
    }
    if (price > current_price + 9){
        $.ajax({
            url: "php/controller.php",
            dataType: 'html',
            type: 'POST',
            data:{ act: 'bid', productID: productID, price: price},
            success: function(res) { //the call back function when ajax call succeed
                if(res){
                    console.log(res);
                    alert("出價成功!");
                }
                else{
                    alert("出價失敗!");
                }
            },
            error: function() { //the call back function when ajax call fails
                alert("出價失敗!");
            }
        });
    } else{
        alert("價格過低!");
    }
}