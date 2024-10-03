<?php

include '../../../wp-load.php';
$order_id = $_GET['order_id'];
$order = wc_get_order($order_id);

?>
<html>

<head>
    <script type="text/javascript" src="<?= plugin_dir_url(__FILE__) . 'html2canvas.min.js' ?>"></script>
    <style type="text/css">
        tfoot {
            text-align: left;
        }
    </style>
</head>

<body>
    <table id="invoice" border="1">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order->get_items() as $id => $item): ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Subtotal</th>
                <th></th>
            </tr>
            <tr>
                <th colspan="2">Pengiriman</th>
                <th></th>
            </tr>
            <tr>
                <th colspan="2">Metode Pembayaran</th>
                <th></th>
            </tr>
            <tr>
                <th colspan="2">Total</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    <script type="text/javascript">
        html2canvas(document.querySelector(`table`))
            .then(function(canvas) {
                // document.body.appendChild(canvas)
                // const link = document.createElement('a')
                // link.download = 'invoice-<?= $order_id ?>.png'
                // link.href = document.querySelector(`canvas`).toDataURL()
                // link.click()
                // window.close()
            })
    </script>
</body>

</html>