<?php require 'inc/head.php'; ?>
<?php require 'inc/data/products.php'; ?>
<?php
//        @todo user is not connect
        if (!isset($_SESSION['loginname'])) {
            header("Location: /login.php");
        }
?>

<section class="cookies container-fluid">
    <div class="row">
        <p>Panier de <?php echo $_SESSION['loginname'] ?>:</p>
        <section class="cookies container-fluid">
            <div class="row">
            <?php if(!isset ($_SESSION['panier'])){ echo "Panier vide";} else {?>
                <?php foreach ($_SESSION['panier'] as $id=>$val) { ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $catalog[$id]['name']; ?>" class="img-responsive">
                        <figcaption class="caption">
                            <h3><?= $catalog[$id]['name']; ?></h3>
                            <p><?= $catalog[$id]['description']; ?></p>
                            <p>Quantité : <?php echo $_SESSION['panier'][$id]['quantite']; ?>
                        </figcaption>
                    </figure>
                </div>
                <?php } }?>
            </div>
        </section>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
