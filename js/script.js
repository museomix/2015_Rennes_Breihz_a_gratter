$(document).ready(function() {	
  updateQuestion(0);
	
  $('#button-ok').click(function(){
  	$('#radio-ok').prop('checked', true);
  	updateOpinions('OK');
  });
  
  $('#button-nok').click(function(){
  	$('#radio-nok').prop('checked', true);
  	updateOpinions('NOK');
  });
  
  $('#button-refresh').click(function(){
  	updateQuestion($('h1').attr('data-qid'));
  });
  
  $('#button-home').click(function(){
  	resetApp(false);
  });
  
  $('#button-reload').click(function(){
  	resetApp(true);
  });
  
  $('#button-fullscreen').click(function(){
  	var elem = document.body;
  	requestFullScreen(elem);
  });
  
  $('#button-submit').click(function(){
  	var selectedRadio = $('input[name="choix"]:checked');
  	
  	if(selectedRadio.length > 0) {
  		$.post(
  			'submit_opinion.php',
  			{opinion: {qid: $('h1').attr('data-qid'), choix: selectedRadio.val(), comment: $('#comment').val()}},
  			function(response) {
  				if(response.status == 'ok') {
  					gotoSection('confirmation');
  				}
  			}
  		);
  	}
  });
  
  $('#button-suite-message').click(function(){
	gotoSection('main-opinions');
  });

  $('#button-suite-opinions').click(function(){
	gotoSection('main-participation');
  });
});

function updateQuestion(qid) {	
  $.post(
	'get_question.php',
	{qid: qid},
	function(response) {
		if(response.status == 'ok') {
			$('h1').replaceWith('<h1 data-qid="' + response.qid + '">' + response.question + '</h1>');
		}
	}
  );
}

function updateOpinions(choix) {	
  var qid = $('h1').attr('data-qid');
  var opinions;
  var opinionsHtml;

  $('#opinions').empty();

  // on affiche d'autres ne pensent pas comme vous
  gotoSection('message');
  
  $.post(
	'get_opinions.php',
	{qid: qid, choix: choix},
	function(response) {
		if(response.status == 'ok') {
			var needsRow = false;
			var opinions = response.opinions;
			
			var opinionsHtml = '<div class="row">';
			for(var i=0; i < opinions.length; i++) {	
				if(needsRow) {
					opinionsHtml+= '</div><div class="row">';
					needsRow = false;
				}
				
				var comment = opinions[i]['comment'];
				
				//opinionsHtml+= '<li>' + opinions[i]['comment'] + ' - ' + opinions[i]['timestamp'] + '</li>';
				opinionsHtml+= '<div class="col-sm-6">';
				
				if(comment.indexOf('<img') !== 0) {
					opinionsHtml+= '<div class="opinion-text">' + comment + '</div>';
				} else {
					opinionsHtml+= comment;
				}
				
				opinionsHtml+= '</div>';
				if(i%2==1) {
					needsRow = true;
				}
			}
			opinionsHtml+= '</div>';
			
			$('#opinions').html(opinionsHtml);
			
			// Appel du changement d'écran 3s (3000ms) après la réception des données
			gotoSection('main-opinions', 6000);
		}
	}
  ) ;
}

function gotoSection(sectionId, tempo) {
	if(typeof(tempoEnCours) !== 'undefined') {
  		clearTimeout(tempoEnCours);
  	}

	if(typeof(tempo) !== 'undefined') {
		tempoEnCours = setTimeout(switchSection, tempo, sectionId);
	} else {
		switchSection(sectionId);
	}
}

function switchSection(sectionId) {
	$('.active').hide().removeClass('active');
	$('#' + sectionId).show().addClass('active');
}

function resetApp(newQuestion) {
	$('#opinions').empty();
	$('#comment').val('');
	$('#main-content input[name="choix"]').prop('checked', false);
	if(newQuestion) {
		updateQuestion($('h1').attr('data-qid'));
	}
	gotoSection('main-content');
}

function requestFullScreen(element) {
    // Supports most browsers and their versions.
    var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullscreen;

    if (requestMethod) { // Native full screen.
        requestMethod.call(element);
    } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
}