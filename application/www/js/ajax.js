displayOrder();


$( "select" ).change(function () 
	{
	    var str = "";
	    var j = $( "select option:selected" ).val()

	    var j=$.getJSON(getRequestUrl()+'/mealspe?id='+j,extractJSON);

	})
  .change();	    



function extractJSON (canard)
    {
    	console.log(canard);

    	var list = $('<ul>');
	 	var li = $('<li>');



	 		list.append(li.append('<img src=http://localhost/sites/developpement/resto-vide/application/www/images/meals/'+canard['Photo']+'><p><strong>'+canard['Description']+'</p><p>'+canard['SalePrice']+'€</p>'));
		 

	 	$('#meal-details').html(list);

    }


    	$('#add-order').on('click', onClickSaveOrder);
    	$('#add-order').on('click', displayOrder);
    	$(document).on('click', '.button-cancel',deleteOrderLine);


function onClickSaveOrder(e)
{
    e.preventDefault();
    var j = $( "select option:selected" ).val()


    var k=$.getJSON(getRequestUrl()+'/mealspe?id='+j,extractJSON2);

    function extractJSON2 (canard)
        {
        	console.log(canard);
     	
	       	quantity = $('#quantity').val();

	         var orderdetails={
	            nom:canard['Name'],
	            id:canard['Id'],
	            prix:canard['SalePrice'],
	            quantite:quantity,
                photo:canard['Photo']

        		}

        var previousOrders = loadDataFromDomStorage('commandes');
        console.log('prev', previousOrders);
        console.log('ord',orderdetails);

        if (previousOrders!=null){

			for (var i = 0; i <previousOrders.length; i++) {

				if (previousOrders[i]['id']===orderdetails['id']) {

					var quantity = parseInt(previousOrders[i]['quantite']);

				console.log('quantity',parseInt(orderdetails['quantite']));

				quantity+= parseInt(orderdetails['quantite']);

				previousOrders[i]['quantite'] = quantity;

				console.log(previousOrders);

				saveDataToDomStorage('commandes',previousOrders);
					displayOrder();

					return true;
				}
			}

        previousOrders.push(orderdetails);
        saveDataToDomStorage('commandes',previousOrders); 
        displayOrder();
    	}

    	else{

    	saveDataToDomStorage('commandes',[orderdetails]);
    	displayOrder();
    	}
		
	}
}	 	


function displayOrder()
{
    var allOrders;

    // Chargement du carnet d'adresses depuis le DOM storage.
    allOrders = loadDataFromDomStorage('commandes');

    if (allOrders!==null) {

    // Est-ce qu'il n'y avait aucune donnée dans le DOM storage ?

	var list = $('<tbody>')

	var menu = $('<thead><th class="number">quantité</th><th class="number">Produit</th><th class="number">Prix Unitaire</th><th class="number">Prix Total</th>');

    for (var i = 0; i < allOrders.length; i++) {

	var li = $('<tr>');

	var prixtotal = parseFloat(allOrders[i]['quantite'])*parseFloat(allOrders[i]['prix']);

	var prixtotalarrondi = prixtotal.toFixed(2);

 	list.append(li.append('<td class="number">'+allOrders[i]['quantite']+'</td><td class="number">'+allOrders[i]['nom']+'</td><td class="number">'+allOrders[i]['prix']+' €</td><td class="number">'+prixtotalarrondi+' €</td><td><button class="button button-cancel small" data-mealid="'+allOrders[i]['id']+'"><i class="fa fa-trash"></i></td>'));

    }


    $('.generic-table').html(list);
    $('.generic-table').append(menu);
}

}

displayOrder();


function deleteOrderLine(e){

	e.preventDefault();
	var momo =$(this).data('mealid');
	console.log(momo);

    allOrders = loadDataFromDomStorage('commandes');
    console.log(allOrders);
    
    for (var index = 0; index < allOrders.length ; index++) {
    	console.log(allOrders);
    	console.log(momo);
    	if (allOrders[index]['id'] == momo) {

    		console.log(index);
    		allOrders.splice(index, 1);
    		console.log(allOrders);
    		saveDataToDomStorage('commandes',allOrders);
    	}
    }

	displayOrder();



}

/////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////


    // Installation des gestionnaires d'évènements.


