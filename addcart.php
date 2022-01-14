<?php 
    session_start();
    ob_start();
    include("connection.php");
    if(isset($_POST["pro_id"])){
        $pro_id= $_POST["pro_id"];
        $sqlSelectProduct="SELECT * FROM tbl_product WHERE pro_id=$pro_id";
        $result = mysqli_query($conn,$sqlSelectProduct) or die($sqlSelectProduct);
        $rowProduct = mysqli_fetch_row($result);
        
        if(!isset($_SESSION["cart"])){
            $cart[$pro_id]=array(
                "pro_name"=>$rowProduct[1],
                "image"=>$rowProduct[3],
                "price"=>$rowProduct[4],
                "quanlity"=>1,
            );
            $_SESSION["cart"] = $cart;
        }else{
            $cart=$_SESSION["cart"];
            if(array_key_exists($pro_id,$cart)){
                $cart[$pro_id]=array(
                    "pro_name"=>$rowProduct[1],
                    "image"=>$rowProduct[3],
                    "price"=>$rowProduct[4],
                    "quanlity"=>$cart[$pro_id]["quanlity"] +1,
                );
                $_SESSION["cart"] = $cart;
            }else{
                $cart[$pro_id]=array(
                    "pro_name"=>$rowProduct[1],
                    "image"=>$rowProduct[3],
                    "price"=>$rowProduct[4],
                    "quanlity"=>1,
                );
                $_SESSION["cart"] = $cart;
            }
        }

    $quantily =0;

    if(!empty($_SESSION["cart"])){
        foreach($_SESSION["cart"] as $val){
            $quantily += $val["quanlity"];
        }
    }
    echo $quantily;

    
    



        
        // echo "<pre>";
        // print_r($_SESSION["cart"]);
        // die;
    }
?>