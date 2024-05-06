<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FILTRATE</title>
    <link rel="stylesheet" href="../css/filtrate.css">
</head>
<body>
    <?php 
        include_once '../PHP/conn.php';
        $sql = "select * from tenant where tn_name = '".$_SESSION['loggedUsername']."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)){
            $info = mysqli_fetch_array($result);
        }
        else{
            die("Valid user not found!");
        }
    ?>

    <header class="head" id="head">

        <!-- logo -->
        <div class="logo_box">
            <p>MRP</p>
        </div>

        <!-- Top navigation -->
        <div class="nav_box">
            <a href="home.html"><span class="home_page">HOME</span></a>
            <span class="rent_house">RENT</span>
        </div>

       <!-- Head Portrait -->
       <?php   
            if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] <> ''){ //
        ?>
        <div class="photo">
            <a href="myprofile.php"><img src="<?php echo $info['tn_photo'] ?>" alt="some_text" width="50" height="50" style="border-radius: 50%;margin-top: 25px;margin-left: 122px;"></a>     
        </div>
        <?php
            }
            else{
        ?>  
        <div class="photo">
            <a href="myprofile.php"><img src="../web/coverage/photo.png" alt="some_text" width="50" height="50" style="border-radius: 50%;margin-top: 25px;margin-left: 250px;"></a>     
        </div>
        <?php
            }
        ?>

    </header>

    <!--search-->
    <form action="" class="search_box">
        <input class="search" type="text" name="search" id="searchBox" placeholder=" Please enter your search">
        <input type="button" name="submit" id="searchButton" value="search" style="border: none;background-color: rgba(217, 179, 163, 86);opacity: 0.79;">
        <script>
            var searchEle = document.getElementById("searchBox");
            var c = searchEle.placeholder;
            searchEle.onfocus = function () {
                if (searchEle.placeholder === c){
                    searchEle.placeholder = ""
                }
            };
            searchEle.onblur = function () {
                if (!searchEle.placeholder.trim()){
                    searchEle.placeholder = c;
                }
            };
        </script>
    </form>

    <!-- filtrate -->
    <section class="select_box">
        <div class="address_box">
            <p class="address_text">LOCATION</p>
            <form>
                <input type="radio" name="address" value="address1" style="margin-top: 20px;margin-left: 87px;"/><label>UL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input checked name="address" type="radio" value="address2"/><label>惠城区&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="address" type="radio" value="address3"/><label>惠阳区&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="address" type="radio" value="address4"/><label>惠东县&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="address" type="radio" value="address5"/><label>博罗县&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            </form>
        </div>

        <div class="type_box">
            <p class="type_text">TYPE</p>
            <form>
                <input type="radio" name="type" value="type1" style="margin-top: 20px;margin-left: 87px;"/><label>UL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="type" type="radio" value="type2"/><label>JOINT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="type" type="radio" value="type3"/><label>ENTIRE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input checked name="type" type="radio" value="type4"/><label>FLAT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="type" type="radio" value="type5"/><label>LOFT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            </form>
        </div>

        <div class="unit_box">
            <p class="unit_text">ROOM TYPE</p>
            <form>
                <input type="radio" name="unit" value="unit1" style="margin-top: 20px;margin-left: 87px;"/><label>UL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="unit" type="radio" value="unit2"/><label>1R1L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input checked name="unit" type="radio" value="unit3"/><label>2R1L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="unit" type="radio" value="unit4"/><label>3R2L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="unit" type="radio" value="unit5"/><label>4R2L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            </form>
        </div>

        <div class="area_box">
            <p class="area_text">AREA</p>
            <form>
                <!--<input type="text" name="area" placeholder="AREA" style="height: 28px; width: 200px;margin-left: 117px;margin-top: 15px;">-->
                <input type="radio" name="area" value="area1" style="margin-top: 20px;margin-left: 87px;"/><label>UL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="area" type="radio" value="area2"/><label>50m²-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input checked name="area" type="radio" value="area3"/><label>50~80m²&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="area" type="radio" value="area4"/><label>80~100m²&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="area" type="radio" value="area5"/><label>100m²+&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            </form>
        </div>

        <div class="style_box">
            <p class="style_text">DECOR</p>
            <form>
                <input type="radio" name="style" value="style1" style="margin-top: 20px;margin-left: 50px;"/><label>UL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="style" type="radio" value="style2"/><label>REFINED&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="style" type="radio" value="style3"/><label>ROUGH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input checked name="style" type="radio" value="style4"/><label>INS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="style" type="radio" value="style5"/><label>TRADITIONAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="style" type="radio" value="style6"/><label>WARM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            </form>
        </div>

        <hr style="border: none;background-color:#BBBBBB; width: 90%;margin-top: 10px;margin-left: 50px;height: 1px;">

        <div class="sumit_button">
            <input type="button" name="sumit"  value="filtrate" style="border: 0;background-color: #826D6D; color: white;font-size: 13px; width: 120px;height: 30px;">
        </div>
    </section>

    <!-- ROOM -->
    <section class="house_box">
    <a href="roomdetails.html"><div class="house1">
        <div class="house_photo">
            <a href="roomdetails.php"><img src="../web/coverage/roomdetails1.jpg" alt="some_text" width="100%" height="180px" style="border-radius: 15px 15px 0 0;"></a>
        </div>
        <div class="big_title">
            <span class="house_title">幸福花园的二居室</span>
            <span class="price">¥1500/MON</span>
        </div>
        <p class="area_unit">65m²  |  2R1L</p>
        <p class="address_title">惠城区河南岸演达大道金山湖路34号</p>
    </div></a>

    <div class="house2">
        <div class="house_photo">
            <a href="房屋详情.php"><img src="../web/coverage/room3.jpg" alt="some_text" width="100%" height="180px" style="border-radius: 0px 15px 0 0;"></a>
        </div>
        <div class="big_title">
            <span class="house_title">图图乐园的大别墅</span>
            <span class="price">¥5000/MON</span>
        </div>
        <p class="area_unit">412m²  |  4R2L</p>
        <p class="address_title">博罗县富贵大道府前路7号</p>
    </div>

    <div class="house3">
        <div class="house_photo">
            <a href="roomdetails.php"><img src="../web/coverage/room4.jpg" alt="some_text" width="100%" height="180px" style="border-radius: 15px 15px 0 0;"></a>
        </div>
        <div class="big_title">
            <span class="house_title">颐景佳园的三居室</span>
            <span class="price">¥2000/MON</span>
        </div>
        <p class="area_unit">98m²  |  3R2L</p>
        <p class="address_title">惠阳区西湖路198号</p>
    </div>
    </section>
    
</body>

</html>