<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<?php 
    $cart = [];
    if(!empty($_SESSION['loginname'])) {
        if (!empty($_SESSION['cart'])) {
            $keys = array_keys($_SESSION['cart']);
            foreach ($keys as $cookie) {
                if (array_key_exists($cookie, $catalog)) {
                    $qty = $_SESSION['cart'][$cookie];
                    $catalog[$cookie] += array('id' => $cookie);
                    $catalog[$cookie] += array('qty' => $qty);
                    $cart[] = $catalog[$cookie];
                }
            }  
        }
    }
?>
<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($cart as $cookie) { ?> 
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $cookie['id'] ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p>Quantity : <?= $cookie['qty'] ?></p>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>



</section>
<?php require 'inc/foot.php'; ?>
