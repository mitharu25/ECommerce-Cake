<?php

namespace App\Controllers;

use App\Models\HomeModel;
use CodeIgniter\API\ResponseTrait;

class Cart extends BaseController
{
    use ResponseTrait;

    public function addToCart()
    {
        $session = session();

        $id = $this->request->getPost('id_kue');
        $nama = $this->request->getPost('nama');
        $harga = $this->request->getPost('harga');
        $gambar = $this->request->getPost('gambar');
        $quantity = intval($this->request->getPost('quantity'));

        if (!$session->has('cart')) {
            $session->set('cart', []);
        }

        $cart = $session->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
            $cart[$id]['harga'] += $harga * $quantity;
        } else {
            $cart[$id] = [
                'nama' => $nama,
                'harga' => $harga,
                'gambar' => $gambar,
                'quantity' => $quantity,
                'xharga' => $harga
            ];
            $cart[$id]['harga'] = $harga * $quantity;
        }

        $session->set('cart', $cart);

        $session->setFlashdata('showModal', true);

        return redirect()->back();
    }

    // public function viewCart()
    // {
    //     $session = session();
    //     $cart = $session->get('cart') ?? [];
    //     return view('cart_view', ['cart' => $cart]);
    // }

    public function removeFromCart($id)
    {
        $session = session();

        $cart = $session->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            $session->set('cart', $cart);
        }

        $session->setFlashdata('showModal2', true);

        return redirect()->back();
    }

    public function editCart($id)
    {
        $session = session();

        $quantity = intval($this->request->getPost('quantity'));

        $cart = $session->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            $cart[$id]['harga'] = $cart[$id]['xharga'] * $quantity;

            $session->set('cart', $cart);

            $session->setFlashdata('showModal2', true);

            return redirect()->back();
        }
    }

    public function getCartProductNames()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        $productNames = [];
        foreach ($cart as $item) {
            $productNames[] = $item['nama'];
        }

        return implode("\n", $productNames);
    }
}
