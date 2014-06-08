<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
var i=0;
</script>
<script type="text/javascript" src="http://canvg.googlecode.com/svn/trunk/rgbcolor.js"></script> 
    <script type="text/javascript" src="http://canvg.googlecode.com/svn/trunk/canvg.js"></script>
    <script>
      function getImgData(chartContainer) {
        var chartArea = chartContainer.getElementsByTagName('iframe')[0].
          contentDocument.getElementById('chartArea');
        var svg = chartArea.innerHTML;
        var doc = chartContainer.ownerDocument;
        var canvas = doc.createElement('canvas');
        canvas.setAttribute('width', chartArea.offsetWidth);
        canvas.setAttribute('height', chartArea.offsetHeight);
        
        
        canvas.setAttribute(
            'style',
            'position: absolute; ' +
            'top: ' + (-chartArea.offsetHeight * 2) + 'px;' +
            'left: ' + (-chartArea.offsetWidth * 2) + 'px;');
        doc.body.appendChild(canvas);
        canvg(canvas, svg);
        var imgData = canvas.toDataURL("image/png");
        canvas.parentNode.removeChild(canvas);
        return imgData;
      }
      
      function saveAsImg(chartContainer) {
        var imgData = getImgData(chartContainer);
        
        // Replacing the mime-type will force the browser to trigger a download
        // rather than displaying the image in the browser window.
        window.location = imgData.replace("image/png", "image/octet-stream");
      }
    
    function clear_imgDiv(){
    document.getElementById('img_div').style.display='none'; 
    }
      
      function toImg(chartContainer, imgContainer) { 
    document.getElementById('img_div').style.display='block'; 
    var doc = chartContainer.ownerDocument;
        var img = doc.createElement('img');
        img.src = getImgData(chartContainer);
        
        while (imgContainer.firstChild) {
          imgContainer.removeChild(imgContainer.firstChild);
        }
        imgContainer.appendChild(img);
      }
    </script>
<?php
  session_start();
  if (! isset($_SESSION['user'])) header ("Location: ../login.php");
  $role = $_SESSION['role'];
  $curdir = getcwd();
  if ($role == basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
  
  require_once ("../dbconnection.php");
  $DBConn = new Connection();
  $volunteer_id = $_SESSION['user'];
  
  $agenda = $DBConn->get_array("SELECT * FROM agenda");
  
  function print_array ($arr, $tabs = null) {
    if ($tabs == null) $tabs = array();
    if (! is_array($arr)) echo implode("",$tabs) . $arr . "<br />";
    else {
      foreach ($arr as $i => $new_arr) {
        echo implode("",$tabs) . $i . "=><br />";
        $new_tabs = $tabs;
        array_push ($new_tabs, "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
        print_array ($new_arr, $new_tabs);
      }
    }
  }
  
  $num_allotted = 0;
  $num_contacted = 0;
  $num_mailed = 0;
  $num_callagain = 0;
    $num_ongoing = 0;
    $num_locked = 0;
  
  $allotted = $DBConn->get_grouped_array ("SELECT volunteer_ID, count(*) AS allotted FROM allotment GROUP BY volunteer_ID", array("volunteer_ID"));
  
  $contacted = $DBConn->get_grouped_array ("SELECT name, volunteer_ID, count(T.PID) AS contacted FROM volunteer NATURAL JOIN allotment LEFT OUTER JOIN (SELECT PID FROM calllog WHERE contacted=1) AS T ON allotment.PID = T.PID GROUP BY volunteer_ID", array("volunteer_ID"));
  
  $mailed = $DBConn->get_grouped_array ("SELECT volunteer_ID, count(T.PID) AS mailed FROM volunteer NATURAL JOIN allotment LEFT OUTER JOIN (SELECT PID FROM calllog WHERE mailed=1) AS T ON allotment.PID = T.PID GROUP BY volunteer_ID", array("volunteer_ID"));
  
  $callagain = $DBConn->get_grouped_array ("SELECT volunteer_ID, count(T.PID) AS callagain FROM volunteer NATURAL JOIN allotment LEFT OUTER JOIN (SELECT PID FROM callagain WHERE called != 1) AS T ON allotment.PID = T.PID GROUP BY volunteer_ID", array("volunteer_ID"));

    $ongoing = $DBConn->get_grouped_array ("SELECT volunteer_ID, count(*) AS ongoing FROM allotment WHERE status='Ongoing' GROUP BY volunteer_ID", array("volunteer_ID"));

    $locked = $DBConn->get_grouped_array ("SELECT volunteer_ID, count(*) AS locked FROM allotment WHERE status='Done and Locked' GROUP BY volunteer_ID", array("volunteer_ID"));
  
  //$numbers = $DBConn->get_grouped_array ("SELECT volunteer_ID, name, date_of_confirmation, agenda, count(*) AS number FROM agenda NATURAL JOIN alumnus_basicdetail NATURAL JOIN alumnus_agendaconfirmation NATURAL JOIN allotment JOIN volunteer USING (volunteer_id) GROUP BY date_of_confirmation,name,agenda", array("date_of_confirmation","name","agenda"));//
  
  $numbers = $DBConn->get_grouped_array ("SELECT allotment.volunteer_ID, volunteer.name , alumnus_agendaconfirmation.date_of_confirmation , agenda.agenda, COUNT( *) AS number, allotment.status  FROM alumnus_agendaconfirmation JOIN volunteer JOIN agenda JOIN allotment ON alumnus_agendaconfirmation.PID = allotment.PID  AND volunteer.volunteer_ID=allotment.volunteer_ID AND agenda.agenda_id=alumnus_agendaconfirmation.agenda_id  AND allotment.status='Done and Locked'  GROUP BY alumnus_agendaconfirmation.date_of_confirmation, volunteer.name ,agenda.agenda ORDER BY alumnus_agendaconfirmation.date_of_confirmation 
", array("date_of_confirmation","name","agenda"));

  
  $dates=$DBConn->get_array("SELECT date_format(`updateTime`, '%Y-%m-%d') AS date FROM `allotment` WHERE `updateTime` !='0000-00-00' GROUP BY date_format(`updateTime`, '%Y-%m-%d')");
  function datewise_stats($date1){
  
  global $DBConn,$dat_called_again,$dat_contacted,$dat_locked,$dat_mailed,$dat_notattempt,$dat_ongoing,$dat_alloted;
  
  $dat_alloted=$DBConn->get_grouped_array("SELECT volunteer.name,volunteer.volunteer_ID, COUNT(allotment.volunteer_ID) AS alloted FROM allotment JOIN volunteer WHERE volunteer.volunteer_ID=allotment.volunteer_ID AND allotment.updateTime LIKE '".$date1."' GROUP BY allotment.volunteer_ID ORDER BY volunteer.volunteer_ID",array("volunteer_ID"));
  
  $dat_contacted=$DBConn->get_grouped_array("SELECT name, volunteer_ID, count(T.PID) AS contacted FROM volunteer NATURAL JOIN allotment LEFT OUTER JOIN (SELECT PID FROM calllog WHERE contacted=1) AS T ON allotment.PID = T.PID AND allotment.updateTime LIKE '".$date1."' GROUP BY volunteer_ID HAVING contacted>0",array("volunteer_ID"));
  
  $dat_mailed=$DBConn->get_grouped_array("SELECT name, volunteer_ID, count(T.PID) AS mailed FROM volunteer NATURAL JOIN allotment LEFT OUTER JOIN (SELECT PID FROM calllog WHERE mailed=1) AS T ON allotment.PID = T.PID AND allotment.updateTime LIKE '".$date1."' GROUP BY volunteer_ID HAVING mailed>0",array("volunteer_ID"));
  
  $dat_called_again=$DBConn->get_grouped_array("SELECT name, volunteer_ID, count(T.PID) AS calledagain FROM volunteer NATURAL JOIN allotment LEFT OUTER JOIN (SELECT PID FROM callagain WHERE called!=1) AS T ON allotment.PID = T.PID AND allotment.updateTime LIKE '".$date1."' GROUP BY volunteer_ID HAVING calledagain>0",array("volunteer_ID"));
  
  $dat_ongoing=$DBConn->get_grouped_array("SELECT volunteer.volunteer_ID, COUNT(allotment.volunteer_ID) AS ongoing FROM allotment JOIN volunteer WHERE volunteer.volunteer_ID=allotment.volunteer_ID AND allotment.updateTime LIKE '".$date1."' AND allotment.status='Ongoing' GROUP BY allotment.volunteer_ID ORDER BY volunteer.volunteer_ID",array("volunteer_ID"));
  
  $dat_locked=$DBConn->get_grouped_array("SELECT volunteer.volunteer_ID, COUNT(allotment.volunteer_ID) AS locked FROM allotment JOIN volunteer WHERE volunteer.volunteer_ID=allotment.volunteer_ID AND allotment.updateTime LIKE '".$date1."' AND allotment.status='Done and Locked' GROUP BY allotment.volunteer_ID ORDER BY volunteer.volunteer_ID",array("volunteer_ID"));
  
  $dat_notattempt=$DBConn->get_grouped_array("SELECT volunteer.name,volunteer.volunteer_ID, COUNT(allotment.volunteer_ID) AS notattempted FROM allotment JOIN volunteer WHERE volunteer.volunteer_ID=allotment.volunteer_ID AND allotment.updateTime LIKE '".$date1."' AND allotment.status='Not Attempted' GROUP BY allotment.volunteer_ID ORDER BY volunteer.volunteer_ID",array("volunteer_ID"));
  }
  
?>
<html>
  <head>
    <link language="css" type="text/css" rel="stylesheet" href="css/statistics.css" />
    <script language="javascript" type="text/javascript" src="js/addonload.js"></script>
    <script language="javascript" type="text/javascript" src="js/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="js/statistics.js"></script>
  </head>
  <body>
    
    <script type="text/javascript">
    $(document).ready(function(){
      $('#calldetails').css('display','block');
      $('#agendadetails').css('display','none');  
      $('#datewise_vol').css('display','none');  
    });
  
    function display(k){
        if(k==1){
          $('input[type=button]:nth(2)').removeClass('selected_bttn').addClass('non_selected');
          $('input[type=button]:first').addClass('selected_bttn').removeClass('non_selected');
          $('input[type=button]:nth(1)').removeClass('selected_bttn').addClass('non_selected');
          $('#calldetails').css('display','block');
          $('#agendadetails').css('display','none');
          $('#datewise_vol').css('display','none');  
        }
        else if(k==2){
          $('input[type=button]:nth(2)').removeClass('selected_bttn').addClass('non_selected');
          $('input[type=button]:nth(1)').addClass('selected_bttn').removeClass('non_selected');
          $('input[type=button]:first').removeClass('selected_bttn').addClass('non_selected');
          $('#calldetails').css('display','none');
          $('#agendadetails').css('display','block');
          $('#datewise_vol').css('display','none');  
        }
        else if(k==3){
          $('input[type=button]:nth(2)').addClass('selected_bttn').removeClass('non_selected');
          $('input[type=button]:nth(1)').removeClass('selected_bttn').addClass('non_selected');
          $('input[type=button]:nth(0)').removeClass('selected_bttn').addClass('non_selected');
          $('#calldetails').css('display','none');
          $('#agendadetails').css('display','none');
          $('#datewise_vol').css('display','block');
        }
    }
  
  </script>
    <div style="margin-top:30px;">
    <input type="button" value="All stats" class="bttn_stats selected_bttn" onClick="display(1)"> <input type="button" value="Datewise" class="bttn_stats"onclick="display(2)"><input type="button" value="Datewise-volunteer stats" class="bttn_stats"onclick="display(3)"></div>
  <div id="stats_content">
    
    <table id="calldetails" style="clear:both;float:left;">
      <tr class="head">
        <th>S.No.</th>
        <th>Volunteer</th>
        <th>Allotted</th>
        <th>Contacted</th>
        <th>Mailed</th>

                <th>Ongoing</th>
                <th>Done and Locked</th>
      </tr>
<?php
  //print_array ($contacted);
  $i++;
  foreach ($contacted as $vol=>$num) {
?>
      <tr onClick="goto('calldetails.php?volunteer_ID=<?php echo $vol; ?>')">
        <td><?php echo $i++; ?> </td>
        <td><?php echo $num['name'] ?></td>
        <td><?php echo $allotted[$vol]['allotted'] ?></td>
        <td><?php echo $num['contacted'] ?></td>
        <td><?php echo $mailed[$vol]['mailed'] ?></td>

        <td><?php echo $ongoing[$vol]['ongoing'] ?></td>
        <td><?php echo $locked[$vol]['locked'] ?></td>
      </tr>
<?php
    $num_allotted += $allotted[$vol]['allotted'];
    $num_contacted += $num['contacted'];
    $num_mailed += $mailed[$vol]['mailed'];
    $num_callagain += $callagain[$vol]['callagain'];
        $num_ongoing += $ongoing[$vol]['ongoing'];
        $num_locked += $locked[$vol]['locked'];
  }
?>
      <tr class="head">
        
        <th>Total</th>
        <th></th>
        <th><?php echo $num_allotted ?></th>
        <th><?php echo $num_contacted ?></th>
        <th><?php echo $num_mailed ?></th>

        <th><?php echo $num_ongoing ?></th>
        <th><?php echo $num_locked ?></th>
      </tr>
    </table>
    <table id="agendadetails" style="float:left;">
      <tr class="head">
        <th>Volunteer</th>
<?php
  foreach ($agenda as $agendaitem) {
?>
        <th><?php echo $agendaitem['agenda'] ?></th>
<?php
  }
?>
      </tr>
<?php
  $keys = array_keys ($numbers);
  /*foreach($numbers as $numbersid){
    echo $numbersid[1].' ';  
  }*/
  $length = count($keys);
  foreach ($agenda as $agendaitem) {
    $agenda_numbers[$agendaitem['agenda']] = 0;
    $agenda_total_numbers[$agendaitem['agenda']] = 0;
  }
  for ($i=0; $i<$length; $i++) {
    $key = $keys[$i];
    //echo $key.'<br>';
    $key = explode ("_", $key);
    $date = $key[0];
    $volunteer = $key[1];
    if ($date != $x_date) {
      if ($i != 0) {
?>
        <tr onClick="goto('agendadetails.php?date=<?php echo $x_date ?>')">
          <th>Total</th>
<?php
        foreach ($agenda as $agendaitem) {
?>
          <th><?php echo $agenda_numbers[$agendaitem['agenda']] ?></th>
<?php
          $agenda_total_numbers[$agendaitem['agenda']] += $agenda_numbers[$agendaitem['agenda']];
          $agenda_numbers[$agendaitem['agenda']] = 0;
        }
      }
      $x_volunteer = "";
?>
        </tr>
        <tr onClick="goto('agendadetails.php?date=<?php echo $date ?>')">
          <th><?php echo $date ?></th>
        </tr>
<?php
    }
    if ($volunteer != $x_volunteer) {
?>
        <tr onClick="goto('agendadetails.php?date=<?php echo $x_date ?>&volunteer_ID=<?php echo $numbers[$keys[$i]]['volunteer_ID'] ?>')">
          <td><?php echo $volunteer ?></td>
<?php
      foreach ($agenda as $agendaitem) {
        $key = $numbers[$date."_".$volunteer."_".$agendaitem['agenda']];
        $num = $key;
        $num = ($num['number'] != "") ? $num['number'] : '0';
        $agenda_numbers[$agendaitem['agenda']] += $num;
        //$date."_".$volunteer."_".$agendaitem['agenda'] . "=>" . 
?>
          <td><?php echo $num ?></td>
<?php
        $num = 0;
      }
?>
        </tr>
<?php
      $x_volunteer = $volunteer;
    }
    $x_date = $date;
  }
?>
        <tr onClick="goto('agendadetails.php?date=<?php echo $x_date ?>')">
          <th>Total</th>
           
 <?php  
      foreach ($agenda as $agendaitem) {
?>           
                    

          <th><?php echo $agenda_numbers[$agendaitem['agenda']]; ?></th>
<?php
        $agenda_total_numbers[$agendaitem['agenda']] += $agenda_numbers[$agendaitem['agenda']];
      }
?>
        </tr>
        <tr onClick="goto('agendadetails.php')">
          <th>Absolute Total</th>
<?php
      foreach ($agenda as $agendaitem) {
?>
          <th><?php echo $agenda_total_numbers[$agendaitem['agenda']] ?></th>
<?php
      }
?>
    </table>
        
        <table id="datewise_vol" style="float:left;">
      <tr class="head">
        <th>Volunteer</th>
        <th>Alloted</th>
                <th>Contacted</th>
                <th>Mailed</th>
                <th>Call Again</th>
                <th>Ongoing</th>
                <th>Done and Locked</th>
      </tr>
<?php
    $index=0;
    foreach($dates as $updt=>$updtval){
            
        

?>
      <tr>
             <td><?php echo $updtval[0]; ?></td>
            </tr>

           <?php
       datewise_stats($updtval[0].'%');
       $total_alloted=0;
       $total_contacted=0;
       $total_mailed=0;
       $total_calledagain=0;
       $total_ongoing=0;
       $total_locked=0;
       
  //print_array ($contacted);
  foreach ($dat_alloted as $vol1=>$num1) {
  //$alloted1= $dat_ongoing[$vol1]['ongoing']+ $dat_locked[$vol1]['locked'] + $dat_notattempt[$vol1]['notattempted'];
  $alloted1=$num1['alloted'];
  $total_alloted+=$alloted1;
  $total_contacted+=$dat_contacted[$vol1]['contacted'];
  $total_mailed+=$dat_mailed[$vol1]['mailed'];
  $total_calledagain+=$dat_called_again[$vol1]['calledagain'];
  $total_ongoing+=$dat_ongoing[$vol1]['ongoing'];
  $total_locked+=$dat_locked[$vol1]['locked'];
  
?>
      <tr onClick="goto('calldetails.php?volunteer_ID=<?php echo $vol1; ?>')">
        <td><?php echo $num1['name'] ?></td>
        <td><?php echo $alloted1; ?></td>
        <td><?php echo $dat_contacted[$vol1]['contacted'] ?></td>
        <td><?php echo $dat_mailed[$vol1]['mailed'] ?></td>
        <td><?php echo $dat_called_again[$vol1]['calledagain'] ?></td>
        <td><?php echo $dat_ongoing[$vol1]['ongoing']; ?></td>
        <td><?php echo $dat_locked[$vol1]['locked'] ?></td>
      </tr>
            
            <?php  } ?>
            <tr>
              <td>Total</td>
              <td><?php echo $total_alloted;  ?></td>
                <td><?php echo $total_contacted;  ?></td>
                <td><?php echo $total_mailed;  ?></td>
                <td><?php echo $total_calledagain;  ?></td>
                <td><?php echo $total_ongoing;  ?></td>
                <td><?php echo $total_locked;  ?></td>
            
            </tr>
             <tr>
            <td colspan="7">
            
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Contact details');
        data.addColumn('number', 'Stats');
        data.addRows([
          //['Total Alloted',<?php echo $total_alloted;  ?> ],
          //['Total contacted',<?php echo $total_contacted;  ?>],
          //['Total Mailed',<?php echo $total_mailed;  ?>],
          //['Total Calledagian',<?php echo $total_calledagain;  ?>],
      ['Total Non Attempted / Alloted',<?php echo $total_alloted-($total_ongoing+$total_locked);  ?>],
          ['Total Ongoing / Alloted',<?php echo $total_ongoing;  ?>],
      ['Total locked / Alloted', <?php echo $total_locked;  ?>]
        ]);
    
     var data1 = new google.visualization.DataTable();
        data1.addColumn('string', 'Contact details');
        data1.addColumn('number', 'Stats');
        data1.addRows([
          //['Total Alloted',<?php echo $total_alloted;  ?> ],
          //['Total contacted',<?php echo $total_contacted;  ?>],
          //['Total Mailed',<?php echo $total_mailed;  ?>],
          //['Total Calledagian',<?php echo $total_calledagain;  ?>],
      ['Total Not mailed / Locked',<?php echo $total_locked-($total_mailed);  ?>],
          ['Total mailed / Locked',<?php echo $total_mailed;  ?>],
        ]);
    
    var data2 = new google.visualization.DataTable();
        data2.addColumn('string', 'Contact details');
        data2.addColumn('number', 'Stats');
        data2.addRows([
          //['Total Alloted',<?php echo $total_alloted;  ?> ],
          //['Total contacted',<?php echo $total_contacted;  ?>],
          //['Total Mailed',<?php echo $total_mailed;  ?>],
          //['Total Calledagian',<?php echo $total_calledagain;  ?>],
      ['Total Contacted / Locked',<?php echo $total_contacted;  ?>],
          ['Total Couldnot reach / Locked',<?php echo $total_locked-($total_contacted);  ?>],
                      //['Total Called Again / Locked',<?php echo $total_calledagain;  ?>],
      
        ]);
    
        var options = {
      width: 700,
      height: 370,
     title: <?php echo "'".$updtval[0]."'"; ?>,
      colors: ['#3266cc', '#c6d256', '#fd9a00', '#109619', '#990099','#f6c7b6'],
    legend:{position: 'right', textStyle: {color: 'black', fontSize: 16}},
    pieSliceTextStyle:{color: 'white'}
    };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'+i));
        chart.draw(data, options);
    var chart1 = new google.visualization.PieChart(document.getElementById('chart_div_f'+i));
        chart1.draw(data1, options);
    var chart2 = new google.visualization.PieChart(document.getElementById('chart_div_g'+i));
        chart2.draw(data2, options);
    
    i++;
      }
    </script>
    <div id="chart_div<?php echo $index;  ?>" style="height: 370px;"></div>
    <div id="chart_div_g<?php echo $index;  ?>" style="height: 370px;"></div>
    <div id="chart_div_f<?php echo $index; $index++; ?>" style="height: 370px;"></div>
    <button onClick="saveAsImg(document.getElementById('chart_div<?php echo $index-1; ?>'));">Save as PNG Image</button>
    <button onClick="toImg(document.getElementById('chart_div<?php echo $index-1; ?>'), document.getElementById('img_div'));">Convert to image</button>
    <button onClick="clear_imgDiv();">Clear Image</button></td>
    </tr>
           <?php 
         }  
       ?>
           
    </table>
        <div id="img_div" style="position: fixed; top: 0; right: 0; z-index: 10; border: 1px solid #b9b9b9">
        </div>
  </body>
</html>
