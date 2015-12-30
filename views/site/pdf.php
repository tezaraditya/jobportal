<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;


?>


<!DOCTYPE html>
<html>
<head>

<link href="<?= Yii::$app->homeUrl ?>/public/css/site.css" rel="stylesheet">
<link href="<?= Yii::$app->homeUrl ?>/vendor/bower-asset/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

</head>
<body>




<h2  align="center">Curriculum Vitae</h2>

<hr/>



<?php foreach($personalData->getModels() as $data) { ?>

<div>



<h4><b>Personal Data</b></h4>

 <table class="table table-striped" >
    
      <tbody >
        <tr>
		
		
          <td>
		  <p>Full Name : <?= $data->fullname ?></p>
		  <p>Place, Date Of Birth : <?= $data->birthplace ?>, <?= date("j F Y",strtotime($data->birthdate)) ?></p>
		  <p>Gender : <?= $data->gender ?></p>
		  <p>Religion : <?= $data->religion ?></p>
		  <p>Marital Status : <?= $data->marital_status ?></p>
		  <p>Nationaly : <?= $data->nationaly ?></p>
		  <p>Height : <?= $data->height ?> Cm</p>
		  <p>Weight : <?= $data->weight ?> Kg</p>
		  <p></p>
		  <p></p>
		  
		  </td>
		  
		  
		  
<td align="right">
		  <?php if(file_exists('public/document/photos/'.Yii::$app->user->identity->id.'.png')) { ?>
<img width="120px" height="135px" src="<?= Yii::$app->homeUrl ?>/public/document/photos/<?= Yii::$app->user->identity->id ?>.png">

<?php } else { ?>
<img width="120px" height="135px" src="<?= Yii::$app->homeUrl ?>/public/document/noimg.jpg">

<?php } ?>

</td>

        </tr>
		</tbody>
		</table>
		</div>
		


<div>

<h4><b>Contact</b></h4>

  <table class="table table-striped" >
    
      <tbody >
	   <tr>
          <td>Address : <?= $data->identity_address ?></td>
        </tr>
		
		<tr>
          <td>Postal Code : <?= $data->postal_code ?></td>
         
        </tr>
   
		 
		
		<tr>
          <td>Phone : <?= $data->phone ?></td>
   
        </tr>
		
		<tr>
          <td>Email : <?= $data->email ?></td>
      
        </tr>
     
      </tbody>
    </table>
  </div>



<?php } ?>




<div>

<h4><b>Education</b></h4>
  



<table class="table table-striped" >
    
      <tbody>
	  <?php foreach($education->getModels() as $edu) { ?>
        <tr>
          <td><?= date("Y",strtotime($edu->start_date)) ?> - <?= date("Y",strtotime($edu->end_date)) ?> : <?= $edu->institution ?></td>
		</tr>
		     <?php } ?>

		
	 </tbody>
    </table>
	</div>
	
	
	
<div>

<h4><b>Certifications and Awards</b></h4>



	
	<table class="table table-striped" >
	<tbody>
	  <?php foreach($certification->getModels() as $cert) { ?>
        <tr>
          <td><?= date("Y",strtotime($cert->publication_date)) ?> : <?= $cert->certification ?> - <?= $cert->institution ?></td>
		</tr>
		     <?php } ?>

		
	 </tbody>
    </table>
	</div>
	
	
	
	<div>

	<h4><b>Organizational Experiences</b></h4>


	

	
	<table class="table table-striped" >
	<tbody>
	  <?php foreach($organizational->getModels() as $org) { ?>
        <tr>
          <td><?= date("Y",strtotime($org->start_date)) ?> - <?= date("Y",strtotime($org->end_date)) ?> : <?= $org->organizational_name ?> </td>
		</tr>
		     <?php } ?>

		
	 </tbody>
    </table>
	</div>

	
		<div>

	<h4><b>Working Experiences</b></h4>



	
	<table class="table table-striped" >
	<tbody>
	  <?php foreach($working->getModels() as $work) { ?>
        <tr>
          <td><?= date("j F Y",strtotime($work->start_date)) ?> - <?= date("j F Y",strtotime($work->end_date)) ?> : <?= $work->company ?> ( <?= $work->position ?> )</td>
		</tr>
		     <?php } ?>

		
	 </tbody>
    </table>
	</div>

	
<footer class="footerpdf">
<p><img height="50px" src="<?= Yii::$app->homeUrl ?>/public/resumeditor.png"></p>
</footer>


</body>
</html>