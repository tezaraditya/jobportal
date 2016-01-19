<?php
use yii\helpers\Html;
use yii\data\ActiveDataProvider;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>


    <div class="panel panel-default ">

      <div class="panel-body">

    <center><h1>Curriculum Vitae</h1></center>

    <hr/>

<?php
//Select personalData
$personalData = new ActiveDataProvider([
       'query' => \app\models\Users::find()->where(['id_user'=>Yii::$app->user->identity->id]),
   ]);
// Select education
$education = new ActiveDataProvider([
       'query' => \app\models\Education::find()->where(['id_user'=>Yii::$app->user->identity->id]),
   ]);
//Select certification
$certification = new ActiveDataProvider([
       'query' => \app\models\Certification::find()->where(['id_user'=>Yii::$app->user->identity->id]),
   ]);
//Select organizational
$organizational = new ActiveDataProvider([
       'query' => \app\models\Organizational::find()->where(['id_user'=>Yii::$app->user->identity->id]),
   ]);
//Select working
$working = new ActiveDataProvider([
       'query' => \app\models\Working::find()->where(['id_user'=>Yii::$app->user->identity->id]),
   ]);




 ?>

    <?php foreach($personalData->getModels() as $data) { ?>

    <h4>Personal Data</h4>






    <div class="col-md-3 thumbnail">

    <img src="<?= Yii::$app->homeUrl; ?>/public/document/photos/<?= Yii::$app->user->identity->id; ?>.png"> 



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

    <h4>Education</h4>




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

    <h4>Certifications and Awards</h4>




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

    	<h4>Organizational Experiences</h4>





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

    	<h4>Working Experiences</h4>




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




    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
