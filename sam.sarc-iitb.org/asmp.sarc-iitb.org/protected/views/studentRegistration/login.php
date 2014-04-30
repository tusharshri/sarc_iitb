<?php
$this->breadcrumbs=array(
	'Student Registration'=>array('/studentRegistration'),
	'Login',
);?>
<h1>Login with LDAP</h1>


<style type="text/css">
    .errorSummary{
        border: 1px solid #C00;
padding: 7px 7px 12px 7px;
margin: 0 0 20px 0;
background: #FEE;
font-size: 0.9em;
    }
</style>

<?php if($error==true){ ?>
    <div class="errorSummary">
        <p><?php if($error=="invalid"){ echo "Unkown Username Or Password"; } if($error=="notfound"){ echo "User Not found"; }?> </p>
    </div>
<?php } ?>
    <div class="notification">
         <b>Instructions</b>
        <ul>
            <li>
              ASMP is currently available to only 2nd, 3rd, 4th & 5th year UGs and all PGs, Ph.Ds.
            </li>
            <li>To continue login with your LDAP username and password</li>
        </ul>
    </div>
<div class="form">
<?php echo CHtml::beginForm(); ?>

    <?php echo CHtml::errorSummary($model); ?>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'username'); ?>
        <?php echo CHtml::activeTextField($model,'username') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'password'); ?>
        <?php echo CHtml::activePasswordField($model,'password') ?>
    </div>

    <div class="row rememberMe">
        <?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
        <?php echo CHtml::activeLabel($model,'rememberMe'); ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Login'); ?>
    </div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->

