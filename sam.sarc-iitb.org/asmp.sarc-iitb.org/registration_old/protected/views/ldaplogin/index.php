<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Swaroop
 * Date: 8/14/11
 * Time: 2:28 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<style type="text/css">
    .errorSummary{
        border: 1px solid #C00;
padding: 7px 7px 12px 7px;
margin: 0 0 20px 0;
background: #FEE;
font-size: 0.9em;
    }
</style>
<h1>Login with your LDAP Id</h1>
<?php
//echo $error;
if($error==true){
?>

    <div class="errorSummary">
        <p>Unkown Username Or Password </p>
    </div>
<?php
}
    ?>
<div class="notification">
         <b>Instructions</b>
        <ul>
            <li>
              ASMP is currently avaibale to only 3rd, 4th & 5th year UG's and all PG's, P.hD's.
            </li>
            <li>To continue login with your LDAP Id and Password</li>

        </ul>
    </div>
  <?php
echo $this->renderPartial('_form', array('model'=>$model)); ?>