<!--
==================== Respmail ====================
Respmail is a response HTML email designed to work
on all major devices and responsive for smartphones
that support media queries.

** NOTE **
This template comes with a lot of standard features
that has been thoroughly tested on major platforms
and devices, it is extremely flexible to use and
can be easily customized by removing any row that
you do not need.

it is gauranteed to work 95% without any major flaws,
any changes or adjustments should thoroughly be
tested and reviewed to match with the general
structure.

** Profile **
Licensed under MIT (https://github.com/charlesmudy/responsive-html-email-template/blob/master/LICENSE)
Designed by Shina Charles Memud
Respmail v1.2 (http://charlesmudy.com/respmail/)

** Quick modification **
We are using width of 500 for the whole content,
you can change it any size you want (e.g. 600).
The fastest and safest way is to use find & replace
Sizes: [
        wrapper   : '500',
        columns   : '210',
        x-columns : [
                        left : '90',
                        right: '350'
                ]
        }
    -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no" /> <!-- disable auto telephone linking in iOS -->
    <title>Respmail is a response HTML email designed to work on all major email platforms and smartphones</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto:100" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Mono|Roboto:100" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina|Roboto+Condensed|Roboto+Mono|Roboto:100" rel="stylesheet">
    <style type="text/css">
        /* RESET STYLES */
        html { background-color:#E1E1E1; margin:0; padding:0; }
        body, #bodyTable, #bodyCell, #bodyCell{height:100% !important; margin:0; padding:0; width:100% !important;font-family:Helvetica, Arial, "Lucida Grande", sans-serif;}
        table{border-collapse:collapse;}
        table[id=bodyTable] {width:100%!important;margin:auto;max-width:500px!important;color:#7A7A7A;font-weight:normal;}
        img, a img{border:0; outline:none; text-decoration:none;height:auto; line-height:100%;}
        a {text-decoration:none !important;border-bottom: 1px solid;}
        h1, h2, h3, h4, h5, h6{color:#5F5F5F; font-weight:normal; font-family:Helvetica; font-size:20px; line-height:125%; text-align:Left; letter-spacing:normal;margin-top:0;margin-right:0;margin-bottom:10px;margin-left:0;padding-top:0;padding-bottom:0;padding-left:0;padding-right:0;}

        /* CLIENT-SPECIFIC STYLES */
        .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail/Outlook.com to display emails at full width. */
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height:100%;} /* Force Hotmail/Outlook.com to display line heights normally. */
        table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up. */
        #outlook a{padding:0;} /* Force Outlook 2007 and up to provide a "view in browser" message. */
        img{-ms-interpolation-mode: bicubic;display:block;outline:none; text-decoration:none;} /* Force IE to smoothly render resized images. */
        body, table, td, p, a, li, blockquote{-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%; font-weight:normal!important;} /* Prevent Windows- and Webkit-based mobile platforms from changing declared text sizes. */
        .ExternalClass td[class="ecxflexibleContainerBox"] h3 {padding-top: 10px !important;} /* Force hotmail to push 2-grid sub headers down */

        /* /\/\/\/\/\/\/\/\/ TEMPLATE STYLES /\/\/\/\/\/\/\/\/ */

        /* ========== Page Styles ========== */
        h1{display:block;font-size:26px;font-style:normal;font-weight:normal;line-height:100%;}
        h2{display:block;font-size:20px;font-style:normal;font-weight:normal;line-height:120%;}
        h3{display:block;font-size:17px;font-style:normal;font-weight:normal;line-height:110%;}
        h4{display:block;font-size:18px;font-style:italic;font-weight:normal;line-height:100%;}
        .flexibleImage{height:auto;}
        .linkRemoveBorder{border-bottom:0 !important;}
        table[class=flexibleContainerCellDivider] {padding-bottom:0 !important;padding-top:0 !important;}

        body, #bodyTable{background-color:#E1E1E1;}
        #emailHeader{background-color:#E1E1E1;}
        #emailBody{background-color:#FFFFFF;}
        #emailFooter{background-color:#E1E1E1;}
        .nestedContainer{background-color:#F8F8F8; border:1px solid #CCCCCC;}
        .emailButton{background-color:#205478; border-collapse:separate;}
        .buttonContent{color:#FFFFFF; font-family:Helvetica; font-size:18px; font-weight:bold; line-height:100%; padding:15px; text-align:center;}
        .buttonContent a{color:#FFFFFF; display:block; text-decoration:none!important; border:0!important;}
        .emailCalendar{background-color:#FFFFFF; border:1px solid #CCCCCC;}
        .emailCalendarMonth{background-color:#205478; color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; padding-top:10px; padding-bottom:10px; text-align:center;}
        .emailCalendarDay{color:#205478; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; line-height:100%; padding-top:20px; padding-bottom:20px; text-align:center;}
        .imageContentText {margin-top: 10px;line-height:0;}
        .imageContentText a {line-height:0;}
        #invisibleIntroduction {display:none !important;} /* Removing the introduction text from the view */

        /*FRAMEWORK HACKS & OVERRIDES */
        span[class=ios-color-hack] a {color:#275100!important;text-decoration:none!important;} /* Remove all link colors in IOS (below are duplicates based on the color preference) */
        span[class=ios-color-hack2] a {color:#205478!important;text-decoration:none!important;}
        span[class=ios-color-hack3] a {color:#8B8B8B!important;text-decoration:none!important;}
        /* A nice and clean way to target phone numbers you want clickable and avoid a mobile phone from linking other numbers that look like, but are not phone numbers.  Use these two blocks of code to "unstyle" any numbers that may be linked.  The second block gives you a class to apply with a span tag to the numbers you would like linked and styled.
        Inspired by Campaign Monitor's article on using phone numbers in email: http://www.campaignmonitor.com/blog/post/3571/using-phone-numbers-in-html-email/.
        */
        .a[href^="tel"], a[href^="sms"] {text-decoration:none!important;color:#606060!important;pointer-events:none!important;cursor:default!important;}
        .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {text-decoration:none!important;color:#606060!important;pointer-events:auto!important;cursor:default!important;}


        /* MOBILE STYLES */
        @media only screen and (max-width: 480px){
            /*////// CLIENT-SPECIFIC STYLES //////*/
            body{width:100% !important; min-width:100% !important;} /* Force iOS Mail to render the email at full width. */

            /* FRAMEWORK STYLES */
            /*
            CSS selectors are written in attribute
            selector format to prevent Yahoo Mail
            from rendering media query styles on
            desktop.
            */
            /*td[class="textContent"], td[class="flexibleContainerCell"] { width: 100%; padding-left: 10px !important; padding-right: 10px !important; }*/
            table[id="emailHeader"],
            table[id="emailBody"],
            table[id="emailFooter"],
            table[class="flexibleContainer"],
            td[class="flexibleContainerCell"] {width:100% !important;}
            td[class="flexibleContainerBox"], td[class="flexibleContainerBox"] table {display: block;width: 100%;text-align: left;}
            /*
            The following style rule makes any
            image classed with 'flexibleImage'
            fluid when the query activates.
            Make sure you add an inline max-width
            to those images to prevent them
            from blowing out.
            */
            td[class="imageContent"] img {height:auto !important; width:100% !important; max-width:100% !important; }
            img[class="flexibleImage"]{height:auto !important; width:100% !important;max-width:100% !important;}
            img[class="flexibleImageSmall"]{height:auto !important; width:auto !important;}


            /*
            Create top space for every second element in a block
            */
            table[class="flexibleContainerBoxNext"]{padding-top: 10px !important;}

            /*
            Make buttons in the email span the
            full width of their container, allowing
            for left- or right-handed ease of use.
            */
            table[class="emailButton"]{width:100% !important;}
            td[class="buttonContent"]{padding:0 !important;}
            td[class="buttonContent"] a{padding:15px !important;}

        }

        /*  CONDITIONS FOR ANDROID DEVICES ONLY
        *   http://developer.android.com/guide/webapps/targeting.html
        *   http://pugetworks.com/2011/04/css-media-queries-for-targeting-different-mobile-devices/ ;
        =====================================================*/

        @media only screen and (-webkit-device-pixel-ratio:.75){
            /* Put CSS for low density (ldpi) Android layouts in here */
        }

        @media only screen and (-webkit-device-pixel-ratio:1){
            /* Put CSS for medium density (mdpi) Android layouts in here */
        }

        @media only screen and (-webkit-device-pixel-ratio:1.5){
            /* Put CSS for high density (hdpi) Android layouts in here */
        }
        /* end Android targeting */

        /* CONDITIONS FOR IOS DEVICES ONLY
        =====================================================*/
        @media only screen and (min-device-width : 320px) and (max-device-width:568px) {

        }
        /* end IOS targeting */
    </style>
    <!--
        Outlook Conditional CSS

        These two style blocks target Outlook 2007 & 2010 specifically, forcing
        columns into a single vertical stack as on mobile clients. This is
        primarily done to avoid the 'page break bug' and is optional.

        More information here:
        http://templates.mailchimp.com/development/css/outlook-conditional-css
    -->
    <!--[if mso 12]>
    <style type="text/css">
        .flexibleContainer{display:block !important; width:100% !important;}
    </style>
    <![endif]-->
    <!--[if mso 14]>
    <style type="text/css">
        .flexibleContainer{display:block !important; width:100% !important;}
    </style>
    <![endif]-->
</head>
<body bgcolor="#E1E1E1" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">

<!-- CENTER THE EMAIL // -->
<!--
1.  The center tag should normally put all the
    content in the middle of the email page.
    I added "table-layout: fixed;" style to force
    yahoomail which by default put the content left.

2.  For hotmail and yahoomail, the contents of
    the email starts from this center, so we try to
    apply necessary styling e.g. background-color.
--><center style="background-color: #e1e1e1;">
    <table id="bodyTable" style="table-layout: fixed; max-width: 100% !important; width: 100% !important; min-width: 100% !important;" border="0" width="100%" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td id="bodyCell" align="center" valign="top"><!-- EMAIL HEADER // --> <!--
                    The table "emailBody" is the email's container.
                    Its width can be set to 100% for a color band
                    that spans the width of the page.
                -->
                <table id="emailHeader" border="0" width="500" cellspacing="0" cellpadding="0" bgcolor="#E1E1E1"><!-- HEADER ROW // -->
                    <tbody>
                    <tr>
                        <td align="center" valign="top"><!-- CENTERING TABLE // -->
                            <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td align="center" valign="top"><!-- FLEXIBLE CONTAINER // -->
                                        <table class="flexibleContainer" border="0" width="500" cellspacing="0" cellpadding="10">
                                            <tbody>
                                            <tr>
                                                <td class="flexibleContainerCell" valign="top" width="500"><!-- CONTENT TABLE // -->
                                                    <table border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
                                                        <tbody>
                                                        <tr><!--
                                                                The "invisibleIntroduction" is the text used for short preview
                                                                of the email before the user opens it (50 characters max). Sometimes,
                                                                you do not want to show this message depending on your design but this
                                                                text is highly recommended.

                                                                You do not have to worry if it is hidden, the next <td> will automatically
                                                                center and apply to the width 100% and also shrink to 50% if the first <td>
                                                                is visible.
                                                            -->
                                                            <td id="invisibleIntroduction" class="flexibleContainerBox" style="display: none !important; mso-hide: all;" align="left" valign="middle">
                                                                <table style="max-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="textContent" align="left">
                                                                            <div style="font-family: Helvetica,Arial,sans-serif; font-size: 13px; color: #828282; text-align: center; line-height: 120%;">OPTAMED</div>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!-- // FLEXIBLE CONTAINER --></td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- // CENTERING TABLE --></td>
                    </tr>
                    <!-- // END --></tbody>
                </table>
                <!-- // END --> <!-- EMAIL BODY // --> <!--
                    The table "emailBody" is the email's container.
                    Its width can be set to 100% for a color band
                    that spans the width of the page.
                -->
                <table id="emailBody" border="0" width="500" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF"><!-- MODULE ROW // --> <!--
                        To move or duplicate any of the design patterns
                        in this email, simply move or copy the entire
                        MODULE ROW section for each content block.
                    -->
                    <tbody>
                    <tr>
                        <td align="center" valign="top"><!-- CENTERING TABLE // --> <!--
                                The centering table keeps the content
                                tables centered in the emailBody table,
                                in case its width is set to 100%.
                            -->
                            <table style="color: #ffffff;" border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#3498db">
                                <tbody>
                                <tr>
                                    <td align="center" valign="top"><!-- FLEXIBLE CONTAINER // --> <!--
                                            The flexible container has a set width
                                            that gets overridden by the media query.
                                            Most content tables within can then be
                                            given 100% widths.
                                        -->
                                        <table class="flexibleContainer" border="0" width="500" cellspacing="0" cellpadding="0">
                                            <tbody>
                                            <tr>
                                                <td class="flexibleContainerCell" align="center" valign="top" width="500"><!-- CONTENT TABLE // --> <!--
                                                    The content table is the first element
                                                        that's entirely separate from the structural
                                                        framework of the email.
                                                    -->
                                                    <table border="0" width="100%" cellspacing="0" cellpadding="30">
                                                        <tbody>
                                                        <tr>
                                                            <td class="textContent" align="left" valign="top">
                                                                <h3 style="color: #ffffff; line-height: 100%; font-family: 'Baloo Bhaina', sans-serif; font-size: 35px; font-weight: normal; margin-bottom: 10px; margin-top: 5px;">Usted tiene una cita nueva!</h3>
                                                                <div style="height: 30px; background: #34495e;">
                                                                    <h4 style="text-align: left; font-weight: normal; font-family: Helvetica,Arial,sans-serif; font-size: 16px; margin-bottom: 10px; margin-left: 5px; color: white; line-height: 135%; margin-top: 10px; padding-top: 3px; font-style: italic;">Sistema Agenda</h4>
                                                                </div>
                                                                <div style="height: 3px; background: #7f8c8d; margin-bottom: 8px;">&nbsp;</div>
                                                                <div style="text-align: left; font-family: 'Roboto',Arial,sans-serif; font-size: 15px; font-weigth:100; margin-bottom: 0; color: #ffffff; line-height: 135%;">Estimado, <b>{{$medico->titulo." ".$medico->nombre." ".$medico->apellido }}</b> <br /> Tiene una cita agendada con el paciente {{$paciente->nombre." ".$paciente->apellido}}, a continuación puede ver los detalles:</div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- // CONTENT TABLE --></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!-- // FLEXIBLE CONTAINER --></td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- // CENTERING TABLE --></td>
                    </tr>
                    <!-- // MODULE ROW --> <!-- MODULE ROW // --> <!--  The "mc:hideable" is a feature for MailChimp which allows
                        you to disable certain row. It works perfectly for our row structure.
                        http://kb.mailchimp.com/article/template-language-creating-editable-content-areas/
                    -->
                    <tr>
                        <td align="center" valign="top"><!-- CENTERING TABLE // -->
                            <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td align="center" valign="top"><!-- FLEXIBLE CONTAINER // -->
                                        <table class="flexibleContainer" border="0" width="500" cellspacing="0" cellpadding="30">
                                            <tbody>
                                            <tr>
                                                <td class="flexibleContainerCell" valign="top" width="500"><!-- CONTENT TABLE // -->
                                                    <table border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
                                                        <tbody>
                                                        <tr>
                                                            <td class="flexibleContainerBox" align="left" valign="top">
                                                                <table style="max-width: 100%;" border="0" width="210" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="textContent" align="left">
                                                                            <h3 style="color: #5f5f5f; line-height: 125%; font-family: 'Roboto',sans-serif; font-size: 20px; font-weight: normal; margin-top: 0; margin-bottom: 3px; text-align: left;">Detalle de la Cita:</h3>
                                                                            <br>
                                                                            <?php setlocale(LC_TIME, 'es_ES');
                                                                            ?>
                                                                            <h3 style="color: #5f5f5f; line-height: 125%; font-family: Helvetica,Arial,sans-serif; font-size: 20px; font-weight: normal; margin-top: 0; margin-bottom: 3px; text-align: left;"></h3>
                                                                            <div style="text-align: left; font-family: Helvetica,Arial,sans-serif; font-size: 15px; margin-bottom: 0; color: #5f5f5f; line-height: 135%;"><strong>Fecha: </strong>{{\Carbon\Carbon::parse($cita->start)->formatLocalized('%a %d %B %Y')}}</div>
                                                                            <div style="text-align: left; font-family: Helvetica,Arial,sans-serif; font-size: 15px; margin-bottom: 0; color: #5f5f5f; line-height: 135%;"><strong>Hora: </strong>{{\Carbon\Carbon::parse($cita->start)->format('h:i:s A')}}</div>
                                                                            <div style="text-align: left; font-family: Helvetica,Arial,sans-serif; font-size: 15px; margin-bottom: 0; color: #5f5f5f; line-height: 135%;"><strong>Observaciones: </strong>{{$cita->detalle_cita}}</div>
                                                                            <br><br><br>
                                                                            <div style="text-align: left; font-family: Helvetica,Arial,sans-serif; font-size: 15px; margin-bottom: 0; color: #5f5f5f; line-height: 135%;">Atentamente,
                                                                                <br><br> Call Center <br> <strong>OPTAMED</strong></div>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- // CONTENT TABLE --></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!-- // FLEXIBLE CONTAINER --></td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- // CENTERING TABLE --></td>
                    </tr>
                    </tbody>
                </table>
                <!-- // END --> <!-- EMAIL FOOTER // --> <!--
                    The table "emailBody" is the email's container.
                    Its width can be set to 100% for a color band
                    that spans the width of the page.
                -->
                <table id="emailFooter" border="0" width="500" cellspacing="0" cellpadding="0" bgcolor="#E1E1E1"><!-- FOOTER ROW // --> <!--
                        To move or duplicate any of the design patterns
                        in this email, simply move or copy the entire
                        MODULE ROW section for each content block.
                    -->
                    <tbody>
                    <tr>
                        <td align="center" valign="top"><!-- CENTERING TABLE // -->
                            <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td align="center" valign="top"><!-- FLEXIBLE CONTAINER // -->
                                        <table class="flexibleContainer" border="0" width="500" cellspacing="0" cellpadding="0">
                                            <tbody>
                                            <tr>
                                                <td class="flexibleContainerCell" align="center" valign="top" width="500">
                                                    <table border="0" width="100%" cellspacing="0" cellpadding="30">
                                                        <tbody>
                                                        <tr>
                                                            <td valign="top" bgcolor="#E1E1E1">
                                                                <div style="font-family: Helvetica,Arial,sans-serif; font-size: 13px; color: #828282; text-align: center; line-height: 120%;">
                                                                    <div>Copyright &copy;2017 <a style="text-decoration: none; color: #828282;" href="http://www.clinicaelbatan.com/" target="_blank"><span style="color: #828282;">OPTAMED </span></a>. Todos los derechos reservados.</div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!-- // FLEXIBLE CONTAINER --></td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- // CENTERING TABLE --></td>
                    </tr>
                    </tbody>
                </table>
                <!-- // END --></td>
        </tr>
        </tbody>
    </table>
</center>
</body>
</html>