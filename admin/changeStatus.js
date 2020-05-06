

var siteURL = "http://shop.local/";

// var siteURL = "https://shop-from-expert.000webhostapp.com/";

// var siteURL = "http://shop-expert.zzz.com.ua/";

function changeStatus(status, id) {

	//console.dir(obj);
	//console.dir(obj.childNodes[2].data);
	//status = obj.childNodes[2].data;
	//console.dir(status);

	var ajax = new XMLHttpRequest();

		ajax.open("POST", siteURL + "admin/changeStatus.php", false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send("id=" + id + "&status=" + status);

	var statusOrder = document.querySelector("#status-order");
		if (status== 'NEW') {
        statusOrder.innerHTML = "<span class=\"mr-5\"><i class=\"fa fa-clock-o fa-5x text-danger\"></i></span><div class=\"fa-3x text-danger text-center\">NEW</div>";
    } else if (status == 'Processing') {
        statusOrder.innerHTML = "<span class=\"mr-5\"><i class=\"fa fa-refresh fa-spin fa-5x fa-fw text-warning\"></i></span><div class=\" fa-3x text-warning text-center\">Processing</div>";
    } else if (status == 'Sent') {
        statusOrder.innerHTML = "<span class=\"mr-5\"><i class=\"fa fa-truck fa-5x fa-fw text-success\"></i></span><div class=\"fa-3x text-success text-center\">Sent</div>";
    }
    
}