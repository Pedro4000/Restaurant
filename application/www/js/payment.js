    var allOrders;

    // Chargement du carnet d'adresses depuis le DOM storage.
    allOrders = loadDataFromDomStorage('commandes');





function displayOrder()
{


    if (allOrders!==null) {

    // Est-ce qu'il n'y avait aucune donnée dans le DOM storage ?
    var prixfactureHT=0;

    console.log(allOrders);
	var list = $('<tbody>')

 

	var menu = $('<thead><th>Nom</th><th class="number">Quantité</th><th class="number">Prix Unitaire</th><th class="number">Prix Total</th>');




    for (var i = 0; i < allOrders.length; i++) {

	var li = $('<tr>');

	var prixtotal = parseFloat(allOrders[i]['quantite'])*parseFloat(allOrders[i]['prix']);

	var prixtotalarrondi = prixtotal.toFixed(2);

    prixfactureHT+= prixtotal;

 	list.append(li.append('<td><img src="http://localhost/sites/developpement/resto-vide/application/www/images/meals/'+allOrders[i]['photo']+'" width="25%"><em>'+allOrders[i]['nom']+'</em></td><td class="number">'+allOrders[i]['quantite']+'</td><td class="number">'+allOrders[i]['prix']+' €</td><td class="number">'+prixtotalarrondi+' €</td>'));

    }

    var prixfactureTVA=(prixfactureHT*0.2).toFixed(2);
    console.log(prixfactureTVA);

    var prixfactureTTC=(prixfactureHT*1.2).toFixed(2);
    console.log(prixfactureTVA);

    var facture = $('<tr><td class="number" colspan="3">Total HT</td><td class="number">'+prixfactureHT+' €</td></tr><tr><td class="number" colspan="3">Total TVA</td><td class="number">'+prixfactureTVA+' €</td></tr><tr><td class="number colorful" colspan="3">Total TTC</td class="number colorful"><td class="number colorful">'+prixfactureTTC+' €</td></tr>');

    console.log(prixfactureHT);
    list.append(facture);
    $('.generic-table').html(list);
    $('.generic-table').append(menu);
}

}

displayOrder();


function hiddenValue(){


    
//        DONNER LA VALEUR A LINPUT
        var orderJSON = JSON.stringify(allOrders);
        console.log(orderJSON);
        $("input[name=hiddenOrder]").val(orderJSON);

// AUTOENREGISTER LE FORM POUR RECUP COTE PHP

return ;

}

hiddenValue();