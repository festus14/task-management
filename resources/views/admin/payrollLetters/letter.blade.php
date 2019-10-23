<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Letter</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('vendor/laravel-filemanager/img/folder.png') }}">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>

    </style>
</head>
<body>
<div class="container">
    <div id="printpage" >
        <textarea>
            <div class="page" style="background: #FFFFFF;display: block; margin: 30px 10%; margin-bottom: 0.5cm; box-shadow: 0 0 0.5cm rgba(0,0,0,0.5); width: 21cm; min-height: 29.7cm;">
                <img src="{{ url('/metro/letters/banner.jpg') }}" style="width: 100%">
                <div style="padding: 0 20px">
                    <p>&nbsp;</p>
                    <p style="float: right;margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;text-align:right;">{{ $payrollLetter->date }}</p>
                    <p style="margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;margin-right:-4.3pt;"><strong><span style="color:#7030A0;">Payroll Management Services&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></strong></p>
                    <p><span>&nbsp;</span></p>
                    <p><span>The Managing Director</span></p>
                    <p><span>{{ $payrollLetter->client->name }}</span></p>
                    <p ><span>{{ $payrollLetter->client->address }}</span></p>
                    <p><span>&nbsp;</span></p>
                    <p><strong><em><span>Attention: {{ $payrollLetter->contact_person }}</span></em></strong></p>
                    <p><span>&nbsp;</span></p>
                    <p><span>Dear Sir,</span></p>
                    <p><span>&nbsp;</span></p>
                    <p style="margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;line-height:normal;">
                        <strong>Engagement Letter for the provision of Payroll Management Services</strong>
                    </p>
                    <p><span>We are pleased to submit</span><span>&nbsp;herein, our engagement letter to&nbsp;</span><span>{{ $payrollLetter->client->name }} ({{ $payrollLetter->company_short_name }})</span><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;color:black;">&nbsp;confirming our acceptance to provide you&nbsp;</span><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;color:black;">with Payroll Management Services</span><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;color:black;">.</span></p>
                    <ol>
                        <li><strong><span >This engagement letter</span></strong><span >&nbsp;confirms the terms of our engagement by <strong>{{ $payrollLetter->company_short_name }}</strong> to provide Payroll Management Services as it relates to the company. &nbsp;This letter details the responsibilities of both {{ $payrollLetter->company_short_name }} and Stransact <strong>(Stransact Partners)</strong> as it relates to this assignment.&nbsp;</span></li>
                        <li><strong><span >This engagement&nbsp;</span></strong><span >does not include any services not specifically stated in this letter. &nbsp;Nonetheless, we shall in the course of our work undertake any ancillary task that is necessary to enable us complete our assignment to the satisfaction of {{ $payrollLetter->company_short_name }}. &nbsp;Such ancillary task would not be billed unless the task requires significant man hours. &nbsp;In the instance where additional fees are required for ancillary tasks, we shall discuss this with {{ $payrollLetter->company_short_name }} and agree a suitable fee before an invoice is submitted.</span></li>
                        <li><strong><span >Our responsibility&nbsp;</span></strong><span >shall begin under this Contract when this engagement Letter is signed by {{ $payrollLetter->company_short_name }} and shall be in force beginning from the date of assent by the Company.</span></li>
                        <li><strong><span >The scope of our service</span></strong><span >&nbsp;under this contract shall cover the entire spectrum of your payroll management support. We shall offer payroll processing and payment support services that includes:</span>
                            <ol type="A">
                                @foreach($payrollLetter->services as $service)
                                    <li>
                                        <p style="font-style: italic; color: green;">{{ $service->name }}:</p>
                                        {{ $service->details  }}
                                    </li>
                                @endforeach
                            </ol>
                        </li>
                    </ol>
                    <p><strong>Our Responsibilities</strong></p>
                    <ol start="5">
                        <li>
                          <strong>Eben F. Joels&nbsp;(Country Partner) is the lead Partner on this assignment. &nbsp;‘Yomi Salawu&nbsp;</strong>will be part of the team to serve you. &nbsp;Other key staff will be assigned as required.
                        </li>
                        <li><strong>The product(s) of our work&nbsp;</strong>will be documentations between us and you which when put together will evidence our work. &nbsp;Such documentations will be received and accepted on your behalf by <strong>the Human Resources Manager</strong> of {{ $payrollLetter->company_short_name }} or any other officer designated by you as the <strong>lead user of our product(s).</strong></li>
                        <li><strong>Our communications with you are confidential</strong> and would not be disclosed to third parties without your approval. &nbsp;However, our working papers may be reviewed internally by certain international firms to which we subscribe for peer review. &nbsp;In such instances, we shall take all reasonable care to ensure that the content of such working papers are restricted to the purpose - to ensure quality in our work.</li>
                    </ol>
                    <p><strong>Your Responsibilities</strong></p>
                    <ol start="8">
                         <li><strong>It is your responsibility&nbsp;</strong>to provide information that to the best of your knowledge is accurate and complete.</li>
                        <li><strong>It is your duty to furnish</strong> us with all information that you consider relevant to your business operations as they affect our services. &nbsp;All such information should be brought to our notice even where you may be uncertain as to its usefulness for our purpose. </li>
                    </ol>
                    <p><strong>Indemnity</strong></p>
                    <ol start="10">
                        <li><strong><span >It is our desire to provide you with a high-quality service&nbsp;</span></strong><span >that would create value in excess of our fee. &nbsp;</span></li>
                        <li><strong><span >We undertake that we will exercise due care in the performance of our&nbsp;</span></strong>
                            <span >work in accordance with applicable professional standards. &nbsp;In the event that our work or any part thereof does not
                                comply with this undertaking, we will as much as possible remedy the deficiency by re doing the work.
                                &nbsp;Should this remedy yet prove deficient, our liability to {{ $payrollLetter->company_short_name }} shall be limited to the fees
                                we have earned on this engagement or any portion of the fees as a panel of arbitrators jointly appointed by
                                {{ $payrollLetter->company_short_name }} and Stransact Partners may find reasonable. </span>
                        </li>
                        <li>
                            <strong><span >Our Fees&nbsp;</span></strong><span> Our fees are based on the time and level of expertise required for the assignment.
                                Our fees are exclusive of VAT and out-of-pocket expenses, such as transportation, hotel accommodation, stationery, etc.
                                Please find below, the breakdown of our fees:</span>
                                <br/><br/><br/>
                            <table style="border-collapse:collapse;border:none;" cellspacing="0" cellpadding="0" border="1">
                                <thead>
                                    <tr>
                                      <td style="width:2.25in;border:solid #70AD47 1.0pt;border-bottom:  none;background:#ABDB77;padding:0in 5.4pt 0in 5.4pt;height:20.95pt;" width="46.15384615384615%">
                                        <p style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:31.5pt;text-align:center;line-height:normal;font-size:13px;font-family:&quot;Times New Roman&quot;,serif;"><strong><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;">Payroll Management Services</span></strong></p>
                                      </td>
                                      <td style="width:1.25in;border-top:solid #70AD47 1.0pt;border-left:  none;border-bottom:none;border-right:solid #70AD47 1.0pt;background:#ABDB77;padding:0in 5.4pt 0in 5.4pt;height:20.95pt;" width="25.641025641025642%">
                                        <p style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:31.5pt;text-align:center;line-height:normal;font-size:13px;font-family:&quot;Times New Roman&quot;,serif;"><strong><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;color:black;">Monthly&nbsp;</span></strong><strong><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;color:black;">Rate</span></strong></p>
                                      </td>
                                      <td style="width:99.0pt;border-top:solid #70AD47 1.0pt;border-left:  none;border-bottom:none;border-right:solid #70AD47 1.0pt;background:#ABDB77;padding:0in 5.4pt 0in 5.4pt;height:20.95pt;" width="28.205128205128204%">
                                        <p style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:31.5pt;text-align:center;line-height:normal;font-size:13px;font-family:&quot;Times New Roman&quot;,serif;"><strong><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;color:black;">Annual&nbsp;</span></strong><strong><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;color:black;">Total</span></strong></p>
                                      </td>
                                    </tr>
                                </thead>
                              <tbody>
                                <tr>
                                  <td style="width:2.25in;border:solid #70AD47 1.0pt;border-top:none;background:#ABDB77;padding:0in 5.4pt 0in 5.4pt;height:12.4pt;" width="46.15384615384615%">
                                    <p style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:31.5pt;text-align:center;line-height:normal;font-size:13px;font-family:&quot;Times New Roman&quot;,serif;"><strong><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;">&nbsp;</span></strong></p>
                                  </td>
                                  <td style="width:1.25in;border-top:none;border-left:none;border-bottom:solid #70AD47 1.0pt;border-right:solid #70AD47 1.0pt;background:#ABDB77;padding:0in 5.4pt 0in 5.4pt;height:12.4pt;" width="25.641025641025642%">
                                    <p style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:31.5pt;text-align:center;line-height:normal;font-size:13px;font-family:&quot;Times New Roman&quot;,serif;"><strong><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;color:black;">(₦)</span></strong></p>
                                  </td>
                                  <td style="width:99.0pt;border-top:none;border-left:none;border-bottom:solid #70AD47 1.0pt;border-right:solid #70AD47 1.0pt;background:#ABDB77;padding:0in 5.4pt 0in 5.4pt;height:12.4pt;" width="28.205128205128204%">
                                    <p style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:31.5pt;text-align:center;line-height:normal;font-size:13px;font-family:&quot;Times New Roman&quot;,serif;"><strong><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;color:black;">(₦)</span></strong></p>
                                  </td>
                                </tr>
                                @php $total_sub = 0; @endphp
                                @foreach($payrollLetter->services as $service)
                                    @php $total_sub += $service->amount * $service->currency_rate;@endphp
                                    <tr>
                                      <td style="width:2.25in;border:solid #70AD47 1.0pt;border-top:none;padding:0in 5.4pt 0in 5.4pt;height:21.0pt;" width="46.15384615384615%">
                                          <p style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:31.5pt;text-align:justify;line-height:normal;font-size:13px;font-family:&quot;Times New Roman&quot;,serif;"><strong><span>{{ $service->name }}</span></strong></p>
                                      </td>
                                      <td style="width:1.25in;border-top:none;border-left:none;border-bottom:solid #70AD47 1.0pt;border-right:solid #70AD47 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:21.0pt;" width="25.641025641025642%">
                                        <p style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:31.5pt;text-align:justify;line-height:normal;font-size:13px;font-family:&quot;Times New Roman&quot;,serif;"><span>{{ $service->amount * $service->currency_rate}}</span></p>
                                      </td>
                                      <td style="width:99.0pt;border-top:none;border-left:none;border-bottom:solid #70AD47 1.0pt;border-right:solid #70AD47 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:21.0pt;" width="28.205128205128204%">
                                        <p style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:31.5pt;text-align:justify;line-height:normal;font-size:13px;font-family:&quot;Times New Roman&quot;,serif;"><span>{{ $service->amount * $service->currency_rate * 12 }}</span></p>
                                      </td>
                                    </tr>
                                @endforeach


                                <tr>
                                  <td style="width:2.25in;border:solid #70AD47 1.0pt;border-top:none;padding:0in 5.4pt 0in 5.4pt;height:21.15pt;" width="46.15384615384615%">
                                    <p style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:31.5pt;text-align:justify;line-height:normal;font-size:13px;font-family:&quot;Times New Roman&quot;,serif;"><strong><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;">SUB-</span></strong><strong><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;">TOTAL</span></strong></p>
                                  </td>
                                  <td style="width:1.25in;border-top:none;border-left:none;border-bottom:solid #70AD47 1.0pt;border-right:solid #70AD47 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:21.15pt;" width="25.641025641025642%">
                                    <p style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:31.5pt;text-align:  right;line-height:normal;font-size:13px;font-family:&quot;Times New Roman&quot;,serif;"><strong><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;">{{ $total_sub }}</span></strong></p>
                                  </td>
                                  <td style="width:99.0pt;border-top:none;border-left:none;border-bottom:solid #70AD47 1.0pt;border-right:solid #70AD47 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:21.15pt;" width="28.205128205128204%">
                                    <p style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:31.5pt;text-align:  right;line-height:normal;font-size:13px;font-family:&quot;Times New Roman&quot;,serif;"><strong><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;">{{ $total_sub * 12 }}</span></strong></p>
                                  </td>
                                </tr>

                              </tbody>
                                <tfoot>
                                    <tr>
                                  <td style="width:2.25in;border:solid #70AD47 1.0pt;border-top:none;padding:0in 5.4pt 0in 5.4pt;height:17.85pt;" width="46.15384615384615%">
                                    <p style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:31.5pt;text-align:justify;line-height:normal;font-size:13px;font-family:&quot;Times New Roman&quot;,serif;"><strong><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;">Relationship Discount</span></strong></p>
                                  </td>
                                  <td style="width:1.25in;border-top:none;border-left:none;border-bottom:solid #70AD47 1.0pt;border-right:solid #70AD47 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:17.85pt;" width="25.641025641025642%">
                                    <p style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:31.5pt;text-align:  right;line-height:normal;font-size:13px;font-family:&quot;Times New Roman&quot;,serif;"><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;">(XXX)</span></p>
                                  </td>
                                  <td style="width:99.0pt;border-top:none;border-left:none;border-bottom:solid #70AD47 1.0pt;border-right:solid #70AD47 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:17.85pt;" width="28.205128205128204%">
                                    <p style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:31.5pt;text-align:  right;line-height:normal;font-size:13px;font-family:&quot;Times New Roman&quot;,serif;"><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;">(XXXX)</span></p>
                                  </td>
                                </tr>
                                    <tr>
                                  <td style="width:2.25in;border:solid #70AD47 1.0pt;border-top:none;background:#ABDB77;padding:0in 5.4pt 0in 5.4pt;height:21.45pt;" width="46.15384615384615%">
                                    <p style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:31.5pt;text-align:justify;line-height:normal;font-size:13px;font-family:&quot;Times New Roman&quot;,serif;"><strong><span style="font-size:15px;font-family:  &quot;Calibri&quot;,sans-serif;color:black;">TOTAL</span></strong></p>
                                  </td>
                                  <td style="width:1.25in;border-top:none;border-left:none;border-bottom:solid #70AD47 1.0pt;border-right:solid #70AD47 1.0pt;background:#ABDB77;padding:0in 5.4pt 0in 5.4pt;height:21.45pt;" width="25.641025641025642%">
                                    <p style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:31.5pt;text-align:  right;line-height:normal;font-size:13px;font-family:&quot;Times New Roman&quot;,serif;"><strong><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;color:black;">XXXX</span></strong></p>
                                  </td>
                                  <td style="width:99.0pt;border-top:none;border-left:none;border-bottom:solid #70AD47 1.0pt;border-right:solid #70AD47 1.0pt;background:#ABDB77;padding:0in 5.4pt 0in 5.4pt;height:21.45pt;" width="28.205128205128204%">
                                    <p style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:31.5pt;text-align:  right;line-height:normal;font-size:13px;font-family:&quot;Times New Roman&quot;,serif;"><strong><span style="font-size:15px;font-family:&quot;Calibri&quot;,sans-serif;color:black;">XXXXXX</span></strong></p>
                                  </td>
                                </tr>
                                </tfoot>
                            </table>
                            <p>We shall bill for the payroll management services on monthly basis.</p>
                        </li>
                    </ol>
                    <ol start="13">
                      <li><strong><span>Any other services required</span></strong><span>&nbsp;outside the above shall be billed at our charge out rate listed below:</span></li>
                    </ol>
                    <p style="padding-left: 40px;">Partner: &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ₦60,000/hour</p>
                    <p style="padding-left: 40px;">Manager: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; ₦35,000/hour</p>
                    <p style="padding-left: 40px;">Senior Associate: &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; ₦20,000/hour</p>
                    <p style="padding-left: 40px;">Associate: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; ₦10,000/hour</p>
                    <p>Any fees based on the rates listed above shall be discussed and agreed with you before billing.</p>
                    <p><strong>Confirmation</strong></p>
                    <ol start="14">
                         <li><strong>If this letter reflects your understanding of the terms of our engagement, please sign below and return one copy to us.&nbsp;</strong></li>
                    </ol>
                    <p>We look forward to being of service to you.&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>Yours faithfully,</p>
                    <p>f:<strong>&nbsp;Stransact Partners&nbsp;</strong></p>
                    <p>&nbsp;</p>
                    <p>Yomi Salawu</p>
                    <p><strong>Partner</strong></p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p><strong>Copy to be returned to Stransact&nbsp;</strong></p>
                    <p>&nbsp;</p>
                    <p>I accept the terms of this engagement letter on behalf of <strong>{{ $payrollLetter->client->name }}</strong></p>
                    <p>
                      <br>
                    </p>
                    <p>Signed: _____________________________________________&nbsp;</p>
                    <p>Date: _______________________________________________</p>
                    <p>Name: _______________________________________________</p>
                    <p>Position: _____________________________________________</p>
                </div>
            </div>
        </textarea>
    </div>
</div>
<script>
    var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
</script>
<script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
</script>
<script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
    $('#lfm2').filemanager('file', {prefix: route_prefix});
</script>
<!-- TinyMCE init -->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
{{--    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>--}}
<script>
    var editor_config = {
        height: 600,
        theme: 'modern',
        selector: "textarea",
        body_id: 'page',
        content_css: ['//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css', '{{url('//localhost/task-management/public/metro/letters/create_letter.css')}}'
        ],
        plugins: ['autosave advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools fullscreen'
        ],
        table_toolbar: ["tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore " +
        "tableinsertcolafter tabledeletecol"],
        table_default_attributes: {
            border: '1'
        },
        contextmenu: "link image inserttable | cell row column deletetable print list",
        toolbar: "save undo redo | bold italic underline styleselect fontselect fontsizeselect numlist bullist forecolor backcolor " +
            "| alignleft aligncenter alignright alignfull | outdent indent insertdatetime table | print " +
            "forecolor backcolor restoredraft link image media spellchecker searchreplace fullpage preview fullscreen",
        textcolor_cols: "8",
        media_live_embeds: true,
        advlist_bullet_styles: "default,circle,disc,square",
        advlist_number_styles: "default,lower-alpha,lower-greek,lower-roman,upper-alpha,upper-roman",
        textcolor_map: [
            "000000", "Black",
            "993300", "Burnt orange",
            "333300", "Dark olive",
            "003300", "Dark green",
            "003366", "Dark azure",
            "000080", "Navy Blue",
            "333399", "Indigo",
            "333333", "Very dark gray",
            "800000", "Maroon",
            "FF6600", "Orange",
            "808000", "Olive",
            "008000", "Green",
            "008080", "Teal",
            "0000FF", "Blue",
            "666699", "Grayish blue",
            "808080", "Gray",
            "FF0000", "Red",
            "FF9900", "Amber",
            "99CC00", "Yellow green",
            "339966", "Sea green",
            "33CCCC", "Turquoise",
            "3366FF", "Royal blue",
            "800080", "Purple",
            "999999", "Medium gray",
            "FF00FF", "Magenta",
            "FFCC00", "Gold",
            "FFFF00", "Yellow",
            "00FF00", "Lime",
            "00FFFF", "Aqua",
            "00CCFF", "Sky blue",
            "993366", "Red violet",
            "FFFFFF", "White",
            "FF99CC", "Pink",
            "FFCC99", "Peach",
            "FFFF99", "Light yellow",
            "CCFFCC", "Pale green",
            "CCFFFF", "Pale cyan",
            "99CCFF", "Light sky blue",
            "CC99FF", "Plum"
        ],
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>

<script>
    $(document).ready(function(){

        // Define function to open filemanager window
        var lfm = function(options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
        };

        // Define LFM summernote button
        var LFMButton = function(context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'Insert image with filemanager',
                click: function() {

                    lfm({type: 'image', prefix: '/laravel-filemanager'}, function(url, path) {
                        context.invoke('insertImage', url);
                    });

                }
            });
            return button.render();
        };

        // Initialize summernote with LFM button in the popover button group
        // Please note that you can add this button to any other button group you'd like
        $('#summernote-editor').summernote({
            toolbar: [
                ['popovers', ['lfm']],
            ],
            buttons: {
                lfm: LFMButton
            }
        })
    });
</script>
</body>
</html>
