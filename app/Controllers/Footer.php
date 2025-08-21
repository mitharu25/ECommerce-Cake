<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Footer extends BaseController
{
    use ResponseTrait;

    protected $helpers = ['url'];

    public function __construct()
    {
    }

    public function contact(): string
    {
        $cart = $this->session->get('cart') ?? [];
        $data = [
            'cart' => $cart,
            'title' => 'WLN Cake - Contact Us'
        ];

        return view('footer/kontak', $data);
    }

    public function about(): string
    {
        $cart = $this->session->get('cart') ?? [];
        $data = [
            'cart' => $cart,
            'title' => 'WLN Cake - Tentang Kami'
        ];

        return view('footer/about', $data);
    }

    public function syarat(): string
    {
        $cart = $this->session->get('cart') ?? [];
        $data = [
            'cart' => $cart,
            'title' => 'WLN Cake - Syarat & Ketentuan'
        ];

        return view('footer/syarat', $data);
    }

    public function caraBelanja(): string
    {
        $cart = $this->session->get('cart') ?? [];
        $data = [
            'cart' => $cart,
            'title' => 'WLN Cake - Cara Belanja'
        ];

        return view('footer/caraBelanja', $data);
    }

    public function Kpembayaran(): string
    {
        $cart = $this->session->get('cart') ?? [];
        $data = [
            'cart' => $cart,
            'title' => 'WLN Cake - Konfirmasi Pembayaran'
        ];

        return view('footer/Kpembayaran', $data);
    }

    public function Ipengiriman(): string
    {
        $cart = $this->session->get('cart') ?? [];
        $data = [
            'cart' => $cart,
            'title' => 'WLN Cake - Informasi Pengiriman'
        ];

        return view('footer/Ipengiriman', $data);
    }

    public function policy(): string
    {
        $cart = $this->session->get('cart') ?? [];
        $data = [
            'cart' => $cart,
            'title' => 'WLN Cake - Refund & Return Policy'
        ];

        return view('footer/policy', $data);
    }
}
