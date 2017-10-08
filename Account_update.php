<?php

require 'connect.php';

    $haveBody=false;
    if ($action == 'entity') {
    try {
        $response = $restClient->request('GET', 'https://sandbox-quickbooks.api.intuit.com/v3/company/' . $_SESSION['company_id'] . '/account/' . $_POST['entityId'], [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ]
        ]);
        $updateContent = json_encode(json_decode($response->getBody()),JSON_PRETTY_PRINT);  
    } catch (\Exception $e) {
        $updateContent = $e->getMessage();
    }
}

    if ($action == 'update') {
        $jsonContent = $_POST['jsonContent'];
        $requestURL = 'https://sandbox-quickbooks.api.intuit.com/v3/company/' . $_SESSION['company_id'] . '/account/';
        $requestheaders = ['headers' => ['Content-Type' => 'application/json','Authorization' => 'Bearer *******'], 'body' => $jsonContent];
        $requestheaders = json_encode($requestheaders,JSON_PRETTY_PRINT); 
    try {
        $response = $restClient->request('POST', 'https://sandbox-quickbooks.api.intuit.com/v3/company/' . $_SESSION['company_id'] . '/account/', 
            ['headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token], 
            'body' => $jsonContent
        ]);

        $result = json_encode(json_decode($response->getBody()),JSON_PRETTY_PRINT); 
        $resultHeader = json_encode($response->getHeaders(),JSON_PRETTY_PRINT);
        $responseCode = $response->getStatusCode();
    } catch (\Exception $e) {
        $result = $e->getMessage();
    }
}
?>
<head>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
     <script type="text/javascript">
    $(document).ready(function(){   
        $('#requestHeader').click(function(){
            $('#requestHeaderPre').toggle();
        });
        $('#requestURL').click(function(){
            $('#requestURLPre').toggle();
        });
        $('#responseCode').click(function(){
            $('#responseCodePre').toggle();
        });
        $('#responseHeader').click(function(){
            $('#responseHeaderPre').toggle();
        });
        $('#responseBody').click(function(){
            $('#responseBodyPre').toggle();
        });
        $('#hideAll').click(function(){
            $('pre').hide();
        });
        $('#expandAll').click(function(){
            $('pre').show();
        });
        $("div").toggleClass("animated");
    });
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<div class="inner contact">
                <!-- Form Area -->
                <div class="contact-form">
                        <form id="contact-us" method="post" action="?action=entity">
                         <div class="col-xs-8 wow animated slideInLeft" data-wow-delay=".5s">
                            <!-- Name -->
                        <label>Please Enter Account ID to get the account body:</label>
                            <!-- Email -->
                        </div><!-- End Left Inputs -->
                        <!-- Left Inputs -->
                        <div class="col-xs-8 wow animated slideInLeft" data-wow-delay=".5s">
                            <!-- Name -->
                          <input type="text" name="entityId" id="name" required="required" class="form" value="" />
                            <!-- Email -->
                        </div><!-- End Left Inputs -->
                        <!-- Right Inputs -->
                        <div class="col-xs-4 wow animated slideInRight" data-wow-delay=".5s">
                            <!-- Message -->
                            <button type="submit" id="submit" name="submit" class="form-btn semibold">Get Body by Id</button>
                        </div><!-- End Right Inputs -->
                                   </form>         <!-- Form -->
                     <form id="contact-us" method="post" action="?action=update">
                        <!-- Left Inputs -->
                        <div class="col-xs-8 wow animated slideInLeft" data-wow-delay=".5s">
                            <!-- Name -->
                        <label>Please Enter Request Body:</label>
                            <!-- Email -->
                        </div><!-- End Left Inputs -->

                        <div class="col-xs-8 wow animated slideInLeft" data-wow-delay=".5s">
                        <textarea id="jsonContent" name="jsonContent">
                                <?php
                                    print_r($updateContent);
                                ?>
                        </textarea>
                        </div><!-- End Left Inputs -->
                        <!-- Right Inputs -->
                        <div class="col-xs-4 wow animated slideInRight" data-wow-delay=".5s">
                            <!-- Message -->
                            <button type="submit" id="submit" name="submit" class="form-btn semibold">Update</button>
                            <br/>
                        </div><!-- End Right Inputs -->
                        <!-- Bottom Submit -->
                        <div class="relative fullwidth col-xs-12">
                            <label id="hideAll">Hide All</label>&nbsp;&nbsp;&nbsp;&nbsp;<label id="expandAll">Expand All</label>
                            <br/>
                            <label id="requestURL">Request URI:</label>
                            <pre id="requestURLPre" style="white-space: normal">
                                <?php
                                    print_r($requestURL);
                                ?>
                            </pre>
                             <br/>
                            <label  id="requestHeader" >Request Header:</label>
                            <pre id="requestHeaderPre" style="white-space: pre-wrap">
                                <?php
                                    print_r($requestheaders);
                                ?>
                            </pre>
                            <br/>
                            <label  id="responseCode" >Response Code:</label>
                            <pre id="responseCodePre" style="white-space: normal">
                                <?php
                                    print_r($responseCode);
                                ?>
                            </pre>
                            <br/>
                            <label  id="responseHeader" >Response Header:</label>
                            <pre id="responseHeaderPre" style="white-space: pre-wrap">
                                <?php
                                    print_r($resultHeader);
                                ?>
                            </pre>
                            <br/>
                            <label id="responseBody" >Response Body:</label>
                            <pre id="responseBodyPre" style="white-space: pre-wrap;">
                                <?php
                                    print_r($result);
                                ?>
                            </pre>
                        </div><!-- End Bottom Submit -->
                        <!-- Clear -->
                        <div class="clear"></div>
                    </form>
                </div><!-- End Contact Form Area -->
            </div><!-- End Inner -->