<?php
// $newsList = [

// [ 'title'=> 'Camper del giorno', 'date' => '2016-07-28' ],
// [ 'title' => 'Camping del secolo', 'date' => '2016-09-01' ],
// [ 'title' => 'Regalo MotorHome', 'date' => '2016-07-20' ] 

// ]; 



$this->title = 'elenco news';
$this->params['breadcrumbs'][] = $this->title;
?>
<h2>tabella notizie 1</h2>
<table class="table"> <tr>

	<th>Title</th>
	<th>Date</th> </tr>
	<?php foreach($newsList as $item) { ?> 
	<tr>
	<td><?= $item['title'] ?></td>
	<td><?php echo $item['date'] ?></td> 
	</tr>
	<?php } ?> 
</table>



<?php 

/**/
 ?>
<h2>tabella notizie 2</h2>

<table class="table">
<tr> <th>Title</th> <th>Date</th></tr>

<?php foreach($newsList as $item) { ?> 
<tr>
<th><a href="<?php echo Yii::$app->urlManager->createUrl(['news/item-detail' , 'title' => $item['title']]) ?>"><?php echo $item['title'] ?></a></th>
<th><?php echo Yii::$app->formatter->asDatetime($item['date'], "php:d/m/Y"); ?></th> </tr>
<?php } ?> 
</table>




<?php echo $this->context->renderPartial('_copyright'); ?>


<?php 

/*

<h2>tabella notizie 3</h2>

<table class="table">
<tr> <th>Title</th> <th>Date</th></tr>

<?php foreach($newsList as $item) { ?> 
<tr>
<th><a href="<?php echo Yii::$app->urlManager->createUrl(['news/item-detail' , 'id' => $item['id']]) ?>"><?php echo $item['title'] ?></a></th>
<th><?php echo Yii::$app->formatter->asDatetime($item['date'], "php:d/m/Y"); ?></th>
</tr>
<?php } ?> 
</table>

*/

 ?>


