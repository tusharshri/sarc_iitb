<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/addonload.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/formvalidation.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/step1.js'); ?>
<div id="bar">

    <span id="registration">Registration for mentors</span>
    <ul>
        <li class="selected">1</li>
        <li>2</li>
        <li>3</li>
        <li>4</li>
    </ul>
</div>
<div id="content">
    <div id="contenttopic">General Information</div>
    <div id="contentbody">
        <form action="<?php echo Yii::app()->baseUrl.'/alumnusregistration/step1/';  ?>" method="POST" >
            <table>
                <tr>
                    <td class="detailname" id="name">Name<span class="asterix">*</span></td>
                    <td>
                        <table id="nametable">
                            <tr>
                                <td>
                                    <select name="salutation">

                                        <?php
                                        $salutation=$data->salutation;
                                        $firstname=$data->firstName;
                                        $middlename=$data->middleName;
                                        $lastname=$data->lastName;
                                        $department=Department::model()->findByAttributes(array('code'=>$data->departmentCode))->name;
                                        $hostel=$data->hostel;
                                        $batch=$data->class;
                                        $course=$data->degree;
                                        ?>
                                        <option value="Mr." <?php echo ''.$salutation=="Mr." ? ' selected="selected"': '' ; ?> >Mr.</option>
                                        <option value="Mrs." <?php echo ''.$salutation=="Mrs." ? ' selected="selected"': '' ; ?> >Mrs.</option>
                                        <option value="Ms." <?php echo ''.$salutation=="Ms." ? ' selected="selected"': '' ; ?> >Ms.</option>
                                        <option value="Dr." <?php echo ''.$salutation=="Dr." ? ' selected="selected"': '' ; ?> >Dr.</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" id="firstname" name="firstname" value="<?php echo ''.$firstname!=NULL ? $firstname:'';?>" />
                                </td>
                                <td>
                                    <input type="text" id="middlename" name="middlename" value="<?php echo ''.$middlename!=NULL ? $middlename:'';?>" />
                                </td>
                                <td>
                                    <input type="text" id="lastname" name="lastname" value="<?php echo ''.$lastname!=NULL ? $lastname:'';?>" />
                                </td>
                            </tr>
                            <tr class="info">
                                <td>Salutation<span class="asterix">*</span></td>
                                <td>First Name<span class="asterix">*</span></td>
                                <td>Middle Name</td>
                                <td>Last Name<span class="asterix">*</span></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="detailname">Department<span class="asterix">*</span></td>
                    <td>
                        <select name="department">
                            <?php $depart = Department::model()->findAll();
                            foreach($depart as $results){
                                echo "<option value='".$results->name."'";
                                    if($department==$results->name){
                                        echo "selected='selected'";
                                    }
                                echo  ">".$results->name."</option>";
                            }
                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="detailname">Course<span class="asterix">*</span></td>
                    <td>
                        <select name="course">
                            <option value="B.Tech."<?php echo ''.$course == "B.Tech." ? 'selected="selected"':'';?>>B.Tech</option>
                            <option value="M.Tech."<?php echo ''.$course == "M.Tech." ? 'selected="selected"':'';?>>M.Tech</option>
                            <option value="Dual Degree"<?php echo ''.$course == "Dual Degree" ? 'selected="selected"':'';?>>Dual Degree</option>
                            <option value="M.Sc"<?php echo ''.$course == "M.Sc" ? 'selected="selected"':'';?>>M.Sc</option>
                            <option value="Ph.D"<?php echo ''.$course == "Ph.D" ? 'selected="selected"':'';?>>Ph.D</option>
                            <option value="M.Des"<?php echo ''.$course == "M.Des" ? 'selected="selected"':'';?>>M.Des</option>
                            <option value="M.Mgt"<?php echo ''.$course == "M.Mgt" ? 'selected="selected"':'';?>>M.Mgt</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="detailname">Hostel<span class="asterix">*</span></td>
                    <td>
                        <select name="hostel">
                            <option value="1"<?php echo ''.$hostel == "1" ? 'selected="selected"':'';?>>Hostel 1</option>
                            <option value="2"<?php echo ''.$hostel == "2" ? 'selected="selected"':'';?>>Hostel 2</option>
                            <option value="3"<?php echo ''.$hostel == "3" ? 'selected="selected"':'';?>>Hostel 3</option>
                            <option value="4"<?php echo ''.$hostel == "4" ? 'selected="selected"':'';?>>Hostel 4</option>
                            <option value="5"<?php echo ''.$hostel == "5" ? 'selected="selected"':'';?>>Hostel 5</option>
                            <option value="6"<?php echo ''.$hostel == "6" ? 'selected="selected"':'';?>>Hostel 6</option>
                            <option value="7"<?php echo ''.$hostel == "7" ? 'selected="selected"':'';?>>Hostel 7</option>
                            <option value="8"<?php echo ''.$hostel == "8" ? 'selected="selected"':'';?>>Hostel 8</option>
                            <option value="9"<?php echo ''.$hostel == "9" ? 'selected="selected"':'';?>>Hostel 9</option>
                            <option value="10"<?php echo ''.$hostel == "10" ? 'selected="selected"':'';?>>Hostel 10</option>
                            <option value="11"<?php echo ''.$hostel == "11" ? 'selected="selected"':'';?>>Hostel 11</option>
                            <option value="12"<?php echo ''.$hostel == "12" ? 'selected="selected"':'';?>>Hostel 12</option>
                            <option value="13"<?php echo ''.$hostel == "13" ? 'selected="selected"':'';?>>Hostel 13</option>
                            <option value="14"<?php echo ''.$hostel == "14" ? 'selected="selected"':'';?>>Hostel 14</option>
                            <option value="Other"<?php echo ''.$hostel == "Other" ? 'selected="selected"':'';?>>Other</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="detailname">Year of Passing Out<span class="asterix">*</span></td>
                    <td>
                        <select name="batch">


                            <?php
                            for($i=1962;$i<2012;$i++){
                                ?>
                                <option value="<?php echo $i;  ?>" <?php echo ''.$batch == $i ? 'selected="selected"':'';?>><?php echo $i;  ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
            <input id="submit" type="submit" value="NEXT >>" name="newform"/>
        </form>
    </div>
</div>
				