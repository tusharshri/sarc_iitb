<style type="text/css">
	#leftbar{
		width:18%;
		border:1px solid rgb(1,10,27);
		float:left;
		padding:5px 0;
	}
	
	#leftbar ul{
		list-style-type:none;	
	}
	
	#leftbar ul li{
		width:100px;
		margin:10px 0;
		cursor:pointer;
	}
	#leftbar ul li a{
		text-decoration:none;
		color:inherit;
			
	}
	
	#rightbar{
		width:80%;
		float:right;			
	}
	
	.profile{
		width:100%;
		float:left;
		border:1px solid rgb(1,10,27);
		min-height:100px;
		margin:0 0 10px 0;
	}
	
	.header{
		background-color:rgb(1,10,27);
		color:white;
		padding:10px 0 10px 10px;
		font-size:14px;
	}
	label{
		color:black;
		font-weight:bold;	
	}
	.content{
		margin-left:10%;	
	}

	#info{
		margin:10px 70px 10px 0;
		float:left;
		clear:both;
		border:1px solid blue;
		background:rgb(202,206,254);
		color:blue;
		border-radius:6px;
		padding:20px 20px;
	}
	table th{
		width:100px;
	}
</style>

<div id="leftbar">
	<ul>
	<li>Edit Profile</li>
    <li><a href="home.php#inbox">Inbox</a></li>
    <li><a href="home.php#outbox">Outbox</a></li>
    <li><a href="complaint.php">Instant complaint</a></li>    
    </ul>
</div>
<div id="rightbar">
	<div class="profile">
    	<div class="header">
        	Message Details
        </div>
        <div class="content">
        	<div id="info">
				This complaint will be directly forwarded to asmp head and volunteer alloted to you so you will get response from him or one of volunteer very soon. If you have any problem regarding ASMP program or your mentor, PLease let us know.
            
            </div>
        
        		<label>Date: </label> <?php $datetime=explode(" ",$msg->sendAt);
					echo $datetime[0];
				 ?>&nbsp;&nbsp;
                 <label>Time: </label> <?php 
					echo $datetime[1];
				 ?><br /><br />
				<table>
                
                <tr>
                <th>Subject</th>
                <td><?php echo $msg->title; ?></td>
                </tr>
                <tr>
                <th>Message</th>
                <td><?php echo wordwrap($msg->message, 25, "<br/>", 1); ?></td>
                </tr>
                
                </table>
                <a href="home">Back</a>
			
			
        </div>
    
    </div>

</div>