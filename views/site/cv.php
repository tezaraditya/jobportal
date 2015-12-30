<?php

/* @var $this yii\web\View */


use yii\helpers\Html;





$this->title = Yii::$app->params['siteName'];
?>


<center><?= Html::a('<span class="glyphicon glyphicon-save-file"></span> Save As PDF',['savecv'],['class'=>'btn btn-primary btn-lg']) ?></center>

</br>
<div class="panel panel-default ">

  <div class="panel-body">

<center><h1>Curriculum Vitae</h1></center>

<hr/>



<?php foreach($personalData->getModels() as $data) { ?>

<h4> <?= Html::a('Personal Data <span class="glyphicon glyphicon-edit"></span>',['/users/']) ?></h4>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload Photos</h4>
      </div>
      <div class="modal-body">
        
		<?php
 echo \kato\DropZone::widget([
       'options' => [
           'url' =>Yii::$app->getUrlManager()->createUrl(['users/upload']),
           'maxFiles' => '1',
           'maxFilesize' => '1',
           'addRemoveLinks'=>true,
           'dictRemoveFile'=>'Remove',
           'acceptedFiles' => 'image/*',


       ],
       'clientEvents' => [
           'complete' => "function(file){console.log(file)}",
           'removedfile' => "function(file) {
    var name = file.name;        
    $.ajax({
        type: 'POST',
        url: 'users/deletepp',
        dataType: 'png'
    });
var _ref;
return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;        
              }",
			  
			  'thumbnailWidth' =>'150',

       ],
   ]); ?>
		
      </div>
      <div class="modal-footer">
	  <?= Html::a('Save Photos',['/'],['class'=>'btn btn-lg btn-success btn-block']) ?>
      </div>
    </div>
  </div>
</div>



<div class="col-md-3 thumbnail">
<?php if(file_exists('public/document/photos/'.Yii::$app->user->identity->id.'.png')) { ?>
<?= Html::a('<img src="'.Yii::$app->homeUrl.'/public/document/photos/'.Yii::$app->user->identity->id.'.png">',['#'],['data-toggle'=>'modal', 'data-target'=>'#myModal']) ?>

<?php } else { ?>
<?= Html::a('<img src="'.Yii::$app->homeUrl.'/public/document/usernopic.png">',['#'],['data-toggle'=>'modal', 'data-target'=>'#myModal']) ?>

<?php } ?>

</div>
<div class="col-md-9">
 <table class="table table-striped">
    
      <tbody>
        <tr>
          <td>Full Name : <?= $data->fullname ?></td>
        </tr>
		
		<tr>
          <td>Place, Date Of Birth : <?= $data->birthplace ?>, <?= date("j F Y",strtotime($data->birthdate)) ?></td>
     
        </tr>
		
		<tr>
          <td>Gender : <?= $data->gender ?></td>
       
        </tr>
		
		<tr>
          <td>Religion : <?= $data->religion ?></td>
    
        </tr>
	    <tr>
          <td>Marital Status : <?= $data->marital_status ?></td>
         
        </tr>
		
	
		
		</tbody>
		</table>
		</div>
		


<div class="col-md-12">


  

  <table class="table table-striped">
    
      <tbody>
        
			<tr>
          <td>Nationaly : <?= $data->nationaly ?></td>
   
        </tr>
		
		<tr>
          <td>Height : <?= $data->height ?> Cm</td>
    
        </tr>
		
		<tr>
          <td>Weight : <?= $data->weight ?> Kg</td>
    
        </tr>
		
		
		
	
       
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




<div class="col-md-12">

<h4><?= Html::a('Education <span class="glyphicon glyphicon-edit"></span>',['/education/']) ?></h4>
  



<table class="table table-striped">
    
      <tbody>
	  <?php foreach($education->getModels() as $edu) { ?>
        <tr>
          <td><?= date("Y",strtotime($edu->start_date)) ?> - <?= date("Y",strtotime($edu->end_date)) ?> : <?= $edu->institution ?></td>
		</tr>
		     <?php } ?>

		
	 </tbody>
    </table>
	</div>
	
	
	
<div class="col-md-12">

<h4><?= Html::a('Certifications and Awards <span class="glyphicon glyphicon-edit"></span>',['/certification/']) ?></h4>



	
	<table class="table table-striped">
	<tbody>
	  <?php foreach($certification->getModels() as $cert) { ?>
        <tr>
          <td><?= date("Y",strtotime($cert->publication_date)) ?> : <?= $cert->certification ?> - <?= $cert->institution ?></td>
		</tr>
		     <?php } ?>

		
	 </tbody>
    </table>
	</div>
	
	
	
	<div class="col-md-12">

	<h4><?= Html::a('Organizational Experiences <span class="glyphicon glyphicon-edit"></span>',['/organizational/']) ?></h4>


	

	
	<table class="table table-striped">
	<tbody>
	  <?php foreach($organizational->getModels() as $org) { ?>
        <tr>
          <td><?= date("Y",strtotime($org->start_date)) ?> - <?= date("Y",strtotime($org->end_date)) ?> : <?= $org->organizational_name ?> </td>
		</tr>
		     <?php } ?>

		
	 </tbody>
    </table>
	</div>

	
		<div class="col-md-12">

	<h4><?= Html::a('Working Experiences <span class="glyphicon glyphicon-edit"></span>',['/working/']) ?></h4>



	
	<table class="table table-striped">
	<tbody>
	  <?php foreach($working->getModels() as $work) { ?>
        <tr>
          <td><?= date("j F Y",strtotime($work->start_date)) ?> - <?= date("j F Y",strtotime($work->end_date)) ?> : <?= $work->company ?> ( <?= $work->position ?> )</td>
		</tr>
		     <?php } ?>

		
	 </tbody>
    </table>
	</div>

	
	
  </div>
</div>



<center><?= Html::a('<span class="glyphicon glyphicon-save-file"></span> Save As PDF',['savecv'],['class'=>'btn btn-primary btn-lg']) ?></center>

</br>
