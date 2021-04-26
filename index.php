<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<?php
    // if (!isset($_SESSION['panier'])){
    // $_SESSION['panier']=array();
    // }
    
    if(isset($_GET['add_to_cart'])){
        // si pas de panier le creer
        if (!isset($_SESSION['panier'])){
            $_SESSION['panier']=array();
        }
        // si le produit n'existe pas le panier le creer avec une valeur quantite
        if (!isset($_SESSION['panier'][$_GET['add_to_cart']])){
            $_SESSION['panier'][$_GET['add_to_cart']]=array();
            //           array_push($_SESSION['panier'],$_GET['add_to_cart']);
            $_SESSION['panier'][$_GET['add_to_cart']]['quantite']=1;
        }
        else{
            $_SESSION['panier'][$_GET['add_to_cart']]['quantite']+=1;
        }
        header('Location: /index.php');
    }
?>

<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <a href="?add_to_cart=<?= $id; ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>

<?php require 'inc/foot.php'; ?>
