<html>

<?php include "components/head.php"; ?>
<?php include "inc/fn/register.php" ?>
<link rel="stylesheet" href="style.css">

<body>
    <div class="login-root">
        <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
            <div class="loginbackground box-background--white padding-top--64">
                <div class="loginbackground-gridContainer">
                    <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
                        <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
                        </div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
                        <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
                        <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
                        <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
                        <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
                        <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
                        <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
                        <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
                        <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
                    </div>
                </div>
            </div>
            <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
                <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
                    <h1><a href="/" rel="dofollow" class="text-3xl font-bold text-blue-500">Nuke</a></h1>
                </div>
                <div class="formbg-outer">
                    <div class="formbg">
                        <div class="formbg-inner padding-horizontal--48">
                            <span class="padding-bottom--15">Create an account</span>
                            <form id="stripe-login" method="POST">
                                <div class="field padding-bottom--24">
                                    <label for="name">Full Name</label>
                                    <input type="name" name="name" value="<?php if (isset($name)) {
                                                                                echo $name;
                                                                            } ?>">
                                </div>
                                <div class="field padding-bottom--24">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="<?php if (isset($email)) {
                                                                                echo $email;
                                                                            } ?>">
                                    <?php if (isset($errors["email"])) { ?>
                                        <span class="error"><?php echo $errors["email"]; ?></span>
                                    <?php } ?>
                                </div>
                                <div class="field padding-bottom--24">
                                    <label for="phone">Phone Number</label>
                                    <input type="phone" name="phone" value="<?php if (isset($phone)) {
                                                                                echo $phone;
                                                                            } ?>">
                                    <?php if (isset($errors["phone"])) { ?>
                                        <span class="error"><?php echo $errors["phone"]; ?></span>
                                    <?php } ?>
                                </div>
                                <div class="field padding-bottom--24">
                                    <div class="grid--50-50">
                                        <label for="password">Password</label>
                                        <!--<div class="reset-pass">
                      <a href="#">Forgot your password?</a>
                    </div>-->
                                    </div>
                                    <input type="password" name="password">
                                    <?php if (isset($errors["password"])) { ?>
                                        <span class="error"><?php echo $errors["password"]; ?></span>
                                    <?php } ?>
                                </div>
                                <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                                </div>
                                <div class="field">
                                    <input type="submit" name="submit" value="Continue">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer-link padding-top--24">
                        <span>Already have an account? <a href="login.php">Sign in</a></span>
                        <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
                            <span><a href="#">&copy; Nuke</a></span>
                            <span><a href="#">Contact</a></span>
                            <span><a href="#">Privacy & terms</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>