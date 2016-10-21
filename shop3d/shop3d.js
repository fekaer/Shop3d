function showProduit(id) {
    if (id == "") {
        document.getElementById("popup1").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("popup1").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getproduit.php?id="+id,true);
        xmlhttp.send();
    }
}

function showProduitsStartWith(StartWith) {
    if (StartWith == "") {
        document.getElementById("searchdiv").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		if (document.getElementById("searchdiv").innerHTML == "")		
			$("#searchdiv").hide();                
		document.getElementById("searchdiv").innerHTML = xmlhttp.responseText;
		if (!document.getElementById("searchdiv").innerHTML == "")
			$("#searchdiv").slideDown('fast');
            }
        };
	
        xmlhttp.open("GET","search.php?q="+StartWith,true);
        xmlhttp.send();
    }
}

function showProduitFromName(name) {
	if (window.XMLHttpRequest) {
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp = new XMLHttpRequest();
	}
	xmlhttp.onreadystatechange = function() {
	    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		if(xmlhttp.responseText != -1)
			$.post("jquery_post.php", //Required URL of the page on server
				{ // Data Sending With Request To Server
					idArticle:xmlhttp.responseText
				},
				function(response,status){ // Required Callback Function
					product = JSON.parse(response);
					$(".modal-body #productname").html(product[0]['nom']);
					$(".modal-body #productname2").attr('value', product[0]['nom']);
					$(".modal-body #productdescription").html(product[0]['description']);
					$(".modal-body #productprice").html(product[0]['prix']);
					$(".modal-body #productimg").attr('src', "img/img_"+product[0]['produitId']+".jpg");
					$(".modal-body #quantite").attr('max', product[0]['quantite']);
					
				});
			document.getElementById("productquantite").value="1";
			$('#myModal').modal('show');
		return
	    }
	};
	xmlhttp.open("GET","get_id.php?q="+name,true);
	xmlhttp.send();
}

function deleteRow(el) {
	var row = el.parentElement.parentElement;
	if(row.rowIndex != -1) {
		var table = document.getElementById("table_course");
		table.deleteRow(row.rowIndex);
	}
}

jQuery(document).ready(function() {

	$('#searchbar').val('');
	$('#loginwrap').hide();

	/*
	 * Login Pop
	 * Il suffit de l'afficher et de le fermer quand click
	 */

	$('.loginlink').click(function(e) {
		e.preventDefault();
		if (!$('#loginwrap').is(':visible')) {
			$('#loginwrap').fadeIn();
		} else {
			$('#loginwrap').fadeOut();
		}
	});

	//Lorsque vous cliquez sur un lien de la classe poplight
	$('a.poplight').on('click', function() {
		var popID = $(this).data('rel'); //Trouver la pop-up correspondante
		var popWidth = $(this).data('width'); //Trouver la largeur
		showProduit(1);
		//Faire apparaitre la pop-up et ajouter le bouton de fermeture
		$('#' + popID).fadeIn().css({ 'width': popWidth}).prepend('<a href="#" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>');

		//Récupération du margin, qui permettra de centrer la fenêtre - on ajuste de 80px en conformité avec le CSS
		var popMargTop = ($('#' + popID).height() + 80) / 2;
		var popMargLeft = ($('#' + popID).width() + 80) / 2;

		//Apply Margin to Popup
		$('#' + popID).css({
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});

		//Apparition du fond - .css({'filter' : 'alpha(opacity=80)'}) pour corriger les bogues d'anciennes versions de IE
		$('body').append('<div id="fade"></div>');
		$('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn();

		return false;
	});


	//Close Popups and Fade Layer
	$('body').on('click', 'a.close, #fade', function() { //Au clic sur le body...
		$('#fade , .popup_block').fadeOut(function() {
			$('#fade, a.close').remove();
	}); //...ils disparaissent ensemble

		return false;
	});


});
