<?php
use dao\MeasureDao;
use service\UserService;
use domain\Measure;
include 'inc/autoload.inc.php';
?>
<?php
$config = include 'inc/config.inc.php';
$measureDao = new MeasureDao($config);
$userService = new UserService();
$validationErrors = [];
$measure = null;
$ID = "";
$temperature = "";
$humidite = "";

if (!empty($_GET["ID"])) {

    $ID = $_GET["ID"];

    $measure = $measureDao->findMeasureById($ID);
    $temperature = $user->temperature;
    $humidite = $user->humidite;
}
else if (!empty($_POST)) {

    $ID = $_POST["ID"];
    $temperature = $_POST["temperature"];
    $humidite = $_POST["humidite"];

    $measure = new Measure($ID, $temperature, $humidite);

    $validationErrors = $userService->isValid($measure);

    if (empty($validationErrors)) {

        $measureDao->updateMeasure($measure, $ID);

        header("Location: relevee.php");
    }
}
?>
<!doctype html>
    <html lang="fr">
    <head>
      <meta charset="utf-8">
      <title>Update Relevee</title>
      <link rel="stylesheet" href="styles/style.css">
      <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
            crossorigin="anonymous">
    </head>
    <body>

    	<h1>Update User</h1>

    	<form method="post" action="editUser.php">
    		<input type="hidden" name="ID" value="<?php echo $ID; ?>" />
        	<div class="form-group">
            	<label for="temperature">temperature *</label>
            	<input type="text" class="form-control standardWidth" id="temperature" name="temperature" value="<?php echo $temperature; ?>">
            	<?php
            	if (!empty($validationErrors["measure.temperature"])) {
            	?>
                <span class="label label-danger"><?php echo $validationErrors["measure.temperature"]; ?></span>
                <?php
            	}
                ?>
          	</div>

          	<div class="form-group">
            	<label for="humidite">humidite *</label>
            	<input type="text" class="form-control standardWidth" id="humidite" name="humidite" value="<?php echo $humidite; ?>">
            	<?php
            	if (!empty($validationErrors["measure.humidite"])) {
            	?>
                <span class="label label-danger"><?php echo $validationErrors["measure.humidite"]; ?></span>
                <?php
            	}
                ?>
          	</div>

          	<button type="submit" class="btn btn-default">Update</button>
        </form>


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
