<?
session_start();
include 'Kids.php';
$userdata = unserialize($_SESSION['userdata']);

$kidsData = unserialize($_SESSION['kidsdataobj']);
$kidsID = $kidsData->getKidsID();
$kidsName = $kidsData->getName();
$photo = $kidsData->getPhoto();
$DOB = $kidsData->getDOB();
$background = $kidsData->getBackground();
$region = $kidsData->getRegion();
$origin = $kidsData->getOrigin();
$aspiration = $kidsData->getAspiration();
$health = $kidsData->getHealth();
$education = $kidsData->getEducation();
$foundationID = $kidsData->getFoundationID();
$kidsIDinFoundation = $kidsData->getKidsIDinFoundation();
$age = $kidsData->getAge();
$foundation = "";
$foundationname = unserialize($_SESSION['foundationname']);
for ($i = 0; $i < count($foundationname); $i++) {
    $temp = $foundationname[$i];
    if ($foundationID == $temp[0]) {

        $foundation = $temp[1];
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/mainMenuCss.css">
        <link rel="stylesheet" type="text/css" href="../css/kidsProfile.css">
        <title>Kids Profile</title>
        <script type="text/javascript">
            function no()
            {
                window.location.href = 'KidsList.php';
            }
        </script>
    </head>
    <body class="Background">
        <?php include 'UserHeader.php' ?>
        <?php include 'Logo.php' ?>

        <div class="container">
            <div class="row-fluid">
                <div class="span2 paddingLeft">

                    <?php include('UserNavigation.php'); ?>

                </div>


                <div class="span9">
                    <div class="row-fluid">
                        <div class="kidsProfilePicture span2">
                            <img width="100%" style="border-radius:10px" src="../Database/Images/Kids/<? echo $photo ?>" alt="<? $kidsData->getName() ?>"/>

                        </div>

                        <div class="kidsProfilePost span9">
                            <div class="row-fluid">

                                <div class="span11 offset1">
                                    <h1><? echo $kidsName ?></h1>
                                    <form name="foundation" action="FoundationCtrl.php" method="post">
                                        <input type="hidden" name="action" value="foundationprofile"/>
                                        <input type="hidden" name="foundationSelectedID" value="<?php echo $foundationID ?>"/>

                                    </form>
                                    <a href="javascript: foundation()"><? echo $foundation ?></a> 
                                    <script>
                                        function foundation() {
                                            document.foundation.submit();
                                        }
                                    </script><br/>
                                    Aspiration <? echo $aspiration ?>
                                </div>  
                            </div>
                        </div>

                    </div>

                    <div class="row-fluid margin-top">
                        <!-- Main Menu Class -->
                        <div class="span12">

                            <div class="row-fluid">
                                <div class="kidsFeedTop">
                                    <div class="myFont">
                                        <p class="myFont"> Information </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="kidsFeedMiddle">
                                    <table>
               <!--                                      <tr>
                                                        <td>Foundation ID</td>
                                                        <td>:</td>
                                                        <td><? echo $kidsData->getFoundationID() ?></td>
                                                    </tr> -->

                                        <tr>
                                            <td><img src="../img/kidsinfo/kidsicon_dob.png" alt="Smiley face" height="42" width="42"> </td>
                                            <td> &nbsp; <? echo $kidsData->getDOB() ?></td>
                                        </tr>

                                        <tr>
                                            <td><img src="../img/kidsinfo/kidsicon_age.png" alt="Smiley face" height="42" width="42"></td>
                                            <td> &nbsp; <?php echo $age ?> years old</td>
                                        </tr>

                                        <tr>
                                            <td><img src="../img/kidsinfo/kidsicon_origin.png" alt="Smiley face" height="42" width="42"></td>
                                            <td> &nbsp; <? echo $kidsData->getOrigin() ?></td>
                                        </tr>

                                        <tr>
                                            <td><img src="../img/kidsinfo/kidsicon_parentsjob.png" alt="Smiley face" height="42" width="42"></td>
                                            <td valign="center"> &nbsp; <? echo $kidsData->getBackground() ?></td>
                                        </tr>
                                        <tr>

                                            <td><img src="../img/kidsinfo/kidsicon_needs.png" alt="Smiley face" height="42" width="42"></td>
                                            <td valign="top">
                                                <?
                                                if ($kidsData->getHealth() == '1') {
                                                    ?>  &nbsp; 
                                                    Health <br>
                                                    <?
                                                }
                                                if ($kidsData->getEducation() == '1') {
                                                    ?>  &nbsp; 
                                                    Education <br>
                                                    <?
                                                }
                                                if ($kidsData->getNutrition() == '1') {
                                                    ?>  &nbsp; 
                                                    Nutrition
                                                    <?
                                                }
                                                ?> 
                                            </td>
                                        </tr>

                                    </table>                     



                                    <form action='KidsCtrl.php' method="post">
                                        <input type="hidden" name="action" value="fosterKid">

                                        <table class="margin-top"><!-- TABLE AFTER FIRST TABLE -->
                                            <tr>
                                            <br>Total Coins to Donate : <? echo $_SESSION['quantity'] ?> Coins<br>
                                            </tr>

                                            <tr>
                                                <td valign="top" frame="box"align="left" rowspan="7" width="200px">

                                                    <input type="submit" value="Yes" class="myFont-button">
                                                    <input type="button" value="No" onclick="no()" class="myFont-button"><br/>
                                                    <input type="hidden" name="quantity" value="<? echo $_SESSION['quantity'] ?>">
                                                    <input type="hidden" name="kidsSelected" value="<? echo $kidsData->getKidsID() ?>">
                                                    <input type="hidden" name="foundationID" value="<? echo $kidsData->getFoundationID() ?>"/>
                                                    <input type="hidden" name="kidsID" value="<? echo $kidsData->getKidsID() ?>">
                                                </td>
                                            </tr>
                                        </table><!-- END OF TABLE AFTER FIRST TABLE -->
                                    </form>


                                    <div class="row">
                                        <div class="accordion margin-top" id="accordion2">
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                                        Kid's Journal
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="collapseOne" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                                Comming Soon
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="kidsFeedBot">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <?php include 'UserModal.php'; ?>

            </div>
        </div>





        <?php include 'Footer.php' ?>
        <?php include 'Script.php' ?>










    </body>
</html>
