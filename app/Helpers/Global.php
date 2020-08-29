<?php
/**
 * Plugin Name: wc-api-plugin
 * Plugin URI: http://google.com/
 * Description: Plugin to write mobile API
 * Version: 1.0
 * Author: Abhishek
 * Author URI: http://google.com/
 */

add_action('rest_api_init', 'register_my_route');

function register_my_route()
{
    register_rest_route('wp/v2', 'all-products', array(
        'methods' => 'POST',
        'callback' => 'woocomm_all_products',
    ));

    register_rest_route('wp/v2', 'product-details', array(
        'methods' => 'POST',
        'callback' => 'woocomm_api_product_details',
    ));

    register_rest_route('wp/v2', 'home-page', array(
        'methods' => 'POST',
        'callback' => 'home_page_details',
    ));

    register_rest_route('wp/v2', 'product-add-to-cart', array(
        'methods' => 'POST',
        'callback' => 'woocomm_add_to_cart',
    ));
    
    register_rest_route('wp/v2', 'product-add-to-cart-api', array(
        'methods' => 'POST',
        'callback' => 'woocomm_add_to_cart_api',
    ));

    register_rest_route('wp/v2', 'remove-cart-product', array(
        'methods' => 'POST',
        'callback' => 'woocomm_remove_from_cart',
    ));

    register_rest_route('wp/v2', 'offers', array(
        'methods' => 'POST',
        'callback' => 'wp_get_offers',
    ));

    register_rest_route('wp/v2', 'user-cart', array(
        'methods' => 'POST',
        'callback' => 'woocomm_user_cart',
    ));

    register_rest_route('wp/v2', 'user-wishlist', array(
        'methods' => 'POST',
        'callback' => 'user_wishlist',
    ));

    register_rest_route('wp/v2', 'add-remove-to-wishlist', array(
        'methods' => 'POST',
        'callback' => 'add_remove_to_wishlist',
    ));
}

function cart_added_quantity_check($userId, $productId) {
    $full_user_meta = get_user_meta($userId,'_woocommerce_persistent_cart_1',true);

    $quantity = 0;
    if(isset($full_user_meta['cart']) && count($full_user_meta['cart'])) {
        foreach($full_user_meta['cart'] as $key => $value) {
            if($productId  == $value['product_id']) {
                $quantity = $value['quantity'];
                break;
            }
        }
    }

    return $quantity;
}

function is_favourite_product_exist($userId, $productId) {
    global $wpdb;
    $returnValue = 0;
    $wishListArray = $wpdb->get_row("SELECT * FROM wp_yith_wcwl_lists  WHERE user_id = $userId AND is_default = 1", ARRAY_A);
    //echo "SELECT * FROM wp_yith_wcwl_lists  WHERE user_id = $userId AND is_default = 1";
    if(!empty($wishListArray)) {
        $wishListId = $wishListArray['ID'];

        $checkExist = $wpdb->get_row("SELECT * FROM wp_yith_wcwl WHERE prod_id = $productId AND wishlist_id = $wishListId", ARRAY_A);

        if(!empty($checkExist)) {
            $returnValue =  1;
        } else {
            $returnValue =  0;
        }

    } else {
        $returnValue = 0;
    }

    return $returnValue;
}

function generate_wishlist_token() {
    global $wpdb;

    $sql = "SELECT COUNT(*) FROM `{$wpdb->yith_wcwl_wishlists}` WHERE `wishlist_token` = %s";

    do {
        $dictionary = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $nchars = 12;
        $token = "";

        for( $i = 0; $i <= $nchars - 1; $i++ ){
            $token .= $dictionary[ mt_rand( 0, strlen( $dictionary ) - 1 ) ];
        }

        $count = $wpdb->get_var( $wpdb->prepare( $sql, $token ) );
    }
    while( $count != 0 );

    return $token;
}

function add_remove_to_wishlist($param = null)
{
    global $wpdb;
    $userId = (int)$param['user_id'];
    $productId = (int)$param['product_id'];
    $type = $param['type'];

    if (empty($param['user_id'])) {
        $response = [
            'status' => false,
            'message' => 'User ID missing.',
            'data' => []
        ];
        return rest_ensure_response($response);
    }

    if (empty($param['product_id'])) {
        $response = [
            'status' => false,
            'message' => 'Product ID missing.',
            'data' => []
        ];
        return rest_ensure_response($response);
    }

    /*    if (empty($param['type'])) {
            $response = [
                'status' => false,
                'message' => 'Type is missing.',
                'data' => []
            ];
            return rest_ensure_response($response);
        }*/

    $wishListArray = $wpdb->get_row("SELECT * FROM wp_yith_wcwl_lists  WHERE user_id = $userId AND is_default = 1", ARRAY_A);

    if(count($wishListArray)) {
        $wishListId = $wishListArray['ID'];

        if($type == 1) {
            $checkExist = $wpdb->get_row("SELECT * FROM wp_yith_wcwl WHERE prod_id = $productId AND wishlist_id = $wishListId", ARRAY_A);
            if(empty($checkExist)) {

                $productDetail = wc_get_product($productId);

                $wpdb->insert('wp_yith_wcwl', array(
                    'prod_id' => $productId,
                    'quantity' => 1,
                    'user_id' => $userId,
                    'wishlist_id' => $wishListId,
                    'original_price' => empty($productDetail->sale_price) ? $productDetail->regular_price : $productDetail->sale_price,
                    'original_currency' => 'AED',
                    'on_sale' => empty($productDetail->sale_price) ? 0 : 1
                ));

            }
        } else {
            $wpdb->query( "DELETE FROM wp_yith_wcwl WHERE user_id = $userId AND prod_id = $productId" );
        }
    } else {

        $wpdb->insert('wp_yith_wcwl_lists', array(
            'user_id' => $userId,
            'wishlist_name' => 'My wishlist on Yalda Fresh',
            'is_default' => 1,
            'wishlist_slug' => sanitize_title_with_dashes('My wishlist on Yalda Fresh'),
            'wishlist_token' => generate_wishlist_token()
        ));
        $wishListId = $wpdb->insert_id;

        if($type == 1) {
            $productDetail = wc_get_product($productId);
            $wpdb->insert('wp_yith_wcwl', array(
                'prod_id' => $productId,
                'quantity' => 1,
                'user_id' => $userId,
                'wishlist_id' => $wishListId,
                'original_price' => empty($productDetail->sale_price) ? $productDetail->regular_price : $productDetail->sale_price,
                'original_currency' => 'AED',
                'on_sale' => empty($productDetail->sale_price) ? 0 : 1
            ));
        }
    }

    $response = [
        'status' => true,
        'message' => 'Request completed successfully',
    ];

    return rest_ensure_response($response);
}

function user_wishlist($param = null)
{
    global $wpdb;


    if (empty($param['user_id'])) {
        $response = [
            'status' => false,
            'message' => 'User ID missing.',
            'data' => []
        ];
        return rest_ensure_response($response);
    }

    $userId = (int)$param['user_id'];

    $wishListArray = $wpdb->get_row("SELECT * FROM wp_yith_wcwl_lists  WHERE user_id = $userId AND is_default = 1", ARRAY_A);
    $products = [];
    $wishListProducts = [];

    if(count($wishListArray)) {
        $wishListId = $wishListArray['ID'];
        $wishListProducts = $wpdb->get_results("SELECT * FROM wp_yith_wcwl WHERE user_id = $userId AND wishlist_id = $wishListId", ARRAY_A);
        if(count($wishListProducts)) {
            foreach($wishListProducts as $wishListProduct) {
                $productId = $wishListProduct['prod_id'];
                $productDetail = wc_get_product($productId);

                $imageId = $productDetail->get_image_id();
                $imageUrl = wp_get_attachment_image_url($imageId, 'full');

                $unit = get_post_meta($productId, 'pro_price_extra_info', true);
                $targeted_id = (int)$productId;
                //echo "<pre>"; print_r($productDetail);die( ' sdfsdf');
                $product = [
                    'id' => $targeted_id,
                    'title' => $productDetail->name,
                    'price' => $productDetail->regular_price,
                    'image' => empty($imageUrl) ? '' : $imageUrl,
                    'fav_status' => is_favourite_product_exist($userId, $targeted_id),
                    'cart_added_qty' => cart_added_quantity_check($userId, $targeted_id),
                    'stock_qty' => empty($productDetail->stock_quantity) ? 0 : $productDetail->stock_quantity,
                    'unit' => empty($unit) ? '' : $unit,
                    'description' => empty($productDetail->description) ? '' : $productDetail->description,
                    'featured' => (empty($productDetail->featured) || (!empty($productDetail->featured) && $productDetail->featured == 'no')) ? 'no' : 'yes',
                    'offer_price' => empty($productDetail->sale_price) ? $productDetail->regular_price : $productDetail->sale_price,
                ];

                $products[] = $product;
            }
        }
    }

    $response = [
        'status' => true,
        'message' => 'Request completed successfully',
        'wishlist_products' => $products
    ];

    return rest_ensure_response($response);
}

function woocomm_remove_from_cart($param = null)
{
    global $wpdb;
    if (empty($param['user_id'])) {
        $response = [
            'status' => false,
            'message' => 'User ID missing.',
            'data' => []
        ];
        return rest_ensure_response($response);
    }

    if (empty($param['product_id'])) {
        $response = [
            'status' => false,
            'message' => 'Product ID missing.',
            'data' => []
        ];
        return rest_ensure_response($response);
    }


    $user_id = (int)$param['user_id'];
    $product_id = (int)$param['product_id'];

    $objUser = new WC_Session_Handler();
    $wc_session_data = $objUser->get_session($user_id);

    $full_user_meta = get_user_meta($user_id,'_woocommerce_persistent_cart_1',true);

    $cartObj = new WC_Cart();
    if($full_user_meta['cart']) {
        foreach($full_user_meta['cart'] as $sinle_user_meta) {
            if($product_id != $sinle_user_meta['product_id']) {
                $cartObj->add_to_cart( $sinle_user_meta['product_id'], $sinle_user_meta['quantity']  );
            }

        }
    }

    $updatedCart = [];
    foreach($cartObj->cart_contents as $key => $val) {
        unset($val['data']);
        $updatedCart[$key] = $val;
    }

    if($wc_session_data) {
        $wc_session_data['cart'] = serialize($updatedCart);
        $serializedObj = maybe_serialize($wc_session_data);
        $table_name = 'wp_woocommerce_sessions';
        $sql ="UPDATE $table_name SET 'session_value'= '".$serializedObj."', WHERE  'session_key' = '".$user_id."'";
        $rez = $wpdb->query($sql);
    }

    $full_user_meta['cart'] = $updatedCart;
    update_user_meta($user_id, '_woocommerce_persistent_cart_1', $full_user_meta);

    $response = [
        'status' => true,
        'message' => 'Request completed successfully'
    ];

    return rest_ensure_response($response);
}

function woocomm_user_cart($param = null)
{
    global $wpdb;

    if (empty($param['user_id'])) {
        $response = [
            'status' => false,
            'message' => 'User ID missing.',
            'data' => []
        ];
        return rest_ensure_response($response);
    }

    $user_id = $param['user_id'];

    $objUser = new WC_Session_Handler();
    $wc_session_data = $objUser->get_session($user_id);

    $full_user_meta = get_user_meta($user_id,'_woocommerce_persistent_cart_1',true);

    $products = [];
    if(isset($full_user_meta['cart']) && count($full_user_meta['cart'])) {
        foreach($full_user_meta['cart'] as $key => $value) {
            $productId = $value['product_id'];
            $productDetail = wc_get_product($productId);

            $imageId = $productDetail->get_image_id();
            $imageUrl = wp_get_attachment_image_url($imageId, 'full');

            $unit = get_post_meta($productId, 'pro_price_extra_info', true);
            $targeted_id = $productId;

            $product = [
                'id' => $productId,
                'title' => $productDetail->name,
                'price' => $productDetail->regular_price,
                'image' => empty($imageUrl) ? '' : $imageUrl,
                'fav_status' => is_favourite_product_exist($user_id, $productId),
                'cart_added_qty' => $value['quantity'],
                'stock_qty' => empty($productDetail->stock_quantity) ? 0 : $productDetail->stock_quantity,
                'unit' => empty($unit) ? '' : $unit,
                'description' => empty($productDetail->description) ? '' : $productDetail->description,
                'featured' => (empty($productDetail->featured) || (!empty($productDetail->featured) && $productDetail->featured == 'no')) ? 'no' : 'yes',
                'offer_price' => empty($productDetail->sale_price) ? $productDetail->regular_price : $productDetail->sale_price,
            ];

            $products[] = $product;
        }
    }

    $response = [
        'status' => true,
        'message' => 'Request completed successfully',
        'cart_products' => $products
    ];

    return rest_ensure_response($response);
}

function woocomm_add_to_cart($param = null)
{
    global $wpdb;
try{
    if (empty($param['user_id'])) {
        $response = [
            'status' => false,
            'message' => 'User ID missing.',
            'data' => []
        ];
        return rest_ensure_response($response);
    }

    /*    if (empty($param['type'])) {
            $response = [
                'status' => false,
                'message' => 'Type is missing.',
                'data' => []
            ];
            return rest_ensure_response($response);
        }*/

    $user_id = (int)$param['user_id'];
    $type = (int)$param['type'];

    $objUser = new WC_Session_Handler();
    $wc_session_data = $objUser->get_session($user_id);

    $full_user_meta = get_user_meta($user_id,'_woocommerce_persistent_cart_1',true);
     //echo '<pre>';print_r($wc_session_data);die(' fdf');
    $cartObj = new WC_Cart();
    if($full_user_meta['cart']) {
        foreach($full_user_meta['cart'] as $sinle_user_meta) {
            if($type == 0 && $param['products'][0]['product_id'] == $sinle_user_meta['product_id']) {
                if($sinle_user_meta['quantity'] > 0) {
                    $quantity  = $sinle_user_meta['quantity'] - $param['products'][0]['quantity'];
                    $cartObj->add_to_cart( $sinle_user_meta['product_id'], $quantity );
                }
            } else {
                $cartObj->add_to_cart( $sinle_user_meta['product_id'], $sinle_user_meta['quantity']  );
            }

        }
    }

    if($type == 1) {
        if($param['products']){
            foreach($param['products'] as $prod) {
                $cartObj->add_to_cart( $prod['product_id'], $prod['quantity']  );
            }
        }
    }

    $updatedCart = [];
    foreach($cartObj->cart_contents as $key => $val) {
        unset($val['data']);
        $updatedCart[$key] = $val;
    }

    if($wc_session_data) {
        $wc_session_data['cart'] = serialize($updatedCart);
        $serializedObj = serialize($wc_session_data);
       // echo '<pre>';print_r($wc_session_data);die(' fdf');
        //echo $serializedObj; die(' sda');
        $table_name = 'wp_woocommerce_sessions';
        //$sql ="UPDATE $table_name SET 'session_value'= $serializedObj WHERE  'session_key' = $user_id";
        
        $wpdb->query(
                $wpdb->prepare(
                    "INSERT INTO {$wpdb->prefix}woocommerce_sessions (`session_key`, `session_value`, `session_expiry`) VALUES (%s, %s, %d)
                    ON DUPLICATE KEY UPDATE `session_value` = VALUES(`session_value`)",
                    $user_id,
                    maybe_serialize( $wc_session_data )
                    
                )
            );
            
        //echo $sql; die(' sda');
        //$rez = $wpdb->query($sql);
    }

    $full_user_meta['cart'] = $updatedCart;
    update_user_meta($user_id, '_woocommerce_persistent_cart_1', $full_user_meta);

    $response = [
        'status' => true,
        'message' => 'Request completed successfully'
    ];
}catch(Exception $e) {
   $response = [
        'status' => true,
        'message' => $e->getMessage()
    ]; 
}
    return rest_ensure_response($response);

}

function woocomm_add_to_cart_api($param = null)
{
    
        global $wpdb,$woocommerce;
    
try{
    if (empty($param['user_id'])) {
        $response = [
            'status' => false,
            'message' => 'User ID missing.',
            'data' => []
        ];
        return rest_ensure_response($response);
    }

    /*    if (empty($param['type'])) {
            $response = [
                'status' => false,
                'message' => 'Type is missing.',
                'data' => []
            ];
            return rest_ensure_response($response);
        }*/

    $user_id = (int)$param['user_id'];
    $type = (int)$param['type'];
    $requestedProductId = (int)$param['product_id'];
    $requestedQuantityId = (int)$param['quantity'];

    $objUser = new WC_Session_Handler();
    $wc_session_data = $objUser->get_session($user_id);
   
    $full_user_meta = get_user_meta($user_id,'_woocommerce_persistent_cart_1',true);
   $flag = 0;
    //echo '<pre>';print_r($wc_session_data);die(' fdf');
    $cartObj = new WC_Cart();
    if($full_user_meta['cart']) {
        foreach($full_user_meta['cart'] as $sinle_user_meta) {
            if($type == 0 && $requestedProductId == $sinle_user_meta['product_id']) {
                if($sinle_user_meta['quantity'] > 0) {
                    $quantity  = $sinle_user_meta['quantity'] - $requestedQuantityId;
                    $cartObj->add_to_cart( $sinle_user_meta['product_id'], $quantity );
                }
            } else if($type == 1 && $requestedProductId == $sinle_user_meta['product_id']){
                $quantity  = $sinle_user_meta['quantity'] + $requestedQuantityId;
                    $cartObj->add_to_cart( $sinle_user_meta['product_id'], $quantity );
                    $flag == 1;
            }
            else {
               $cartObj->add_to_cart( $sinle_user_meta['product_id'], $sinle_user_meta['quantity']  );
            }

        }
    }

    if($type == 1 && !empty($full_user_meta) && $flag == 0) {
       
       // die('test1');
               $cartObj->add_to_cart($requestedProductId, $requestedQuantityId);
    
    }
echo '<pre>';print_r($param);die('test');
    $updatedCart = [];
    foreach($cartObj->cart_contents as $key => $val) {
        unset($val['data']);
        $updatedCart[$key] = $val;
    }
    
  //  echo '<pre>';print_r($wc_session_data);die(' yes');

    if($wc_session_data) {
        $wc_session_data['cart'] = serialize($updatedCart);
        $serializedObj = serialize($wc_session_data);
       // echo '<pre>';print_r($wc_session_data);die(' fdf');
        //echo $serializedObj; die(' sda');
        $table_name = 'wp_woocommerce_sessions';
        //$sql ="UPDATE $table_name SET 'session_value'= $serializedObj WHERE  'session_key' = $user_id";
        
        $wpdb->query(
                $wpdb->prepare(
                    "INSERT INTO {$wpdb->prefix}woocommerce_sessions (`session_key`, `session_value`, `session_expiry`) VALUES (%s, %s, %d)
                    ON DUPLICATE KEY UPDATE `session_value` = VALUES(`session_value`)",
                    $user_id,
                    maybe_serialize( $wc_session_data )
                    
                )
            );
            
        //echo $sql; die(' sda');
        //$rez = $wpdb->query($sql);
    }
    $full_user_meta['cart'] = $updatedCart;
    $cart_data=array();
    if(empty($updatedCart))
    {
     $string = $woocommerce->cart->generate_cart_id( $requestedProductId, 0, array(), $cart_data['cart'] );
        $product = wc_get_product( $requestedProductId);
        $cart_data['cart'][$string] = array(
            'key' => $string,
            'product_id' =>$requestedProductId,
            'variation_id' => 0,
            'variation' => array(),
            'quantity' => 1,
            'line_tax_data' => array(
                'subtotal' => array(),
                'total' => array()
            ),
            'line_subtotal' => $product->get_price(),
            'line_subtotal_tax' => 0,
            'line_total' => $product->get_price(),
            'line_tax' => 0,
        );
           update_user_meta($user_id, '_woocommerce_persistent_cart_1', $cart_data);
    }
    else{
           update_user_meta($user_id, '_woocommerce_persistent_cart_1', $full_user_meta);
    }

 

    $response = [
        'status' => true,
        'message' => 'Request completed successfully'
    ];
}catch(Exception $e) {
   $response = [
        'status' => true,
        'message' => $e->getMessage()
    ]; 
}
    return rest_ensure_response($response);

}


function home_page_details($param = null)
{
    global $wpdb;

    if (empty($param['user_id'])) {
        $response = [
            'status' => false,
            'message' => 'User ID missing.',
            'data' => []
        ];
        return rest_ensure_response($response);
    }

    $userId = (int)$param['user_id'];

    $product_ids_on_sale = wc_get_product_ids_on_sale();
    $saleArray = [];
    $featuredProducts = [];

    $slides = $wpdb->get_results("SELECT * FROM wp_revslider_slides  WHERE slider_id = 4", ARRAY_A);

    $sliderArray =[];
    if(count($slides)) {
        foreach($slides as $slide) {
            $unserialArray = json_decode($slide['params']);
            $sliderArray[] = $unserialArray->image;
        }
    }


    foreach ($product_ids_on_sale as $product_id_on_sale) {

        $catData = wp_get_post_terms($product_id_on_sale, 'product_cat', []);

        $catArray = [];
        if (count($catData)) {
            foreach ($catData as $category) {
                $catArray[] = $category->term_id;
            }
        }

        $saleProduct = wc_get_product($product_id_on_sale);

        $innerImageId = $saleProduct->get_image_id();
        $innerImageUrl = wp_get_attachment_image_url($innerImageId, 'full');

        $unit = get_post_meta($saleProduct, 'pro_price_extra_info', true);
        $innerProduct = [
            'id' => $product_id_on_sale,
            'title' => $saleProduct->name,
            'price' => $saleProduct->regular_price,
            'offer_price' => empty($saleProduct->sale_price) ? $saleProduct->regular_price : $saleProduct->sale_price,
            'image' => empty($innerImageUrl) ? '' : $innerImageUrl,
            'category' => $catArray,
            'fav_status' => is_favourite_product_exist($userId, $product_id_on_sale),
            'cart_added_qty' => cart_added_quantity_check($userId, $product_id_on_sale),
            'unit' => empty($unit) ? '' : $unit,
            'description' => empty($saleProduct->description) ? '' : $saleProduct->description,
            'featured' => (empty($saleProduct->featured) || (!empty($saleProduct->featured) && $saleProduct->featured == 'no')) ? 'no' : 'yes',

            //'fav_status' => '',
            //'featured' => (empty($saleProduct->featured) || (!empty($saleProduct->featured) && $saleProduct->featured == 'no')) ? 'no' : 'yes',

        ];
        $saleArray[] = $innerProduct;


    }

    $query = new WC_Product_Query( [
        'limit' => 8,
        'orderby' => 'title',
        'order' => 'ASC',
        'stock_status' => 'instock',
        'featured' => true,
        'return' => 'ids',

    ] );

    $products = $query->get_products();
    if(count($products)) {
        foreach($products as $product) {

            $relatedProductDetail = wc_get_product($product);

            $innerImageId = $relatedProductDetail->get_image_id();
            $innerImageUrl = wp_get_attachment_image_url($innerImageId, 'full');

            $innerUnit = get_post_meta($product, 'pro_price_extra_info', true);

            $innerProduct = [
                'id' => (int)$product,
                'title' => $relatedProductDetail->name,
                'price' => $relatedProductDetail->regular_price,
                'image' => empty($innerImageUrl) ? '' : $innerImageUrl,
                'fav_status' => is_favourite_product_exist($userId, $product),
                'cart_added_qty' => cart_added_quantity_check($userId, $product),
                'unit' => empty($innerUnit) ? '' : $innerUnit,
                'stock_qty' => empty($relatedProductDetail->stock_quantity) ? 0 : $relatedProductDetail->stock_quantity,
                'featured' => (empty($relatedProductDetail->featured) || (!empty($relatedProductDetail->featured) && $relatedProductDetail->featured == 'no')) ? 'no' : 'yes',
                'offer_price' => empty($relatedProductDetail->sale_price) ? $relatedProductDetail->regular_price : $relatedProductDetail->sale_price,
            ];
            $featuredProducts[] = $innerProduct;
        }

    }
    $response = [
        'status' => true,
        'message' => 'Request completed successfully',
        'slider_data' => $sliderArray,
        'featured_products' => $featuredProducts,
        'latest_deals' => $saleArray
    ];

    return rest_ensure_response($response);
}


function woocomm_all_products($param = null) {

    if (empty($param['user_id'])) {
        $response = [
            'status' => false,
            'message' => 'User ID missing.',
            'data' => []
        ];
        return rest_ensure_response($response);
    }

    if (empty($param['category_id'])) {
        $response = [
            'status' => false,
            'message' => 'Category ID missing.',
            'data' => []
        ];
        return rest_ensure_response($response);
    }

    $userId = $param['user_id'];

    $paged = empty($param['page_num']) ? 1 : $param['page_num'];

    // echo $paged;
    $categoryId = $param['category_id'];
    $categoryIdArray = [];
    $categoryIdArray[] = $categoryId;

    $query = new WC_Product_Query( [
        'page'           => $paged,
        'order'          => 'DESC',
        'orderby'        => 'title',
        'return' => 'ids',
        'tax_query'             => array(
            array(
                'taxonomy'      => 'product_cat',
                'field' => 'term_id',
                'terms'         => $categoryIdArray,
                'operator'      => 'IN'
            ),
        )

    ] );
    $allProducts = [];
    $products = $query->get_products();
    if(count($products)) {
        foreach($products as $product) {

            $relatedProductDetail = wc_get_product($product);

            $innerImageId = $relatedProductDetail->get_image_id();
            $innerImageUrl = wp_get_attachment_image_url($innerImageId, 'full');

            $innerUnit = get_post_meta($product, 'pro_price_extra_info', true);

            $innerProduct = [
                'id' => $product,
                'title' => $relatedProductDetail->name,
                'price' => $relatedProductDetail->regular_price,
                'image' => empty($innerImageUrl) ? '' : $innerImageUrl,
                'fav_status' => is_favourite_product_exist($userId, $product),
                'cart_added_qty' => cart_added_quantity_check($userId, $product),
                'unit' => empty($innerUnit) ? '' : $innerUnit,
                'stock_qty' => empty($relatedProductDetail->stock_quantity) ? 0 : $relatedProductDetail->stock_quantity,
                'featured' => (empty($relatedProductDetail->featured) || (!empty($relatedProductDetail->featured) && $relatedProductDetail->featured == 'no')) ? 'no' : 'yes',
                'offer_price' => empty($relatedProductDetail->sale_price) ? $relatedProductDetail->regular_price : $relatedProductDetail->sale_price,
            ];
            $allProducts[] = $innerProduct;
        }

    }
    $response = [
        'status' => true,
        'message' => 'Request completed successfully',
        'data' => $allProducts
    ];

    return rest_ensure_response($response);
}

function woocomm_api_product_details($param = null)
{

    if (empty($param['user_id'])) {
        $response = [
            'status' => false,
            'message' => 'User ID missing.',
            'data' => []
        ];
        return rest_ensure_response($response);
    }

    if (empty($param['id'])) {
        $response = [
            'status' => false,
            'message' => 'Incorrect Product ID',
            'data' => []
        ];
        return rest_ensure_response($response);
    }
    $productId = (int)$param['id'];
    $userId = (int)$param['user_id'];
    $productDetail = wc_get_product($productId);

    $imageId = $productDetail->get_image_id();
    $imageUrl = wp_get_attachment_image_url($imageId, 'full');

    $unit = get_post_meta($productId, 'pro_price_extra_info', true);

    $targeted_id = $productId;

    $product = [
        'id' => $productId,
        'title' => $productDetail->name,
        'price' => $productDetail->regular_price,
        'image' => empty($imageUrl) ? '' : $imageUrl,
        'fav_status' => is_favourite_product_exist($userId, $productId),
        'cart_added_qty' => cart_added_quantity_check($userId, $productId),
        'stock_qty' => empty($productDetail->stock_quantity) ? 0 : $productDetail->stock_quantity,
        'unit' => empty($unit) ? '' : $unit,
        'description' => empty($productDetail->description) ? '' : $productDetail->description,
        'featured' => (empty($productDetail->featured) || (!empty($productDetail->featured) && $productDetail->featured == 'no')) ? 'no' : 'yes',
        'offer_price' => empty($productDetail->sale_price) ? $productDetail->regular_price : $productDetail->sale_price,
    ];

    $relatedProducts = wc_get_related_products($productId, 8);

    $relatedProductArray = [];
    if (count($relatedProducts)) {
        foreach ($relatedProducts as $relatedProduct) {
            $relatedProductDetail = wc_get_product($relatedProduct);

            $innerImageId = $relatedProductDetail->get_image_id();
            $innerImageUrl = wp_get_attachment_image_url($innerImageId, 'full');
            $innerUnit = get_post_meta($relatedProduct, 'pro_price_extra_info', true);
            //echo '<br/>'.$relatedProductDetail->featured;
            $innerProduct = [
                'id' => $relatedProduct,
                'title' => $relatedProductDetail->name,
                'price' => $relatedProductDetail->regular_price,
                'image' => empty($innerImageUrl) ? '' : $innerImageUrl,
                'fav_status' => is_favourite_product_exist($userId, $relatedProduct),
                'cart_added_qty' => cart_added_quantity_check($userId, $relatedProduct),
                'unit' => empty($innerUnit) ? '' : $innerUnit,
                'stock_qty' => empty($relatedProductDetail->stock_quantity) ? 0 : $relatedProductDetail->stock_quantity,
                'featured' => (empty($relatedProductDetail->featured) || (!empty($relatedProductDetail->featured) && $relatedProductDetail->featured == 'no')) ? 'no' : 'yes',
                'offer_price' => empty($relatedProductDetail->sale_price) ? $relatedProductDetail->regular_price : $relatedProductDetail->sale_price,
            ];
            $relatedProductArray[] = $innerProduct;
        }
    }

    $response = [
        'status' => true,
        'message' => 'Request completed successfully',
        'data' => $product,
        'related_products' => $relatedProductArray
    ];
    return rest_ensure_response($response);
}

function get_item_qty($product)
{
    foreach (WC()->cart->get_cart() as $cart_item)
        // for variable products (product varations)
        $product_id = $product->get_parent_id();
    if ($product_id == 0 || empty($product_id))
        $product_id = $product->get_id();

    if ($product_id == $cart_item['product_id']) {
        return $cart_item['quantity'];
        // break;
    }
    return;
}

function wp_get_offers($param = null)
{
    global $wpdb;

    if (empty($param['user_id'])) {
        $response = [
            'status' => false,
            'message' => 'User ID missing.',
            'data' => []
        ];
        return rest_ensure_response($response);
    }

    $userId = $param['user_id'];
    $product_ids_on_sale = wc_get_product_ids_on_sale();
    $saleArray = [];

    $slides = $wpdb->get_results("SELECT * FROM wp_revslider_slides  WHERE slider_id = 3", ARRAY_A);

    $sliderArray =[];
    if(count($slides)) {
        foreach($slides as $slide) {
            $unserialArray = json_decode($slide['params']);
            // echo '<pre>';print_r($slide);
            $sliderArray[] = $unserialArray->image;
        }
    }


    foreach ($product_ids_on_sale as $product_id_on_sale) {

        $catData = wp_get_post_terms($product_id_on_sale, 'product_cat', []);

        $catArray = [];
        if (count($catData)) {
            foreach ($catData as $category) {
                $catArray[] = $category->term_id;
            }
        }

        $saleProduct = wc_get_product($product_id_on_sale);

        $innerImageId = $saleProduct->get_image_id();
        $innerImageUrl = wp_get_attachment_image_url($innerImageId, 'full');

        $unit = get_post_meta($saleProduct, 'pro_price_extra_info', true);
        //echo '<br/>'.$relatedProductDetail->featured;
        $innerProduct = [
            'id' => $product_id_on_sale,
            'title' => $saleProduct->name,
            'price' => $saleProduct->regular_price,
            'image' => empty($innerImageUrl) ? '' : $innerImageUrl,
            'fav_status' => is_favourite_product_exist($userId, $product_id_on_sale),
            'cart_added_qty' => cart_added_quantity_check($userId, $product_id_on_sale),
            'unit' => empty($unit) ? '' : $unit,
            'stock_qty' => empty($saleProduct->stock_quantity) ? 0 : $saleProduct->stock_quantity,
            'featured' => (empty($saleProduct->featured) || (!empty($saleProduct->featured) && $saleProduct->featured == 'no')) ? 'no' : 'yes',
            'offer_price' => empty($saleProduct->sale_price) ? $saleProduct->regular_price : $saleProduct->sale_price,
            //'fav_status' => '',
            //'featured' => (empty($saleProduct->featured) || (!empty($saleProduct->featured) && $saleProduct->featured == 'no')) ? 'no' : 'yes',

        ];
        $saleArray[] = $innerProduct;


    }

    $response = [
        'status' => true,
        'message' => 'Request completed successfully',
        'slider_data' => $sliderArray,
        'offers' => $saleArray
    ];

    return rest_ensure_response($response);
}