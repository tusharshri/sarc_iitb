 <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
 <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets/js/jquery.listreorder.js'); ?>
 <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets/js/jquery.disable.text.select.pack.js'); ?>
<script type="text/javascript">
	
function seemore(a){
   document.getElementById('spans-'+a).style.display="none";
   document.getElementById('span-'+a).style.display="inline";
}

$(document).ready(function(){
	$('#industry_list').change(function(){
		var industry=$(this).val();
		var j=0;
		$("#alumni tr").hide();		
		if(industry=="All"){
			$("#alumni tr").show();
		}else{
		$('.industry').each(function(i){
			if($(this).html()==industry){
				$(this).parent().parent().show();
				j++;
			}
		});
		if(j==0){
			alert("No mentor found from \""+industry+"\" industry");
		}
		}
	});
});
</script>
<style type="text/css">
    #main-wrapper{
        width:900px;
    }
    .dragHandle {
        display: block;
        float: right;
        width: 21px;
        height: 21px;
        margin-left:5px;
        background-image:url('<?php echo Yii::app()->request->baseUrl."/images/resize.gif" ?>');
        cursor: move;
    }
    .removeSelected{
        color:red;
        cursor:pointer;
        float:right;
    }
    ol.selected{
        font-size: 15px;
    }
    table{
        float:left;

    }
    #alumni{
        width:95%;
        font-size:12px;
        border-top:solid 1px #0000ff;
    }
    #alumni tr:nth-child(odd){
         background-color:#f0f8ff;
    }
    #alumni tr td{
        border-bottom:solid 1px #0000ff;
    }
    #right{
        background-color:#ebe8e8;
        width:21%;
        padding:0 10px;
        margin-left:30px;
        float:left;s
    }
    #selected{
        padding:0;
        margin-left:18px;
    }
    #selected li:first-child{
        border-top:none;
    }
    #selected li:last-child{
        border-bottom:1px solid #aaa;
    }
    #selected li{
        width:150px;
        padding:5px 5px;
        height:20px;
        border-bottom:1px solid #222;
        border-top:1px solid #aaa;
    }

    .more{
        color:#6666ff;
        cursor:pointer;
    }
    .hidden{
        display:none;
    }
</style>
	<div class="notification">
         <b>Instructions</b>
        <ul>
            <li>The list of the Mentors shown below is sorted inorder of their department.
            <li>A dropdown list is provided below for the convenience of the students to know Mentors from what all Industries are available.
            <li>The mentors registered in the past two days could not be included in the list. However these mentors will be included in registration interface tomorrow.
        </ul>
								<label> Select Industry: </label>
								<select id="industry_list" name="industry">
									<option value="All">All</option>
									<option value="Accounting">Accounting</option>
									<option value="Airlines/Aviation">Airlines/Aviation</option>
									<option value="Alternative Dispute Resolution">Alternative Dispute Resolution</option>
									<option value="Alternative Medicine">Alternative Medicine</option>
									<option value="Animation">Animation</option>
									<option value="Apparel and Fashion">Apparel and Fashion</option>
									<option value="Architecture and Planning">Architecture and Planning</option>
									<option value="Arts and Crafts">Arts and Crafts</option>
									<option value="Automotive">Automotive</option>
									<option value="Aviation and Aerospace">Aviation and Aerospace</option>
									<option value="Banking">Banking</option>
									<option value="Biotechnology">Biotechnology</option>
									<option value="Broadcast Media">Broadcast Media</option>
									<option value="Building Materials">Building Materials</option>
									<option value="Business Supplies and Equipment">Business Supplies and Equipment</option>
									<option value="Capital Markets">Capital Markets</option>
									<option value="Chemicals">Chemicals</option>
									<option value="Civic and Social Organization">Civic and Social Organization</option>
									<option value="Civil Engineering">Civil Engineering</option>
									<option value="Commercial Real Estate">Commercial Real Estate</option>
									<option value="Computer and Network Security">Computer and Network Security</option>
									<option value="Computer Games">Computer Games</option>
									<option value="Computer Hardware">Computer Hardware</option>
									<option value="Computer Networking">Computer Networking</option>
									<option value="Computer Software">Computer Software</option>
									<option value="Construction">Construction</option>
									<option value="Consumer Electronics">Consumer Electronics</option>
									<option value="Consumer Goods">Consumer Goods</option>
									<option value="Consumer Services">Consumer Services</option>
									<option value="Cosmetics">Cosmetics</option>
									<option value="Dairy">Dairy</option>
									<option value="Defense and Space">Defense and Space</option>
									<option value="Design">Design</option>
									<option value="Education Management">Education Management</option>
									<option value="E-Learning">E-Learning</option>
									<option value="Electrical/Electronic Manufacturing">Electrical/Electronic Manufacturing</option>
									<option value="Entertainment">Entertainment</option>
									<option value="Environmental Services">Environmental Services</option>
									<option value="Events Services">Events Services</option>
									<option value="Executive Office">Executive Office</option>
									<option value="Facilities Services">Facilities Services</option>
									<option value="Farming">Farming</option>
									<option value="Financial Services">Financial Services</option>
									<option value="Fine Art">Fine Art</option>
									<option value="Fishery">Fishery</option>
									<option value="Food and Beverages">Food and Beverages</option>
									<option value="Food Production">Food Production</option>
									<option value="Fund-Raising">Fund-Raising</option>
									<option value="Furniture">Furniture</option>
                                    					<option value="Gambling and Casinos">Gambling &amp; Casinos</option>
									<option value="Glass Ceramics and Concrete">Glass, Ceramics and Concrete</option>
									<option value="Government Administration">Government Administration</option>
									<option value="Government Relations">Government Relations</option>
									<option value="Graphic Design">Graphic Design</option>
                                    					<option value="Health , Wellness and Fitness">Health, Wellness &amp; Fitness</option>
									<option value="Higher Education">Higher Education</option>
									<option value="Hospitality">Hospitality</option>
                                    					<option value="Hospital and Health Care">Hospital &amp; Health Care</option>
									<option value="Human Resources">Human Resources</option>
									<option value="Import and Export">Import and Export</option>
									<option value="Individual and Family Services">Individual and Family Services</option>
									<option value="Industrial Automation">Industrial Automation</option>
									<option value="Information Technology and Services">Information Technology and Services</option>
									<option value="Insurance">Insurance</option>
									<option value="International Affairs">International Affairs</option>
									<option value="International Trade and Development">International Trade and Development</option>
                                    					<option value="Internet">Internet</option>
									<option value="Investment Banking">Investment Banking</option>
									<option value="Investment Management">Investment Management</option>
									<option value="Judiciary">Judiciary</option>
									<option value="Law Enforcement">Law Enforcement</option>
                                    					<option value="Law Practice">Law Practice</option>
									<option value="Legal Services">Legal Services</option>
									<option value="Legislative Office">Legislative Office</option>
                 							<option value="Leisure and Travel">Leisure &amp; Travel</option>
                   							<option value="Libraries">Libraries</option>
									<option value="Logistics and Supply Chain">Logistics and Supply Chain</option>
                     							<option value="Luxury Goods and Jewelry">Luxury Goods &amp; Jewelry</option>
									<option value="Machinery">Machinery</option>
									<option value="Management Consulting">Management Consulting</option>
                  							<option value="Maritime">Maritime</option>
									<option value="Marketing and Advertising">Marketing and Advertising</option>
									<option value="Market Research">Market Research</option>
									<option value="Mechanical or Industrial Engineering">Mechanical or Industrial Engineering</option>
									<option value="Media Production">Media Production</option>
                        						<option value="Medical device">Medical Device</option>
									<option value="Medical Practice">Medical Practice</option>
                    							<option value="Mental Health Care">Mental Health Care</option>
									<option value="Military">Military</option>
									<option value="Mining and Metals">Mining and Metals</option>
									<option value="Motion Pictures and Film">Motion Pictures and Film</option>
                         						<option value="Museums and Instruction">Museums &amp; Institutions</option>
                    							<option value="Music">Music</option>
									<option value="Nanotechnology">Nanotechnology</option>
									<option value="Non-Profit Organization Management">Non-Profit Organization Management</option>
									<option value="Oil and Energy">Oil and Energy</option>
									<option value="Online Media">Online Media</option>
									<option value="Outsourcing/Offshoring">Outsourcing/Offshoring</option>
                        						<option value="Package and Frieght Delivery">Package/Freight Delivery</option>
                            						<option value="Packagind and Containers">Packaging &amp; Containers</option>
									<option value="Paper and Forest Products">Paper and Forest Products</option>
									<option value="Performing Arts">Performing Arts</option>                                 
									<option value="Pharmaceuticals">Pharmaceuticals</option>
									<option value="Philanthropy">Philanthropy</option>
									<option value="Photography">Photography</option>
									<option value="Plastics">Plastics</option>
									<option value="Political Organization">Political Organization</option>
									<option value="Primary/Secondary Education">Primary/Secondary Education</option>
                       							<option value="Printing">Printing</option>
									<option value="Professional Training and Coaching">Professional Training and Coaching</option>
									<option value="Program Development">Program Development</option>
                       							<option value="Public Policy">Public Policy</option>
									<option value="Public Relations and Communications">Public Relations and Communications</option>
									<option value="Public Safety">Public Safety</option>  
                      							<option value="Publishing">Publishing</option>
                    							<option value="Railroad Manufacture">Railroad Manufacture</option>
									<option value="Ranching">Ranching</option>
									<option value="Real Estate">Real Estate</option>
									<option value="Recreational Facilities and Services">Recreational Facilities and Services</option>
                         						<option value="Religious Institutions">Religious Institutions</option>
									<option value="Renewables and Environment">Renewables and Environment</option>
									<option value="Research">Research</option>
                      							<option value="Restaurants">Restaurants</option>
                      							<option value="Retail">Retail</option>
									<option value="Security and Investigations">Security and Investigations</option>
									<option value="Semiconductors">Semiconductors</option>
                     							<option value="Shipbuilding">Shipbuilding</option>
									<option value="Sporting Goods">Sporting Goods</option>
									<option value="Sports">Sports</option>
									<option value="Staffing and Recruiting">Staffing and Recruiting</option>
									<option value="Supermarkets">Supermarkets</option>
									<option value="Telecommunications">Telecommunications</option>
									<option value="Textiles">Textiles</option>
                      							<option value="Think Tanks">Think Tanks</option>
                       							<option value="Tobacco">Tobacco</option>
									<option value="Translation and Localization">Translation and Localization</option>
                      							<option value="Transportation Trucking and Railroad">Transportation/Trucking/Railroad</option>
									<option value="Utilities">Utilities</option>
									<option value="Venture Capital and Private Equity">Venture Capital and Private Equity</option>
									<option value="Veterinary">Veterinary</option>
									<option value="Warehousing">Warehousing</option>
									<option value="Wholesale">Wholesale</option>
                							<option value="Wine and Spirits">Wine &amp; Spirits</option>
									<option value="Wireless">Wireless</option>
									<option value="Writing and Editing">Writing and Editing</option>
									<option value="Others">Others</option>
								</select>

    </div>

<table id="alumni" cellspacing="0">

    <?php
    foreach($alumni as $key=>$value){

    ?>
    <tr id="tr-<?php echo $key; ?>">
        <td width="80px"><?php echo $finalList[$key]->salutation." Alumnus ".$finalList[$key]->id; ?></td>
        <td width="150px">
            <?php echo "<b>Department: </b>".$finalList[$key]->departmentCode."<br><b>Class: </b>".$finalList[$key]->class."<br><b>Degree: </b>".$finalList[$key]->degree; ?>
    </td>
        <td width="200px">

            <?php echo "<b>Designation: </b>".$finalList[$key]->alumnusProfDetails[0]->designation ;?>
            <?php echo "<br><b>Company: </b>".$finalList[$key]->alumnusProfDetails[0]->company ;?>
            <?php echo "<br><b>Industry: </b><span class='industry'>".$finalList[$key]->alumnusProfDetails[0]->industry."</span>" ;?>
            <?php echo "<br><b>Work Profile: </b>";?>
            <?php
            if(strlen($finalList[$key]->workProfile)>80){
            echo substr($finalList[$key]->workProfile, 0 , 80)."<span class='more' id='spans-".$key."' onClick='seemore(".$key.")'>...See More</span><span id='span-".$key."' class='hidden'>".substr($finalList[$key]->workProfile, 81 , strlen($finalList[$key]->workProfile))."</span>";
            }
            else if($finalList[$key]->workProfile==NULL || $finalList[$key]->workProfile=="" || trim($finalList[$key]->workProfile)=="NA" || trim($finalList[$key]->workProfile)==""){
                echo "<i>NOT AVAILABLE</i>";
            }
                else{
                    echo $finalList[$key]->workProfile;
            }
            ?>

        </td>
    </tr>
        <?php
}
        ?>
</table>
