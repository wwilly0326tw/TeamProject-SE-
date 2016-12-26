function DataViewer(dataViewerId) {
    this.dataList = {};
    this.dataViewer = $("." + dataViewerId);
    this.table1 = $("." + dataViewerId + "#table1");
    this.table2 = $("." + dataViewerId + "#table2");
    this.setData = function(json, type) {
        this.dataList = json;
        this.type = type;
    };

    this.update = function() {
        var table1 = this.table1;
        var table2 = this.table2;
        var dataArray = this.dataList;
        var pathname = location.pathname;
        if(pathname.search("/auction/auction.php") != -1){
            table1.find("tr").remove();
            table2.find("tr").remove();
            table1.append(
                $("<tr><th><h4>Package</h4></th><th><h4>Reserve Price</h4></th><th><h4>Current Price</h4></th><th><h4>Deadline</h4></th><th><h4>Current Buyer</h4></th><th><h4>Buy</h4></th></tr>").addClass("dataViewerTableHeader"));
            table2.append(
                $("<tr><th><h4>Card</h4></th><th><h4>Count</h4></th><th><h4>Reserve Price</h4></th><th><h4>Current Price</h4></th><th><h4>Deadline</h4></th><th><h4>Current Buyer</h4></th><th><h4>Bidding</h4></th></tr>").addClass("dataViewerTableHeader"));

            if (dataArray) {
                $.each($.parseJSON(dataArray), function() {
                    var deadline = new Date(this.deadline);
                    deadline = msToTime(deadline.getTime() - Date.now());
                    var buyer = this.account;
                    if (!buyer){
                        buyer = "--";
                    }
                    // var bindStr = "<input type=button value=\"出價 \" onClick='bidding(" + this.productid + "," + this.current_price +")'>";
                    if (this.sellerid == 1){
                        var imgPath = "<a class='fancybox' rel='group' href='img/" + this.cardid + ".jpg'><img width='80px' src='img/" + this.cardid + ".jpg' alt='' /></a>"
                        // var buyStr = "<a href='javascript:;' onClick='buyPackage(" + this.productid + "," + this.current_price +")'><img src='./img/buy.png' width='50' height='50'></a>";
                        var buyStr = "<span style='cursor:pointer' onClick='buyPackage(" + this.productid + "," + this.current_price +")'><img src='./img/buy.png' width='50' height='50'></span>";
                        table1.append("<tr id=" + this.productid + "><td>" + imgPath + "</td>" + "<td><h3>" + this.reserve_price + "</h3></td>" + "<td><h3>" + this.current_price + "<h3></td>" + "<td><h3><b>" + deadline + "<b></h3></td>" + "<td><h3>" + buyer + "<h3></td>" + "<td>" + buyStr + "</td>" + "</tr>");
                    }
                    else{
                        // var bindStr = "<a href='javascript:;' onClick='bidding(" + this.productid + "," + this.current_price +")'><img src='./img/auction.png' width='50' height='50'></a>";
                        var bindStr = "<span style='cursor:pointer' onClick='bidding(" + this.productid + "," + this.current_price +")'><img src='./img/auction.png' width='50' height='50'></span>";
                        var imgPath = "<a class='fancybox' rel='group' href='img/" + this.cardid + ".jpg'><img style='border:2px solid #FFFF33' width='80px' src='img/" + this.cardid + ".jpg' alt='' /></a>"
                        table2.append("<tr id=" + this.productid + "><td>" + imgPath + "</td>" + "<td><h3>" + this.count + "<h3></td>" + "<td><h3>" + this.reserve_price + "</h3></td>" + "<td><h3>" + this.current_price + "<h3></td>" + "<td><h3><b>" + deadline + "<b></h3></td>" + "<td><h3>" + buyer + "<h3></td>" + "<td>" + bindStr + "</td>" + "</tr>");
                    }
                })
            }
        } else if(pathname.search("/auction/record.php") != -1){
            if (dataArray) {
                // if($.parseJSON(dataArray)['0']['rid']){
                if(this.type == 2){
                    table2.find("tr").remove();
                    table2.append($("<tr><th><h4>Card</h4></th><th><h4>Count</h4></th><th><h4>Price</h4></th><th><h4>Time</h4></th></tr>").addClass("dataViewerTableHeader"));
                    $.each($.parseJSON(dataArray), function() {
                        var imgPath = "<a class='fancybox' rel='group' href='img/" + this.cardid + ".jpg'><img ";
                        if(this.cardid != "0"){
                            imgPath += "style='border:2px solid #FFFF33'";
                        }
                        imgPath += " width='80px' src='img/" + this.cardid + ".jpg' alt='' /></a>";
                        table2.append("<tr><td>" + imgPath + "</td>" + "<td><h3>" + this.count + "<h3></td><td><h3>" + this.price + "<h3></td>" + "<td><h3><b>" + this.time + "<b></h3></td>" + "</tr>");
                    })
                }else if(this.type == 1){
                    table1.find("tr").remove();
                    table1.append($("<tr><th><h4>Card</h4></th><th><h4>Count</h4></th><th><h4>Reserve Price</h4></th><th><h4>Current Price</h4></th><th><h4>Deadline</h4></th><th><h4>Current Buyer</h4></th><th><h4>Bidding</h4></th></tr>").addClass("dataViewerTableHeader"));
                    $.each($.parseJSON(dataArray), function() {
                        var deadline = new Date(this.deadline);
                        deadline = msToTime(deadline.getTime() - Date.now());
                        var bindStr = "<span style='cursor:pointer' onClick='bidding(" + this.productid + "," + this.current_price +")'><img src='./img/auction.png' width='50' height='50'></span>";
                        var imgPath = "<a class='fancybox' rel='group' href='img/" + this.cardid + ".jpg'><img style='border:2px solid #FFFF33' width='80px' src='img/" + this.cardid + ".jpg' alt='' /></a>"
                        table1.append("<tr id=" + this.productid + "><td>" + imgPath + "</td>" + "<td><h3>" + this.count + "<h3></td>" + "<td><h3>" + this.reserve_price + "</h3></td>" + "<td><h3>" + this.current_price + "<h3></td>" + "<td><h3><b>" + deadline + "<b></h3></td>" + "<td><h3>" + this.account + "<h3></td>" + "<td>" + bindStr + "</td>" + "</tr>");
                    })
                }
            }
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
    if (price < current_price + 10){
        alert("價格過低.");
        return;
    }
    if (price > current_price + 9){
        $.ajax({
            url: "php/controller.php",
            dataType: 'html',
            type: 'POST',   
            data:{ act: 'bid', productID: productID, price: price},
            success: function(res) { //the call back function when ajax call succeed
                if(res == 1){
                    alert("出價成功!");
                }
                else if(res == 2){
                    alert("金錢不足!");
                }
                else if(res == 3){
                    alert("不可購買自己的物品!");
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

function buyPackage(productID, current_price){
    if(confirm("確定購買?")){
        $.ajax({
            url: "php/controller.php",
            dataType: 'html',
            type: 'POST',
            data:{ act: 'lottery', productID: productID, price: current_price},
            success: function(json) { //the call back function when ajax call succeed
                if(json == 1){
                    alert("You don't have enough money.");
                    return;
                }
                // 放入三張抽到的卡片
                var lotteryDiv = $(".lottery");
                lotteryDiv.find("img").remove();
                json = $.parseJSON(json);
                var imgStr = "<a class='fancybox' rel='group' href='img/" + json[0] + ".jpg'><img width=120px height=180px style='border:2px solid #FFFF33' src='img/" + json[0] + ".jpg' alt='' /></a>"
                lotteryDivLeft = $(".lottery #left");
                lotteryDivLeft.append(imgStr);
                var imgStr = "<a class='fancybox' rel='group' href='img/" + json[1] + ".jpg'><img width=120px height=180px style='border:2px solid #FFFF33' src='img/" + json[1] + ".jpg' alt='' /></a>"
                lotteryDivCenter = $(".lottery #center");
                lotteryDivCenter.append(imgStr);
                var imgStr = "<a class='fancybox' rel='group' href='img/" + json[2] + ".jpg'><img width=120px height=180px style='border:2px solid #FFFF33' src='img/" + json[2] + ".jpg' alt='' /></a>"
                lotteryDivRight = $(".lottery #right");
                lotteryDivRight.append(imgStr);

                //更新頁面金錢
                var cash = $("#cash").attr("value") - current_price;
                $("#cash").text(" $" + cash);
            },
            error: function(response) { //the call back function when ajax call fails
                alert("購買失敗!")
            }
        });
    } else{
        return;
    }
}