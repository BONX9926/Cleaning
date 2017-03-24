<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">CleanSV</a>
    </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            <li id="index"><a href="index.php">หน้าแรก</a></li>
            <li id="about"><a href="about.php">บริการของเรา</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            

            <!-- <li><a href="" class="profile-image"><img src="{{ Auth::user()->avatar }}"></a></li> -->

            <?php if(isset($_SESSION['login'])) {?>
            <li><img src="<?=$_SESSION['avatar'];?>" style="width:30px;border-radius: 50%;padding: 1px;margin-top: 10px;display: inline-block;"></li>
            <li><i class="icon icon--lg icon--step-bond-guarantee"></i></li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <?=$_SESSION['email']?><span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
            <li><a href="profile.php">โปรไฟล์</a></li>
            <li><a href="#">จองบริการ</a></li>
            <?php if($_SESSION['status'] == 'A') {?>
            <li><a href="#">Admin</a></li>
            <?php 
                } 
                if($_SESSION['status'] == 'M') {
            ?>
            <li><a href="#">พนักงาน</a></li>
            <?php } ?>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">ออกจากระบบ</a></li>
            </ul>
            </li>
            <?php } else { ?>
            <li id="login"><a href="login.php" >เข้าสู่ระบบ / สมัครสมาชิก</a></li>
            <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
