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

</style>

<div id="leftbar">
	<ul>
	<li>Edit Profile</li>
    <li><a href="#inbox">Inbox</a></li>
    <li><a href="#outbox">Outbox</a></li>
    </ul>
</div>
<div id="rightbar">
	<div class="profile">
    	<div class="header">
        	Profile
        </div>
        <div class="content">
        
        
        </div>
    
    </div>
    <a name="inbox"></a>
    <div class="profile">
    	<div class="header">
			Inbox
        </div>
        <div class="content">
        	You have 0 message in Inbox
        
        </div>
    
    </div>
    <a name="outbox"></a>
    <div class="profile">
    	<div class="header">
			Outbox
        </div>
        <div class="content">
        	You have 0 message in Outbox
        
        </div>
    
    </div>

</div>