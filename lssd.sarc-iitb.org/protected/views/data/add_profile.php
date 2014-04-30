
        
        <div id="content">                
            <div class="wrap clearFix">
            <h2>Add Profile</h2>
                        
		  	<form  enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="updt">
			 <table>
              <tr>
			    <td>First Name</td>
				<td><input type="text" name="firstname" class="left text"></td>
			    <!--<td><select class="left text" name="name">
				 <option value="ASMP" >ASMP</option>
				 <option value="Phonathon">Phonathon</option>
                 <option value="Site">Site</option>
			         </select>-->
			    
			   </tr>

			   <tr>
                <td>Middle Name</td>
				<td><input type="text" name="middlename" class="left text"></td>		    
			   </tr>
			   
			    <tr>
                <td>Last Name</td>
				<td><input type="text" name="lastname" class="left text"></td>		    
			   </tr>
			   
			   <tr>
                <td>Batch</td>
				<td><input type="text" name="batch" class="left text"></td>		    
			   </tr>
			   
			   
			   <tr>
                <td>Department</td>
				<td><input type="text" name="dept" class="left text"></td>		    
			   </tr>
			   
			   <tr>
                <td>Hostel</td>
				<td><select>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  </select></td>		    
			   </tr>
			   
			   <tr>
                <td>Date of Birth</td>
				<td><input type="date" name="dob" class="left text"></td>		    
			   </tr>
				<tr></tr>
			   <tr>
                <td>Gender</td>
				<td>&nbsp;&nbsp;<input type="radio" name="sex" value="male" >Male    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="sex" value="female" >Female
			  </td>
			  
			  <tr>
			  <td><label><br><b>alumnus_info</b><br></label></td>
			  </tr>
			  
			  <tr>
                <td>Address</td>
				<td><input type="text" name="address" class="left text"></td>		    
			   </tr>
			   
			   <tr>
                <td>City</td>
				<td><input type="text" name="city" class="left text"></td>		    
			   </tr>
			   
			   <tr>
                <td>State</td>
				<td><input type="text" name="state" class="left text"></td>		    
			   </tr>
			   
			   <tr>
                <td>Pincode</td>
				<td><input type="text" name="pincode" class="left text"></td>		    
			   </tr>
			   
			   <tr>
                <td>Country</td>
				<td><input type="text" name="middlename" class="left text"></td>		    
			   </tr>

			   <tr>
			  <td><label><br><b>alumnus_emailId</b><br></label></td>
			  </tr>
			  
			   <tr>
                <td>emailID1</td>
				<td><input type="email" name="emailid1" class="left text"></td>		    
			   </tr>
			   
			   <tr>
                <td>emailID2</td>
				<td><input type="email" name="emailid2" class="left text"></td>		    
			   </tr>
			   
			   <tr>
                <td>emailID3</td>
				<td><input type="email" name="emailid3" class="left text"></td>		    
			   </tr>
			   
			   <tr>
			  <td><label><br><b>alumnus_phnum</b><br></label></td>
			  </tr>
			  
			   <tr>
                <td>PhoneNo. 1</td>
				<td><input type="text" name="phone1" class="left text"></td>		    
			   </tr>
			   
			   <tr>
                <td>PhoneNo. 2</td>
				<td><input type="text" name="phone2" class="left text"></td>		    
			   </tr>
			   
			   <tr>
                <td>PhoneNo. 3</td>
				<td><input type="text" name="phone3" class="left text"></td>		    
			   </tr>
			   
			   <tr>
			  <td><label><br><b>alumnus_job</b><br></label></td>
			  </tr>
			  
			   <tr>
                <td>Designation</td>
				<td><input type="text" name="designation" class="left text"></td>		    
			   </tr>
			   
			   <tr>
                <td>Company</td>
				<td><input type="text" name="company" class="left text"></td>		    
			   </tr>
			   
			   <tr>
                <td>Industry</td>
				<td><input type="text" name="industry" class="left text"></td>		    
			   </tr>
			   
			   <tr>
                <td>Job Number</td>
				<td><input type="text" name="jobno." class="left text"></td>		    
			   </tr>
			   
			   <tr>
                <td>Country</td>
				<td><input type="text" name="country" class="left text"></td>		    
			   </tr>
			   
			   <tr>
			  <td><label><br><b>alumnus_social</b><br></label></td>
			  </tr>
			  
			   <tr>
                <td>Facebook URL</td>
				<td><input type="text" name="fblink" class="left text"></td>		    
			   </tr>
			   
			   <tr>
                <td>Skype ID</td>
				<td><input type="text" name="skypeid" class="left text"></td>		    
			   </tr>
			   
			   <tr>
                <td>LinkedIN URL</td>
				<td><input type="text" name="linkedin" class="left text"></td>		    
			   </tr>
			   
			   <tr>
			  <td><label><br><b>alumnus_extracurrics</b><br></label></td>
			  </tr>
			  
			   <tr>
                <td>Interest In</td>
				<td><input type="text" name="extra" class="left text"></td>		    
			   </tr>
			   
			   <tr>
                <td>Field</td>
				<td><select>
				  <option value="cult">Cult</option>
				  <option value="sports">Sports</option>
				  <option value="tech">Tech</option>
				  </select></td>	 	    
			   </tr>
			   
			   
			   <tr>
			    <td><button id="submit_button" name="sub" type="submit" class="button iconLeft"/><i class="email"></i>Upload</button></td>
			   </tr>
			</table>
			</form>
                       
                                             
            </div>
        </div> <!-- / #content -->      
        
		
        