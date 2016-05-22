<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Breizh à gratter, un espace de débat sans pincettes | #breizhagratter</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Custom BAG -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="home-button btn-group">
    	<button type="button" id="button-home" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></button>
    	<button type="button" id="button-fullscreen" class="btn btn-default"><i class="glyphicon glyphicon-fullscreen"></i></button>
    </div>
    <div id="main-content" class="interpellation active">
	    <h1></h1>
	    <button type="button" id="button-ok" class="btn btn-default btn-big">J'approuve !!!</button>
	    <button type="button" id="button-nok" class="btn btn-default btn-big">Je m'insurge !!!</button>
	    <button type="button" id="button-refresh" class="btn btn-default btn-big">Tu as autre chose ?</button>
	    <input type="radio" id="radio-ok" class="hide" name="choix" value="OK">
	    <input type="radio" id="radio-nok" class="hide" name="choix" value="NOK">
    </div>

    <!-- affichage du message de contradiction -->
    <div id="message" class="contradiction-init" style="display:none;">
    	<h2>D'autres ne sont pas d'accord avec vous !</h2>
	<button type="button" id="button-suite-message" class="btn btn-default btn-big">Et qu'est-ce qu'ils disent ?</button>
    </div>

    <!-- affichage des opinions -->
    <div id="main-opinions" class="contradiction" style="display:none;">
    	<div id="opinions"></div>
	<button type="button" id="button-suite-opinions" class="btn btn-default btn-big">Je veux m'exprimer</button>
    </div>

    <!-- affichage participation -->
    <div id="main-participation" class="contribution" style="display:none;">
    	<textarea rows="5" id="comment" cols="100" placeholder="Dites ce que vous avez à dire..." maxlength="1255"></textarea>
	<br/>
	<button type="button" id="button-submit" class="btn btn-default btn-big">Voilà ! J'ai dit !</button>
    </div>

    <div id="confirmation" class="message" style="display:none;">
    	<h2>Merci d'avoir participé au débat !</h2>
    	<button type="button" id="button-reload" class="btn btn-default btn-big">Encore ! Ça me démange...</button>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
