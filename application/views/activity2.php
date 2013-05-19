<html lang="en">
<head>
    <meta charset="utf-8">
    <title>XXX的工作空间</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url("css/bootstrap.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("css/bootstrap-responsive.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("css/acwork.css");?>" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    
  <style type="text/css">
  	#yddContainer{display:block;font-family:Microsoft YaHei;position:relative;width:100%;height:100%;top:-4px;left:-4px;font-size:12px;border:1px solid}#yddTop{display:block;height:22px}#yddTopBorderlr{display:block;position:static;height:17px;padding:2px 28px;line-height:17px;font-size:12px;color:#5079bb;font-weight:bold;border-style:none solid;border-width:1px}#yddTopBorderlr .ydd-sp{position:absolute;top:2px;height:0;overflow:hidden}.ydd-icon{left:5px;width:17px;padding:0px 0px 0px 0px;padding-top:17px;background-position:-16px -44px}.ydd-close{right:5px;width:16px;padding-top:16px;background-position:left -44px}#yddKeyTitle{float:left;text-decoration:none}#yddMiddle{display:block;margin-bottom:10px}.ydd-tabs{display:block;margin:5px 0;padding:0 5px;height:18px;border-bottom:1px solid}.ydd-tab{display:block;float:left;height:18px;margin:0 5px -1px 0;padding:0 4px;line-height:18px;border:1px solid;border-bottom:none}.ydd-trans-container{display:block;line-height:160%}.ydd-trans-container a{text-decoration:none;}#yddBottom{position:absolute;bottom:0;left:0;width:100%;height:22px;line-height:22px;overflow:hidden;background-position:left -22px}.ydd-padding010{padding:0 10px}#yddWrapper{color:#252525;z-index:10001;background:url(chrome-extension://eopjamdnofihpioajgfdikhhbobonhbb/ab20.png);}#yddContainer{background:#fff;border-color:#4b7598}#yddTopBorderlr{border-color:#f0f8fc}#yddWrapper .ydd-sp{background-image:url(chrome-extension://eopjamdnofihpioajgfdikhhbobonhbb/ydd-sprite.png)}#yddWrapper a,#yddWrapper a:hover,#yddWrapper a:visited{color:#50799b}#yddWrapper .ydd-tabs{color:#959595}.ydd-tabs,.ydd-tab{background:#fff;border-color:#d5e7f3}#yddBottom{color:#363636}#yddWrapper{min-width:250px;max-width:400px;}
  	
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    
  </style>
 </head>

  <body data-spy="scroll" data-target=".subnav" data-offset="50">


  <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="./index.html">ACwork</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active">
                <a href="./#">Project1</a>
              </li>
              <li class="">
                <a href="./#">Project2</a>
              </li>

            </ul>
          </div>
        </div>
      </div>
    </div>

	<div class="container">
		<div class="row">
			<div class="span10 offset1">
				<div class="alert">
					<a class="close" data-dismiss="alert">×</a>
					Notice
				</div>
				<button id="opentodo" class="btn">展开TODO List ▼</button>
				<button data-toggle="modal" href="#newTask" class="btn btn-primary">新建任务</button>
				<div class="well deadline-area">
					<div class="accordion" id="accordion2">
		            	<div class="accordion-group">
		            		<div class="accordion-heading">
		                		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
		                  			Deadline1
		                		</a>
		              		</div>
		              		<div id="collapseOne" class="accordion-body in collapse" style="height: auto;">
		                	<div class="accordion-inner">
		                		<a class="btn btn-mini control-todo">流产</a>
		                		<a class="btn btn-mini control-todo">延期</a>
		                		<a class="btn btn-mini control-todo">定稿</a>
		                		<a class="btn btn-mini control-todo">更新</a>
		                	
				  				You should do it before. 否则你会死得很惨
		                	</div>
		              	</div>
		            </div>
		            <div class="accordion-group notfirst">
		            	<div class="accordion-heading">
		            		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
		                  		Deadline2
		                	</a>
		              	</div>
		              	<div id="collapseTwo" class="accordion-body collapse">
		             		<div class="accordion-inner">
		                		<a class="btn btn-mini control-todo">流产</a>
		                		<a class="btn btn-mini control-todo">延期</a>
		                		<a class="btn btn-mini control-todo">定稿</a>
		                		<a class="btn btn-mini control-todo">更新</a>
		             		
				  				You should do it before deadline2! <br /> Do you understand?
		               		</div>
		              	</div>
		            </div>
		            <div class="accordion-group notfirst">
		            	<div class="accordion-heading">
		               		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
		                  		Deadline3
		                	</a>
		              	</div>
		              	<div id="collapseThree" class="accordion-body collapse">
		                	<div class="accordion-inner">
		                		<a class="btn btn-mini control-todo">流产</a>
		                		<a class="btn btn-mini control-todo">延期</a>
		                		<a class="btn btn-mini control-todo">定稿</a>
		                		<a class="btn btn-mini control-todo">更新</a>
		                	
				  				You will not finished this project.
		                	</div>
		              	</div>
		            </div>
		          </div>
				</div>
				
  <!-- ideas
    ================================================== -->
				
				<div class="well idea">
				 	<div class="container-fluid">
				 	<div class="row-fluid">
						<div class="span2 avatar">
						</div>
						<div class="span10 idea-comment">
							blablabla
						</div>			
					</div>
					<hr />
										
					<div class="row-fluid">
						<div class="span2">
						<a class="pull-left">顶(20)</a>
						<a class="pull-right">踩(0)</a>
						</div>
						<div class="span10">
							<p>	我：哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈</p>
							<p>	XXX:hahahaha</p>
							<p>	XXX:hahahaha</p>
							<form>
								<input type="text" class="comment" style="height:25px;margin-bottom:0px;">
								<button type="submit" class="btn">提交</button>
							</form>
						</div>					
					</div>
					</div>
			</div>
			
			<div class="well idea">
				 	<div class="container-fluid">
				 	<div class="row-fluid">
						<div class="span2 avatar">
						</div>
						<div class="span10 idea-comment">
							blablabla
						</div>			
					</div>
					<hr />
					<div class="row-fluid">
						<div class="span2">
						<a class="pull-left">顶(10)</a>
						<a class="pull-right">踩(100)</a>
						</div>
						<div class="span10">
							<p>	路人甲：你说的很有道理</p>
							<p>	XXX:hahahaha</p>
							<p>	XXX:hahahaha</p>
							<form>
								<input type="text" class="comment" style="height:25px;margin-bottom:0px;">
								<button type="submit" class="btn">提交</button>
							</form>
						</div>					
					</div>

					</div>
			</div>


		</div>
      
    </div>

	<div class="modal hide fade" id="newTask" style="display:none;">
	    <form class="form-horizontal">
	    <div class="modal-header">
	        <a class="close" data-dismiss="modal">×</a>
	        <h3><center>新建任务</center></h3>
	    </div>
	    <div class="modal-body">
	        <div class="control-group">
	            <label class="control-label" for="focusedInput">任务名称</label>
	            <div class="controls">
	                <input class="input-xlarge focused" id="focusedInput" type="text">
	            </div>
	        </div>
	        <div class="control-group">
	            <label class="control-label" for="focusedInput">截止时间</label>
	            <div class="controls">
	                <input class="input-xlarge focused" id="focusedInput" type="text">
	            </div>
	        </div>
	        <div class="control-group">
	            <label class="control-label" for="focusedInput">分配给</label>
	            <div class="controls">
	                <input class="input-xlarge focused" id="focusedInput" type="text">
	            </div>
	        </div>
	    <div>
	        <label class="control-label" for="textarea">内容</label>
	        <div class="controls">
	            <textarea class="input-xlarge" id="textarea" row="5" style="height:200px;"></textarea>
	        </div>
	    </div>
	
	    </div>
	    <div class="modal-footer">
	        <a href="#" class="btn btn-primary">提交</a>
	        <a href="#" class="btn" data-dismiss="modal">取消</a>
	    </div>
	</form>
	</div>

	
	</div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?php echo base_url("js/jquery-1.9.1.min.js");?>"></script>
   
    <script type="text/javascript" src="<?php echo base_url("js/bootstrap.js");?>"></script>

    <script type="text/javascript" src="<?php echo base_url("js/acwork.js");?>"></script>

  

</body>
</html>