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
</style>

<div id="leftbar">
  <ul>
  <!--<li>Edit Profile</li>-->
    <li><a href="home.php#inbox">Inbox</a></li>
    <li><a href="home.php#outbox">Outbox</a></li>
    <li><a href="complaint">Instant Feedback</a></li>    
    </ul>
</div>
<div id="rightbar">
  <div class="profile">
      <div class="header">
          Send message
        </div>
        <div class="content">
          <div id="info">
        Your mails will be directly send to your mentor/mentee's primary id.<br />
                Subject Limit : 60 and Message Limit: 160 characters.
            
            </div>
          <div style="float:left; clear:both;">
          You will able to mail your mentor to his email directly from the interface. But Yet mentor is not alloted to you.
          </div>
        </div>
    
    </div>

</div>