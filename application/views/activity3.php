<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $user->nickname;?>的工作空间</title>
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
          <a class="brand" href="<?php echo base_url('index');?>">ACwork</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active">
                <a href="./#">Project1</a>
              </li>
              <li class="">
                <a href="./#">Project2</a>
              </li>
              <li style="margin-top:6px;margin-bottom:-12px;">
                <form class="form-inline">
                    <input type="text" class="input-small" style="width:130px;height:32px;" placeholder="Email">
                    <input type="password" class="input-small" style="width:130px;height:32px;" placeholder="password">
                    <label class="checkbox">
                        <input type="checkbox"> remember me
                    </label>
                    <button type="submit" class="btn">login</button>
                    <button type="submit" href="#register" class="btn" data-toggle="modal">register</button>
                    </form>              
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
                    <?php foreach($todo as $key=>$item){ ?>
                        <div class="accordion-group <?php if($key!=0) echo 'notfirst';?>">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#<?php echo 'collapse'.$key;?>">
                                      <?php echo $item->deadline.' '.$item->name;?>
                                </a>
                              </div>
                              <div id="<?php echo 'collapse'.$key;?>" class="accordion-body <?php if($key==0) echo 'in';?> collapse" <?php if($key==0) echo 'style="height: auto;"';?>>
                                <div class="accordion-inner">
                                    <a class="btn btn-mini control-todo">流产</a>
                                    <a class="btn btn-mini control-todo">延期</a>
                                    <a class="btn btn-mini control-todo">定稿</a>
                                    <a class="btn btn-mini control-todo">更新</a>
                                
                                    <?php echo $item->content;?>
                                </div>
                             </div>
                      </div>
                    <?php } ?>
                    </div>
                </div>
                
  <!-- ideas
    ================================================== -->
                <?php foreach($nov as $key => $item){ ?>
                <div class="well idea">
                     <div class="container-fluid">
                     <div class="row-fluid">
                        <div class="span2 avatar">
                            <?php if(isset($item->portrait)) echo img($item->portrait); else echo img('img/default/userportrait.jpg');?>
                        </div>
                        <div class="span10 idea-comment">
                            <?php
                                echo '<p>(这是一个'.$item->category.')</p>';
                                if($item->category=='demo')
                                    echo '<p>demo所对应的task名：'.$item->name.'</p>';
                                echo '<p>'.$item->nickname.':'.$item->text.'('.$item->ctime.')</p>';
                            ?>
                        </div>            
                    </div>
                    <hr />
                                        
                    <div class="row-fluid">
                        <div class="span2">
                        <a class="pull-left">顶(<?php echo isset($item->up)?$item->up:0; ?>)</a>
                        <a class="pull-right">踩(<?php echo isset($item->down)?$item->down:0; ?>)</a>
                        </div>
                        <div class="span10">
                            <?php

                                if($item->cmtnum>0){
                                    $image_properties = array(
                                        'src' => $item->firpt,
                                        'width' => '30',
                                    );
                                    echo '<p>';
                                    echo img($image_properties);
                                    echo $item->firname.':'.$item->fircmt.'('.$item->firtime.')</p>';
                                }
                                if($item->cmtnum>2){
                                    echo '<p><a>显示另外'.($item->cmtnum-2).'条回复</a></p>';
                                }
                                if($item->cmtnum>1){
                                    $image_properties = array(
                                        'src' => $item->lstpt,
                                        'width' => '30',
                                    );
                                    echo '<p>';
                                    echo img($image_properties);
                                    echo $item->lstname.':'.$item->lstcmt.'('.$item->lsttime.')</p>';
                                }
                            ?>
                            <form>
                                <input type="text" class="comment" style="height:25px;margin-bottom:0px;">
                                <button type="submit" class="btn">提交</button>
                            </form>
                        </div>         
                    </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

<!--======新建任务页面===============================
-->
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

<!--===================用户注册页面===========================
-->
        <div class="modal hide fade" id="register" style="display:none; position: 100, 0">
            <form class="form-horizontal">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3><center>新建用户</center></h3>
                </div>
                <div class="modal-body">
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">用户名</label>
                        <div class="controls">
                            <input class="input-xlarge focused" id="focusedInput" type="text" style="height:35px;">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">密码</label>
                        <div class="controls">
                            <input class="input-xlarge focused" id="focusedInput" type="text" style="height:35px;">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">昵称</label>
                        <div class="controls">
                            <input class="input-xlarge focused" id="focusedInput" type="text" style="height:35px;">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">注册邮箱</label>
                        <div class="controls">
                            <input class="input-xlarge focused" id="focusedInput" type="text" style="height:35px;">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">手机</label>
                        <div class="controls">
                            <input class="input-xlarge focused" id="focusedInput" type="text" style="height:35px;">
                        </div>
                    </div>
                    <!--
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">上传头像</label>
                        <div class="controls">
                            <a class="btn btn-mini" href="#" style="position:relative;top:5px">点击上传</a>
                        </div>
                    </div>
                -->
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
