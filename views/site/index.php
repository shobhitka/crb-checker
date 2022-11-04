<?php
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'CRB Checker';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
		<h1 class="display-8">Welcome to the CRB Checker Application</h1>
		<?php
			if (Yii::$app->user->isGuest)
				$button_lbl = "Login to the Application";
			else
				$button_lbl = "Start a new CRB Query";

			echo Html::a($button_lbl, ['/site/login'], ['class'=>'btn btn-lg btn-success']);
		?>
    </div>

	<div class="body-content">
		<p> <h1 align="center">CRB Checker - Team</h1></p>
        <div class="row">
            <div class="col-lg-6" align="center">
				Shobhit Kumar (Team Lead)<br>
				Anushrav Mishra<br>
				Boddu Sravani<br>
				Debabrat Rath<br>
				Himanshu Kumar
			</div>
            <div class="col-lg-6" align="center">
				Kachalla Sai Kumar<br>
				Nivethika R<br>
				Praneesh P<br>
				Praneeth Kumar M<br>
				Shayar Choksi
			</div>
		</div>
		<br><br>

        <div class="row">
			<h2 align="center">Relational Schema</h2>
			<?php echo Html::img('@web/images/relational-schema.png', ['alt' => 'Relational Schema','width=>10','height=>10']) ?>
        </div><br><br>
        <div class="row">
			<h2 align="center">ER Diagram</h2>
			<?php echo Html::img('@web/images/ER-Diagram-Final.png', ['alt' => 'ER Diagram','width=>10','height=>10']) ?>
		</div>

    </div>
</div>
