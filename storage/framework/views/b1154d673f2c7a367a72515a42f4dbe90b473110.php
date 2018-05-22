<!-- ========== Left Sidebar Start ========== -->
<?php
    $urls = ["/home","/home/users","/home/colleges","/home/degrees","/home/questions","/home/answers","/home/results"];
    $classes = ["md md-home","md ion-android-social","md md-school","md md-book","md md-question-answer","md md-vpn-key","md md-view-list"];
    $desc = ["Dashboard","Users","Colleges","College Degrees","Questions","Answer Keys","Assesment Records"];
?>
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="../img/uploads/<?php echo e(Auth::user()->avatar); ?>" alt="" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo e(Auth::user()->name); ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/assessment"><i class="md md-check"></i>Assessment</a></li>
                        <li><a href="/userProfile/<?php echo e(Auth::user()->id); ?>"><i class="md md-person"></i>User Profile</a></li>
                        <li>
                            <a href="/home/logout">
                                <i class="md md-settings-power"></i>Logout
                            </a>
                        </li>
                    </ul>
                </div>
                <p class="text-muted m-0">Admin</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <?php $i; for($i = 0;$i < 7;$i++){ ?>
                <li><a href="<?=$urls[$i];?>" class="waves-effect"><i class="<?=$classes[$i];?>"></i><span> <?=$desc[$i];?> </span></a></li>
                <?php }?>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->
