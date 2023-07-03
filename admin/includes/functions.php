<?php

// Function to retrieve the contents of a URL using cURL
function curl_get_contents($url)
{
    // Initialize cURL session
    $ch = curl_init($url);
  
    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  
    // Execute cURL request
    $data = curl_exec($ch);
  
    // Close cURL session
    curl_close($ch);
  
    // Return the retrieved data
    return $data;
}

// Function to print data in a formatted way using <pre> tags
function pre($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

// Function to check if user is authenticated, otherwise redirect to homepage
function secure()
{
    if (!isset($_SESSION['id'])) {
        header('Location: /');
        die();
    }
}

// Function to set a message in the session
function set_message($message)
{
    $_SESSION['message'] = $message;
}

// Function to retrieve and display a stored message from the session
function get_message()
{
    if (isset($_SESSION['message'])) {
        echo '<p style="padding: 0 1%;" class="error">
            <i class="fas fa-exclamation-circle"></i> 
            '.$_SESSION['message'].'
        </p>
        <hr>';
        
        // Clear the message from the session after displaying it
        unset($_SESSION['message']);
    }
}

