<?php $this->beginContent('@app/views/layouts/main.php'); ?>

<div class="row">
   <div class="col-md-3">
		<div class="pg-sidebar">
			<?php
				use kartik\sidenav\SideNav;
				use yii\helpers\Url;
				$type = SideNav::TYPE_PRIMARY;
				$item = "home";
                if ($this->params && !empty($this->params["item"]))
                    $item = $this->params['item'];

                echo SideNav::widget([
                    'type' => $type,
                    'encodeLabels' => false,
                    'heading' => 'Settings',
                    'items' => [
                        ['label' => 'User Roles', 'icon' => 'star', 'url' => Url::to(['/role/index', 'type'=>$type]), 'active' => ($item == 'flowers')],
                        ['label' => 'Convictions', 'icon' => 'search', 'url' => Url::to(['/convictions/index', 'type'=>$type]), 'active' => ($item == 'zones')],
                        ['label' => 'Offenses', 'icon' => 'user', 'url' => Url::to(['/offenses/index', 'type'=>$type]), 'active' => ($item == 'boys')],
                        ['label' => 'Query Types', 'icon' => 'leaf', 'url' => Url::to(['/querytype/index', 'type'=>$type]), 'active' => ($item == 'plans')],
                    ],
                ]);
			?>
		</div>      
	</div>
	<div class="col-md-9">
		<?= $content; ?>
	</div>
</div>
<?php $this->endContent(); ?>