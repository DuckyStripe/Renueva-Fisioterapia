
<?php
    if(isset($_GET['action'])){
        $action =$_GET['action']; 
    }else{
        $action ="shop";
    }
    
    switch($action){
        case 'shop':
            include('../../Template/headshop.php');
            include ('../../modulos/shop.php');
        break;
        case 'carrito':
            include('../../Template/headshop2.php');
            include('../../modulos/carrito.php');
        break;
        case 'pagar':
            include('../../Template/headshop2.php');
            include('../../modulos/pagar.php');
        break;
        case 'checkout':
            include('../../Template/headshop2.php');
            include('../../modulos/checkout.php');
        break;
        default:
            include('../../Template/headshop.php');
            include ('../../modulos/shop.php');
        break;
    }
?>
