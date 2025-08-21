<?php

namespace App\Controllers;

use App\Models\HomeModel;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    use ResponseTrait;

    protected $HomeModel;
    protected $helpers = ['url'];

    public function __construct()
    {
        $this->HomeModel = new HomeModel();
    }

    public function index(): string
    {
        $cart = $this->session->get('cart') ?? [];
        $data = [
            'cart' => $cart,
            'title' => 'Wulan Cookies & Cake',
            'kue' => $this->HomeModel->getKue()
        ];

        return view('konsumen/dashboard', $data);
    }

    public function product(): string
    {
        $cart = $this->session->get('cart') ?? [];
        $data = [
            'cart' => $cart,
            'title' => 'WLN Cake - Product',
            'kue' => $this->HomeModel->getKue()
        ];

        return view('konsumen/produk', $data);
    }

    public function detail($slug): string
    {
        $cart = $this->session->get('cart') ?? [];
        $kue = $this->HomeModel->getKue($slug);

        $pictures = $this->HomeModel->getKueWithPictures($kue['id_kue']);
        $data = [
            'cart' => $cart,
            'title' => 'WLN Cake - Detail Kue',
            'kue' => $kue,
            'kue2' => $this->HomeModel->getKue(),
            'pictures' => $pictures
        ];

        if (empty($data['kue'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kue  ' . $slug . ' tidak ditemukan');
        }

        return view('konsumen/detail', $data);
    }

    public function kuekering(): string
    {
        $cart = $this->session->get('cart') ?? [];
        $data = [
            'cart' => $cart,
            'title' => 'WLN Cake - Product Kue Kering',
            'kue' => $this->HomeModel->getKueKering()
        ];

        return view('konsumen/jkering', $data);
    }

    public function kueKeringReguler(): string
    {
        $cart = $this->session->get('cart') ?? [];
        $data = [
            'cart' => $cart,
            'title' => 'WLN Cake - Product Kue Kering',
            'kue' => $this->HomeModel->getKueKeringReguler()
        ];

        return view('konsumen/kreguler', $data);
    }

    public function kueKeringJAR(): string
    {
        $cart = $this->session->get('cart') ?? [];
        $data = [
            'cart' => $cart,
            'title' => 'WLN Cake - Product Kue Kering',
            'kue' => $this->HomeModel->getKueKeringJAR()
        ];

        return view('konsumen/kjar', $data);
    }

    public function kueKeringKotak(): string
    {
        $cart = $this->session->get('cart') ?? [];
        $data = [
            'cart' => $cart,
            'title' => 'WLN Cake - Product Kue Kering',
            'kue' => $this->HomeModel->getKueKeringKotak()
        ];

        return view('konsumen/kkotak', $data);
    }

    public function kueBasah(): string
    {
        $cart = $this->session->get('cart') ?? [];
        $data = [
            'cart' => $cart,
            'title' => 'WLN Cake - Product Kue Basah',
            'kue' => $this->HomeModel->getKueBasah()
        ];

        return view('konsumen/jbasah', $data);
    }

    public function kueBasahReguler(): string
    {
        $cart = $this->session->get('cart') ?? [];
        $data = [
            'cart' => $cart,
            'title' => 'WLN Cake - Product Kue Basah',
            'kue' => $this->HomeModel->getKueBasahReguler()
        ];

        return view('konsumen/breguler', $data);
    }

    public function kueBasahMini(): string
    {
        $cart = $this->session->get('cart') ?? [];
        $data = [
            'cart' => $cart,
            'title' => 'WLN Cake - Product Kue Basah',
            'kue' => $this->HomeModel->getKueBasahMini()
        ];

        return view('konsumen/bmini', $data);
    }
}
