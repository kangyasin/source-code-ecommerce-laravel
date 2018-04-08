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
          <p>Terima kasih telah bertransaksi di <strong>LaraCommerce Yasin</strong>.</p>
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
                      <p class="purchase_total purchase_total--label">Ongkos Kirim</p> <span class="purchase_total purchase_total--label" style="font-size:11px; font-weight:normal;">{{strtoupper($transaksi->kurir)}} - {{$transaksi->kurirpaket}}</span><br/><br/>
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
                    <td class="purchase_item"> Lakukan pembayaran melalui rekening : </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <!-- https://i.imgur.com/5PEY8we.jpg -->
              <td align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  @foreach($bank as $banks)
                  <tr>
                    <td class="purchase_item">
                      <img src="{{url($banks->logobank)}}" width="80"/>
                    </td>
                    <td class="purchase_item">
                      <strong>{{$banks->namabank}}</strong>
                      <br/>{{$banks->infobank}}
                    </td>
                  </tr>
                  @endforeach
                </table>
              </td>
            </tr>
          </table>

          <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center">
                      <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td>
                            <a href="{!!$link!!}" class="button button--green" target="_blank">Lanjutkan Pembayaran</a>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>

          <p>Cheers,
          <br>LaraCommerce Team</p>
          <!-- Sub copy -->
          <table class="body-sub">
            <tr>
              <td>
                <p class="sub">Jika tombol pembayaran diatas tidak berfungsi silahkan copy dan paste link dibawah ini pada browser anda.</p>
                <p class="sub">{{$link}}</p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </td>
</tr>
@endsection
