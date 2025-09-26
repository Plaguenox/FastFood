<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class ReceiptController extends Controller
{
    public function index()
    {
        // Listar recibos PDF
        return view('client.receipts');
    }

    public function download($orderId)
    {
        // Descargar PDF de recibo
    }
}
