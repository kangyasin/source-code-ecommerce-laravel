@extends('emails.master')
@section('title')
LaraCommerce Yasin : Invoice
@endsection

@section('content')


<!-- Email Body -->
<tr>
  <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
    <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
      <!-- Body content -->
      <tr>
        <td class="content-cell">
          <h1>Hi {{$customer->nama}},</h1>
          <p>Terima kasih telah melakukan pembayaran transaksi di <strong>LaraCommerce Yasin</strong>.</p>
          <p>Berikut ini adalah detail transaksi anda :</p>
          <table class="attributes" width="100%" cellpadding="0" cellspacing="0">
            <tr>
              <td class="attributes_content">
                <table width="100%" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="attributes_item"><strong>Total Pembelian :</strong> Rp. {{number_format($transaksi->totalpembelian)}}</td>

                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <!-- Action -->

          <table class="purchase" width="100%" cellpadding="0" cellspacing="0">
            <tr>
              <td>
                <h3>#{{$transaksi->id}}</h3></td>
              <td>
                <h3 class="align-right">{{$transaksi->tanggaltransaksi}}</h3></td>
            </tr>
            <tr>
              <td colspan="2">
                <table class="purchase_content" width="100%" cellpadding="0" cellspacing="0">
                  <tr>
                    <th class="purchase_heading">
                      <p>Product</p>
                    </th>
                    <th class="purchase_heading">
                      <p>Qty</p>
                    </th>
                    <th class="purchase_heading">
                      <p class="align-right">@Harga</p>
                    </th>
                  </tr>
                  @foreach($transaksi->detailtransaksi as $datatransaksi)
                  <tr>
                    <td width="60%" class="purchase_item">{{$datatransaksi->productinfo->namaproducts}}</td>
                    <td width="20%" class="purchase_item">{{$datatransaksi->jumlahpembelian}}</td>
                    <td class="align-right" width="20%" class="purchase_item">{{number_format($datatransaksi->harga)}}</td>
                  </tr>
                  @endforeach

                  <tr>
                    <td width="80%" class="purchase_footer" valign="middle" colspan="2" style="text-align:right;">
                      <p class="purchase_total purchase_total--label">Ongkos Kirim</p>
                    </td>
                    <td width="20%" class="purchase_footer" valign="middle">
                      <p class="purchase_total">{{number_format($transaksi->totalongkir)}}</p>
                    </td>
                  </tr>

                  <tr>
                    <td width="80%" class="purchase_footer" valign="middle" colspan="2">
                      <p class="purchase_total purchase_total--label">Total</p>
                    </td>
                    <td width="20%" class="purchase_footer" valign="middle">
                      <p class="purchase_total">{{number_format($transaksi->totalpembelian)}}</p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <table class="purchase_content" align="center" width="100%" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center" colspan="2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="purchase_item"> Pembayaran anda berhasil ke rekening LaraCommerce berikut : </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <!-- https://i.imgur.com/5PEY8we.jpg -->
              <td align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="purchase_item">
                      <img src="{{url($bank->logobank)}}" width="80"/>
                    </td>
                    <td class="purchase_item">
                      <strong>{{$bank->namabank}}</strong>
                      <br/>{{$bank->infobank}}
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>

          <table class="berhasil" align="center" width="100%" cellpadding="0" cellspacing="0" style="margin-top:30px; margin-bottom:30px;">
            <tr>
              <td align="center">
                <h1 class="berhasil_heading">Pembayaran Berhasil</h1>
                <p class="berhasil_body">Terima kasih pesanan anda akan segera kami kirim.</p>
              </td>
            </tr>
          </table>

          <p>Cheers,
          <br>LaraCommerce Team</p>
          <!-- Sub copy -->

        </td>
      </tr>
    </table>
  </td>
</tr>
@endsection
