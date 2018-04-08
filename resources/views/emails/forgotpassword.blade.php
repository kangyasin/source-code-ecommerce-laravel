@extends('emails.master')
@section('title')
LaraCommerce Yasin : Customer Email Confirmation
@endsection

@section('content')


            <tr>
              <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
                  <!-- Body content -->
                  <tr>
                    <td class="content-cell">
                      <h1>Hai, {{$customer->nama}}</h1>
                      <p>Anda baru saja melakukan permintaan ubah password di <strong>LaraCommerce Yasin</strong>.</p>
                      <p>Untuk melakukan perubahan password silahkan klik tombol change password dibawah ini :</p>
                      <!-- Action -->
                      <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center">
                            <!-- Border based button https://litmus.com/blog/a-guide-to-bulletproof-buttons-in-email-design -->
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="center">
                                  <table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td>
                                        <a href="{!!$link!!}" class="button button--" target="_blank">Change Password</a>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>

                      <table class="body-sub">
                        <tr>
                          <td>
                            <p class="sub">Jika tombol change password diatas tidak berfungsi silahkan copy dan paste link dibawah ini pada browser anda.</p>
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
