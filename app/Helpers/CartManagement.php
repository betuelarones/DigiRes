<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartManagement {
    
    /**
     * Agrega un producto al carrito o incrementa su cantidad si ya existe.
     * @param int $product_id ID del producto a agregar
     * @return int Cantidad total de items en el carrito
     */
    static public function addItemToCart($product_id) {
        // Obtiene los items actuales del carrito desde la cookie

        $cart_items = self::getCartItemsFromCookie();
        $existing_item = null; // Variable para rastrear si el producto ya existe

        // Busca el producto en el carrito
        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $existing_item = $key; // Guarda la posición del item existente
                break;
            }
        }

        if ($existing_item !== null) {
            // Si el producto ya está en el carrito: incrementa cantidad y actualiza total
            $cart_items[$existing_item]['quantity']++;
            $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] *
                $cart_items[$existing_item]['unit_amount'];
        } else {
            // Si es un producto nuevo: lo busca en la BD y lo agrega al carrito
            $product = Product::where('id', $product_id)->first(['id', 'name', 'price', 'images']);
            if ($product) {
                $cart_items[] = [
                    'product_id' => $product_id,       // ID del producto
                    'name' => $product->name,          // Nombre del producto
                    'image' => $product->images[0],    // Primera imagen del producto
                    'quantity' => 1,                   // Cantidad inicial (1)
                    'unit_amount' => $product->price,  // Precio unitario
                    'total_amount' => $product->price  // Total (precio * cantidad)
                ];
            }
        }
        // Guarda los cambios en la cookie y devuelve la cantidad total de items
        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }

    // Añadir producto al carrito con cantidad en "Detalles del producto"
    static public function addItemToCartWithQty($product_id, $qty = 1) {
        // Obtiene los items actuales del carrito desde la cookie

        $cart_items = self::getCartItemsFromCookie();
        $existing_item = null; // Variable para rastrear si el producto ya existe

        // Busca el producto en el carrito
        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $existing_item = $key; // Guarda la posición del item existente
                break;
            }
        }

        if ($existing_item !== null) {
            // Si el producto ya está en el carrito: incrementa cantidad y actualiza total
            $cart_items[$existing_item]['quantity'] += $qty ;

            // ✅ Corrige el cálculo del total
            $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] * $cart_items[$existing_item]['unit_amount'];
        } else {
            // Si es un producto nuevo: lo busca en la BD y lo agrega al carrito
            $product = Product::where('id', $product_id)->first(['id', 'name', 'price', 'images']);
            if ($product) {
                $cart_items[] = [
                    'product_id' => $product_id,       // ID del producto
                    'name' => $product->name,          // Nombre del producto
                    'image' => $product->images[0],    // Primera imagen del producto
                    'quantity' => $qty,                   // Cantidad inicial (1)
                    'unit_amount' => $product->price,  // Precio unitario
                    'total_amount' => $product->price * $qty  // Total (precio * cantidad)
                ];
            }
        }
        // Guarda los cambios en la cookie y devuelve la cantidad total de items
        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }


    /**
     * Elimina completamente un producto del carrito.
     * @param int $product_id ID del producto a eliminar
     * @return array Carrito actualizado
     */
    static public function removeCartItem($product_id) {
        $cart_items = self::getCartItemsFromCookie();

        // Busca y elimina el producto del array
        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                unset($cart_items[$key]); // Elimina el item del array
                break; // Termina el loop una vez encontrado
            }
        }

        // Actualiza la cookie y devuelve el carrito
        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }



    /**
     * Guarda los items del carrito en una cookie (dura 30 días).
     * @param array $cart_items Array de productos a guardar
     */
    static public function addCartItemsToCookie($cart_items) {
        // Convierte el array a JSON y lo guarda en cookie
        Cookie::queue('cart_items', json_encode($cart_items), 60 * 24 * 30); // 30 días
    }



    /**
     * Vacía completamente el carrito eliminando la cookie.
     */
    static public function clearCartItems() {
        Cookie::queue(Cookie::forget('cart_items'));
    }



    /**
     * Obtiene los items del carrito desde la cookie.
     */
    static public function getCartItemsFromCookie() {
        // Decodifica el JSON de la cookie o devuelve array vacío si no existe
        $cart_items = json_decode(Cookie::get('cart_items'), true);
        if (!$cart_items){
            $cart_items = [];
        }

        return $cart_items;
    }


    /**
     * Incrementa en 1 la cantidad de un producto específico.
     * @param int $product_id ID del producto
     * @return array Carrito actualizado
     */
    static public function incrementQuantityToCartItem($product_id) {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                // Incrementa cantidad y recalcula el total
                $cart_items[$key]['quantity']++;
                $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
            }
        }
        
        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }


    /**
     * Decrementa en 1 la cantidad de un producto (no permite menos de 1).
     * @param int $product_id ID del producto
     * @return array Carrito actualizado
     */
    static public function decrementQuantityToCartItem($product_id) {
        $cart_items = self::getCartItemsFromCookie();
        
        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                // Solo decrementa si la cantidad es mayor a 1
                if ($cart_items[$key]['quantity'] > 1) {
                    $cart_items[$key]['quantity']--;
                    $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
                }
            }
        }
        
        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }


    /**
     * Calcula el total general sumando todos los 'total_amount' de los productos.
     * @param array $items Array de productos en el carrito
     * @return float Total general del carrito
     */
    static public function calculateGrandTotal($items) {
        return array_sum(array_column($items, 'total_amount'));
    }
}