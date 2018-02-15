<?php
use dao\MeasureDao;
include 'inc/autoload.inc.php';
?>
<?php
$config = include 'inc/config.inc.php';
$measureDao = new MeasureDao($config);
$measures = $measureDao->findAllMeasures();
?>
<!doctype html>
    <html lang="fr">
    <head>
      <meta charset="utf-8">
      <title>Liste des relevees</title>
      <link rel="stylesheet" href="styles/style.css">
      <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
            crossorigin="anonymous">
    </head>
    <body>

    	<h1>Liste des relevees</h1>
    	<br />
		<div>
        	<a href="addRelevee.php" class="btn black-background text-white">
    			<span class="glyphicon glyphicon-plus text-white"></span> Ajouter un relevee
  			</a>
        </div>
		<br />

    	<table class="table table-striped">
	  		<thead>
	  			<tr>
	  				<th>#</th>
	  				<th>temperature</th>
	  				<th>humidite</th>
	  				<th>Edit</th>
	  				<th>Delete</th>
	  			</tr>
	  		</thead>
	  		<tbody>
<?php
                foreach ($measures as $measure) {
?>
	  			<tr>
	  				<th scope="row"><?php echo $measure->ID ?></th>
	  				<td><?php echo $measure->temperature ?></td>
	  				<td><?php echo $measure->humidite ?></td>

	  				<td><a href="editRelevee.php?ID=<?php echo $measure->ID ?>"><span class="glyphicon glyphicon-pencil text-black"></span></a></td>
	  				<td><a href="deleteRelevee.php?ID=<?php echo $measure->ID ?>"><span class="glyphicon glyphicon-trash text-black"></span></a></td>
	  			</tr>
<?php
                }
?>
	  		</tbody>
      	</table>

    </body>
    <script
        src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>

    <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</html>
