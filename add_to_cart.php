<?php 

// add, remove, empty
if (!empty($_GET['action'])) {
    switch ($_GET['action']) {
        // add product to cart
        case 'add':
            if (!empty($_POST['quantity'])) {
                $pid = $_GET['pid'];
                $query = "SELECT * FROM products WHERE id=" . $pid;
                $result = mysqli_query($con, $query);
                while ($product = mysqli_fetch_array($result)) {
                    $itemArray = [
                        $product['code'] => [
                            'name' => $product['name'],
                            'code' => $product['code'],
                            'quantity' => $_POST['quantity'],
                            'price' => $product['price'],
                            'image' => $product['image']
                        ]
                    ];
                    if (isset($_SESSION['cart_item']) &&!empty($_SESSION['cart_item'])) {
                        if (in_array($product['code'], array_keys($_SESSION['cart_item']))) {
                            foreach ($_SESSION['cart_item'] as $key => $value) {
                                if ($product['code'] == $key) {
                                    if (empty($_SESSION['cart_item'][$key]["quantity"])) {
                                        $_SESSION['cart_item'][$key]['quantity'] = 0;
                                    }
                                    $_SESSION['cart_item'][$key]['quantity'] += $_POST['quantity'];
                                }
                            }
                        } else {
                            $_SESSION['cart_item'] += $itemArray;
                        }
                    } else {
                        $_SESSION['cart_item'] = $itemArray;
                    }
                }
            }
            break;
        case 'remove':
            if (!empty($_SESSION['cart_item'])) {
                foreach ($_SESSION['cart_item'] as $key => $value) {
                    if ($_GET['code'] == $key) {
                        unset($_SESSION['cart_item'][$key]);
                    }
                    if (empty($_SESSION['cart_item'])) {
                        unset($_SESSION['cart_item']);
                    }
                }
            }
            break;
        case 'empty':
            unset($_SESSION['cart_item']);
            break;
    }
}

