@component('mail::message')
# Introduction

<html>
<head>
    <meta charset="utf-8"/>
    <title>A simple, clean, and responsive HTML invoice template</title>

    </head>

<body>
    <div class="invoice-box" style="max-width: 800px;margin: auto;padding: 30px;border: 1px solid #eee;box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);font-size: 16px;line-height: 24px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;color: #555">
        <table cellpadding="0" cellspacing="0" style="width: 100%;line-height: inherit;text-align: left">
            <tr class="top">
                <td colspan="2" style="padding: 5px;vertical-align: top">
                    <table style="width: 100%;line-height: inherit;text-align: left">
                        <tr>
                            <td class="title" style="padding: 5px;vertical-align: top;padding-bottom: 20px;font-size: 45px;line-height: 45px;color: #333">
                                <img src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:300px;"/>
                            </td>

                            <td style="padding: 5px;vertical-align: top;padding-bottom: 20px">
                                Invoice #: 123<br/>
                                Created: January 1, 2015<br/>
                                Due: February 1, 2015
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2" style="padding: 5px;vertical-align: top">
                    <table style="width: 100%;line-height: inherit;text-align: left">
                        <tr>
                            <td style="padding: 5px;vertical-align: top;padding-bottom: 40px">
                                Sparksuite, Inc.<br/>
                                12345 Sunny Road<br/>
                                Sunnyville, CA 12345
                            </td>

                            <td style="padding: 5px;vertical-align: top;padding-bottom: 40px">
                                Acme Corp.<br/>
                                John Doe<br/>
                                john@example.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td style="padding: 5px;vertical-align: top;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold">
                    Payment Method
                </td>

                <td style="padding: 5px;vertical-align: top;text-align: right;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold">
                    Check #
                </td>
            </tr>

            <tr class="details">
                <td style="padding: 5px;vertical-align: top;padding-bottom: 20px">
                    Check
                </td>

                <td style="padding: 5px;vertical-align: top;text-align: right;padding-bottom: 20px">
                    1000
                </td>
            </tr>

            <tr class="heading">
                <td style="padding: 5px;vertical-align: top;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold">
                    Item
                </td>

                <td style="padding: 5px;vertical-align: top;text-align: right;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold">
                    Price
                </td>
            </tr>

            <tr class="item">
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee">
                    Website design
                </td>

                <td style="padding: 5px;vertical-align: top;text-align: right;border-bottom: 1px solid #eee">
                    $300.00
                </td>
            </tr>

            <tr class="item">
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee">
                    Hosting (3 months)
                </td>

                <td style="padding: 5px;vertical-align: top;text-align: right;border-bottom: 1px solid #eee">
                    $75.00
                </td>
            </tr>

            <tr class="item last">
                <td style="padding: 5px;vertical-align: top;border-bottom: none">
                    Domain name (1 year)
                </td>

                <td style="padding: 5px;vertical-align: top;text-align: right;border-bottom: none">
                    $10.00
                </td>
            </tr>

            <tr class="total">
                <td style="padding: 5px;vertical-align: top"/>

                <td style="padding: 5px;vertical-align: top;text-align: right;border-top: 2px solid #eee;font-weight: bold">
                   Total: $385.00
                </td>
            </tr>
        </table>
    </div>
</body>
</html>


@endcomponent
