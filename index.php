
<!DOCTYPE html>
<html lang="pt">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Send push in Android</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>	
			@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);
			body {
				background: #457b9d;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}
			
		</style>
    </head>
    <body>
        <div class="container" >
		
			<section class="main">
				<form class="form-4" action="index.php" method="post">
				    <h1>Send push in Android</h1>
				    <p>
				        <label for="login">Google Api Key </label>
				        <input type="text" rows="4" cols="50" name="api_key" placeholder="Google Api Key" required>
				    </p>
				   <p>
				        <label for="token">Token</label>
				        <input type="text" name='token' placeholder="Token" required> 
				    </p>
				    <p>
				        <label for="login">Message</label>
				        <input type="text" rows="4" cols="50" name="message" placeholder="Message" required>
				    </p>
				    

				    <p>
				        <input type="submit" name="submit" value="Send Message">
				    </p>       
				</form>​
			</section>
			
        </div>


    </body>
</html>

<?php

$message = $_POST['message'];
$token_ids = $_POST['token'];
$gl_api_key = $_POST['api_key'];
// Payload data you want to send to Android device(s)
// (it will be accessible via intent extras)    
$data = array( 'message' => $message );


// The recipient registration tokens for this notification
// http://developer.android.com/google/gcm/ 
$ids = array($token_ids);



// Send a GCM push
// sendGoogleCloudMessage(  $data, $ids );
if(!empty($_POST['token'])){
    sendGoogleCloudMessage( $gl_api_key, $data, $ids );
}

function sendGoogleCloudMessage($gl_api_key, $data, $ids )
{
    // Insert real GCM API key from Google APIs Console
    // https://code.google.com/apis/console/        
    $apiKey = $gl_api_key;

    // Define URL to GCM endpoint
    $url = 'https://gcm-http.googleapis.com/gcm/send';

    // Set GCM post variables (device IDs and push payload)     
    $post = array(
                    'registration_ids'  => $ids,
                    'data'              => $data,
                    );

    // Set CURL request headers (authentication and type)       
    $headers = array( 
                        'Authorization: key=' . $apiKey,
                        'Content-Type: application/json'
                    );

    // Initialize curl handle       
    $ch = curl_init();

    // Set URL to GCM endpoint      
    curl_setopt( $ch, CURLOPT_URL, $url );

    // Set request method to POST       
    curl_setopt( $ch, CURLOPT_POST, true );

    // Set our custom headers       
    curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );

    // Get the response back as string instead of printing it       
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

    // Set JSON post data
    curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $post ) );

    // Actually send the push   
    $result = curl_exec( $ch );

    // Error handling
    if ( curl_errno( $ch ) )
    {
        echo 'GCM error: ' . curl_error( $ch );
    }

    // Close curl handle
    curl_close( $ch );

    // Debug GCM response       
    echo $result;
}
?>