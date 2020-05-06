var productsBlock = document.querySelector("#products");
var countProducts = document.querySelector("#count_products");
var btnShowMore = document.querySelector("#show-more");
var btnPrevious = document.querySelector("#previous");
var btnNext = document.querySelector("#next");

var siteURL = "http://shop.local/";

// var siteURL = "https://shop-from-expert.000webhostapp.com/";

// var siteURL = "http://shop-expert.zzz.com.ua/";

// Если кнопки ниже существуют, то 
if (btnShowMore && btnNext && btnPrevious) {
		// Функця нажати на кнопку
		btnShowMore.onclick = function(){
			// Переменная которая меет текущее значение полей в базе
		var currentPageInput = document.querySelector("#current-page");	
		//console.log(currentPage);
		//console.log(countProducts.value);
		var ajax = new XMLHttpRequest();
			// Открываем ссылку, передавая метод запоса и саму ссылку
			ajax.open("GET", siteURL + "modules/products/get-more.php?page=" + currentPageInput.value, false);
			// Отправляем запрос
			ajax.send();
			//console.dir(ajax);
			// Прибаавляем каждый раз единицу при ажатии на кнопку "показать еще"
			currentPageInput.value = +currentPageInput.value + 1;
			// Если количество данных в базе больше текущей страниски уможенной на 6, то
			if (countProducts.value >= currentPageInput.value * 6) {
				// Отображаем следующие кнопки:
				btnNext.style.display = "block";
				btnShowMore.style.display = "block";
				btnPrevious.style.display = "block";
			} else {
				// иначе не отображаем
				btnShowMore.style.display = "none";
				btnNext.style.display = "none";
			}
				// Перезаписываем блк стоваром с добалением к последнеему новые данные (блоки с продукцией)
				productsBlock.innerHTML = productsBlock.innerHTML + ajax.response;		
	}

	btnNext.onclick = function(){
		var currentPageInput = document.querySelector("#current-page");	
		//console.log(currentPage);
		//console.log(countProducts.value);
		var ajax = new XMLHttpRequest();
			// Открываем ссылку, передавая метод запоса и саму ссылку
			ajax.open("GET", siteURL + "modules/products/get-more.php?page=" + currentPageInput.value, false);
			// Отправляем запрос
			ajax.send();
			//console.dir(ajax);
			// Прибаавляем каждый раз единицу при ажатии на кнопку "далее"
			currentPageInput.value = +currentPageInput.value + 1;
			// Если количество данных в базе больше текущей страниски уможенной на 6, то
			if (countProducts.value >= currentPageInput.value * 6) {
				// Отображаем следующие кнопки:
				btnNext.style.display = "block";
				btnShowMore.style.display = "block";
				btnPrevious.style.display = "block";
			} else {
				// иначе не отображаем
				btnShowMore.style.display = "none";
				btnNext.style.display = "none";
			}			
				// обруляем блок с товаром
				productsBlock.innerHTML = "";
				// Перезаписываем блок заноно в новыми данными
				productsBlock.innerHTML = ajax.response;
	}

	btnPrevious.onclick = function(){
		var currentPageInput = document.querySelector("#current-page");	
		//console.log(currentPage);
		//console.log(countProducts.value);
		var ajax = new XMLHttpRequest();
			currentPageInput.value = +currentPageInput.value - 1;
			// Открываем ссылку, передавая метод запоса и саму ссылку		
			ajax.open("GET", siteURL + "modules/products/get-move-back.php?page=" + currentPageInput.value, false);
			// Отправляем запрос
			ajax.send();
			//console.dir(ajax);

			
			if (currentPageInput.value > 1) {			
				btnNext.style.display = "block";
				btnShowMore.style.display = "block";
				btnPrevious.style.display = "block";

			} else {
				btnPrevious.style.display = "none";
			}
				
				productsBlock.innerHTML = "";
				productsBlock.innerHTML = ajax.response;
	}
}

// добавление товар в корзину
function addToBasket(btn) {
	//console.dir(btn.dataset.id);
	//alert("Click Basket");

	/*
		1.Сделать аякс запрос на добавление в корзину
		2. Получить данные об успешном добавлении в корзину
		3. Обовить информацию в корзине
	*/

	var ajax = new XMLHttpRequest();
		// console.log(siteURL);
		// console.log(siteURL + "modules/basket/add-basket.php");
		ajax.open("POST", siteURL + "modules/basket/addProduct.php", false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send("id=" + btn.dataset.id);

		//console.dir(ajax);

		// Преобразовывем строку ajax.response в объект
		// Основной ВАРИАНТ и ВАРИАНТ 2
	var response = JSON.parse(ajax.response);

	 // ВАРИАНТ 1
	//var response = ajax.response;
	// console.dir(response);

	// ссылаемся на счётчик корзины в шапке сайта
	var btnGoBasket = document.querySelector("#go-basket span");
		// дменяем значене счетчика корзины
		btnGoBasket.innerText = response.count;

		// ВАРИАНТ 1
		// btnGoBasket.innerText = response;
}
// Удаление товара из корзины
function deleteProductBasket(obj, id) {

	var ajax = new XMLHttpRequest();

		ajax.open("POST", siteURL + "modules/basket/delProduct.php", false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send("id=" + id);

		alert("Товар удалён!");

		// Удалить строку стоваром
		//console.dir(obj.parentNode.parentNode);
		obj.parentNode.parentNode.remove();


		// Преобразовывем строку ajax.response в объект		
	var response = JSON.parse(ajax.response);

		// ссылаемся на счётчик корзины в шапке сайта
	var btnGoBasket = document.querySelector("#go-basket span");
		// дменяем значене счетчика корзины
		btnGoBasket.innerText = response.count;
		totalCostsProductBasket();
}

// Удаление товара из корзины
function recountProductBasket(obj, id) {

	//var count = obj.value;
	var count = obj.parentNode.childNodes[5].childNodes[1].value;
	// console.dir(count);
	if (count!="" && count != 0) {
	

		var ajax = new XMLHttpRequest();

		ajax.open("POST", siteURL + "modules/basket/recountProduct.php", false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send("id=" + id + "&count=" + count);


		// Преобразовывем строку ajax.response в объект		
	var response = JSON.parse(ajax.response);

		// ссылаемся на счётчик корзины в шапке сайта
	var btnGoBasket = document.querySelector("#go-basket span");
		// дменяем значене счетчика корзины
		btnGoBasket.innerText = response.count;
	}	
	// Вызиваем функцию пресчета стоимости
	costsProductBasket(obj, id);
	
}

// Функция пересчета Стоимости товара
function costsProductBasket(obj, id) {
	//console.dir(obj);
	// console.dir(obj.parentNode.childNodes[5].childNodes[1].value);
	// console.dir(obj.parentNode.childNodes[7].innerText);
	// var cost = obj.parentNode.childNodes[5].childNodes[1].value;
	// cost *= obj.parentNode.childNodes[7].innerText;


	var ajax = new XMLHttpRequest();

		ajax.open("POST", siteURL + "modules/basket/costsProduct.php", false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send("id=" + id);

		// Преобразовывем строку ajax.response в объект		
	var response = JSON.parse(ajax.response);

	obj.parentNode.childNodes[7].innerText = response.costs;
	totalCostsProductBasket();

}

// Функция пересчета Стоимости товара
function totalCostsProductBasket() {
	//console.dir(obj);
	// console.dir(obj.parentNode.childNodes[5].childNodes[1].value);
	// console.dir(obj.parentNode.childNodes[7].innerText);
	// var cost = obj.parentNode.childNodes[5].childNodes[1].value;
	// cost *= obj.parentNode.childNodes[7].innerText;


	var ajax = new XMLHttpRequest();

		ajax.open("POST", siteURL + "modules/basket/totalCostsProduct.php", false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send();

		// Преобразовывем строку ajax.response в объект		
	var response = JSON.parse(ajax.response);

	var totalCosts = document.querySelector("#total-costs");

	totalCosts.innerText = response.total_costs;

}