'use strict';

/////////////////////////////////////////////////////////////////////////////////////////
// FONCTIONS                                                                           //
/////////////////////////////////////////////////////////////////////////////////////////


function loadDataFromDomStorage(name)
{
    var jsonData;

    jsonData = window.localStorage.getItem(name);

    return JSON.parse(jsonData);
}

function saveDataToDomStorage(name, data)
{
    var jsonData;

    jsonData = JSON.stringify(data);

    window.localStorage.setItem(name, jsonData);
}

/////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////


    // Installation des gestionnaires d'évènements.
//     $('#add-order').on('click', onClickSaveOrder);


// function onClickSaveOrder()
// {
//     var name;
//     var id;
//     var price;
//     var quantity;

//     // Création d'un objet contact avec les données du formulaire.
    
//     quantity = $('#quantity').val();

//     var bla=[quantity];


//     var j = $( "select option:selected" ).val()

//     var k=$.getJSON(getRequestUrl()+'/mealspe?id='+j,extractJSON2);

//     function extractJSON2 (canard)
//         {
     
//          var orderdetails=[
//             canard[0]['Name'],
//             canard[0]['Id'],
//             canard[0]['SalePrice']
//          ];

//          console.log(orderdetails);

//         return orderdetails;

//         }

//     saveDataToDomStorage('commandes',quantity)
// }


    //     $('input[name=firstName]').val(),
    //     $('input[name=lastName]').val(),
    //     $('input[name=phone]').val(),
    // );

    // addressBook = loadAddressBook();

    // if($('#contact-form').data('mode') == 'add')
    // {
    //     // Mode "ajout", il faut ajouter le contact au carnet d'adresses.

    //     addressBook.push(contact);
    // }
    // else
    // {
    //     // Mode "édition", il faut modifier un contact existant.

    //     index = $('#contact-details a').data('index');

    //     addressBook[index] = contact;
    // }

    // saveAddressBook(addressBook);

    // // Mise à jour de l'affichage.
    // $('#contact-form').fadeOut('slow');
    // $('#contact-details').hide();
    // refreshAddressBook();
